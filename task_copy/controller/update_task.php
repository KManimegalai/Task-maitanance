<?php
include_once '../model/db.php';
	 $raw_data = $_REQUEST;	
	 $where = array('id' => $_REQUEST['id']);
	 $column = array('name' =>$_REQUEST['name'],
					 'task' =>$_REQUEST['task'],
					 'address' =>$_REQUEST['address'],
					 'phoneno' =>$_REQUEST['phoneno'],
					 'assignto' =>$_REQUEST['assignto'],);
	 if(update($column,'task',$where,db_connect())){
	 	$where = array('ename' => $_REQUEST['assignto']);
    	$data =  select('phoneno','employee',$where,db_connect());
    	$raw_data['type']="modified";
   		print_r(sendmsg($raw_data,$data[0]));
		// header('Location:../view/task_detail.php?status=success');
	 }else{
	 	header("Location:../view/task_detail.php?status=error");
	 }
