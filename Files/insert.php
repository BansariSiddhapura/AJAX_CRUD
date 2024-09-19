<?php
include_once('connection.php');
if(!empty($_POST)){
    $id=$_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    if(!empty($id)){
        $insert = "UPDATE `ajax_client` SET name='$name',email='$email',password='$pass',city='$city',gender='$gender' WHERE id='$id'";
        if (mysqli_query($conn, $insert)) {
            echo json_encode(['message' => 'update success']);
        } else {
            echo json_encode(['message' => 'can not update']);
        }
    }else{
        $insert = "INSERT INTO `ajax_client`(name,email,password,city,gender)VALUES('$name','$email','$pass','$city','$gender')";
        if (mysqli_query($conn, $insert)) {
            echo json_encode(['message' => 'insert success']);
        } else {
            echo json_encode(['message' => 'can not insert']);
        }
    }
    
}

