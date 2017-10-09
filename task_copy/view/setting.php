<?php
include_once 'header.php'; 
include_once '../controller/function.php';
$raw_data = profile_detail();
 ?>
    <div class="container">
        <?php 
	if (isset($_GET['status'])) {
           if ($_GET['status'] == "error") {
             echo "<div id='response'><div class='alert alert-danger'><strong>Retry it</strong>Something went wrong /Password doesn't match</div> </div>";
           }
         }
         ?>
        <h3>User Profile</h3>
        <br>
        <div>
        <form  method="POST">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="email" style="color: #1E88E5">Profile Name :</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $raw_data[0]['name']?>" id="first_name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="password" style="color: #1E88E5">Password:</label>
                    <input type="password" class="form-control" name="password" value="<?php echo $raw_data[0]['password']?>" id=" current_password" required>
                </div>
            </div>
            <a class='btn btn-info ' name = 'update' value ="<?php echo $raw_data[0]['password']?>">update</a>
        </form>
        </div>
        <div class="modal fade" id="mymodel" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: center;">Update</h4>
                </div>
                <div class="modal-body">
                    <form action="../controller/setting.php" method="POST">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email" style="color: #1E88E5">Name :</label>
                                <input type="text" class="form-control" name="profile" id="name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="task" style="color: #1E88E5">New Password :</label>
                                <input type="password" class="form-control" name="new_pass" id="pass" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="dob" style="color: #1E88E5"> Confirm Password :</label>
                                <input type="password" class="form-control" name="conf_pass" id="pass_again" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary " data-dismiss="modal">Update</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </div>
<script type="text/javascript">
$('.btn-info').on('click', function() {
    $('#name').attr('value', document.getElementById('first_name').value);
    $('#mymodel').addClass("in");
    $('#mymodel').css("display", "block");
});
$('.btn-close').on('click', function() {
    $('#mymodel').removeClass("in");
    $('#mymodel').css("display", "none");
});
</script>
    <?php
 include_once 'footer.php';
 ?>