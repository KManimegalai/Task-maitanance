<?php 
include_once '../model/db.php';
landing_page_session_check();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Welcome</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> 
    
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!-- header -->
  <header class="main-header">
    <a href="home.php" class="logo">
      <span class="logo-lg"><b>Aretha Infotech</b></span>
      <span class="logo-mini"><b>Aretha Infotech</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="../img/periyar_univ.png" class="user-image" alt="User Image"> -->
              <span class="hidden-xs">Profile</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="../img/photo.jpeg " class="img-circle" alt="User Image">
                <h2><?php echo $_SESSION['user']['name']?></h2>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../controller/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- sidebar -->
  <aside class="main-sidebar">
      <section class="sidebar">
        <ul class="sidebar-menu">
          <li><a href="index.php"><i class="fa fa-circle-o text-green "></i> <span> Dashboard </span></a></li>
          <li><a href="add_employee.php"><i class="fa fa-circle-o text-red "></i> <span> Add Employee</span></a></li>
          <li><a href="employee_detail.php"><i class="fa fa-circle-o text-blue "></i> <span> Employee Detail</span></a></li>
          <li><a href="task.php"><i class="fa fa-circle-o text-yellow "></i> <span>Add Task</span></a></li>
          <li><a href="task_detail.php"><i class="fa fa-circle-o text-red "></i> <span> Task Detail</span></a></li>
          <li><a href="history.php"><i class="fa fa-circle-o text-blue "></i> <span> History</span></a></li>
          <li><a href="setting.php"><i class="fa fa-circle-o text-yellow "></i> <span> Setting</span></a></li>


        </ul>
      </section>
  </aside>
  <!-- Content -->
  <div class="content-wrapper">