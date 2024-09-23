<?php
session_start();

require 'FULLrequireDB.php';

$Paantal = $_POST['aantal'];
$select = $_POST['Selectlocatie'];
$productID = $_POST['productID'];

// 'SELECT * FROM product 
// left join voorraad_has_product on product.idproduct = voorraad_has_product.product_idproduct
// WHERE voorraad_has_product.product_aantal = "";'

if (!empty($Paantal) || !empty($select) || !empty($productID)){
    //Voorbereid de query voor het invoegen van de nieuwe voorraad
    $stmt = $conn->prepare("INSERT INTO voorraad_has_product (product_idproduct, product_aantal, locatie_idlocatie) VALUES (?,?,?) 
    ON DUPLICATE KEY UPDATE product_aantal = product_aantal + VALUES(product_aantal)");
    $stmt->bind_param("iis",$productID, $Paantal, $select);
    // Voer de query uit
    $stmt->execute();
    $stmt->close();
    
    header("Location: FULLvoorraad.php");
    }else{
    header("Location: FULLvoorraad.php");
    }
?>