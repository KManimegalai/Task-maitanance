<?php 
include_once '../model/db.php';
if($_REQUEST['new_pass'] != $_REQUEST['conf_pass']){
	header("Location:../view/setting.php?status=error");
}else{
	$con = db_connect();
	$where = array('id' => '1');
	$result= update(array('name' => $_REQUEST['profile'],'password' => $_REQUEST['new_pass']),'profile',$where,$con);
	if ($result) {
		header('Location:../view/setting.php');
	}
	else{
		header('Location:../view/update_setting.php?status=error');
	}
}
 ?>