<?php
include_once '../model/db.php';
$where = array('name' =>$_REQUEST['uname'] ,'password' =>$_REQUEST['upassword']);
$result = select('*','profile',$where,db_connect());
if($result != 'empty'){
	 create_session($result[0]);
	 header("Location:../view");
}
else{
  header("Location:../index.php?status=nouser");
}
