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
            SHOWvoorraad()
            showTotaalWaarde()
        }


         function SHOWvoorraad(location = '', product = '') {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("SHOWvoorraad").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("POST", "FULLSHOWvoorraad.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("kieslocatie=" + location + "&vindProduct=" + product);
        }

        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("locatiebutton").addEventListener("click", function(event) {
                event.preventDefault();
                var location = document.getElementById("locatie").value;
                var product = document.querySelector('input[name="vindProduct"]').value;
                SHOWvoorraad(location, product);
            });

            SHOWvoorraad();
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
        <div class="grid-item5" id="showTotaalWaarde">
                <!-- hier word de totaalde inkoop en verkoop waarde weergegeven -->
            </div>
        <div class="grid-item3">
        <form id="addForm" action="FULLaddproduct.php" method="POST">
                <h1>producten toevoegen</h1>
                <fieldset>

                    <label for="productnaam">productnaam: </label>
                    <input class="addForm" type="text" name="productnaam" max="45" required><br>

                    <label for="fabriek">fabriek: </label>
                    <input class="addForm" type="text" name="fabriek" max="45" required><br>

                    <label for="productType">product Type: </label>
                    <input class="addForm" type="text" name="productType" max="45" required><br>

                    <label for="inkoopprijs">inkoop prijs: </label>
                    <input class="addForm" type="number" name="inkoopprijs" min="1" max="1000000000" step="any" required><br>

                    <label for="verkoopprijs">verkoop prijs: </label>
                    <input class="addForm" type="number" name="verkoopprijs" min="1" max="1000000000" step="any" required><br>

                    <input id="addVoorraad" type="submit" value="voeg product toe">
                </fieldset>
        </form>
        <form id="DeleteFormP" action="FULLproductDelete.php" method="POST">
            <h1>Producten Deleten</h1>
        <fieldset>
                    <label for="productID">Select ID:</label>
                    <input class="addForm" type="number" name="productID" max="1000000000" required><br>

                    <input id="DeleteButton" type="submit" value="Delete Product">
                </fieldset>
        </form>
        <form id="AantalForm" action="FULLaantalProduct.php" method="POST">
            <h1>Producten Aantal toevoegen</h1>
        <fieldset>
        <label for="productID">Select product ID:</label>
                    <input class="addForm" type="number" name="productID" max="1000000000" required><br>
        <label for="locatie">Locatie:</label>
                    <select class="addForm" name="Selectlocatie" id="Selectlocatie" required>
                        <option value="">Select een Stad:</option>
                        <option value="1">Almere</option>
                        <option value="2">Rotterdam</option>
                        <option value="3">Eindhoven</option>
                    </select><br><br>
                    <label for="aantal">Product Aantal:</label>
                    <input class="addForm" type="number" name="aantal" max="1000000000" required><br>

                    <input id="aantalButton" type="submit" value="voeg aantal toe">
                </fieldset>
        </form>
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

                    <input id="locatiebutton" type="submit" value="Select" onclick="SHOWvoorraad()">
            </form>
        </div>
</div>
    </body>
</html>