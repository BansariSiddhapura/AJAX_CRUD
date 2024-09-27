<?php
include_once('connection.php');
$type=$_GET['type'];
if($type=='customer'){
    if (!empty($_GET['id'])) {
       // $delete = "DELETE FROM `customer` WHERE id='" . $_GET['id'] . "'";
       $delete=$conn->delete('customer',"id='" . $_GET['id'] . "'");
        mysqli_query($conn->DB, $delete) ? $message = "Customer delete Successfully" : $message = "Customer doesn't delete";
        echo json_encode(['message' => $message]);
    }
}

if($type=='contact'){
    if (!empty($_GET['id'])) {
       // $delete = "DELETE FROM `contact` WHERE id='" . $_GET['id'] . "'";
       $delete=$conn->delete( 'contact',"id='" . $_GET['id'] . "'");
        mysqli_query($conn->DB, $delete) ? $message = "contact delete Successfully" : $message = "contact doesn't delete";
        echo json_encode(['message' => $message]);
    }
}

