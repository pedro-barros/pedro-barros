<?php
require('conn_offline.php');
// require('conn_online.php');
// require 'uploadconn.php';

session_start();

// variable declaration
$username = "";
$email    = "";
$errors   = array();

// chamar a função registar
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register()
{
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
	// defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) {
		array_push($errors, "Nome de utilizador é necessário");
	}
	if (empty($email)) {
		array_push($errors, "Email é necessário");
	}
	if (empty($password_1)) {
		array_push($errors, "Password é necessária");
	}
	if ($password_1 != $password_2) {
		array_push($errors, "As duas passwords não coincidem");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1); //encrypt password before saving in the database

		if (isset($_POST['tipo_utilizador'])) {
			$user_type = e($_POST['tipo_utilizador']);
			$query = "INSERT INTO users (nome, email, tipo_utilizador, pass) VALUES('$username', '$email', '$user_type', '$password')";
			mysqli_query($conn, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: login.php');
		} else {
			$query = "INSERT INTO users (nome, email, tipo_utilizador, pass) 
					  VALUES('$username', '$email', 'user', '$password')";
			mysqli_query($conn, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($conn);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: login.php');
		}
	}
}

// return do array do user pelo id
function getUserById($id)
{
	global $conn;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($conn, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val)
{
	global $conn;
	return mysqli_real_escape_string($conn, trim($val));
}

function display_error()
{
	global $errors;

	if (count($errors) > 0) {
		echo '<div class="error">';
		foreach ($errors as $error) {
			echo $error . '<br>';
		}
		echo '</div>';
	}
}


//no caso de nao ter login feito returnar falso para ser encaminhado para a pagina de login;
function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	} else {
		return false;
	}
}

//pressionar o button de logout
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

/********************************************************************************
 *********************************************************************************
 **********************************LOGIN******************************************
 *********************************************************************************
 ********************************************************************************/


//LOGIN 
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login()
{
	global $conn, $username, $errors;

	// valores do form
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "É necessário um nome de utilizador");
	}
	if (empty($password)) {
		array_push($errors, "É necessária a palavra-passe");
	}

	// se o login nao tiver erros no form
	if (count($errors) == 0) {
		//encriptar a palavra pass
		$password = md5($password);

		$query = "SELECT * FROM users WHERE nome='$username' AND pass='$password' LIMIT 1";
		$results = mysqli_query($conn, $query);
		//se o utilizador for encontrado
		if (mysqli_num_rows($results) == 1) {
			$logged_in_user = mysqli_fetch_assoc($results);
			// admin ou utilizador
			if ($logged_in_user['tipo_utilizador'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "Acesso concedido";
				header('location: dashboard.php');
			} else {
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: pagina_principal.php');
			}
		} else {
			array_push($errors, "Nome de utilizador ou password incorretos!");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['tipo_utilizador'] == 'admin') {
		return true;
	} else {
		return false;
	}
}
