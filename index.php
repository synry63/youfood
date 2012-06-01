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

print'<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>';
print'<script src="js/initXHR.js"></script>';

/* requete ajax + traitement des données */
print'<script>
    tab = new Array();
    function test(object){
        var value = object.attributes[1].value;
        var id=object.attributes[2].value;
        var test = tab[id];
        if(!test){
            tab[id] = new Array(value,1);
            $(".recap").after("<p>"+tab[id][0]+"<span id=\""+id+"\">"+tab[id][1]+"</span></p>");
           // $("#quantite").append(tab[id][1]);
        }
        else{
            tab[id][1] = tab[id][1]+1;
            test = $("#"+id).text();
            $("#"+id).text(tab[id][1]);
            
        }
    }
    
    function requestfood(type) {
            var xhr = getXMLHttpRequest();

            xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
                            var doc = eval("(" + xhr.responseText + ")");
                            $(".choix span").html("");
                            for(var i= 0; i<doc.length; i++){
                                object = doc[i];
                                var id = doc[i].id;
                                var name = doc[i].name;
                                $(".choix span").append(
                              //  "<input onClick=\"test("+id+")\" type=\"button\" value=\""+doc[i].name+"\">");
                                "<input onClick=\"test(this)\" type=\"button\" class=\""+id+"\" value=\""+name+"\">");
                           
                            }
                            //var name = doc[0].name;
                            //id="789";
                            

                    }
            };

            xhr.open("GET", "index.php?type="+type, true);
            xhr.send(null);
    }
</script>';

/*print'<script>';
    print'$(document).ready(function() {';
        print'$(":button").click(function(){
            alert("bouton clicke"); 
            });';
   print'});';     
print'</script>';*/

/* View */
print'<div class="food">';
    print'<ul>';
        print'<li><a href="javascript:void(0);" onClick="requestfood(0);">Boisson</a></li>';
        print'<li><a href="javascript:void(0);" onClick="requestfood(1);">Entree</a></li>';
        print'<li><a href="javascript:void(0);" onClick="requestfood(2);">Plat Principal</a></li>';
   print'</ul>';
print'</div>';   

print'<div class="choix">';
    print '<span></span>';
print'</div>';

print'<div class="recap">';
print'</div>';


?>
