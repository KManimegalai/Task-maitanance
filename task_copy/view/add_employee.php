<?php 
include_once 'header.php';
?>
<div class="container">
<h3>Employee Details</h3>
<?php
if (isset($_GET['status'])) {
           if ($_GET['status'] == "error") {
             echo "<div id='response'><div class='alert alert-danger fadeout animated'><strong>Retry it</strong> Check the Data.</div></div>";
           }else if ($_GET['status'] == "success") {
             echo "<div id='response'> <div class='alert alert-info'><strong>Task Added </strong> Successfully.</div></div>";
           }
         }
?>
	<form action="../controller/add_employee.php" method="POST">
	    <div class="row">
	        <div class="form-group col-md-6">
	            <label for="email" style="color: #1E88E5">Name :</label>
	            <input type="text" class="form-control" name="first_name" id="first_name" required>
	        </div>
	        <div class="form-group col-md-6">
	            <label for="last_name" style="color: #1E88E5">Last name :</label>
	            <input type="text" class="form-control" name="last_name" id="last_name" required>
	        </div>
	     </div>
	      <div class="row">
	        <div class="form-group col-md-6">
	            <label for="email" style="color: #1E88E5">Email Address :</label>
	            <input type="email" class="form-control" name="emailid" id="emailid" required>
	        </div>
	        <div class="form-group col-md-6">
	            <label for="dob" style="color: #1E88E5"> Date of Birth :</label>
	            <input type="date"  class="form-control" name="dob" id="dob" required>
	        </div>
	    </div>
	    <div class="row">
	        <div class="form-group col-md-6">
	            <label for="phone_number" style="color: #1E88E5">Phone Number :</label>
	            <input type="text" class="form-control" minlength="10"  maxlength="10" pattern="[987]{1}[0-9]{9}" name="phoneno" id="phone_number"   required>
	        </div>
	        <div class="form-group col-md-6">
	           <div class="form-group">
           		 <label for="address" style="color: #1E88E5" required> Address:</label>
           		 <input type="text" class="form-control" name="address" id="address" required>
        	   </div>
	        </div>
	    </div> 
        <button type="submit" class="btn btn-info" data-dismiss="modal" >Save</button>
    </form>
</div>
<?php 
include_once 'footer.php';
?>