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
        <div class="col-md-12">
            <img src="img/01.png" class="img-responsive" style="width: 100%">
            <br>
            <table class="table table-striped">
                <thead>
                </thead>
                <tbody>
                <?php
                include_once 'Model/dbConfig.php';
                $queryall = "SELECT SUM(tot_valid_votes) as tot_valid_votes,d_id,l_id FROM sammary";
                $resultall = mysql_query($queryall);
                $tot_valid_votes;
                if ($resultall) {
                    while ($rowall = mysql_fetch_assoc($resultall)) {
                        $tot_valid_votes = $rowall['tot_valid_votes'];
                    }
                }
                ?>
                <?php
                $queryParty = "SELECT SUM(lp1.p_votes) as tot_p_votes,pa1.p_name_short,pa1.p_image_name,pa1.p_name,pa1.p_color,pa1.p_id
                                        FROM la_party as lp1
                                        LEFT  JOIN party as pa1 ON lp1.p_id=pa1.p_id WHERE lp1.p_id='7' OR lp1.p_id='38' OR lp1.p_id='18' OR lp1.p_id='39' OR lp1.p_id='9'  GROUP BY lp1.p_id ORDER BY tot_p_votes DESC LIMIT 5";
                $resultParty = mysql_query($queryParty);
                if ($resultParty) {
                    while ($rowParty = mysql_fetch_assoc($resultParty)) {
                        if ($rowParty['p_id'] == '7' OR $rowParty['p_id'] == '38') {
                            $tot_vot_UPFA_SLFP += $rowParty['tot_p_votes'];
                            $queryUpdate = "UPDATE tot_votes SET p_tot_votes='" . $tot_vot_UPFA_SLFP . "' WHERE p_id='738'";
                            $resultUpdate = mysql_query($queryUpdate);
                        } else {
                            $queryUpdate = "UPDATE tot_votes SET p_tot_votes='" . $rowParty['tot_p_votes'] . "' WHERE p_id='" . $rowParty['p_id'] . "'";
                            $resultUpdate = mysql_query($queryUpdate);
                        }
                    }
                    $quert_tot_party = "SELECT * FROM tot_votes ORDER BY p_tot_votes DESC ";
                    $result_tot_party = mysql_query($quert_tot_party);
                    $message = 0;
                    while ($row_tot_party = mysql_fetch_assoc($result_tot_party)) {
                        $precentageua = ($row_tot_party['p_tot_votes'] / $tot_valid_votes) * 100;
                        if ($row_tot_party['p_tot_votes'] == '0') {
                            $message = 1;
                        }
                        if ($message == 1) {

                        } else {
                            ?>
                            <tr>
                                <td width="50%">
                                    <div class="ele_symbol ">
                                        <img src="party_logo/<?php echo $row_tot_party['p_image_name']; ?>"
                                             class="img-responsive" style="float: left;margin-right: 5px;">

                                    </div>
                                    <div class="ele_symbol_text"><?php echo $row_tot_party['p_short_name']; ?></div>
                                </td>
                                <td>
                                    <div class="candi_progress">
                                        <div class="progress skill-bar">
                                            <div class="progress-bar progress-bar-success" role="progressbar"
                                                 aria-valuenow="<?php echo $precentageua; ?>" aria-valuemin="0"
                                                 aria-valuemax="100"
                                                 style="background-color:<?php echo $row_tot_party['p_color']; ?>">

                                            </div>
                                        </div>
                                        <div class="tot_vote">
                                            <div class="pull-right"><b>Total Votes
                                                    : <?php echo number_format($row_tot_party['p_tot_votes']); ?></b>
                                            </div>
                                            <div class="pull-left"><b><?php echo round($precentageua, 2); ?> %</b>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php }
                    }
                } ?>
                </tbody>
            </table>
        </div>

        </div>
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