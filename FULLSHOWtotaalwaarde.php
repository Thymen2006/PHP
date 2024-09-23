<?php
session_start();

require 'FULLrequireDB.php';

$sql="SELECT SUM(product.inkoop_prijs * voorraad_has_product.product_aantal) AS totaal_inkoop, 
             SUM(product.verkoop_prijs * voorraad_has_product.product_aantal) AS totaal_verkoop,
             SUM(product.verkoop_prijs * voorraad_has_product.product_aantal) - SUM(product.inkoop_prijs * voorraad_has_product.product_aantal) AS winst,
             locatie.stad
        FROM product
        LEFT JOIN voorraad_has_product ON product.idproduct = voorraad_has_product.product_idproduct
        LEFT JOIN locatie ON locatie.idlocatie = voorraad_has_product.locatie_idlocatie
        WHERE voorraad_has_product.product_aantal IS NOT NULL 
        AND voorraad_has_product.product_aantal > 0
        GROUP BY locatie.idlocatie;";

$result = mysqli_query($conn, $sql);

echo "<table>
<tr>
<th>totaal waarde inkoop</th>
<th>totaal waarde verkoop</th>
<th>$   winst   $</th>
<th>locatie</th>
</tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td> $ " . htmlspecialchars($row['totaal_inkoop']) . "</td>";
    echo "<td> $ " . htmlspecialchars($row['totaal_verkoop']) . "</td>";
    echo "<td> $ " . htmlspecialchars($row['winst']) . "</td>";
    echo "<td>" . htmlspecialchars($row['stad']) . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);
?>