<?php
include_once 'connection.php';
$select="SELECT * FROM `ajax_client`";
$res=mysqli_query($conn,$select);
$row=mysqli_fetch_all($res,MYSQLI_ASSOC);
echo json_encode($row);
?>