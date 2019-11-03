<?php
include_once 'Model/dbConfig.php';
$xml = simplexml_load_file('dataXml/LAnew.xml') or die("Error: Cannot create object");
foreach ($xml->district as $dis) {
    foreach ($dis->la as $la) {
        $d_id = (int)$dis->districtId;
        $d_name = (string)$dis->districtName;
        $l_id = (int)$la->laId;
        $l_name = (string)$la->laName;
        $sql = "INSERT INTO la(d_id, l_id, d_name,l_name)VALUES ('$d_id', '$l_id', '$d_name','$l_name')";
        $result = mysql_query($sql);
        if (!$result) {
            echo 'MySQL ERROR';
        } else {
            echo 'SUCCESS';
        }
    }
}
?>
