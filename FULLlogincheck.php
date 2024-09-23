<?php
session_start();

require 'FULLrequireDB.php';

// Gebruikersinvoer (bijv. van een formulier)
$username = $_POST['username'];
$password = $_POST['password'];

if (empty($username) || empty($password)) {
    die("Gebruikersnaam en wachtwoord zijn verplicht.");
}

// Zoek de gebruiker in de database
$sql = "SELECT * FROM FULLusers WHERE username = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Voorbereiden van statement mislukt: " . $conn->error);
}
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Controleer of de gebruiker bestaat en het wachtwoord correct is
if ($user && password_verify($password, $user['WW'])) {
    // Wachtwoord is correct
    $_SESSION['userID'] = $user['userID']; // Zorg ervoor dat 'userID' overeenkomt met de kolomnaam in je database

    if($user['userID'] === 1){
        header("Location: FULLhomePAGE.php");
    }else{
    // Redirect naar een beveiligde pagina
    header("Location: FULLhomePAGE.php");
    exit();
    }
} else {
    // Gebruikersnaam of wachtwoord is onjuist
    //echo "Onjuiste gebruikersnaam of wachtwoord.<br>";
    header("Location: FULLlogin.php");
}

// Sluit de statement en verbinding
$stmt->close();
$conn->close();
?>