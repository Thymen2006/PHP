<?php 
session_start();

require 'FULLrequireDB.php';

if(!isset($_SESSION['userID'])){
    header("Location: FULLlogin.php");
}
if($_SESSION['userID'] === 1){
    header("Location: FULLadmin.php");
}
?>
<html>
<head>
    <title>FULLstack instellingen</title>
    <link href="FULLinstellingen.css" rel="stylesheet">

    <!-- voor het laten zien van de users -->
    <script>
        function SHOWusers(str = '') {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("SHOWusers").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "FULLread.php" + str, true);
            xmlhttp.send();
        }


        //voor het verwijderen van users
        function AjaxDelete(){
            var form = document.getElementById('deleteForm');
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'FULLdelete.php', true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Only call SHOWusers() after a successful response
                    SHOWusers();
                }
            };

            xhr.send(formData);
        }


        //voor het updaten van user info
        function AjaxUpdate() {
            var form = document.getElementById('UpdateUser');
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'FULLupdate.php', true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Only call SHOWusers() after a successful response
                    SHOWusers();
                }
            };

            xhr.send(formData);
        }


        //voor het veranderen van je wachtwoord
        function AjaxUpdateWW(){
            var form = document.getElementById('UpdateWWform');
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'FULLupdateWW.php', true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Only call SHOWusers() after a successful response
                    SHOWusers();
                    console.log("wachtwoord veranderd");
                }
            };

            xhr.send(formData);
        }
    </script>

</head>
<body onload="SHOWusers()">
    <div class="grid-container">
        <div class="grid-item1">WAAROM BEN JE HIER!!!!</div>

        <div class="grid-item2">
            <form action="FULLuitlog.php" method="POST">
                <input type="submit" name="uitloggen" id="uitlogbutton" value="uitloggen" />
            </form>
        </div>
        <div class="grid-item3">
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

        <div id="SHOWusers">
            <!-- Content will be loaded here by AJAX -->
        </div>

        <div id="DeleteUser">
            <form id="deleteForm" action="FULLuitlog.php" method="POST">
                <fieldset id="feld">
                <p id="PDelete">Users Deleten</p>
                    <!-- <label for="UserID">Select ID:</label>
                    <input type="text" name="UserID" required><br> -->

                    <input id="DeleteButton" type="submit" value="Delete User" name="uitloggen" onclick="AjaxDelete()">
                </fieldset>
            </form>
        </div>

        <div id="UpdateUserInfo">
            <form id="UpdateUser" method="POST">
                <fieldset id="UpdateFeld">
                <p id="PUpdate">Users Updaten</p>
                    <!-- <label for="UpdateUserID">Select UserID: </label>
                    <input type="text" name="UpdateUserID" required><br><br> -->

                    <label for="UpdateInfo">Update Info:   </label>
                    <input type="text" name="UpdateInfo" required><br>

                    <label for="SelectUser"></label>
                    <select name="SelectUser" id="SelectToUpdate">
                        <option value="">Select info to update:</option>
                        <option value="username">username</option>
                        <option value="email">E-mail</option>
                        <option value="Age">geboortedatum</option>
                        <option value="geslacht">geslacht</option>
                        <option value="adres">adres</option>
                    </select>

                    <input id="UpdateButton" type="submit" value="Update User Info" onclick="AjaxUpdate()">
                </fieldset>
            </form>
        </div>

        <div id="UpdatePasswoord">
            <form id="UpdateWWform" method="POST">
                <fieldset id="UpdateWWfeld">
                <p id="WWUpdate">wachtwoord veranderen<p>
                    <!-- <label for="UpdateUserWW">Select UserID: </label>
                    <input type="text" name="UpdateUserWW" required><br><br> -->

                    <label for="newWW">nieuw wachtwoord: </label>
                    <input type="text" name="newWW" require><br>

                    <input id="UpdateWWbutton" type="submit" value="Update wachtwoord" onclick="AjaxUpdateWW()">
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>