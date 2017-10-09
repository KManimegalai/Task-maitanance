<?php
    include_once '../model/db.php';
    $raw_data = $_REQUEST;
    $i = 0;
    foreach ($raw_data['name'] as $key => $value) {
        if ($i == 0) {
            $final_data = $value.'-'.$raw_data['task'][$key];   
            $i++;
        }
        else {
            $final_data =$final_data .'|'.$value.'-'.$raw_data['task'][$key];
        }
    }

    $id = $_REQUEST['id'];
    $conn = db_connect();
    $where = array('id' => $id);
    $result= update(array('queued'=>$final_data,'status' => 'queued'),'task',$where,$conn);
    if ($result) {      
      header('location: ../view/task_detail.php');
    }    
    else {
      header('location: ../view/task_detail.php');
    }
//     echo "<pre>";
//         print_r($_REQUEST);
//     echo "</pre>";
// echo $final_data;