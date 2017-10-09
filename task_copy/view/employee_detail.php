<?php 
include_once 'header.php';
include_once '../controller/function.php';
$data = employee_details();

?>
<div class="container">
    <h4>Employee Detail</h4>

    <?php
            if (isset($_GET['status'])) {
               if ($_GET['status'] == "no_delete") {
                 echo "<div id='response'><div class='alert alert-danger'><strong>Retry it</strong> Delete the Data again.</div></div>";
               }else if ($_GET['status'] == "success") {
                 echo "<div id='response'><div class='alert alert-success'><strong>Completed </strong> Successfully.</div></div>";
               }else if ($_GET['status'] == "error") {
                 echo "<div id='response' ><div class='alert alert-info'><strong>Unable to update </strong>.</div></div>";
               }
            }
        ?>
        <a href="add_employee.php" class="btn btn-warning pull-right">Add Employee</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone no</th>
                    <th>Mail Id</th>
                    <th>Date of birth</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if ($data == 'empty') {
                    echo "<tr><td>Add Employee</td></tr>";
                }
                else{
                    $i=0;
                    foreach ($data as $value) {
                    echo "<tr>";
                    echo "<td>".($i+1)."</td>";
                    echo "<td id='name".($i+1)."'>".$value['ename']."</td>";
                    echo "<td id='phoneno".($i+1)."'>".$value['phoneno']."</td>";
                    echo "<td id='emailid".($i+1)."'>".$value['emailid']."</td>";
                    echo "<td id='dob".($i+1)."'>".$value['dob']."</td>";
                    echo "<td id='address".($i+1)."'>".$value['address']."</td>";
                    echo "<td><a class='btn btn-danger' href='../controller/delete_employee.php?del=".$value['id']."'>Delete</a></td>";
                    echo "<td><a class='btn btn-success '  name = 'update' value =".$value['id']." id='".($i+1)."'>update</a></td>";
                    echo "</tr>";

                    $i++;
                    }
                }
            // echo $data;

            ?>
            </tbody>
        </table>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" style="text-align: center;">Update</h4>
                    </div>
                    <div class="modal-body">
                        <form action="../controller/update_employee.php" method="POST">
                            <input type="text" name="id" id="id" style="display: none">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="email" style="color: #1E88E5">Name :</label>
                                    <input type="text" class="form-control" name="name" id="first_name" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="email" style="color: #1E88E5">Email Address :</label>
                                    <input type="email" class="form-control" name="emailid" id="emailid" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="dob" style="color: #1E88E5"> Date of Birth :</label>
                                    <input type="date" class="form-control" name="dob" id="dob" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="phone_number" style="color: #1E88E5">Phone Number :</label>
                                    <input type="text" class="form-control" minlength="10" maxlength="10" pattern="[987]{1}[0-9]{9}" name="phoneno" id="phone_number" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label for="address" style="color: #1E88E5" required> Address:</label>
                                        <input type="text" class="form-control" name="address" id="address" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info" data-dismiss="modal">Update</button>
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
$('.btn-success').on('click', function() {
    $('#first_name').attr('value', document.getElementById('name' + this.id).innerHTML);
    $('#phone_number').attr('value', document.getElementById('phoneno' + this.id).innerHTML);
    $('#emailid').attr('value', document.getElementById('emailid' + this.id).innerHTML);
    $('#dob').attr('value', document.getElementById('dob' + this.id).innerHTML);
    $('#address').attr('value', document.getElementById('address' + this.id).innerHTML);
    $('#id').attr('value', $(this).attr('value'));
    $('#myModal').addClass("in");
    $('#myModal').css("display", "block");
});
$('.btn-close').on('click', function() {
    $('#myModal').removeClass("in");
    $('#myModal').css("display", "none");
});
</script>
<?php 
include_once 'footer.php';
?>