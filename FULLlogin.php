<?php
session_start();

if(session_status() == isset($_SESSION['userID'])){
    header("Location: FULLhomePAGE.php");
}
?>
<html>
    <body>
        <head>
            <title>fullstack login</title>
            <link href="FULLlogin.css" rel="stylesheet">
        </head>
        <body>
            <div>
            <form action="FULLlogincheck.php" method="POST">
                <h1>login tools4ever</h1>
                <fieldset>
                    <label for="username">username: </label>
                    <input type="text" name="username" required><br>
    
                    <label for="password">passwoord: </label>
                    <input type="password" name="password" required><br>
    
                    <div class="in">
                      <input id="login" type="submit" value="login">
                    </div>
                </fieldset>
            </form>
            </div>

            <div>
                <form action="FULLregister.php" method="POST">
                    <h1>account aanmaken</h1>
                    <fieldset>
                        <label for="naam">naam:</label>
                        <input type="text" name="naam" maxlength="50" required><br>

                        <label for="e-mail">E-mail: </label>
                        <input type="email" name="e-mail" maxlength="255" required><br>

                        <label for="wachtwoord">wachtwoord: </label>
                        <input type="password" name="wachtwoord" maxlength="255" required><br>

                        <label for="leeftijd">leeftijd: </label>
                        <input type="date" name="leeftijd" required><br>

                        <label for="geslacht">geslacht: </label>
                        <input type="text" name="geslacht" maxlength="15" required><br>

                        <label for="adres">adres: </label>
                        <input type="text" name="adres" maxlength="255" required><br>
        
                        <div class="in">
                        <input id="aanmeld" type="submit" value="aanmelden">
                        </div>
                    </fieldset>
                </form>
            </div>
    </body>
</html>
