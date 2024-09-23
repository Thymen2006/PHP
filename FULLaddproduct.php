<?php
session_start();

require 'FULLrequireDB.php';

$productnaam = $_POST['productnaam'];
$fabriek = $_POST['fabriek'];
$productType = $_POST['productType'];
$inkoopPrijs = $_POST['inkoopprijs'];
$verkoopPrijs = $_POST['verkoopprijs'];

if (!empty($productnaam) && !empty($fabriek) && !empty($productType) && !empty($inkoopPrijs) && !empty($verkoopPrijs)){
//Voorbereid de query voor het invoegen van de nieuwe voorraad
$stmt = $conn->prepare("INSERT INTO product (productnaam, fabriek, productType, inkoop_prijs, verkoop_prijs) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssdd", $productnaam, $fabriek, $productType, $inkoopPrijs, $verkoopPrijs);
// Voer de query uit
$stmt->execute();
$stmt->close();

header("Location: FULLvoorraad.php");
}else{
header("Location: FULLvoorraad.php");
}
?>