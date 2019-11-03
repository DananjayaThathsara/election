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
    $page_id = 2;
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
        <style>
            @media (min-width: 768px) {
                .modal-dialog {
                    width: 100% !important;
                    margin: 0px auto !important;
                }
            }

        </style>
    </head>
    <body>
    <div class="container">
        <?php include_once 'layouts/menu.php'; ?>
        <div class="row">
            <?php
            include_once '../Controller/newResultsController.php';
            ?>
            <div class="col-md-12"
                 style="border: 1px #ccc solid;padding: 10px;background:#f8f8f8;border-radius: 5px;margin-bottom: 20px">
                <h3><b>Add Results</b></h3>
                <hr>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="add">
                    <script>
                        function filterCouncil(council) {
                            $("#ccc").load('cFilter.php', {council: council});
                        }

                        function filterForm(result_type) {
                            if (result_type == 'postal') {
                                $("#polling").load('disFilter.php');
                            } else if (result_type == 'electoral') {
                                $("#polling").load('pollingFilter.php');
                            }
                        }
                    </script>
                    <div class="row">
                        <div class="col-md-8">
                            <label>Result Type</label>
                            <select class="form-control" onchange="filterForm(this.value)" name="result_type">
                                <option disabled selected>Select Result Type</option>
                                <option value="postal">Postal</option>
                                <option value="electoral">Electoral</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label>Result Level</label>
                            <select class="form-control" name="result_level">
                                <option disabled selected>Select Result Level</option>
                                <option value="1st">1st Vote</option>
                                <option value="2nd">2nd Vote</option>
                                <option value="3rd">3rd Vote</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label>District</label>
                            <div id="polling">
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
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Results</label>
                            <!-- First Party  -->
                            <div class="form-inline" style="margin-bottom: 10px">
                                <div class="form-group">
                                    <select class="form-control" name="party_id[]">
                                        <option disabled selected>Select Party</option>
                                        <?php
                                        $query = "SELECT * FROM party ORDER  BY candidate_name ASC";
                                        $result = mysql_query($query);
                                        if ($result) {
                                            while ($row = mysql_fetch_assoc($result)) {
                                                ?>
                                                <option value="<?php echo $row['party_id']; ?>">
                                                    <?php echo $row['candidate_name'] . '-' . $row['party_name'] . '-' . $row['short_name']; ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="votes[]" placeholder="Votes"
                                           required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="precen[]" placeholder="Precentage"
                                           required>
                                </div>
                            </div>
                            <!-- Second Party  -->
                            <div class="form-inline" style="margin-bottom: 10px">
                                <div class="form-group">
                                    <select class="form-control" name="party_id[]">
                                        <option disabled selected>Select Party</option>
                                        <?php
                                        $query = "SELECT * FROM party ORDER  BY candidate_name ASC";
                                        $result = mysql_query($query);
                                        if ($result) {
                                            while ($row = mysql_fetch_assoc($result)) {
                                                ?>
                                                <option value="<?php echo $row['party_id']; ?>">
                                                    <?php echo $row['candidate_name'] . '-' . $row['party_name'] . '-' . $row['short_name']; ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="votes[]" placeholder="Votes"
                                           required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="precen[]" placeholder="Precentage"
                                           required>
                                </div>
                            </div>
                            <!-- Third Party  -->
                            <div class="form-inline" style="margin-bottom: 10px">
                                <div class="form-group">
                                    <select class="form-control" name="party_id[]">
                                        <option disabled selected>Select Party</option>
                                        <?php
                                        $query = "SELECT * FROM party ORDER  BY candidate_name ASC";
                                        $result = mysql_query($query);
                                        if ($result) {
                                            while ($row = mysql_fetch_assoc($result)) {
                                                ?>
                                                <option value="<?php echo $row['party_id']; ?>">
                                                    <?php echo $row['candidate_name'] . '-' . $row['party_name'] . '-' . $row['short_name']; ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="votes[]" placeholder="Votes"
                                           required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="precen[]" placeholder="Precentage"
                                           required>
                                </div>
                            </div>
                            <br>
                            <div class="form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="valid_votes" placeholder="Valid Votes"
                                           required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="rejected_votes"
                                           placeholder="Rejected Votes"
                                           required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="total_polled"
                                           placeholder="Total Polled"
                                           required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="registered_votes"
                                           placeholder="Registered Votes"
                                           required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right" name=""
                            style="margin-bottom: 10px">
                        Add Result
                    </button>
                </form>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Postal Results</h3>
                        <table id="example" class="table table-striped table-bordered table-responsive"
                               style="width:100%">
                            <?php $queryp = "SELECT distinct d_id,date FROM new_president_postal_result ORDER BY date DESC";

                            $resultp = mysql_query($queryp);
                            $a = 1;
                            while ($rowp = mysql_fetch_assoc($resultp)) { ?>
                                <thead>
                                <?php if ($a == 1) { ?>
                                    <tr>
                                        <th>District</th>
                                        <th>Party</th>
                                        <th>Votes</th>
                                        <th>%</th>
                                        <th>vv</th>
                                        <th>RV</th>
                                        <th>TP</th>
                                        <th>REGV</th>
                                        <th>Action</th>
                                    </tr>
                                <?php } ?>
                                </thead>
                                <tbody>
                                <?php
                                $query1 = "SELECT elec.*, d.d_name,p.*
                                           FROM new_president_postal_result elec 
                                           LEFT JOIN dis d ON elec.d_id=d.d_id 
                                           LEFT JOIN party p ON elec.party_id=p.party_id
                                           WHERE elec.d_id='" . $rowp['d_id'] . "'";

                                $result1 = mysql_query($query1);
                                if ($result1) {
                                    $a = 1;
                                    while ($row1 = mysql_fetch_assoc($result1)) {

                                        ?>
                                        <tr><?php if ($a == 1) {
                                                ?>
                                                <td rowspan="3"><?php echo $row1['d_name']; ?></td><?php } ?>
                                            <td><?php echo $row1['candidate_name']; ?></td>
                                            <td><?php echo number_format($row1['votes']); ?></td>
                                            <td><?php echo number_format($row1['precen']); ?></td>
                                            <?php if ($a == 1) {
                                                ?>
                                                <td rowspan="3"><?php echo number_format($row1['valid_votes']); ?></td><?php } ?>
                                            <?php if ($a == 1) {
                                                ?>
                                                <td rowspan="3"><?php echo number_format($row1['rejected_votes']); ?></td><?php } ?>
                                            <?php if ($a == 1) {
                                                ?>
                                                <td rowspan="3"><?php echo number_format($row1['total_polled']); ?></td><?php } ?>
                                            <?php if ($a == 1) {
                                                ?>
                                                <td rowspan="3"><?php echo number_format($row1['registered_votes']); ?></td><?php } ?>
                                            <?php if ($a == 1) {

                                                ?>
                                                <td rowspan="3"><a href="javascript:void(0)" data-toggle="modal"
                                                                   data-target="#myModalPost<?php echo number_format($row1['post_id']); ?>">Edit</a>
                                                </td><?php }
                                            $a++ ?>
                                            <!-- Modal -->
                                            <div id="myModalPost<?php echo $row1['post_id']; ?>" class="modal fade "
                                                 role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                &times;
                                                            </button>
                                                            <h4 class="modal-title"><?php echo $row1['d_name']; ?> Postal Result</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="post" enctype="multipart/form-data">
                                                                <input type="hidden" name="action" value="update">
                                                                <input type="hidden" name="result_type"
                                                                       value="postal">
                                                                <input type="hidden" name="d_id"
                                                                       value="<?php echo $row1['d_id']; ?>">
                                                                <input type="hidden" name="s_id"
                                                                       value="<?php echo $row1['s_id']; ?>">
                                                                <?php

                                                                $query3 = "SELECT elec.*, d.d_name,p.*
                                           FROM new_president_postal_result elec 
                                           LEFT JOIN dis d ON elec.d_id=d.d_id 
                                           LEFT JOIN party p ON elec.party_id=p.party_id
                                           WHERE elec.d_id='" . $rowp['d_id'] . "'";
                                                                $result3 = mysql_query($query3);
                                                                while ($row3 = mysql_fetch_assoc($result3)) {
                                                                    ?>
                                                                    <div class="form-inline"
                                                                         style="margin-bottom: 10px">
                                                                        <div class="form-group">
                                                                            <select class="form-control"
                                                                                    name="party_id[]">
                                                                                <option selected
                                                                                        value="<?php echo $row3['party_id']; ?>"><?php echo $row3['candidate_name'] . '-' . $row3['party_name'] . '-' . $row3['short_name']; ?></option>
                                                                                <?php
                                                                                $query = "SELECT * FROM party ORDER  BY candidate_name ASC";
                                                                                $result = mysql_query($query);
                                                                                if ($result) {
                                                                                    while ($row = mysql_fetch_assoc($result)) {
                                                                                        ?>
                                                                                        <option value="<?php echo $row['party_id']; ?>">
                                                                                            <?php echo $row['candidate_name'] . '-' . $row['party_name'] . '-' . $row['short_name']; ?></option>
                                                                                    <?php }
                                                                                } ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                   name="votes[]"
                                                                                   value="<?php echo number_format($row3['votes']); ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                   name="precen[]"
                                                                                   value="<?php echo number_format($row3['precen']); ?>">
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="post_id[]"
                                                                           value="<?php echo $row3['post_id']; ?>">
                                                                <?php } ?>
                                                                <br>
                                                                <label for="">Valid Votes</label>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                           name="valid_votes"
                                                                           value="<?php echo number_format($row1['valid_votes']); ?>">
                                                                </div>
                                                                <label for="">Rejected Votes</label>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                           name="rejected_votes"
                                                                           value="<?php echo number_format($row1['rejected_votes']); ?>">
                                                                </div>
                                                                <label for="">Total Polled</label>
                                                                <div class="form-group">

                                                                    <input type="text" class="form-control"
                                                                           name="total_polled"
                                                                           value="<?php echo number_format($row1['total_polled']); ?>">
                                                                </div>
                                                                <label for="">Registered Votes</label>
                                                                <div class="form-group">

                                                                    <input type="text" class="form-control"
                                                                           name="registered_votes"
                                                                           value="<?php echo number_format($row1['registered_votes']); ?>">
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
                            <?php } ?>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <h3>Electoral Results</h3>
                        <?php
                        ?>
                        <table id="example2" class="table table-striped table-bordered table-responsive"
                               style="width:100%">
                            <?php $queryp = "SELECT distinct s_id,date FROM new_president_electoral_result ORDER BY date DESC";
                            $resultp = mysql_query($queryp);
                            $a = 1;
                            while ($rowp = mysql_fetch_assoc($resultp)) { ?>
                                <thead>
                                <?php if ($a == 1) { ?>
                                    <tr>
                                        <th>District</th>
                                        <th>ED</th>
                                        <th>Party</th>
                                        <th>Votes</th>
                                        <th>%</th>
                                        <th>vv</th>
                                        <th>RV</th>
                                        <th>TP</th>
                                        <th>REGV</th>
                                        <th>Action</th>
                                    </tr>
                                <?php } ?>
                                </thead>
                                <tbody>
                                <?php
                                $query1 = "SELECT elec.*, d.d_name,s.seat_name,p.*
                                           FROM new_president_electoral_result elec 
                                           LEFT JOIN dis d ON elec.d_id=d.d_id 
                                           LEFT JOIN seat s ON elec.s_id=s.s_id
                                           LEFT JOIN party p ON elec.party_id=p.party_id
                                           WHERE elec.s_id='" . $rowp['s_id'] . "'";
                                $result1 = mysql_query($query1);
                                if ($result1) {
                                    $a = 1;
                                    while ($row1 = mysql_fetch_assoc($result1)) {

                                        ?>
                                        <tr><?php if ($a == 1) {
                                                ?>
                                                <td rowspan="3"><?php echo $row1['d_name']; ?></td><?php } ?>
                                            <?php if ($a == 1) {
                                                ?>
                                                <td rowspan="3"><?php echo ucfirst(strtolower($row1['seat_name'])); ?></td><?php } ?>
                                            <?php
                                            ?>
                                            <td><?php echo $row1['candidate_name']; ?></td>
                                            <td><?php echo number_format($row1['votes']); ?></td>
                                            <td><?php echo number_format($row1['precen']); ?></td>
                                            <?php if ($a == 1) {
                                                ?>
                                                <td rowspan="3"><?php echo number_format($row1['valid_votes']); ?></td><?php } ?>
                                            <?php if ($a == 1) {
                                                ?>
                                                <td rowspan="3"><?php echo number_format($row1['rejected_votes']); ?></td><?php } ?>
                                            <?php if ($a == 1) {
                                                ?>
                                                <td rowspan="3"><?php echo number_format($row1['total_polled']); ?></td><?php } ?>
                                            <?php if ($a == 1) {
                                                ?>
                                                <td rowspan="3"><?php echo number_format($row1['registered_votes']); ?></td><?php } ?>
                                            <?php if ($a == 1) {

                                                ?>
                                                <td rowspan="3"><a href="javascript:void(0)" data-toggle="modal"
                                                                   data-target="#myModal<?php echo $row1['id']; ?>">Edit</a>
                                                </td><?php }
                                            $a++ ?>
                                            <!-- Modal -->
                                            <div id="myModal<?php echo $row1['id']; ?>" class="modal fade "
                                                 role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                &times;
                                                            </button>
                                                            <h4 class="modal-title">District -<?php echo $row1['d_name']; ?>  Polling Devision -<?php echo ucfirst(strtolower($row1['seat_name'])); ?> Result</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="post" enctype="multipart/form-data">
                                                                <input type="hidden" name="action" value="update">
                                                                <input type="hidden" name="result_type"
                                                                       value="electoral">
                                                                <input type="hidden" name="d_id"
                                                                       value="<?php echo $row1['d_id']; ?>">
                                                                <input type="hidden" name="s_id"
                                                                       value="<?php echo $row1['s_id']; ?>">
                                                                <?php
                                                                $query3 = "SELECT elec.*, d.d_name,s.seat_name,p.*,se.* 
                                                                           FROM new_president_electoral_result elec 
                                                                           LEFT JOIN dis d ON elec.d_id=d.d_id 
                                                                           LEFT JOIN seat s ON elec.s_id=s.s_id
                                                                           LEFT JOIN party p ON elec.party_id=p.party_id
                                                                           LEFT JOIN summary_electoral se ON elec.s_id=se.s_id 
                                                                           WHERE elec.s_id='" . $rowp['s_id'] . "'";
                                                                $result3 = mysql_query($query3);
                                                                while ($row3 = mysql_fetch_assoc($result3)) {
                                                                    ?>
                                                                    <div class="form-inline"
                                                                         style="margin-bottom: 10px">
                                                                        <div class="form-group">
                                                                            <select class="form-control"
                                                                                    name="party_id[]">
                                                                                <option selected
                                                                                        value="<?php echo $row3['party_id']; ?>"><?php echo $row3['candidate_name'] . '-' . $row3['party_name'] . '-' . $row3['short_name']; ?></option>
                                                                                <?php
                                                                                $query = "SELECT * FROM party ORDER  BY candidate_name ASC";
                                                                                $result = mysql_query($query);
                                                                                if ($result) {
                                                                                    while ($row = mysql_fetch_assoc($result)) {
                                                                                        ?>
                                                                                        <option value="<?php echo $row['party_id']; ?>">
                                                                                            <?php echo $row['candidate_name'] . '-' . $row['party_name'] . '-' . $row['short_name']; ?></option>
                                                                                    <?php }
                                                                                } ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                   name="votes[]"
                                                                                   value="<?php echo number_format($row3['votes']); ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                   name="precen[]"
                                                                                   value="<?php echo number_format($row3['precen']); ?>">
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="elec_id[]"
                                                                           value="<?php echo number_format($row3['elec_id']); ?>">
                                                                <?php } ?>
                                                                <br>
                                                                <label for="">Valid Votes</label>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                           name="valid_votes"
                                                                           value="<?php echo number_format($row1['valid_votes']); ?>">
                                                                </div>
                                                                <label for="">Rejected Votes</label>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                           name="rejected_votes"
                                                                           value="<?php echo number_format($row1['rejected_votes']); ?>">
                                                                </div>
                                                                <label for="">Total Polled</label>
                                                                <div class="form-group">

                                                                    <input type="text" class="form-control"
                                                                           name="total_polled"
                                                                           value="<?php echo number_format($row1['total_polled']); ?>">
                                                                </div>
                                                                <label for="">Registered Votes</label>
                                                                <div class="form-group">

                                                                    <input type="text" class="form-control"
                                                                           name="registered_votes"
                                                                           value="<?php echo number_format($row1['registered_votes']); ?>">
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
                            <?php } ?>
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