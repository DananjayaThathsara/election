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
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/style.css" rel="stylesheet">
    <?php include_once 'googleAnalytic.php';?>
</head>
<html>
<body>
<div class="container">
    <?php include_once 'header.php';?>
    <div style="margin-bottom: 10px;">
        <center><a href="https://goo.gl/Bhf84Y" target="_blank" style="margin-bottom: 5px"><img src="sds/fadna.gif" alt="" class="img-responsive"></center> </a>
        <div style="margin-top: 10px;"><center><a href="" target="_blank" ><img src="http://nethcdn.com/content/banner-Final-compressed.gif" alt="" class="img-responsive"></a></center></div>
    </div>
    <?php
    if(isset($_GET['d_id'])){
        $d_id=$_GET['d_id'];
    }  if(isset($_GET['l_id'])){
        $l_id=$_GET['l_id'];
    }
    ?>
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="distrctInner.php?d_id=<?php echo $d_id;?>&l_id=<?php echo $l_id;?>">Local Authority</a></li>
                <li class="breadcrumb-item active" aria-current="page">Result</li>
            </ol>
        </nav>
        <?php
        include_once 'Model/dbConfig.php';
        $query="SELECT * FROM la WHERE d_id='$d_id' AND  l_id='$l_id'";
        $result=mysql_query($query);
        while ($row=mysql_fetch_assoc($result)){
            ?>
            <h2><b><?php echo $row['d_name']?> District </b> - <?php echo $row['l_name']?></h2>
        <?php }?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Party</th>
                    <th>Votes</th>
                    <th>Precentage</th>
                    <th>Elected Members</th>
                    <th>Calculated Members</th>
                    <th>Total Members</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query23="SELECT lp.p_votes,lp.precentage,lpm.elected_mem,lpm.caculated_mem,sa.tot_valid_votes,pa.p_name_short,pa.p_image_name,pa.p_name
FROM la_party as lp 
LEFT JOIN la_party_members as lpm ON lp.p_id=lpm.p_id AND lp.d_id=lpm.d_id AND lp.l_id=lpm.l_id
LEFT JOIN sammary as sa ON lp.d_id = sa.d_id AND lp.l_id = sa.l_id
LEFT JOIN party as pa ON lp.p_id = pa.p_id

 WHERE lp.d_id='$d_id' AND lp.l_id='$l_id' ORDER BY lp.p_votes DESC
";
                $result23=mysql_query($query23);
                if($result23){
                    while ($row23=mysql_fetch_assoc($result23)){
                        ?>
                        <tr>
                            <td>
                                <div class="ele_symbol">
                                    <img src="party_logo/<?php echo $row23['p_image_name']?>" width="30" height="30" class="img-responsive" alt="UNP">
                                </div>
                                <div class="ele_symbol_text" style="font-size: 14px"><?php echo $row23['p_name']?> - <?php echo $row23['p_name_short']?></div>
                            </td>
                            <td><?php echo number_format($row23['p_votes']);?></td>
                            <td><?php echo round($row23['precentage'],2) ;?> % </td>
                            <td><?php echo $row23['elected_mem']?></td>
                            <td><?php echo $row23['caculated_mem']?></td>
                            <td><?php echo $row23['caculated_mem']+$row23['elected_mem'];?></td>
                        </tr>
                    <?php }}else{
                    echo 'Still result not release';
                }?>
                </tbody>
            </table>
        </div>
        <div class="col-md-12">

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Total Members</th>
                        <th>Valid Votes</th>
                        <th>Rejected Votes</th>
                        <th>Polled Votes</th>
                        <th>Registered Votes</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $querysu="SELECT * FROM sammary WHERE d_id='$d_id' AND l_id='$l_id'";
                    $resultsu=mysql_query($querysu);
                    while ($rowsu=mysql_fetch_assoc($resultsu)){
                        ?>
                        <tr>
                            <td><?php echo $rowsu['tot_mem'];?></td>
                            <td><?php echo number_format($rowsu['tot_valid_votes']);?></td>
                            <td><?php echo number_format($rowsu['rejected_votes']);?></td>
                            <td><?php echo number_format($rowsu['polled_votes']);?></td>
                            <td><?php echo number_format($rowsu['tot_reg_votes']);?></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table></div>
            <br>

        </div>
        <div class="col-md-6">
            <a id="dis"></a>
            <img src="img/05.png" class="img-responsive">
            <br>
            <table class="table table-striped">
                <thead>

                </thead>
                <tbody>
                <?php
                include_once 'Model/dbConfig.php';
                $query = "SELECT * FROM dis";
                $result = mysql_query($query);
                while ($row = mysql_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td style="font-family: 'malithi web';font-size: 18px;font-weight: bold">
                            <?php echo $row['sinhala_name']; ?>
                        </td>
                        <td style="text-align: center"><a href="distrctInner.php?d_id=<?php echo $row['d_id']; ?>">View
                                Results</a></td>
                    </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <?php
            if(isset($_GET['d_id'])){
                $d_id=$_GET['d_id'];
            }  if(isset($_GET['l_id'])){
                $l_id=$_GET['l_id'];
            }
            $query="SELECT * FROM la WHERE d_id='$d_id' LIMIT 1";
            $result=mysql_query($query);
            while ($row=mysql_fetch_assoc($result)){

                ?>
                <h3><b><?php echo $row['d_name']?> District </b>- Local Authorities</h3>
            <?php }?>

            <table class="table table-striped">
                <thead>

                </thead>
                <tbody>
                <?php
                if(isset($_GET['d_id'])){
                    $d_id=$_GET['d_id'];
                }
                include_once 'Model/dbConfig.php';
                $query="SELECT * FROM la WHERE d_id='$d_id'";
                $result=mysql_query($query);

                while ($row=mysql_fetch_assoc($result)){

                    ?>
                    <tr>
                        <td>
                            <?php echo $row['l_name'];?>
                        </td>
                        <td style="text-align: center"><a href="localAuthorityInner.php?d_id=<?php echo $row['d_id']; ?>&l_id=<?php echo $row['l_id']; ?>">View</a></td>
                    </tr>
                <?php }?>

                </tbody>
            </table>

        </div>





        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <script src="../js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.progress .progress-bar').css("width",
                    function() {
                        return $(this).attr("aria-valuenow") + "%";
                    }
                )
            });

        </script>
        <script>
            $(document).ready(function(){
                // Add smooth scrolling to all links
                $("a").on('click', function(event) {

                    // Make sure this.hash has a value before overriding default behavior
                    if (this.hash !== "") {
                        // Prevent default anchor click behavior
                        event.preventDefault();

                        // Store hash
                        var hash = this.hash;

                        // Using jQuery's animate() method to add smooth page scroll
                        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                        $('html, body').animate({
                            scrollTop: $(hash).offset().top
                        }, 800, function(){

                            // Add hash (#) to URL when done scrolling (default click behavior)
                            window.location.hash = hash;
                        });
                    } // End if
                });
            });
        </script>

</body>
</html>