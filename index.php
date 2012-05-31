<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="js/initXHR.js"></script>

<script>
function request() {
	var xhr = getXMLHttpRequest();
	
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			  var doc = eval('(' + xhr.responseText + ')'); 
                          var prix = doc.prix;
                          $('span').html(prix +"&euro;");                        
                          //var test = $("p").html();
                          
		}
	};
	
	xhr.open("GET", "serverprocess.php", true);
	xhr.send(null);
}
</script>
<?php
print '<script>';
    
print '</script>';

print 'hello world !';

print '<input type="button" onClick="request();" value="steak frite"> ';

print 'Quantite : 0';

print '<p>Montant : <span></span></p>';
?>
