<?php
include_once('connection.php');
//echo $_POST;
if (!empty($_POST)) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    if (!empty($id)) {
        $insert = "UPDATE `ajax_client` SET name='$name',email='$email',password='$pass',city='$city',gender='$gender' WHERE id='$id'";
        mysqli_query($conn, $insert) ?    $message = 'update success' : $message = 'can not update success';      
    } else {
        $insert = "INSERT INTO `ajax_client`(name,email,password,city,gender)VALUES('$name','$email','$pass','$city','$gender')";
      mysqli_query($conn, $insert) ? $message = 'insert success': $message = 'can not insert success';         
    }
    echo json_encode(['message' => $message]);
}
