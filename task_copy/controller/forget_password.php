<?php
include_once '../model/db.php';
$where = array('emailid' =>$_REQUEST['mailid']);
$result = select('*','profile',$where,db_connect());
if($result != 'empty'){
	$data = resetpass();
	resetpassword($result,$data);
}
else{
  header("Location:../index.php?status=forget");
}
function resetpassword($user_detail,$data)
{
	$where = array('id' => $user_detail[0]['id']);
	$result= update(array('password' => $data),'profile',$where,db_connect());
	if ($result){ 
		Sendmail($user_detail[0],$data);
		header("Location:../index.php?status=forget_success");
	}	
	else
  		header("Location:../index.php?status=forget");
}

