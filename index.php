<?php include_once ('data.php'); ?>
<?php include_once ('header.php'); ?>

<div class="container">

    <div class="row" style="margin-top:15px;margin-bottom:15px;">
        <div class="span3" >
            <h2 style="text-align: center;">Menus</h2>
        </div>
        <div class="span6">
            <h2 style="text-align: center;">Plats</h2>
        </div>
        <div class="span3">
            <h2 style="text-align: center;">Commande</h2>
        </div>
    </div>
    <div class="row">
        <div class="span3" style="background-color: rgb(235,235,235);height:300px;padding-top:15px;padding-bottom:15px;border-radius: 10px;box-shadow: 3px 5px 5px grey;">
            <div class="food">
                <ul style="list-style-type:none;">
                    <li style="margin:5px;"><a href="javascript:void(0);" onClick="requestfood(0);">Boisson</a></li>
                    <li style="margin:5px;"><a href="javascript:void(0);" onClick="requestfood(1);">Entree</a></li>
                    <li style="margin:5px;"><a href="javascript:void(0);" onClick="requestfood(2);">Plat Principal</a></li>
                </ul>
            </div>
        </div>
        <div class="span6" style="background-color: rgb(235,235,235);height:300px;padding-top:15px;padding-bottom:15px;border-radius: 10px;box-shadow: 3px 5px 5px grey;">
            <div class="choix">
                <span style="margin:25px;"></span>
            </div>
        </div>
        <div class="span3" style="background-color: rgb(235,235,235);height:300px;padding-top:15px;padding-bottom:15px;border-radius: 10px;box-shadow: 3px 5px 5px grey;">
            <div class="recap" style="margin-top:5px;margin-bottom:5px;" >
                <p id="total"></p>
            </div>
        </div>
    </div>
</div>

<?php include('script.php'); ?>
<?php include('footer.php'); ?>