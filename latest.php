<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="">
    <title>Election</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/style.css" rel="stylesheet">
</head>
<html>
<body>
<div class="container">
    <div class="row">
        <img src="img/02.png" class="img-responsive" width="100%">
        <?php
        include_once 'Model/dbConfig.php';
        $d_id;
        $l_id;
        $query = "SELECT l.d_id,l.l_id,la1.d_name,la1.l_name FROM la_party as l LEFT JOIN la as la1 ON l.l_id=la1.l_id AND l.d_id=la1.d_id ORDER  BY  date DESC LIMIT 1";
        $result = mysql_query($query);
        while ($row = mysql_fetch_assoc($result)){
        $d_id = $row['d_id'];
        $l_id = $row['l_id'];
        ?>
        <h2><?php echo $row['d_name'] ?> - <?php echo $row['l_name'] ?></h2>
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
                $query23 = "SELECT lp.p_votes,lp.precentage,la.d_name,la.l_name,lpm.elected_mem,lpm.caculated_mem,sa.tot_valid_votes,pa.p_name_short,pa.p_image_name,pa.p_name
                            FROM la_party as lp 
                            LEFT JOIN la_party_members as lpm ON lp.p_id=lpm.p_id AND lp.d_id=lpm.d_id AND lp.l_id=lpm.l_id
                            LEFT JOIN sammary as sa ON lp.d_id = sa.d_id AND lp.l_id = sa.l_id
                            LEFT JOIN party as pa ON lp.p_id = pa.p_id
                                LEFT JOIN la as la ON lp.l_id = la.l_id AND lp.d_id=la.d_id WHERE lp.d_id='$d_id' AND lp.l_id='$l_id'
                            ORDER BY lp.p_votes DESC,lp.date DESC ";

                $result23 = mysql_query($query23);
                if ($result23) {
                    while ($row23 = mysql_fetch_assoc($result23)) { ?>
                        <tr>
                            <td>
                                <div class="ele_symbol">
                                    <img src="party_logo/<?php echo $row23['p_image_name'] ?>" width="30" height="30"
                                         class="img-responsive" alt="UNP">
                                </div>
                                <div class="ele_symbol_text" style="font-size: 14px"><?php echo $row23['p_name'] ?>
                                    - <?php echo $row23['p_name_short'] ?></div>
                            </td>
                            <td><?php echo number_format($row23['p_votes']); ?></td>
                            <td><?php echo round($row23['precentage'], 2); ?> %</td>
                            <td><?php echo $row23['elected_mem'] ?></td>
                            <td><?php echo $row23['caculated_mem'] ?></td>
                            <td><?php echo $row23['caculated_mem'] + $row23['elected_mem']; ?></td>
                        </tr>
                    <?php }
                }
                }
                ?>
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
                    $querysu = "SELECT * FROM sammary WHERE d_id='$d_id' AND l_id='$l_id'";
                    $resultsu = mysql_query($querysu);
                    while ($rowsu = mysql_fetch_assoc($resultsu)) {
                        ?>
                        <tr>
                            <td><?php echo $rowsu['tot_mem']; ?></td>
                            <td><?php echo number_format($rowsu['tot_valid_votes']); ?></td>
                            <td><?php echo number_format($rowsu['rejected_votes']); ?></td>
                            <td><?php echo number_format($rowsu['polled_votes']); ?></td>
                            <td><?php echo number_format($rowsu['tot_reg_votes']); ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>



        <?php
        include_once 'Model/dbConfig.php';
        $query = "SELECT * FROM file_name ORDER BY date DESC limit 2 ";
        $result = mysql_query($query);
        while ($row = mysql_fetch_assoc($result)) {
            $url = "electionadmin/Files/" . $row['file_name'];
            $xml = simplexml_load_file("electionadmin/Files/" . $row['file_name']) or die("Error: Cannot create object");

            foreach ($xml->summary as $vots) {
                $vv = $vots->valid_votes;
                $vv = intval(preg_replace('/[^\d.]/', '', $vv));

                $vj = $vots->rejected;
                $vj = intval(preg_replace('/[^\d.]/', '', $vj));

                $vvc = (int)$vv;
                $vjc = (int)$vj;

                $pollv = $vvc + $vjc;
                $vvp = ($vvc / $pollv) * 100;
                $pollv = number_format($pollv);


            }
        }
        ?>

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