<?php
session_start();

require 'FULLrequireDB.php';

if(!isset($_SESSION['userID'])){
    header("Location: FULLlogin.php");
}
?>
<html>
    <head>
    <link href="FULLhomePAGE.css" rel="stylesheet">
    </head>
    <body>
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
        <iframe width="560" height="315" src="https://www.youtube.com/embed/56lkofpjOAs?si=pFEnL3HjSF8jNzgL&autoplay=1&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/_yEinJkBgr0?si=iYVhVyIR3_1Miq9u" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/wf-aMZmDCvA?si=IHuMne7TG450THaO" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/9sw3fjLvNiU?si=ud4JqrkJ8Ij9q1C0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
</div>
    </body>
</html>