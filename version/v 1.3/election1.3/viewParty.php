<?php
$xml = simplexml_load_file('Party.xml') or die("Error: Cannot create object");
foreach ($xml->politicalParty as $pa) {
    echo $p_id = $pa->partyId.' ';
   echo  $p_name = $pa->partyName.'<br>';


}
?>