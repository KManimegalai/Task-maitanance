<?php 
	include_once '../model/db.php';
	if($_REQUEST['assignto'] !='empty'){
	$con = db_connect();
	$raw_data = $_REQUEST;
	$result = insert('task',$raw_data,$con);
	// print_r($result);
	if ($result) {
		$where = array('ename' => $_REQUEST['assignto']);
    	$data =  select('phoneno','employee',$where,$con);
    	$raw_data['type']="new";
   		// sendmsg($raw_data,$data[0]);
		header('Location:../view/task_detail.php');
	}
	else{
		header('Location:../view/task.php?status=error');
	}
	}
	else{
		header('Location:../view/task.php?status=error');
	}
	
	
	