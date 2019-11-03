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
$page_id=1;
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

</head>
<body>
<div class="container">
<?php include_once 'layouts/menu.php';?>
<div class="row">
    <?php
    if(isset($_POST['controller'])&& $_POST['controller']=='add_council'){
        include_once '../Controller/addCouncilController.php';
    }
    elseif (isset($_POST['controller'])&& $_POST['controller']=='add_file'){
        include_once '../Controller/addFileController.php';
    }
    ?>
    <?php include_once '../Model/dbConfig.php';

    ?>
    <div class="col-md-12">
        <h3><b>Add Result</b></h3>
        <form action=""  method="post" enctype="multipart/form-data">
            <script>
                function filterCouncil(council) {
                    $("#ccc").load('cFilter.php', {council: council});
                }
            </script>
            <div class="form-group">
                <label>District</label>
                <select class="form-control" onchange="filterCouncil(this.value)" name="d_id">
                    <option disabled selected>Select District</option>
                    <?php
                    $query="SELECT * FROM dis";
                    $result=mysql_query($query);

                    if($result){
                        while ($row=mysql_fetch_assoc($result)){
                            ?>
                            <option value="<?php echo $row['d_id'];?>"><?php echo $row['d_id'];?> - <?php echo $row['d_name'];?></option>
                        <?php }}?>
                </select>
            </div>
            <div id="ccc">
                  </div>
            <div class="form-group">
                <label for="pwd">Upload Result File</label>
                <input type="file" class="form-control" name="file_name" placeholder='Choose a file...' />
            </div>
            <input type="hidden" name="controller" value="add_file">
            <button type="submit" class="btn btn-default pull-right" style="margin-bottom: 10px">Upload Result</button>
        </form>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>District</th>
                <th>Local Authority</th>
                <th>File Name</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $query="SELECT * FROM la";
            $result=mysql_query($query);
            if ($result){
            while ($row=mysql_fetch_assoc($result)){
                $query1="SELECT * FROM files WHERE d_id='".$row['d_id']."' AND l_id='".$row['l_id']."'";
                 $result1=mysql_query($query1);
                while ($row1=mysql_fetch_assoc($result1)){
            ?>
            <tr>
                <tr>
                    <td><?php echo $row['d_id'].' - '.$row['d_name'];?></td>
                    <td><?php echo $row['l_id'].' - '.$row['l_name'];?></td>
                    <td><?php echo $row1['file_name'];?></td>

                </tr>
            <?php }}}?>
            </tr>

            </tbody>
        </table>
    </div>
</div>

</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../js/bootstrap.min.js"></script>
<script>

    $(function(){
        $(".dropdown").hover(
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");
            });
    });
</script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
    <?php

}
?>