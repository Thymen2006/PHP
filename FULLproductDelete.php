<?php 
session_start();

require 'FULLrequireDB.php';

    $ID = $conn->real_escape_string($_POST['productID']);

    // eerst moet de id uit de voorraad_has_product verwijderd worden voor het uit product zelf vewrwijderd kan worden
    $sqlDeleteRelated = "DELETE FROM voorraad_has_product WHERE product_idproduct=$ID";
    mysqli_query($conn, $sqlDeleteRelated);

    // verwijderd het product uit de table product
    $sqlDelete = "DELETE FROM product WHERE idproduct=$ID";
    mysqli_query($conn, $sqlDelete);


// Close the connection
$conn->close();
header("Location: FULLvoorraad.php");
?>