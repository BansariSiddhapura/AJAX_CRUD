<?php
include_once('connection.php');
if (!isset($_GET['id'])) {
    $select = "SELECT * FROM `ajax_client`";
    $res = mysqli_query($conn, $select);
    $row = mysqli_fetch_all($res, MYSQLI_ASSOC);
    
}else{
    $select="SELECT * FROM `ajax_client` where id='".$_GET['id']."'";
    $res=mysqli_query($conn,$select);
    $row=mysqli_fetch_assoc($res);
}
echo  json_encode($row);
?>