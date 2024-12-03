<?php
session_start();

require 'FULLrequireDB.php';

if(!isset($_SESSION['userID'])){
    header("Location: FULLlogin.php");
}

$bestelID = $_POST['selectbestelID'];
$productID = $_POST['bestelproductID'];
$bestelaantal = $_POST['bestelaantal'];

if(!empty($bestelID) && !empty($productID)){
    //Voorbereid de query voor het invoegen van de nieuwe productem in de bestelling
    $stmt = $conn->prepare("INSERT INTO bestellingen_has_product (bestellingen_idbestellingen, product_idproduct, aantal_besteld) VALUES (?,?,?)");
    $stmt->bind_param("iii",$bestelID, $productID, $bestelaantal);
    // Voer de query uit
    $stmt->execute();
    $stmt->close();

    header("Location: FULLbestel.php");
}else{
    header("Location: FULLbestel.php");
}
?>