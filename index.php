<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Election LA 2018</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <?php include_once 'googleAnalytic.php';?>
    <![endif]-->
</head>
<html>
<body>
<div class="container">
<?php include_once 'header.php';?>
    <div class="row">
        <div style="margin-bottom: 10px;margin-top: -10px"><center><a href="https://goo.gl/SUjuPN" target="_blank"><img src="http://nethcdn.com/content/soft11.gif" alt="" class="img-responsive"></a></center></div>
        <div class="col-md-12">
            <div class="col-md-6" style="border-right: 1px dashed #cccccc">
                <img src="img/01.png" class="img-responsive">
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
            <div class="col-md-6">
                <img src="img/02.png" class="img-responsive">
                <br>
                <table class="table table-striped">
                    <thead>
                    <?php
                    $querytitle = "SELECT d_id,l_id FROM la_party ORDER BY date DESC LIMIT 1 ";
                    $resulttitle = mysql_query($querytitle);
                    if ($resulttitle){
                    while ($rowtitle = mysql_fetch_assoc($resulttitle)){
                    $querytt = "SELECT d.d_name,l.l_name 
                        FROM dis d 
                        LEFT JOIN la as l ON d.d_id=l.d_id
                        WHERE l.l_id='" . $rowtitle['l_id'] . "' AND d.d_id='" . $rowtitle['d_id'] . "'
                        ";
                    $resultt = mysql_query($querytt);
                    while ($rowtt = mysql_fetch_assoc($resultt)) {
                        ?>
                        <a href="localAuthorityInner.php?d_id=<?php echo $rowtitle['d_id']; ?>&l_id=<?php echo $rowtitle['l_id']; ?>"
                           style="text-decoration: none;cursor: pointer;color: #262626">
                            <h4><?php echo $rowtt['d_name'] ?> - <?php echo $rowtt['l_name'] ?></h4></a>
                    <?php } ?>
                    </thead>
                    <tbody>
                    <?php
                    $query23 = "SELECT lp.p_votes,lp.precentage,sa.tot_valid_votes,pa.p_name_short,pa.p_image_name,pa.p_name,pa.p_color
                                FROM la_party as lp 
                                LEFT JOIN sammary as sa ON lp.d_id = sa.d_id AND lp.l_id = sa.l_id
                                LEFT JOIN party as pa ON lp.p_id = pa.p_id
                                WHERE lp.l_id='" . $rowtitle['l_id'] . "' AND lp.d_id='" . $rowtitle['d_id'] . "'
                                ORDER BY lp.p_votes DESC ,lp.date DESC LIMIT 4
                                ";
                    $result23 = mysql_query($query23);
                    if ($result23) {
                        while ($row23 = mysql_fetch_assoc($result23)) {
                            ?>
                            <tr>
                                <td>
                                    <div class="ele_symbol">
                                        <img src="party_logo/<?php echo $row23['p_image_name'] ?>"
                                             class="img-responsive" alt="UNP">
                                    </div>
                                    <div class="ele_symbol_text"
                                         style="font-size: 14px"><?php echo $row23['p_name_short'] ?></div>
                                </td>
                                <td>
                                    <div class="candi_progress">
                                        <div class="progress skill-bar">
                                            <div class="progress-bar progress-bar-success" role="progressbar"
                                                 aria-valuenow=" <?php echo $row23['precentage']; ?>" aria-valuemin="0"
                                                 aria-valuemax="100"
                                                 style="background-color: <?php echo $row23['p_color']; ?>">
                                            </div>
                                        </div>
                                        <div class="tot_vote">
                                            <div class="pull-right"><b>Votes
                                                    : <?php echo number_format($row23['p_votes']); ?></b></div>
                                            <div class="pull-left">
                                                <b><?php echo round($row23['precentage'], 2); ?> %</b></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php }
                    }
                    }
                    } ?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-8">
            <div style="margin-bottom: 10px;">
                <center><a href="https://goo.gl/Bhf84Y" target="_blank"><img src="sds/fadna.gif" alt="" class="img-responsive"></center> </a>
            </div>;
            <img src="img/03.png" class="img-responsive">
            <br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="text-align: center">Party</th>
                    <th style="text-align: center">Elected Members</th>
                    <th style="text-align: center">Calculated Members</th>
                    <th style="text-align: center">Total Members</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $queryPartyMem = "SELECT SUM(lpm.elected_mem) as ele_mem,SUM(lpm.caculated_mem) as cal_mem,sum(lpm.tot_mem) as tot_mem,pa2.p_name_short,pa2.p_image_name,pa2.p_name
                                        FROM la_party_members as lpm
                                        LEFT  JOIN party as pa2 ON lpm.p_id=pa2.p_id GROUP BY lpm.p_id ORDER BY tot_mem DESC LIMIT 5";
                $resultPartyMem = mysql_query($queryPartyMem);
                if ($resultPartyMem) {
                    while ($rowPartyMem = mysql_fetch_assoc($resultPartyMem)) {
                        ?>
                        <tr>
                        <td width="30%">
                            <div class="ele_symbol ">
                                <img src="party_logo/<?php echo $rowPartyMem['p_image_name']; ?>" class="img-responsive"
                                     width="30" height="30">
                            </div>
                            <div class="ele_symbol_text"><?php echo $rowPartyMem['p_name_short']; ?></div>
                        </td>
                        <td style="text-align: center"><?php echo $rowPartyMem['ele_mem']; ?></td>
                        <td style="text-align: center"><?php echo $rowPartyMem['cal_mem']; ?></td>
                        <td style="text-align: center"><?php echo $rowPartyMem['tot_mem']; ?></td>
                        </tr><?php }
                } ?>
                </tbody>
            </table>
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
        <div class="col-md-4" id="side">
            <div>
                <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FSoftlogicLife%2Fvideos%2F529991210720891%2F&show_text=0&width=560" width="100%" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
            </div>
            <br>
            <img src="img/04.png" class="img-responsive">
            <br>
            <?php
            $queryrec = "SELECT d_id,l_id FROM la_party GROUP by d_id ORDER BY date DESC LIMIT 1,4";

            $resultrec = mysql_query($queryrec);
            if ($resultrec) {
                while ($rowrec = mysql_fetch_assoc($resultrec)) {
                    $d_id = $rowrec['d_id'];
                    $l_id = $rowrec['l_id'];
                    ?>
                    <table class="table table-striped">
                        <thead>
                        <?php
                        $queryttt = "SELECT d.d_name,l.l_name 
                        FROM dis d 
                        LEFT JOIN la as l ON d.d_id=l.d_id
                        WHERE l.l_id='" . $l_id . "' AND d.d_id='" . $d_id . "' LIMIT 1
                        ";
                        $resulttt = mysql_query($queryttt);
                        while ($rowttt = mysql_fetch_assoc($resulttt)){
                        ?>
                        <a href="localAuthorityInner.php?d_id=<?php echo $rowrec['d_id']; ?>&l_id=<?php echo $rowrec['l_id']; ?>"
                           style="text-decoration: none;cursor: pointer;color: #262626">
                            <h4><?php echo $rowttt['d_name'] ?> - <?php echo $rowttt['l_name'] ?></h4>
                            <?php } ?>
                        </thead>
                        <tbody>
                        <?php
                        $query234 = "SELECT lp.p_votes,lp.precentage,sa.tot_valid_votes,pa.p_name_short,pa.p_image_name,pa.p_name,pa.p_color
                                    FROM la_party as lp 
                                    LEFT JOIN sammary as sa ON lp.d_id = sa.d_id AND lp.l_id = sa.l_id
                                    LEFT JOIN party as pa ON lp.p_id = pa.p_id
                                    WHERE lp.l_id='" . $l_id . "' AND lp.d_id='" . $d_id . "'
                                    ORDER BY lp.p_votes DESC ,lp.date DESC LIMIT 4
                                    ";
                        $result234 = mysql_query($query234);
                        if ($result234) {
                            while ($row234 = mysql_fetch_assoc($result234)) {
                                ?>
                                <tr>
                                    <td>
                                        <div class="ele_symbol">
                                            <img src="party_logo/<?php echo $row234['p_image_name'] ?>"
                                                 class="img-responsive" alt="UNP">
                                        </div>
                                        <div class="ele_symbol_text"
                                             style="font-size: 14px"><?php echo $row234['p_name_short'] ?></div>
                                    </td>
                                    <td>
                                        <div class="candi_progress">
                                            <div class="progress skill-bar">
                                                <div class="progress-bar progress-bar-success" role="progressbar"
                                                     aria-valuenow=" <?php echo round($row234['precentage'], 2); ?>"
                                                     aria-valuemin="0" aria-valuemax="100"
                                                     style="background-color: <?php echo $row234['p_color']; ?>">
                                                    <span class="skill"><i class="val"> </i></span>
                                                </div>
                                            </div>
                                            <div class="tot_vote">
                                                <div class="pull-right"><b>Votes
                                                        : <?php echo number_format($row234['p_votes']); ?></b></div>
                                                <div class="pull-left"><b><?php echo round($row234['precentage'], 2); ?>
                                                        %</b>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php }
                        } ?>
                        </tbody>
                    </table>
                <?php }
            } ?>

        </div>
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