<?php 
session_start();

require 'FULLrequireDB.php';

    $ID = $conn->real_escape_string($_POST['productID']);
    $locatie = $conn->real_escape_string($_POST['SelectDeletelocatie']);

if($locatie == 1||2||3){
    // eerst moet de id uit de voorraad_has_product verwijderd worden voor het uit product zelf vewrwijderd kan worden
    $sqlDeleteRelated = "DELETE FROM voorraad_has_product WHERE product_idproduct=? AND locatie_idlocatie=?";
    $stmt = $conn->prepare($sqlDeleteRelated);
    $stmt->bind_param("ii", $ID, $locatie);
    $stmt->execute();
    $stmt->close();
    //mysqli_query($conn, $sqlDeleteRelated);
}
if($locatie == 0){
    // eerst moet de id uit de voorraad_has_product verwijderd worden voor het uit product zelf vewrwijderd kan worden
    $sqlDeleteRelated = "DELETE FROM voorraad_has_product WHERE product_idproduct=$ID";
    mysqli_query($conn, $sqlDeleteRelated);

    // verwijderd het product uit de table product
    $sqlDelete = "DELETE FROM product WHERE idproduct=?";
    $stmt = $conn->prepare($sqlDelete);
    $stmt->bind_param("i", $ID);
    $stmt->execute();
    $stmt->close();
    //mysqli_query($conn, $sqlDelete);
}

// Close the connection
$conn->close();
header("Location: FULLvoorraad.php");
?>