<?php 
include_once '../model/db.php';
	$raw_data = $_REQUEST;
	$ename = $raw_data['first_name'].' '.$raw_data['last_name'];
	$raw_data['ename'] = $ename;
	unset($raw_data['first_name']);
	unset($raw_data['last_name']);
	$con = db_connect();
	$result = insert('employee',$raw_data,$con);
	if ($result) {
		header('Location:../view/employee_detail.php');
	}
	else{
		header('Location:../view/add_employee.php?status=error');
	}