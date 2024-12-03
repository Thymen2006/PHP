<?php
session_start();

require 'FULLrequireDB.php';

error_reporting(0);  // Turn off all error reporting

if(!isset($_SESSION['userID'])){
    header("Location: FULLlogin.php");
}

$sql = "SELECT * FROM bestellingen 
        LEFT JOIN locatie ON bestellingen.locatie_idlocatie = locatie.idlocatie
        LEFT join bestellingen_has_product on bestellingen.idbestellingen = bestellingen_has_product.bestellingen_idbestellingen
        LEFT JOIN product on bestellingen_has_product.product_idproduct = product.idproduct;";

$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    $currentBestelling = null; // Houdt bij welke bestelling_id momenteel wordt weergegeven


// Output the data in a table
echo "<table>
<tr>
<th>betselling ID<?th>
<th>besteldatum</th>
<th>leverdatum</th>
<th>_____afgeleverd_____</th>
<th>locatie</th>
<th>product</th>
<th>__type__</th>
<th>fabriek</th>
<th>aantal</th>
</tr>";
while ($row = $result->fetch_assoc()) {
    // Controleer of we naar een nieuwe bestelling_id gaan
    if ($currentBestelling !== $row['idbestellingen']) {
        if ($currentBestelling !== null) {
            // Sluit vorige bestelling met een lege regel of scheiding
            echo "<tr><td colspan='5' style='height: 20px;'></td></tr>";
        }
        $currentBestelling = $row['idbestellingen'];
    }

    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['idbestellingen']) . "</td>";
    echo "<td>" . htmlspecialchars($row['besteldate']) . "</td>";
    echo "<td>" . htmlspecialchars($row['leverdate']) . "</td>";
    echo "<td>" . htmlspecialchars($row['afgeleverd']) . "</td>";
    echo "<td>" . htmlspecialchars($row['stad']) . "</td>";
    echo "<td>" . htmlspecialchars($row['productnaam']) . "</td>";
    echo "<td>" . htmlspecialchars($row['productType']) . "</td>";
    echo "<td>" . htmlspecialchars($row['fabriek']) . "</td>";
    echo "<td>" . htmlspecialchars($row['aantal_besteld']) . "</td>";
    echo "</tr>";
}
echo "</table>";
}

// Close the database connection
mysqli_close($conn);
?>