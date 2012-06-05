<?php
/* recuration data coté serveur */
if(isset($_GET['type'])){ // 0=boisson 1=entree 2=plat
    $type = $_GET['type'];
    $col=array();
    if($type==2){
        $plat->id=45;
        $plat->name = "steack frites";
        $plat->description = "le super steak frites !!";
        $plat->prix = 10;
        $col[0] = $plat;
        $plat = null;
        $plat->id=85;
        $plat->name = "poisson panne";
        $plat->description = "le poisson panne !!";
        $plat->prix = 15;
        $col[1] = $plat;
    }
    if($type==0){
        $plat->id=20;
        $plat->name = "coca cola";
        $plat->description = "coca cola !";
        $plat->prix = 5;
        $col[0] = $plat;
    }
    if($type==1){
        $plat->id=5;
        $plat->name = "salade composé";
        $plat->description = "salade composé !!";
        $plat->prix = 10;
        $col[0] = $plat;
    }
    header('Content-type: application/json');
    print json_encode($col);
    exit;
}
?>