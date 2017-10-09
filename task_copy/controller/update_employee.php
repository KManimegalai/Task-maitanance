<?php
include_once '../model/db.php';

	 $where = array('id' => $_REQUEST['id']);
	 $column = array('ename' =>$_REQUEST['name'],
					 'emailid' =>$_REQUEST['emailid'],
					 'dob' =>$_REQUEST['dob'],
					 'phoneno' =>$_REQUEST['phoneno'],
					 'address' =>$_REQUEST['address'],);
	 if(update($column,'employee',$where,db_connect())){
	 	header("Location:../view/employee_detail.php?status=success");
	 }else{
	 	header("Location:../view/employee_detail.php?status=error");
	 }
