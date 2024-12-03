<?php
session_start();

require 'FULLrequireDB.php';

if(!isset($_SESSION['userID'])){
    header("Location: FULLlogin.php");
}

$besteldate = $_POST['besteldatum'];
$leverdate = $_POST['leverdatum'];
$locatie = $_POST['Selectlocatie'];
$afgeleverd = $_POST['afgeleverd'];

if (!empty($besteldate) && !empty($leverdate) && !empty($locatie) && !empty($afgeleverd)){
    //Voorbereid de query voor het invoegen van de nieuwe bestellingen
    $stmt = $conn->prepare("INSERT INTO bestellingen (besteldate, leverdate, locatie_idlocatie, afgeleverd) 
    VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $besteldate, $leverdate, $locatie, $afgeleverd);
    // Voer de query uit
    $stmt->execute();
    $stmt->close();
    
    header("Location: FULLbestel.php");
    }else{
    header("Location: FULLbestel.php");
    }
?>