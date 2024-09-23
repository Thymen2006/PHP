<?php
session_start();

require 'FULLrequireDB.php';

// Sanitize and validate user input
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($_SESSION['userID'] === 1){
    $ID = $conn->real_escape_string($_POST['UpdateUserWW']);
    }else{$ID = $_SESSION['userID'];}
    $newWW = $conn->real_escape_string($_POST['newWW']);

    $hashedPassword = password_hash($newWW, PASSWORD_DEFAULT);

    if (!empty($ID) && !empty($newWW)) {
        // Construct the SQL query
        $sqlUpdateWW = "UPDATE FULLusers SET WW = ? WHERE userID = ?";
        
        // Prepare the statement
        if ($stmt = $conn->prepare($sqlUpdateWW)) {
            // Bind parameters
            $stmt->bind_param('ss', $hashedPassword, $ID);

            // Execute the query and check for errors
            if ($stmt->execute()) {
                echo "User info updated successfully";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "All fields are required.";
    }
}

// Close the connection
$conn->close();
?>