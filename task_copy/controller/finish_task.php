<?php
    include_once '../model/db.php';
    $id = $_REQUEST['upd'];
    $conn = db_connect();
    $time = array('endtime' => date('Y-m-d H:i:s'));
    $where = array('id' => $id);
    $result= update(array('endtime' =>$time['endtime'],'status' => 'finished'),'task',$where,$conn);
    if ($result) {      
      header('location: ../view/task_detail.php?');
    }    
    else {
      header('location: ../view/task_detail.php?');
    }
