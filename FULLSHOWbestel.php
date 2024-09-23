<?php
session_start();

require 'FULLrequireDB.php';

if(!isset($_SESSION['userID'])){
    header("Location: FULLlogin.php");
}

$sql = "SELECT * FROM bestellingen LEFT JOIN locatie ON bestellingen.locatie_idlocatie = locatie.idlocatie;";

$result = mysqli_query($conn, $sql);

// Output the data in a table
echo "<table>
<tr>
<th>betselling ID<?th>
<th>productnaam</th>
<th>type</th>
<th>fabriek</th>
<th>besteldatum</th>
<th>leverdatum</th>
<th>_____afgeleverd_____</th>
<th>aantal besteld</th>
<th>locatie</th>
</tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['idbestellingen']) . "</td>";
    echo "<td>" . htmlspecialchars($row['productnaam']) . "</td>";
    echo "<td>" . htmlspecialchars($row['productType']) . "</td>";
    echo "<td>" . htmlspecialchars($row['fabriek']) . "</td>";
    echo "<td>" . htmlspecialchars($row['besteldate']) . "</td>";
    echo "<td>" . htmlspecialchars($row['leverdate']) . "</td>";
    echo "<td>" . htmlspecialchars($row['afgeleverd']) . "</td>";
    echo "<td>" . htmlspecialchars($row['aantal_besteld']) . "</td>";
    echo "<td>" . htmlspecialchars($row['stad']) . "</td>";
    echo "</tr>";
}
echo "</table>";

// Close the database connection
mysqli_close($conn);
?>