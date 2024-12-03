<?php
session_start();

require 'FULLrequireDB.php';

if(!isset($_SESSION['userID'])){
    header("Location: FULLlogin.php");
}
?>
<html>
    <head>
    <link href="FULLbestel.css" rel="stylesheet">

    <script>
        function SHOWbestelLijst() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("SHOWbestel").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "FULLSHOWbestel.php", true);
            xmlhttp.send();
        }
    </script>
    </head>
    <body onload="SHOWbestelLijst()">
    <div class="grid-container">
    <div class="grid-item1">
    <nav>
            <select id="navbar" onchange="location = this.value;">
            <option value="">navigatie</option>
            <option value="FULLhomePAGE.php" id="HOMElink">HOME</option>
            <option value="FULLinstelingen.php" id="INSTELlink">instellingen</option>
            <option value="FULLvoorraad.php" id="VOORRAADlink">voorraad</option>
            <option value="FULLwaarde.php" id="WAARDElink">waarde voorraad</option>
            <option value="FULLbestel.php" id="BESTELlink">bestellingen</option>
</select>
        </nav>
    </div>
    <div class="grid-item2">
    <form action="FULLuitlog.php" method="POST">
                <input type="submit" name="uitloggen" id="uitlogbutton" value="uitloggen" />
            </form>
        </div>
    <div class="grid-item3">
        <form action="FULLaddbestel.php" method="POST" id="bestelform">
        <h1 class="h1text">producten bestellen</h1>
            <fieldset>
            <label for="besteldatum">datum besteld:</label>
            <input class="bestelform" type="date" name="besteldatum" required><br>
            <label for="leverdatum">datum levering:</label>
            <input class="bestelform" type="date" name="leverdatum" required><br>
            <label for="Selectlocatie">Locatie:</label>
                    <select class="bestelForm" name="Selectlocatie" id="Selectlocatie" required>
                        <option value="">Select een Stad:</option>
                        <option value="1">Almere</option>
                        <option value="2">Rotterdam</option>
                        <option value="3">Eindhoven</option>
                    </select><br>                    
                <label for="afgeleverd">afgeleverd:</label>
                <select class="bestelForm" name="afgeleverd" id="afgeleverd" required>
                    <option value="">Select</option>
                    <option value="ja">ja</option>
                    <option value="nee">nee</option>
                </select><br><br>

            <input id="addbestel" type="submit" value="plaats besteling">
</fieldset>
        </form>

        <form id="bestelProductForm" action="FULLaddproductbestel.php" method="POST">
        <h1 class="h1text">voeg product toe aan bestelling</h1>
            <fieldset>
            <label for="selectbestelID">Select bestelling ID:</label>
                    <input class="bestelForm" type="number" name="selectbestelID" max="1000000000" required><br>
                <label for="bestelproductID">Select product ID:</label>
                    <input class="bestelForm" type="number" name="bestelproductID" max="1000000000" required><br>
                <label for="bestelaantal">aantal te bestellen</label>
                    <input class="bestelForm" type="number" name="bestelaantal" max="1000000000" required><br>
                    <input id="addProduct" type="submit" value="voeg product toe">
            </fieldset>
        </form>

        <form id="statusForm" action="FULLstatusbestel.php" method="POST">
            <h1 class="h1text">wijzig bestelling status</h1>
        <fieldset>
        <label for="statusbestelID">Select bestelling ID:</label>
                    <input class="bestelForm" type="number" name="statusbestelID" max="1000000000" required><br>
        <label for="status">status:</label>
                    <select class="bestelForm" name="status" id="statusbestel" required>
                        <option value="">Select:</option>
                        <option value="nee">nee</option>
                        <option value="ja (voegtoe aan voorraad)">ja (voegtoe aan voorraad)</option>
                        <option value="ja">ja</option>
                    </select><br><br>

                    <input id="statusButton" type="submit" value="wijzig status">
                </fieldset>
        </form>

        <form id="afleverform" action="FULLaflever.php" method="POST">
            <h1 class="h1text">bestellingen afronden</h1>
        <fieldset>
                    <label for="bestelID">Select ID:</label>
                    <input class="bestelForm" type="number" name="bestelID" max="1000000000" required><br>
                    <label for="ISafgeleverd">is het afgeleverd:</label>
                <select class="bestelForm" name="ISafgeleverd" id="ISafgeleverd" required>
                    <option value="">Select</option>
                    <option value="ja">ja</option>
                    <option value="nee">nee</option>
                </select><br>
                <label for="toegevoegd">toegevoegd aan voorraad:</label>
                <select class="bestelForm" name="toegevoegd" id="toegevoegd" required>
                    <option value="">Select</option>
                    <option value="ja">ja</option>
                    <option value="nee">nee</option>
                </select><br><br>

                    <input id="afrondbutton" type="submit" value="bestelling afronden">
                </fieldset>
        </form>
</div>
<div id="SHOWbestel">
    <!-- laat de bestellingen hier zien  -->
</div>
</div>
    </body>
</html>