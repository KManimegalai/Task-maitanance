<?php 
    include_once '../model/db.php';
    $id = $_GET['del'];
    $con = db_connect();
    $dele = array('id' => $id);
    delete('employee',$dele,$con);
    header("Location:../view/employee_detail.php");
    