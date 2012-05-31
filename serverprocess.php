<?php
$plat->prix=80;
$plat->quantite=1;
header('Content-type: application/json');
print json_encode($plat); 
?>
