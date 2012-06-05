<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="js/initXHR.js"></script>

<script>
    tab = new Array();
    function test(object){
        var value = $(object).attr("value");
        var id=$(object).attr("num");
        var prix= parseInt($(object).attr("prix"));
         /*var obj = {};
         obj.foo = 1;
         obj.bar = "hello";*/
        var test = tab[id];
        if(!test){
            tab[id] = new Array(value,1,prix);
            $(".recap").after(
            "<p id=\""+id+"\" style=\"margin-left:25px;\"><span class=\"quantite\">"+tab[id][1]+"</span>"
            +"x"+tab[id][0]+" <span class=\"prix\">"+tab[id][2]+"&euro;</span><a href='javascript:void(0);' onClick='deletefood("+id+")';> X </a></p>");
           // $("#quantite").append(tab[id][1]);
        }
        else{
            tab[id][1] = tab[id][1]+1; //quantité
            tab[id][2] = tab[id][2]+prix; //prix utitaire
            var t= $("p#"+id+" .quantite").text("");
            var tt = $("p#"+id+" .prix").text("");
            $("p#"+id+" .quantite").text(tab[id][1]);
            $("p#"+id+" .prix").html(tab[id][2]+" &euro;");
            
        }
        refreshtotal();
    }
    function refreshtotal(){
        var cumul=0;
        for(var key in tab){
            if(tab[key]!=null)
                cumul = tab[key][2]+cumul;
        }
        $("#total").html("<strong>Montant Total : "+cumul+" &euro;</strong>");
    }
    function deletefood(id){
        tab[id]=null;
        $("p#"+id).remove();
        refreshtotal();
        
    }
    
    function requestfood(type){
            var xhr = getXMLHttpRequest();

            xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
                            var doc = eval("(" + xhr.responseText + ")");
                            $(".choix span").html("");
                            for(var i= 0; i<doc.length; i++){
                                var object = doc[i];
                                var id = doc[i].id;
                                var name = doc[i].name;
                                var prix = doc[i].prix;
                                $(".choix span").append(
                                "<input style=\"margin:5px;\" onClick=\"test(this)\"  type=\"button\" prix=\""+prix+"\" num=\""+id+"\" value=\""+name+"\">");                                
                        }                            
                    }
            };

            xhr.open("GET", "index.php?type="+type, true);
            xhr.send(null);
    }
</script>
