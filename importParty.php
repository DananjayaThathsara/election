<?php
include_once 'Model/dbConfig.php';
$xml = simplexml_load_file('dataXml/Party.xml') or die("Error: Cannot create object");
foreach ($xml->politicalParty as $pa) {
    $p_id = $pa->partyId;
    $p_name = $pa->partyName;
    $p_name_short = $pa->partyNameShort;
    $p_image_name = $pa->partyImageName;
    $sql = "INSERT INTO party(p_id,p_name,p_name_short,p_image_name)VALUES ('$p_id', '$p_name', '$p_name_short','$p_image_name')";
    $result = mysql_query($sql);
    if (!$result) {
        echo 'MySQL ERROR';
    } else {
        echo 'SUCCESS';
    }
}
?>
