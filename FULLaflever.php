<?php
session_start();

require 'FULLrequireDB.php';

if(!isset($_SESSION['userID'])){
    header("Location: FULLlogin.php");
}

$bestelID = $_POST['bestelID'];
$ISafgeleverd = $_POST['ISafgeleverd'];
$toegevoegd = $_POST['toegevoegd'];

if(!empty($bestelID) && $ISafgeleverd == 'ja' && $toegevoegd == 'ja'){
    // verwijderd de bestelling omdat het afgerond is
    $sql = "DELETE FROM bestellingen WHERE idbestellingen=$bestelID;";
    mysqli_query($conn, $sql);
    header("Location: FULLbestel.php");
}else{
    header("Location: FULLbestel.php");
}
?>