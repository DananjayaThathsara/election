<?php
include_once 'Model/dbConfig.php';
$xml = simplexml_load_file('district.xml') or die("Error: Cannot create object");
foreach ($xml->district as $dis) {
    $d_id = (int)$dis->dsId;
    $d_name = (string)$dis->dsName;
    $sql = "INSERT INTO dis(d_id,d_name)VALUES ('$d_id','$d_name')";
    $result = mysql_query($sql);
    if (!$result) {
        echo 'MySQL ERROR';
    } else {
        echo 'SUCCESS';
    }
}
?>
