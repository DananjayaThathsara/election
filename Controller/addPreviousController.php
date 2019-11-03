<?php
error_reporting(1);
include_once '../Model/dbConfig.php';
include_once '../Model/addPreviousClass.php';
include_once '../Model/fileUploadClass.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    /*Seat Wise Start*/
    if (isset($_POST['seat_wise'])) {

        $addeObj = new addPreviousClass();
        if (isset($_POST['action']) && $_POST['action'] == 'add') {

            try {
                $s_id = $_POST['s_id'];
                $d_id = $_POST['d_id'];
                $mr_votes = $_POST['mr_votes'];
                $ms_votes = $_POST['ms_votes'];
                $mr_precen = trim($_POST['mr_precen'], '%');
                $ms_precen = trim($_POST['ms_precen'], '%');
                $valid_votes = $_POST['valid_votes'];
                $rejected_votes = $_POST['rejected_votes'];
                $total_polled = $_POST['total_polled'];
                $registered_votes = $_POST['registered_votes'];

                $addeObj->setDId($d_id);
                $addeObj->setSId($s_id);
                $addeObj->setMrVotes($mr_votes);
                $addeObj->setMsVotes($ms_votes);
                $addeObj->setMrPrecen($mr_precen);
                $addeObj->setMsPrecen($ms_precen);
                $addeObj->setValidVotes($valid_votes);
                $addeObj->setRejectedVotes($rejected_votes);
                $addeObj->setTotalPolled($total_polled);
                $addeObj->setRegisteredVotes($registered_votes);

                if ($addeObj->addResultsSeat()) {
                    echo('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Success!</strong>Polling division wise result details are added..</div>');
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
                $s_id = $_POST['s_id'];
                $d_id = $_POST['d_id'];
                $mr_votes = $_POST['mr_votes'];
                $ms_votes = $_POST['ms_votes'];
                $mr_precen = $_POST['mr_precen'];
                $ms_precen = $_POST['ms_precen'];
                $valid_votes = $_POST['valid_votes'];
                $rejected_votes = $_POST['rejected_votes'];
                $total_polled = $_POST['total_polled'];
                $registered_votes = $_POST['registered_votes'];

                $addeObj->setDId($d_id);
                $addeObj->setSId($s_id);
                $addeObj->setMrVotes($mr_votes);
                $addeObj->setMsVotes($ms_votes);
                $addeObj->setMrPrecen($mr_precen);
                $addeObj->setMsPrecen($ms_precen);
                $addeObj->setValidVotes($valid_votes);
                $addeObj->setRejectedVotes($rejected_votes);
                $addeObj->setTotalPolled($total_polled);
                $addeObj->setRegisteredVotes($registered_votes);

                if ($addeObj->addResultsSeatUpdate()) {
                    echo('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Success!</strong>Polling division wise result details are updated..</div>');
                }

            } catch (Exception $ex) {
                echo('<div class="alert alert-danger  alert-error">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Error!</strong>' . $ex->getMessage() . '
                    </div>');
            }
        }

    }
    /*Seat Wise End*/

    /*District Wise Start*/
    if (isset($_POST['dis_wise'])) {
        $addeObj = new addPreviousClass();
        if (isset($_POST['action']) && $_POST['action'] == 'add') {
            try {

                $d_id = $_POST['d_id'];
                $mr_votes = $_POST['mr_votes'];
                $ms_votes = $_POST['ms_votes'];
                $mr_precen = trim($_POST['mr_precen'], '%');
                $ms_precen = trim($_POST['ms_precen'], '%');
                $valid_votes = $_POST['valid_votes'];
                $rejected_votes = $_POST['rejected_votes'];
                $total_polled = $_POST['total_polled'];
                $registered_votes = $_POST['registered_votes'];

                $addeObj->setDId($d_id);

                $addeObj->setMrVotes($mr_votes);
                $addeObj->setMsVotes($ms_votes);
                $addeObj->setMrPrecen($mr_precen);
                $addeObj->setMsPrecen($ms_precen);
                $addeObj->setValidVotes($valid_votes);
                $addeObj->setRejectedVotes($rejected_votes);
                $addeObj->setTotalPolled($total_polled);
                $addeObj->setRegisteredVotes($registered_votes);

                if ($addeObj->addResultsDis()) {
                    echo('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Success!</strong>District wise result details are added..</div>');
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
                $d_id = $_POST['d_id'];
                $mr_votes = $_POST['mr_votes'];
                $ms_votes = $_POST['ms_votes'];
                $mr_precen = $_POST['mr_precen'];
                $ms_precen = $_POST['ms_precen'];
                $valid_votes = $_POST['valid_votes'];
                $rejected_votes = $_POST['rejected_votes'];
                $total_polled = $_POST['total_polled'];
                $registered_votes = $_POST['registered_votes'];

                $addeObj->setDId($d_id);
                $addeObj->setMrVotes($mr_votes);
                $addeObj->setMsVotes($ms_votes);
                $addeObj->setMrPrecen($mr_precen);
                $addeObj->setMsPrecen($ms_precen);
                $addeObj->setValidVotes($valid_votes);
                $addeObj->setRejectedVotes($rejected_votes);
                $addeObj->setTotalPolled($total_polled);
                $addeObj->setRegisteredVotes($registered_votes);

                if ($addeObj->addResultsDisUpdate()) {
                    echo('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Success!</strong>District wise result details are updated..</div>');
                }

            } catch (Exception $ex) {
                echo('<div class="alert alert-danger  alert-error">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Error!</strong>' . $ex->getMessage() . '
                    </div>');
            }
        }
    }
    /*District Wise End*/

    /*District Wise Postal Start*/
    if (isset($_POST['dis_wise_postal'])) {
        $addeObj = new addPreviousClass();
        if (isset($_POST['action']) && $_POST['action'] == 'add') {
            try {

                $d_id = $_POST['d_id'];
                $mr_votes = $_POST['mr_votes'];
                $ms_votes = $_POST['ms_votes'];
                $mr_precen = trim($_POST['mr_precen'], '%');
                $ms_precen = trim($_POST['ms_precen'], '%');
                $valid_votes = $_POST['valid_votes'];
                $rejected_votes = $_POST['rejected_votes'];
                $total_polled = $_POST['total_polled'];
                $registered_votes = $_POST['registered_votes'];

                $addeObj->setDId($d_id);

                $addeObj->setMrVotes($mr_votes);
                $addeObj->setMsVotes($ms_votes);
                $addeObj->setMrPrecen($mr_precen);
                $addeObj->setMsPrecen($ms_precen);
                $addeObj->setValidVotes($valid_votes);
                $addeObj->setRejectedVotes($rejected_votes);
                $addeObj->setTotalPolled($total_polled);
                $addeObj->setRegisteredVotes($registered_votes);

                if ($addeObj->addResultsDisPostal()) {
                    echo('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Success!</strong>District wise postal result details are added..</div>');
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
                $d_id = $_POST['d_id'];
                $mr_votes = $_POST['mr_votes'];
                $ms_votes = $_POST['ms_votes'];
                $mr_precen = $_POST['mr_precen'];
                $ms_precen = $_POST['ms_precen'];
                $valid_votes = $_POST['valid_votes'];
                $rejected_votes = $_POST['rejected_votes'];
                $total_polled = $_POST['total_polled'];
                $registered_votes = $_POST['registered_votes'];

                $addeObj->setDId($d_id);
                $addeObj->setMrVotes($mr_votes);
                $addeObj->setMsVotes($ms_votes);
                $addeObj->setMrPrecen($mr_precen);
                $addeObj->setMsPrecen($ms_precen);
                $addeObj->setValidVotes($valid_votes);
                $addeObj->setRejectedVotes($rejected_votes);
                $addeObj->setTotalPolled($total_polled);
                $addeObj->setRegisteredVotes($registered_votes);

                if ($addeObj->addResultsDisUpdatePostal()) {
                    echo('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Success!</strong>District wise postal result details are updated..</div>');
                }

            } catch (Exception $ex) {
                echo('<div class="alert alert-danger  alert-error">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Error!</strong>' . $ex->getMessage() . '
                    </div>');
            }
        }
    }
    /*District Wise Postal End*/
}
