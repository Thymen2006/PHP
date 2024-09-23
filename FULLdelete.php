<?php
session_start();

require 'FULLrequireDB.php';

// Sanitize user input
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($_SESSION['userID'] === 1){
    $ID = $conn->real_escape_string($_POST['UserID']);
    }else{$ID = $_SESSION['userID'];}

    // Construct SQL query
    $sqlDelete = "DELETE FROM FULLusers WHERE userID=$ID";

    // Execute the query and check for errors
    if ($conn->query($sqlDelete) === TRUE) {
        // Successful deletion
    } else {
        // Error handling (optional, but you can add error logging here)
    }
}

// Close the connection
$conn->close();
?>