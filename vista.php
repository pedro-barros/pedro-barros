<?php
require 'uploadconn.php';
$bdh = new Db();

/* $id = isset($_GET['id']) ? $_GET['id'] : ""; */
$id=$_GET['id'];
/* $stat = $bdh->connect()->prepare("DELETE * FROM pdf WHERE id=?");
$stat->bindParam(1, $id);
$stat->execute();

header('location: upload_pdf.php'); */ 
$count=$bdh->connect()->prepare("DELETE FROM pdf WHERE id=:id");
$count->bindParam(":id",$id,PDO::PARAM_INT);
$count->execute();
header('location: dashboard.php');
?>