<?php
include_once('connection.php');
$type = $_GET['type'];

if ($type == 'customer') {

    if (!isset($_GET['id'])) {
        //$select = "SELECT * FROM `customer`";
        $select = $conn->select('customer');
        $res = mysqli_query($conn->DB, $select);
        $row = mysqli_fetch_all($res, MYSQLI_ASSOC);
    } else {
        //$select = "SELECT * FROM `customer` WHERE id='" . $_GET['id'] . "'";
        $select = $conn->selectOne('customer', '*', "id='" . $_GET['id'] . "'");
        $res = mysqli_query($conn->DB, $select);
        $row = mysqli_fetch_assoc($res);
    }
    echo json_encode($row);
}
if ($type == 'contact') {
    if (!isset($_GET['id'])) {
        //$select="SELECT * FROM `contact`";
        $select = $conn->select('contact');
        $res = mysqli_query($conn->DB, $select);
        $row = mysqli_fetch_all($res, MYSQLI_ASSOC);
    } else {
        $select = $conn->selectOne('contact', '*', "id='" . $_GET['id'] . "'");
        $res = mysqli_query($conn->DB, $select);
        $row = mysqli_fetch_assoc($res);
    }
    echo json_encode($row);
}
if ($type == 'joinCustCont') {
    if (!isset($_GET['id'])) {
        $select = "SELECT customer.id,contact.customer,contact.primary_contact,contact.firstName,contact.lastName,contact.email,contact.phone,customer.created_at,customer.company FROM customer LEFT JOIN contact ON customer.company=contact.customer";
        $res = mysqli_query($conn->DB, $select);
        $row = mysqli_fetch_all($res, MYSQLI_ASSOC);
    } else {
        //$select = "SELECT * FROM `customer` WHERE id='" . $_GET['id'] . "'";
        $select = $conn->selectOne('customer', '*', "id='" . $_GET['id'] . "'");
        $res = mysqli_query($conn->DB, $select);
        $row = mysqli_fetch_assoc($res);
    }
    echo json_encode($row);
}
if ($type == 'project') {
    if (!isset($_GET['id'])) {
        //$select = $conn->select('project');
        $select = "SELECT project.id,project.project_name,customer.company,project.start_date,project.end_date,customer.created_at,project.customer FROM project LEFT JOIN customer ON project.customer=customer.company";
        $res = mysqli_query($conn->DB, $select);
        $row = mysqli_fetch_all($res, MYSQLI_ASSOC);
    } else {
        //$select = "SELECT * FROM `customer` WHERE id='" . $_GET['id'] . "'";
        $select = $conn->selectOne('project', '*', "id='" . $_GET['id'] . "'");
        $res = mysqli_query($conn->DB, $select);
        $row = mysqli_fetch_assoc($res);
    }
    echo json_encode($row);
}
if ($type == 'counter') {
    if (!isset($_GET['id'])) {
        $select = $conn->select('counter');
        $res = mysqli_query($conn->DB, $select);
        $row = mysqli_fetch_all($res, MYSQLI_ASSOC);
    } else {
        //$select = "SELECT * FROM `customer` WHERE id='" . $_GET['id'] . "'";
        $select = $conn->selectOne('counter', '*', "id='" . $_GET['id'] . "'");
        $res = mysqli_query($conn->DB, $select);
        $row = mysqli_fetch_assoc($res);
    }
    echo json_encode($row);
}
if ($type == 'details') {
    if (!isset($_GET['id'])) {
        // $select ="SELECT c.company,p.project_name,co.counter_name FROM customer c LEFT JOIN project p ON c.company=p.customer LEFT JOIN counter co ON c.company = co.customer";
        $select = "SELECT c.company, 
           GROUP_CONCAT(DISTINCT p.project_name ORDER BY p.project_name SEPARATOR ', ') AS project_name, 
           GROUP_CONCAT(DISTINCT co.counter_name ORDER BY co.counter_name SEPARATOR ', ') AS counter_name
    FROM customer c
    LEFT JOIN project p ON c.company = p.customer
    LEFT JOIN counter co ON p.customer = co.customer
    GROUP BY c.company";
        $res = mysqli_query($conn->DB, $select);
        $row = mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
    echo json_encode($row);
}
   
//SELECT c.company,p.project_name,co.counter_name FROM customer c LEFT JOIN project p ON c.company=p.customer LEFT JOIN counter co ON c.company = co.customer;