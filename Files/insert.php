<?php
include_once('connection.php');
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$city = $_POST['city'];
$gender = $_POST['gender'];
$insert = "INSERT INTO `ajax_client`(name,email,password,city,gender)VALUES('$name','$email','$pass','$city','$gender')";
if (mysqli_query($conn, $insert)) {
    echo json_encode(['message' => 'insert success']);
} else {
    echo json_encode(['message' => 'can not insert']);
}
