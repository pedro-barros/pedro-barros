<?php
//include('conn_offline');
include('conn_online');


$sql = "SELECT id FROM pdf";

$res = mysqli_query($conn, $sql);


$result = array();

$url = "https://agriup.000webhostapp.com/getImages.php/getImages.php?id=";
while ($row = mysqli_fetch_array($res)) {
	array_push($result, array('url' => $url . $row['id']));
}
echo json_encode(array("result" => $result));

mysqli_close($conn);
