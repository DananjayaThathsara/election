<?php
error_reporting(0);
if (!isset($_SESSION)) {
    session_start();
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Election</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</head>
<body>
<!--Pulling Awesome Font -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <?php include_once '../Controller/loginCotroller.php' ?>
        <form action="" method="post">
            <div class="col-md-offset-5 col-md-3">
                <div class="form-login" style="margin-top: 100px">
                    <input type="text" name="u_name" class="form-control input-sm chat-input" placeholder="username"/>
                    <input type="password" name="p_word" class="form-control input-sm chat-input"
                           placeholder="password"/>
                    </br>
                    <div class="wrapper">
            <span class="group-btn">
                <button type="submit" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></button>
            </span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
