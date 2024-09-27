<?php
include_once('connection.php');
$type = $_GET['type'];

if ($type == 'customer') {

    if (!isset($_GET['id'])) {
        //$select = "SELECT * FROM `customer`";
        $select=$conn->select('customer');
        $res = mysqli_query($conn->DB, $select);
        $row = mysqli_fetch_all($res, MYSQLI_ASSOC);
    } else {
        //$select = "SELECT * FROM `customer` WHERE id='" . $_GET['id'] . "'";
        $select=$conn->selectOne('customer','*',"id='" . $_GET['id'] . "'");
        $res = mysqli_query($conn->DB, $select);
        $row = mysqli_fetch_assoc($res);
    }
    echo json_encode($row);
}
if($type=='contact'){
    if(!isset($_GET['id'])){
        //$select="SELECT * FROM `contact`";
        $select=$conn->select('contact');
        $res=mysqli_query($conn->DB,$select);
        $row=mysqli_fetch_all($res,MYSQLI_ASSOC);
    }
    echo json_encode($row);
}
if($type=='joinCustCont'){
  
    $select="SELECT customer.id,contact.customer,contact.primary_contact,contact.firstName,contact.lastName,contact.email,contact.phone,customer.created_at FROM customer JOIN contact ON customer.company=contact.customer";
    $res=mysqli_query($conn->DB,$select);
    $row=mysqli_fetch_all($res,MYSQLI_ASSOC);
    echo json_encode($row);
}
if($type=='project'){
    if(!isset($_GET['id'])){
        $select=$conn->select('project');
        $select="SELECT project.id,project.project_name,customer.company,project.start_date,project.end_date,customer.created_at FROM customer JOIN project ON customer.company=project.customer";
        $res=mysqli_query($conn->DB,$select);
        $row=mysqli_fetch_all($res,MYSQLI_ASSOC);
    }
    echo json_encode($row);
}