<?php 
include_once 'header.php';
include_once '../controller/function.php';
$raw_data = history();
?>
<div class="container">
    <div class="col-md-5">
        <h3>History</h3>
    </div>
    <div class="row">
        <div>
            <table class="table table-bordered" data-tableName="Test Table 1" id="resultsTable">
                <thead>
                    <tr class="noExl">
                        <th style="color: #1E88E5">#</th>
                        <th style="color: #1E88E5">Name</th>
                        <th style="color: #1E88E5">Task</th>
                        <th style="color: #1E88E5">Start date</th>
                        <th style="color: #1E88E5">End date</th>
                        <th style="color: #1E88E5">Status</th>

                    </tr>
                </thead>
                <tbody>
                <?php 
                    if ($raw_data == 'empty') {
                        echo '<tr>';
                        echo '<td>'.$raw_data.'</td>';
                        echo '</tr>';
                    }
                    else{
                        foreach ($raw_data as $key => $value) {
                            echo '<tr>
                            <td>'.($key+1).'</td>
                            <td>'.$value['name'].'</td>
                            <td>'.$value['task'].'</td>
                            <td>'.$value['starttime'].'</td>
                            <td>'.$value['endtime'].'</td>
                            <td>'.$value['status'].'</td>
                            </tr>';
                        }
                    }
                 ?>
                </tbody>
            </table>
        </div>
    </div>
    <button class="btn btn-primary" id="export-btn">Export</button>
</div>
  <script type="text/javascript" src="../js/jquery.table2excel.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#export-btn').on('click', function(e){
        $(".table").table2excel({
            exclude: ".noExl",
            name: "Excel Document Name",
            filename: "excel",
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });
    
});
</script>
<?php 
include_once 'footer.php';
?>
                