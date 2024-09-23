<?php
session_start();

require 'FULLrequireDB.php';

if(!isset($_SESSION['userID'])){
    header("Location: FULLlogin.php");
}
?>
<html>
    <head>
    <link href="FULLvoorraad.css" rel="stylesheet">
    <script>
        function loadAll(){
            SHOWvoorraadwaarde()
            showTotaalWaarde()
        }


        function SHOWvoorraadwaarde(location = '', product = '') {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("SHOWvoorraad").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("POST", "FULLSHOWvoorraadwaarde.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("kieslocatie=" + location + "&vindProduct=" + product);
        }

        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("locatiebutton").addEventListener("click", function(event) {
                event.preventDefault();
                var location = document.getElementById("locatie").value;
                var product = document.querySelector('input[name="vindProduct"]').value;
                SHOWvoorraadwaarde(location, product);
            });

            SHOWvoorraadwaarde();
        });

        function showTotaalWaarde(){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("showTotaalWaarde").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "FULLSHOWtotaalwaarde.php", true);
            xmlhttp.send();
        };
    </script>
    </head>
    <body onload="loadAll()">
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
        <div id="SHOWvoorraad"> 
            <!-- Content will be loaded here by AJAX -->
        </div>
        <div class="grid-item6" id="showTotaalWaarde">
                <!-- hier word de totaalde inkoop en verkoop waarde weergegeven -->
            </div>
        <div class="grid-item3">
        </div>
        <div class="grid-item4">
            <form method='POST'>
                    <label for="kieslocatie"></label>
                    <select class="addForm" name="kieslocatie" id="locatie" required>
                        <option value="">Select een Stad:</option>
                        <option value="1">Almere</option>
                        <option value="2">Rotterdam</option>
                        <option value="3">Eindhoven</option>
                    </select><br><br>

                    <fieldset id="vindProduct">
                    <label for="vindProduct">vind product naam</label>
                    <input class="addForm" type="text" name="vindProduct">
    </fieldset><br>

                    <input id="locatiebutton" type="submit" value="kies locatie" onclick="SHOWvoorraadwaarde()">
            </form>
        </div>
</div>
    </body>
</html>