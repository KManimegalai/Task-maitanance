<?php include_once 'header.php';
 $j=0;?>
<div class="container">
    <br>
    <a href="task.php" class="btn btn-warning pull-right">Add Task</a>
    <table class="table table-hover table-responsive">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone no</th>
                <th>Address</th>
                <th>Task</th>
                <th>Assign To</th>
                <th>Date/Time</th>
                <th>Device/Id</th>
            </tr>
        </thead>
        <tbody style="overflow-y:auto;">
            <?php
                   include_once '../controller/function.php';
                   $data = task_detail();
                        if ($data == 'empty') {
                            echo "<tr><td>Add some task</td></tr>";
                        }
                        else{
                        $i=0;
                        foreach ($data as $value) {
                            if($value['status'] != 'queued'){
                        echo "<tr>";
                        echo "<td >".($i+1)."</td>";
                        echo "<td id='name".($i+1)."'>".$value['name']."</td>";
                        echo "<td id='phoneno".($i+1)."'>".$value['phoneno']."</td>";
                        echo "<td id='address".($i+1)."'>".$value['address']."</td>";
                        echo "<td id='task".($i+1)."'>".$value['task']."</td>";
                        echo "<td id='assignto".($i+1)."'>".$value['assignto']."</td>";
                        echo "<td>".$value['starttime']."</td>";
                        echo "<td>-</td>";
                        echo "<td ><a class='btn btn-danger' href='../controller/delete_task.php?del=".$value['id']."'>Delete</a></td>";
                        echo "<td><a class='btn btn-success' href='../controller/finish_task.php?upd=".$value['id']."'>Finish</a></td>";
                        echo "<td><a class='btn btn-default 'name = 'finish' value =".$value['id']." id='".($i+1)."'>Queued</a></td>";
                        echo "<td><a class='btn btn-info 'name = 'update' value =".$value['id']." id='".($i+1)."'>update</a></td>";
                        echo "</tr>";
                    }elseif ($value['status'] == 'queued') {
                       echo "<tr id=".($i+1).">";
                        echo "<td >".($i+1)."</td>";
                        echo "<td id='name".($i+1)."'>".$value['name']."</td>";
                        echo "<td id='phoneno".($i+1)."'>".$value['phoneno']."</td>";
                        echo "<td id='address".($i+1)."'>".$value['address']."</td>";
                        echo "<td id='task".($i+1)."'>".$value['task']."</td>";
                        echo "<td id='assignto".($i+1)."'>".$value['assignto']."</td>";
                        echo "<td>".$value['starttime']."</td>";
                        echo "<td>.....click....</td>";
                        echo "<span style='visibility:hidden' id='queued".($i+1)."'>".$value['queued']."</span>";
                        echo "<td><a class='btn btn-success' href='../controller/finish_task.php?upd=".$value['id']."'>Finish</a></td>";
                        echo "</tr>";
                        }

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
                    <form action="../controller/update_task.php" method="POST">
                        <input type="text" name="id" id="id" style="display: none">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email" style="color: #1E88E5">Name :</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="task" style="color: #1E88E5">Task :</label>
                                <input type="text" class="form-control" name="task" id="task" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="dob" style="color: #1E88E5"> Address :</label>
                                <input type="text" class="form-control" name="address" id="address" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="phone_number" style="color: #1E88E5">Phone no :</label>
                                <input type="text" class="form-control" minlength="10" maxlength="10" pattern="[987]{1}[0-9]{9}" name="phoneno" id="phone_number" required>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="assignto" style="color: #1E88E5" required> Assign to:</label>
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
    <div class="modal fade" id="myModal2" role="dialog" style="overflow:scroll;">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: center;">Device Id</h4>
                </div>
                <div class="modal-body" id="myModal2_content">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal1" role="dialog" style="overflow:scroll;">
    <form action="../controller/queued_task.php" method="POST">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: center;">Queued</h4>
                </div>
                <div class="modal-body">
                    
                        <input type="text" name="id" id="id1" style="display: none">
                        <div  id="model_add">
                            <div class="row"><div class="form-group col-md-12"><label for="email" style="color: #1E88E5">Name  :</label><input type="text" class="form-control" name="name[]" id="name1" required></div><div class="form-group col-md-12"><label for="task" style="color: #1E88E5">Unique id:</label><input type="text" class="form-control" name="task[]" id="task1" required></div></div>
                        </div>
                        <button type="submit" class="btn btn-primary " data-dismiss="modal">OK</button>
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-default btn-add" data-dismiss="modal">Add</button>
                    <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('body').on('click', '.delete_div', function(){
       var t = this.id;
       id = '#append'+t;
       console.log(id);
       $(id).remove();
    });
    $('tr').click(function() {
        id = this.id;
        data = $('#queued'+id).text();
        arr = data.split('|');
        start = '<table class="table table-hover table-responsive"><thead><tr><th>#</th><th>Name</th><th>Id</th></tr></thead><tbody>';
        end = '</tbody></thead>';
        $('#myModal2').addClass("in");
        $('#myModal2').css("display", "block");
        middle = '';
        for (var i = 0, len = arr.length; i < len; i++) {
            temp = arr[i].split('-');
            middle = middle + "<tr><td>"+(i+1)+"</td><td>"+temp[0]+"</td><td>"+temp[1]+"</td></tr>";
        }
        document.getElementById('myModal2_content').innerHTML = start+middle+end;
    });
});
    var j = 2;
$('.btn-info').on('click', function() {
    $('#name').attr('value', document.getElementById('name' + this.id).innerHTML);
    $('#task').attr('value', document.getElementById('task' + this.id).innerHTML);
    $('#address').attr('value', document.getElementById('address' + this.id).innerHTML);
    $('#phone_number').attr('value', document.getElementById('phoneno' + this.id).innerHTML);
    $('#assignto').attr('value', document.getElementById('assignto' + this.id).innerHTML);
    $('#id').attr('value', $(this).attr('value'));
    $('#myModal').addClass("in");
    $('#myModal').css("display", "block");
});
$('.btn-close').on('click', function() {
    $('#myModal').removeClass("in");
    $('#myModal').css("display", "none");
});

$('.btn-close').on('click', function() {
    $('#myModal2').removeClass("in");
    $('#myModal2').css("display", "none");
});

$('.btn-default').on('click', function() {
    $('#name1').attr('value', document.getElementById('name' + this.id).innerHTML);
    $('#task1').attr('value', document.getElementById('task' + this.id).innerHTML);
    $('#id1').attr('value', $(this).attr('value'));
    $('#myModal1').addClass("in");
    $('#myModal1').css("display", "block");
});
$('.btn-close').on('click', function() {
    $('#myModal1').removeClass("in");
    $('#myModal1').css("display", "none");
});
$('.btn-add').on('click', function() {
   $('#model_add').append('<div class="row" id="append'+j+'"><div class="form-group col-md-12"><label for="email" style="color: #1E88E5">Name  :</label><input type="text" class="form-control" name="name[]" id="name'+j+'"  required></div><div class="form-group col-md-12"><label for="task" style="color: #1E88E5">Unique id:</label><input type="text" class="form-control" name="task[]" id="task'+j+'" required></div><div class="form-group col-md-12"><label for="task" style="color: #1E88E5"></label><a class="delete_div pull-right" id="'+j+'"><i class="fa fa-minus-circle fa-2x" align="right" aria-hidden="true"></i></a></div></div>');
   j++;
});

</script>
<?php include_once 'footer.php';?>