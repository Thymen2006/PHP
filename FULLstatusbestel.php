<?php
session_start();

require 'FULLrequireDB.php';

if(!isset($_SESSION['userID'])){
    header("Location: FULLlogin.php");
}

$statusbestelID = $_POST['statusbestelID'];
$status = $_POST['status'];

$stmt = $conn->prepare("UPDATE bestellingen SET afgeleverd = ? WHERE idbestellingen = ?;");
$stmt->bind_param("si",$status, $statusbestelID);
$stmt->execute();
$stmt->close();

header("Location: FULLbestel.php");
?>