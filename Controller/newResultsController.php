<?php
error_reporting(1);
include_once '../Model/dbConfig.php';
include_once '../Model/addNewResultClass.php';
include_once '../Model/fileUploadClass.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    /*Seat Wise Start*/
    $addeObj = new addNewResultClass();
    if (isset($_POST['action']) && $_POST['action'] == 'add') {
        try {
            $msg1 = 0;
            $msg2 = 0;
            $parties = $_POST['party_id'];
            $votes = $_POST['votes'];
            $precen = $_POST['precen'];
            $addeObj->setResultType($_POST['result_type']);

            foreach ($parties as $key => $party) {
                $s_id = $_POST['s_id'];
                $d_id = $_POST['d_id'];
                $result_level = $_POST['result_level'];
                $party_id = $party;
                $addeObj->setVotes($votes[$key]);
                $addeObj->setPrecen($precen[$key]);
                $date = date('Y-m-d H:i:s');
                $addeObj->setDId($d_id);
                $addeObj->setSId($s_id);
                $addeObj->setResultLevel($result_level);
                $addeObj->setPartyId($party_id);
                $addeObj->setDate($date);
                $addeObj->setValidVotes($_POST['valid_votes']);
                $addeObj->setRejectedVotes($_POST['rejected_votes']);
                $addeObj->setTotalPolled($_POST['total_polled']);
                $addeObj->setRegisteredVotes($_POST['registered_votes']);
                if ($addeObj->addNewResult()) {
                    $msg1 = 1;
                }
            }

            if ($msg1 == 1) {
                echo('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Success!</strong>Results are added..</div>');
            }

        } catch (Exception $ex) {
            echo('<div class="alert alert-danger  alert-error">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Error!</strong>' . $ex->getMessage() . '
                    </div>');
        }
    }
    if (isset($_POST['action']) && $_POST['action'] == 'update') {

        try {
            $msg1 = 0;
            if (isset($_POST['result_type']) && $_POST['result_type'] == 'postal') {
                $elec = $_POST['post_id'];
            } elseif (isset($_POST['result_type']) && $_POST['result_type'] == 'electoral') {
                $elec = $_POST['elec_id'];
            }

            $parties = $_POST['party_id'];
            $votes = $_POST['votes'];
            $precen = $_POST['precen'];
            $post_id = $_POST['post_id'];
            $addeObj->setResultType($_POST['result_type']);

            foreach ($elec as $key => $elecval) {
                $s_id = $_POST['s_id'];
                $d_id = $_POST['d_id'];
                $result_level = $_POST['result_level'];
                $addeObj->setPostId($post_id[$key]);
                $addeObj->setId($elecval);
                $addeObj->setPartyId($parties[$key]);
                $addeObj->setVotes($votes[$key]);
                $addeObj->setPrecen($precen[$key]);
                $date = date('Y-m-d H:i:s');
                $addeObj->setDId($d_id);
                $addeObj->setSId($s_id);
                $addeObj->setResultLevel($result_level);
                $addeObj->setDate($date);
                $addeObj->setValidVotes($_POST['valid_votes']);
                $addeObj->setRejectedVotes($_POST['rejected_votes']);
                $addeObj->setTotalPolled($_POST['total_polled']);
                $addeObj->setRegisteredVotes($_POST['registered_votes']);
                if ($addeObj->updateNewResult()) {
                    $msg1 = 1;
                }
            }
            if ($msg1 == 1) {
                echo('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Success!</strong>Results are updated..</div>');
            }
        } catch (Exception $ex) {
            echo('<div class="alert alert-danger  alert-error">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Error!</strong>' . $ex->getMessage() . '
                    </div>');
        }
    }
    /*Seat Wise End*/
}
