<?php 
   include_once 'header.php';
   include_once '../controller/function.php';
   if (task_detail() == 'empty') {
      $task_count = 0;
   }else{
      $task_count = count(task_detail());
   }
   if (history() == 'empty') {
      $history_count = 0;
   }else{
      $history_count = count(history());
   }
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo $task_count; ?></h3>
                    <p>Task to be completed</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="task_detail.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo $history_count; ?><sup style="font-size: 20px"></sup></h3>
                    <p>Finished</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="history.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
<?php 
  include_once 'footer.php';
?>