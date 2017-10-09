<?php 
    include_once '../model/db.php';
    $where = array('id' => $_REQUEST['del']);
    $time = date('Y-m-d H:i:s');
	$column = array('endtime' => $time,'status' =>"deleted");
	if(update($column,'task',$where,db_connect())){
		header("Location:../view/task_detail.php");
	 }else
	 	header("Location:../view/task_detail.php");

    