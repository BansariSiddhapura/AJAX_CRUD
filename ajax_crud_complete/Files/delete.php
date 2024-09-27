<?php
include_once('connection.php');
$id=$_GET['id'];
$delete="DELETE FROM `ajax_client` WHERE id='$id'";
mysqli_query($conn,$delete);
$message="Fail to delete";
if(mysqli_affected_rows($conn)>0){
    $message = 'Client deleted successfully';
}
echo json_encode($message);
?>