<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <title>Election LA 2018</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <?php include_once 'googleAnalytic.php';?>
</head>
<html>
<body>
<div class="container">

    <?php include_once 'header.php';?>

    <?php
    if (isset($_GET['d_id'])) {
        $d_id = $_GET['d_id'];
    }
    if (isset($_GET['l_id'])) {
        $l_id = $_GET['l_id'];
    }
    ?>
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Local Authority</li>
            </ol>
        </nav>
        <div class="col-md-8">
            <?php
            include_once 'Model/dbConfig.php';
            $query = "SELECT * FROM dis WHERE d_id='$d_id'";
            $result = mysql_query($query);
            while ($row = mysql_fetch_assoc($result)) {
                ?>
                <h4><?php echo $row['d_name'] ?> - Local Authorities</h4>
            <?php } ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Local Authority</th>
                    <th style="text-align: center">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (isset($_GET['d_id'])) {
                    $d_id = $_GET['d_id'];
                }
                include_once 'Model/dbConfig.php';
                $query = "SELECT * FROM la WHERE d_id='$d_id'";
                $result = mysql_query($query);
                while ($row = mysql_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['l_name']; ?>
                        </td>
                        <td style="text-align: center">
                            <a href="localAuthorityInner.php?d_id=<?php echo $row['d_id']; ?>&l_id=<?php echo $row['l_id']; ?>">View</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4" id="side">
            <br>

            <div style="width: 100%;height:300px;background: #ccc;text-align: center;margin: 0px;padding: 0px;margin-top: 10px;margin-bottom: 20px">
                Ad spaces
            </div>
        </div>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.progress .progress-bar').css("width",
                    function () {
                        return $(this).attr("aria-valuenow") + "%";
                    }
                )
            });

        </script>
</body>
</html>