<?php
error_reporting(0);
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['system_logged_status'] != 'true') {
    ?>
    <script type="text/javascript">
        window.location.replace("..");
    </script>
    <?php
} else {
//Starting this else one [else1]
    $page_id = 3;
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <title>Election - ADMIN</title>
        <!-- Bootstrap core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
    </head>
    <body>
    <div class="container">
        <?php include_once 'layouts/menu.php'; ?>
        <div class="row">
            <?php
            include_once '../Controller/addPreviousController.php';
            ?>
            <div class="col-md-12"
                 style="border: 1px #ccc solid;padding: 10px;background:#f8f8f8;border-radius: 5px;margin-bottom: 20px">
                <h3><b>Add Results Polling Division Wise</b></h3>
                <hr>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="add">
                    <script>
                        function filterCouncil(council) {
                            $("#ccc").load('cFilter.php', {council: council});
                        }
                    </script>
                    <div class="row">
                        <div class="col-md-6">
                            <label>District</label>
                            <select class="form-control" onchange="filterCouncil(this.value)" name="d_id">
                                <option disabled selected>Select District</option>
                                <?php
                                $query = "SELECT * FROM dis";
                                $result = mysql_query($query);

                                if ($result) {
                                    while ($row = mysql_fetch_assoc($result)) {
                                        ?>
                                        <option value="<?php echo $row['d_id']; ?>">
                                            <?php echo $row['d_name']; ?></option>
                                    <?php }
                                } ?>
                            </select>
                            <div id="ccc">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Maithreepala Sirisena</h3>
                            <div class="form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ms_votes" placeholder="Votes"
                                           required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ms_precen" placeholder="Precentage"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3>Mahinda Rajapakshe</h3>
                            <div class="form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="mr_votes" placeholder="Votes"
                                           required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="mr_precen" placeholder="Precentage"
                                           required>
                                </div>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class="form-inline">
                        <div class="form-group">
                            <input type="text" class="form-control" name="valid_votes" placeholder="Valid Votes"
                                   required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="rejected_votes" placeholder="Rejected Votes"
                                   required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="total_polled" placeholder="Total Polled"
                                   required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="registered_votes"
                                   placeholder="Registered Votes"
                                   required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right" name="seat_wise"
                            style="margin-bottom: 10px">
                        Add Result
                    </button>
                </form>
                <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
                    <thead>
                    <tr>
                        <th>District</th>
                        <th>PD</th>
                        <th>MR Votes</th>
                        <th>MR %</th>
                        <th>MS Votes</th>
                        <th>MS %</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query1 = "SELECT pre.*, d.d_name,s.seat_name FROM pre_result_seat_wise pre LEFT JOIN dis d ON pre.d_id=d.d_id LEFT JOIN seat s ON pre.s_id=s.s_id";
                    $result1 = mysql_query($query1);
                    if ($result1) {
                        while ($row1 = mysql_fetch_assoc($result1)) {
                            ?>
                            <tr>
                                <td><?php echo $row1['d_name']; ?></td>
                                <td><?php echo ucfirst(strtolower($row1['seat_name'])); ?></td>
                                <td><?php echo $row1['mr_votes']; ?></td>
                                <td><?php echo $row1['mr_precen']; ?></td>
                                <td><?php echo $row1['ms_votes']; ?></td>
                                <td><?php echo $row1['ms_precen']; ?></td>
                                <td><a href="javascript:void(0)" data-toggle="modal"
                                       data-target="#myModal<?php echo $row1['id']; ?>">Edit</a></td>
                                <!-- Modal -->
                                <div id="myModal<?php echo $row1['id']; ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;
                                                </button>
                                                <h4 class="modal-title">Modal Header</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="action" value="update">
                                                    <input type="hidden" name="d_id"
                                                           value="<?php echo $row1['d_id']; ?>">
                                                    <input type="hidden" name="s_id"
                                                           value="<?php echo $row1['s_id']; ?>">

                                                    <h3>Mahinda Rajapakshe</h3>
                                                    <div class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="mr_votes"
                                                                   value="<?php echo $row1['mr_votes']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="mr_precen"
                                                                   value="<?php echo $row1['mr_precen']; ?>">
                                                        </div>
                                                    </div>
                                                    <h3>Maithreepala Sirisena</h3>
                                                    <div class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="ms_votes"
                                                                   value="<?php echo $row1['ms_votes']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="ms_precen"
                                                                   value="<?php echo $row1['ms_precen']; ?>">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <label for="">Valid Votes</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="valid_votes"
                                                               value="<?php echo $row1['valid_votes']; ?>">
                                                    </div>
                                                    <label for="">Rejected Votes</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                               name="rejected_votes"
                                                               value="<?php echo $row1['rejected_votes']; ?>">
                                                    </div>
                                                    <label for="">Total Polled</label>
                                                    <div class="form-group">

                                                        <input type="text" class="form-control" name="total_polled"
                                                               value="<?php echo $row1['total_polled']; ?>">
                                                    </div>
                                                    <label for="">Registered Votes</label>
                                                    <div class="form-group">

                                                        <input type="text" class="form-control"
                                                               name="registered_votes"
                                                               value="<?php echo $row1['registered_votes']; ?>">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary pull-right"
                                                            name="seat_wise"
                                                            style="margin-bottom: 10px">
                                                        Update Result
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </tr>
                            <?php
                        }
                    } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12"
                 style="border: 1px #ccc solid;padding: 10px;background:#f8f8f8;border-radius: 5px;margin-bottom: 20px">
                <h3><b>Add All District Result</b></h3>
                <hr>
                <div class="row">
                    <div class="col-md-6" style="border-right:1px #ccc solid">
                        <h4>Postal District Results</h4>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="add">
                            <div class="form-group">
                                <label>District</label>
                                <select class="form-control" name="d_id">
                                    <option disabled selected>Select District</option>
                                    <?php
                                    $query = "SELECT * FROM dis";
                                    $result = mysql_query($query);

                                    if ($result) {
                                        while ($row = mysql_fetch_assoc($result)) {
                                            ?>
                                            <option value="<?php echo $row['d_id']; ?>">
                                                <?php echo $row['d_name']; ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                            <h3>Maithreepala Sirisena</h3>
                            <div class="form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ms_votes" placeholder="Votes"
                                           required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ms_precen" placeholder="Precentage"
                                           required>
                                </div>
                            </div>
                            <h3>Mahinda Rajapakshe</h3>
                            <div class="form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="mr_votes" placeholder="Votes"
                                           required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="mr_precen" placeholder="Precentage"
                                           required>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="form-inline">
                                <div class="form-group" style="margin-bottom: 10px">
                                    <input type="text" class="form-control" name="valid_votes" placeholder="Valid Votes"
                                           required>
                                </div>
                                <div class="form-group" style="margin-bottom: 10px">
                                    <input type="text" class="form-control" name="rejected_votes"
                                           placeholder="Rejected Votes"
                                           required>
                                </div>
                                <div class="form-group" style="margin-bottom: 10px">
                                    <input type="text" class="form-control" name="total_polled"
                                           placeholder="Total Polled"
                                           required>
                                </div>
                                <div class="form-group" style="margin-bottom: 10px">
                                    <input type="text" class="form-control" name="registered_votes"
                                           placeholder="Registered Votes"
                                           required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right" name="dis_wise_postal"
                                    style="margin-bottom: 10px">
                                Add Result
                            </button>
                        </form>
                        <table id="example1" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>District</th>
                                <th>MR Votes</th>
                                <th>MR %</th>
                                <th>MS Votes</th>
                                <th>MS %</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query1 = "SELECT pre.*,d.d_name FROM pre_res_dis_wise_postal pre LEFT JOIN dis d ON pre.d_id=d.d_id";
                            $result1 = mysql_query($query1);
                            if ($result1) {
                                while ($row1 = mysql_fetch_assoc($result1)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row1['d_name']; ?></td>
                                        <td><?php echo $row1['mr_votes']; ?></td>
                                        <td><?php echo $row1['mr_precen']; ?></td>
                                        <td><?php echo $row1['ms_votes']; ?></td>
                                        <td><?php echo $row1['ms_precen']; ?></td>
                                        <td><a href="javascript:void(0)" data-toggle="modal"
                                               data-target="#myModaldis<?php echo $row1['id']; ?>">Edit</a></td>
                                        <!-- Modal -->
                                        <div id="myModaldis<?php echo $row1['id']; ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;
                                                        </button>
                                                        <h4 class="modal-title">Modal Header</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="action" value="update">
                                                            <input type="hidden" name="d_id"
                                                                   value="<?php echo $row1['d_id']; ?>">

                                                            <h3>Mahinda Rajapakshe</h3>
                                                            <div class="form-inline">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                           name="mr_votes"
                                                                           value="<?php echo $row1['mr_votes']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                           name="mr_precen"
                                                                           value="<?php echo $row1['mr_precen']; ?>">
                                                                </div>
                                                            </div>
                                                            <h3>Maithreepala Sirisena</h3>
                                                            <div class="form-inline">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                           name="ms_votes"
                                                                           value="<?php echo $row1['ms_votes']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                           name="ms_precen"
                                                                           value="<?php echo $row1['ms_precen']; ?>">
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <label for="">Valid Votes</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       name="valid_votes"
                                                                       value="<?php echo $row1['valid_votes']; ?>">
                                                            </div>
                                                            <label for="">Rejected Votes</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       name="rejected_votes"
                                                                       value="<?php echo $row1['rejected_votes']; ?>">
                                                            </div>
                                                            <label for="">Total Polled</label>
                                                            <div class="form-group">

                                                                <input type="text" class="form-control"
                                                                       name="total_polled"
                                                                       value="<?php echo $row1['total_polled']; ?>">
                                                            </div>
                                                            <label for="">Registered Votes</label>
                                                            <div class="form-group">

                                                                <input type="text" class="form-control"
                                                                       name="registered_votes"
                                                                       value="<?php echo $row1['registered_votes']; ?>">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary pull-right"
                                                                    name="dis_wise_postal"
                                                                    style="margin-bottom: 10px">
                                                                Update Result
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    <?php
                                }
                            } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h4>Total District Results</h4>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="add">
                            <div class="form-group">
                                <label>District</label>
                                <select class="form-control" name="d_id">
                                    <option disabled selected>Select District</option>
                                    <?php
                                    $query = "SELECT * FROM dis";
                                    $result = mysql_query($query);

                                    if ($result) {
                                        while ($row = mysql_fetch_assoc($result)) {
                                            ?>
                                            <option value="<?php echo $row['d_id']; ?>">
                                                <?php echo $row['d_name']; ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                            <h3>Maithreepala Sirisena</h3>
                            <div class="form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ms_votes" placeholder="Votes"
                                           required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ms_precen" placeholder="Precentage"
                                           required>
                                </div>
                            </div>
                            <h3>Mahinda Rajapakshe</h3>
                            <div class="form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="mr_votes" placeholder="Votes"
                                           required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="mr_precen" placeholder="Precentage"
                                           required>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="form-inline">
                                <div class="form-group" style="margin-bottom: 10px">
                                    <input type="text" class="form-control" name="valid_votes" placeholder="Valid Votes"
                                           required>
                                </div>
                                <div class="form-group" style="margin-bottom: 10px">
                                    <input type="text" class="form-control" name="rejected_votes"
                                           placeholder="Rejected Votes"
                                           required>
                                </div>
                                <div class="form-group" style="margin-bottom: 10px">
                                    <input type="text" class="form-control" name="total_polled"
                                           placeholder="Total Polled"
                                           required>
                                </div>
                                <div class="form-group" style="margin-bottom: 10px">
                                    <input type="text" class="form-control" name="registered_votes"
                                           placeholder="Registered Votes"
                                           required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right" name="dis_wise"
                                    style="margin-bottom: 10px">
                                Add Result
                            </button>
                        </form>
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>District</th>
                                <th>MR Votes</th>
                                <th>MR %</th>
                                <th>MS Votes</th>
                                <th>MS %</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query1 = "SELECT pre.*,d.d_name FROM pre_res_dis_wise pre LEFT JOIN dis d ON pre.d_id=d.d_id";
                            $result1 = mysql_query($query1);
                            if ($result1) {
                                while ($row1 = mysql_fetch_assoc($result1)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row1['d_name']; ?></td>
                                        <td><?php echo $row1['mr_votes']; ?></td>
                                        <td><?php echo $row1['mr_precen']; ?></td>
                                        <td><?php echo $row1['ms_votes']; ?></td>
                                        <td><?php echo $row1['ms_precen']; ?></td>
                                        <td><a href="javascript:void(0)" data-toggle="modal"
                                               data-target="#myModaldis<?php echo $row1['id']; ?>">Edit</a></td>
                                        <!-- Modal -->
                                        <div id="myModaldis<?php echo $row1['id']; ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;
                                                        </button>
                                                        <h4 class="modal-title">Modal Header</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="action" value="update">
                                                            <input type="hidden" name="d_id"
                                                                   value="<?php echo $row1['d_id']; ?>">

                                                            <h3>Mahinda Rajapakshe</h3>
                                                            <div class="form-inline">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                           name="mr_votes"
                                                                           value="<?php echo $row1['mr_votes']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                           name="mr_precen"
                                                                           value="<?php echo $row1['mr_precen']; ?>">
                                                                </div>
                                                            </div>
                                                            <h3>Maithreepala Sirisena</h3>
                                                            <div class="form-inline">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                           name="ms_votes"
                                                                           value="<?php echo $row1['ms_votes']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                           name="ms_precen"
                                                                           value="<?php echo $row1['ms_precen']; ?>">
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <label for="">Valid Votes</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       name="valid_votes"
                                                                       value="<?php echo $row1['valid_votes']; ?>">
                                                            </div>
                                                            <label for="">Rejected Votes</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       name="rejected_votes"
                                                                       value="<?php echo $row1['rejected_votes']; ?>">
                                                            </div>
                                                            <label for="">Total Polled</label>
                                                            <div class="form-group">

                                                                <input type="text" class="form-control"
                                                                       name="total_polled"
                                                                       value="<?php echo $row1['total_polled']; ?>">
                                                            </div>
                                                            <label for="">Registered Votes</label>
                                                            <div class="form-group">

                                                                <input type="text" class="form-control"
                                                                       name="registered_votes"
                                                                       value="<?php echo $row1['registered_votes']; ?>">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary pull-right"
                                                                    name="dis_wise"
                                                                    style="margin-bottom: 10px">
                                                                Update Result
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    <?php
                                }
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>

        $(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).fadeIn("fast");
                    $(this).toggleClass('open');
                    $('b', this).toggleClass("caret caret-up");
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).fadeOut("fast");
                    $(this).toggleClass('open');
                    $('b', this).toggleClass("caret caret-up");
                });
        });

        $(document).ready(function () {
            var table = $('#example').DataTable();


        });
        $(document).ready(function () {
            var table = $('#example1').DataTable();


        });
        $(document).ready(function () {
            var table = $('#example2').DataTable();


        });
    </script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
    </html>
    <?php

}
?>