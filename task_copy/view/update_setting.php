<?php
include_once 'header.php'; 
 ?>
<div class="container">
<h3>User Profile</h3><br>
	<?php if (isset($_GET['status'])) {
           if ($_GET['status'] == "wrongpassword") {
             echo "<div class='alert alert-danger'><strong>Passwords</strong> dont match</div>";
           }else if ($_GET['status'] == "error") {
             echo "<div class='alert alert-info'><strong>Password Update </strong> Failed Retry it.</div>";
           }
         }
         ?>
	<form action="../controller/setting.php" method="POST">
	    <div class="row">
	        <div class="form-group col-md-12">
	            <label for="email" style="color: #1E88E5">Profile Name :</label>
	            <input type="text" class="form-control" name="profile" id="first_name" required>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="password" style="color: #1E88E5"> New Password:</label>
	            <input type="password" class="form-control" name="password"  " id="password1" required>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="password" style="color: #1E88E5"> Confirm Password:</label>
	            <input type="password" class="form-control" name="confirm_password"  " id="password2" required>
	        </div>
	     </div>
        <button type="submit" class="btn btn-info" data-dismiss="modal" >Save</button>
    </form>
</div>

 <?php
 include_once 'footer.php';
 ?>