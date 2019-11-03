<?php

include_once '../Model/loginClass.php';
include_once '../Model/dbConfig.php';
// username and password sent from form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (trim($_POST['u_name']) == null || trim($_POST['p_word']) == null) {

        if (trim($_POST['u_name']) == null) {
            echo('<div class="alert alert-danger  alert-error">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Error!</strong> Please enter Username.
                    </div>');
        } else {
            echo('<div class="alert alert-danger  alert-error">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Error!</strong> Please enter Password .
                    </div>');
        }
    } else {
        $mylogObj = new loginClass();
        // To protect MySQL injection
        $user_name = stripslashes($_POST['u_name']);
        $user_pword = stripslashes($_POST['p_word']);
        $user_email = mysql_real_escape_string($user_name);
        $user_pword = mysql_real_escape_string($user_pword);

        $mylogObj->setUName($user_email);
        $mylogObj->setPWord($user_pword);
        try {
            if ($mylogObj->checkCredintial()){
                unset($_POST['u_name']);
                unset($_POST['u_pword']);
                    ?>
                    <script type="text/javascript">
                        window.location.replace("home.php");
                    </script>
                <?php
            } else {
                echo('<div class="alert alert-danger  alert-error">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Error!</strong> An error occurred, please try again .
                    </div>');
            }
        } catch (Exception $ex) {
            echo('<div class="alert alert-danger  alert-error">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Error!</strong>' . $ex->getMessage() . '
                    </div>');
        }
    }//end else
}

