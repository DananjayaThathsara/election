<?php
error_reporting(1);
include_once '../Model/dbConfig.php';
include_once('../Model/addFileClass.php');
include_once('../Model/fileUploadClass.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (trim($_POST['d_id']) == null || trim($_POST['l_id']) == null) {
        echo('<div class="alert alert-danger  alert-error">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Error!</strong> Please Enter Required Feilds.
                    </div>');
    } else {
        $addeObj = new addFileClass();
        $fileObj = new fileUploadClass();
        try {
            $l_id = $_POST['l_id'];
            $d_id = $_POST['d_id'];
            $date = date('Y-m-d h:i:s');
            $status = 'active';
            if ($_FILES['file_name']['name'] == null) {
                echo('<div class="alert alert-danger  alert-error">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Error!</strong> Please upload the xml file.
                    </div>');
            }else{
                $xml_format="'".$d_id.$l_id.'L'.'.xml'."'";
                $file_name="'".$_FILES['file_name']['name']."'";
                if(strcmp($xml_format,$file_name)!=0){
                    echo('<div class="alert alert-danger  alert-error">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Error!</strong>The xml file is not relevent to selected District and Local Authority.
                    </div>');
                }else{
                    $queryfile1 = "SELECT * FROM files WHERE d_id='$d_id' AND l_id='$l_id'";
                    $resultfile1 = mysql_query($queryfile1);
                    $countfile1 = mysql_num_rows($resultfile1);
                    if($countfile1 >= 1) {
                        echo('<div class="alert alert-danger  alert-error">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Error!</strong>Selected District and Local Authority alrady have a xml file.
                    </div>');
                    }else {
                        $uploaddir = 'Files/';
                        $fileObj->singleFileUpload($_FILES['file_name']['name'], $_FILES['file_name']['tmp_name'], $uploaddir);
                        $addeObj->setFileName($fileObj->getFilename());
                        $addeObj->setLId($l_id);
                        $addeObj->setDId($d_id);
                        $addeObj->setDate($date);
                        if ($addeObj->addFile()) {
                            echo('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a>  
<strong>Success!</strong>Result details are added..</div>');
                        }
                    }
                }

            }
        } catch (Exception $ex) {
            echo('<div class="alert alert-danger  alert-error">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Error!</strong>' . $ex->getMessage() . '
                    </div>');
        }
    }

}
?>
