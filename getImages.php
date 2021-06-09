<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$id = $_GET['id'];
	$sql = "SELECT * FROM pdf WHERE id = '$id'";
	$db = mysqli_connect('localhost', 'id12726689_adminpedro', 'root2020@ESCO', 'id12726689_agriapp');


	$r = mysqli_query($db, $sql);

	$result = mysqli_fetch_array($r);

	/* header('content-type:' . $result['tipoficheiro_extensao']); */
	header('content-type: image/jpeg');

	echo $result['ficheiro'];
	mysqli_close($db);
} else {
	echo "Error";
}
?>
