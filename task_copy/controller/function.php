<?php
include_once '../model/db.php';
function task_detail(){	
	 $condition=" `status` = '0'OR `status` = 'queued'";
	 return select('*','task',$condition,db_connect());
}
function profile_detail(){	
	return select('*','profile','1', db_connect());
}
function history(){
      $where =  $condition=" `status` = 'finished'OR `status` = 'deleted'";
      return select('*','task',$where,db_connect());
 }
function employee_details(){
   return select('*','employee','1',db_connect());
}