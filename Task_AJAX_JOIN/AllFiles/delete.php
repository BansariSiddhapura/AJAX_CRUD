<?php
include_once('connection.php');
$type = $_GET['type'];
if ($type == 'joinCustCont') {
    if (!empty($_GET['id'])) {
        // $delete = "DELETE FROM `customer` WHERE id='" . $_GET['id'] . "'";
        $delete = $conn->delete('customer', "id='" . $_GET['id'] . "'");

        $select = $conn->selectOne('customer', '*', "id='" . $_GET['id'] . "'");
        $res = mysqli_query($conn->DB, $select);
        $row = mysqli_fetch_assoc($res);

        $cust = $row['company'];

        if($delete){
            $delete_pro=$conn->delete('project',"customer='".$cust."'");
            mysqli_query($conn->DB, $delete_pro);
            $delete_cont=$conn->delete('contact',"customer='".$cust."'");
            mysqli_query($conn->DB, $delete_cont);
            $delete_count=$conn->delete('counter',"customer='".$cust."'");
            mysqli_query($conn->DB, $delete_count);
        
            mysqli_query($conn->DB, $delete) ? $message = "Customer delete Successfully" : $message = "Customer doesn't delete";
        }
        echo json_encode(['message' => $message]);
    }   
}

if ($type == 'contact') {
    if (!empty($_GET['id'])) {
        // $delete = "DELETE FROM `contact` WHERE id='" . $_GET['id'] . "'";
        $delete = $conn->delete('contact', "id='" . $_GET['id'] . "'");
        mysqli_query($conn->DB, $delete) ? $message = "contact delete Successfully" : $message = "contact doesn't delete";
        echo json_encode(['message' => $message]);
    }
}
if ($type == 'project') {
    if (!empty($_GET['id'])) {
        $delete = $conn->delete('project', "id='" . $_GET['id'] . "'");
        mysqli_query($conn->DB, $delete) ? $message = 'project delete Successfully' : $message = "project doesn't delete";
        echo json_encode(['message' => $message]);
    }
}
if ($type == 'counter') {
    if (!empty($_GET['id'])) {
        $delete = $conn->delete('counter', "id='" . $_GET['id'] . "'");
        mysqli_query($conn->DB, $delete) ? $message = 'counter delete Successfully' : $message = "counter doesn't delete";
        echo json_encode(['message' => $message]);
    }
}
