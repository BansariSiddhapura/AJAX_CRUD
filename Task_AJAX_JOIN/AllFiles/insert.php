<?php
include_once('connection.php');
//echo $_POST;
if (!empty($_POST)) {
    $type = $_GET['type'];
    
    if ($type == 'customer') {
        $id = $_POST['id'];
        $comp = $_POST['comp'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        if (!empty($id)) {
            $update = "UPDATE `customer` SET company='$comp',phone='$phone',city='$city',state='$state' WHERE id='$id'";
            mysqli_query($conn->DB, $update) ? $message = 'update success' : 'can not update';
        } else {
            $insert = "INSERT INTO `customer`(company,phone,city,state)VALUES('$comp','$phone','$city','$state')";
            mysqli_query($conn->DB, $insert) ? $message = 'insert success' : $message = 'can not insert';
        }
        echo json_encode(['message' => $message]);
    }
    if($type=='contact'){
        $id=$_POST['id'];
        $custFromDrop=$_POST['custFromDrop'];
        $fnm=$_POST['fnm'];
        $lnm=$_POST['lnm'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $pass=$_POST['pass'];
        $pCon=isset($_POST['pCon'])? "1" : "0";

        if(!empty($id)){
            $update="UPDATE `contact` SET customer='$custFromDrop',firstName='$fnm',lastName='$lnm',email='$email',phone='$phone',password='$pass',primary_contact='$pCon' WHERE id='$id'";
            mysqli_query($conn->DB,$update)?$message='update contact successfully':'can not update contact';
        }else{
            $insert = "INSERT INTO `contact`(customer,firstName,lastName,email,phone,password,primary_contact)VALUES('$custFromDrop','$fnm','$lnm','$email','$phone','$pass','$pCon')";
            mysqli_query($conn->DB, $insert) ? $message = 'insert contact successfully' : $message = 'can not insert contact';
        }
        echo json_encode(['message' => $message]);

    }
    if($type=='project'){
        $id=$_POST['id'];
        $pnm=$_POST['pnm'];
        $cust=$_POST['proFromDrop'];
        $sdate=$_POST['sdate'];
        $edate=$_POST['edate'];
        if(!empty($id)){
            $update="UPDATE `project` SET customer='$custFromDrop',firstName='$fnm',lastName='$lnm',email='$email',phone='$phone',password='$pass',primary_contact='$pCon' WHERE id='$id'";
            mysqli_query($conn->DB,$update)?$message='update contact successfully':'can not update contact';
        }else{
            $insert="INSERT INTO `project`(project_name,customer,start_date,end_date)VALUES('$pnm','$cust','$sdate','$edate')";
            mysqli_query($conn->DB,$insert)?$message='insert project successfully':'can not insert project';
        }
        echo json_encode(['message'=>$message]);
    }
}
