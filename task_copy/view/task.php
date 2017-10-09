<?php 
include_once 'header.php';

?>
<div class="container">
    <h3 style="text-align: center">Task Assignment</h3>
    <br>
    <?php if (isset($_GET['status'])) {
           if ($_GET['status'] == "error") {
             echo "<div id='response'><div class='alert alert-success'><strong>Retry it</strong> Just do it again.</div></div>";
           }else if ($_GET['status'] == "success") {
             echo "<div id='response'><div class='alert alert-info'><strong>Employee Added </strong> Successfully.</div></div>";
           }
         }
         ?>
    <form action="../controller/add_task.php" method="POST" class="tab-wizard wizard-circle">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="email" style="color: #1E88E5">Name :</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="form-group col-md-6">
                <label for="email" style="color: #1E88E5">Phone Number:</label>
                <input type="text" class="form-control" name="phoneno" id="phoneno" pattern="[987]{1}[0-9]{9}" maxlength="10" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="phone_number" style="color: #1E88E5">Address :</label>
                <input type="text" class="form-control" name="address" id="address" required>
            </div>
            <div class="form-group col-md-6">
                <label for="location1" style="color: #1E88E5">Select Person :</label>
                <select class="custom-select form-control" name="assignto" id="person" required>
                <?php
                    include_once '../controller/function.php';
                  $data = employee_details();
                   if ($data == 'empty') {
                            echo "<option>".$data."</option>";
                        }
                        else{
                       
                        foreach ($data as $value) {
                            echo "<option>".$value['ename']."</option>";
                       
                        }
                        }
            ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="email" style="color: #1E88E5">Task</label>
                <input type="text" class="form-control" name="task" id="task" required>
            </div>
            <!-- <div class="form-group col-md-6">
                <label for="email" style="color: #1E88E5">Unique Number</label>
                <input type="text" class="form-control" name="task" id="task" required>
            </div> -->
        </div>
        <button type="submit" class="btn btn-info" data-dismiss="modal">Save</button>
    </form>
</div>
<?php 
include_once 'footer.php';
?>