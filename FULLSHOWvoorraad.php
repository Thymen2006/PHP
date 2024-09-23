<?PHP
session_start();

require 'FULLrequireDB.php';

error_reporting(0);
$locatie = $_POST['kieslocatie'];
$vindProduct = $_POST['vindProduct'];

if(!empty($locatie) && empty($vindProduct)){
// SQL query to select all products based on location
$sql = "SELECT * FROM product
        LEFT JOIN voorraad_has_product ON product.idproduct = voorraad_has_product.product_idproduct
        LEFT JOIN locatie ON voorraad_has_product.locatie_idlocatie = locatie.idlocatie
        WHERE locatie.idlocatie = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $locatie);
    $stmt->execute();
    $result = $stmt->get_result();

    // Output the data in a table
    echo "<table>
    <tr>
    <th>productID</th>
    <th>productnaam</th>
    <th>fabriek</th>
    <th>product Type</th>
    <th>inkoop prijs</th>
    <th>verkoop prijs</th>
    <th>aantal</th>
    <th>locatie</th>
    </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['idproduct']) . "</td>";
        echo "<td>" . htmlspecialchars($row['productnaam']) . "</td>";
        echo "<td>" . htmlspecialchars($row['fabriek']) . "</td>";
        echo "<td>" . htmlspecialchars($row['productType']) . "</td>";
        echo "<td> $ " . htmlspecialchars($row['inkoop_prijs']) . "</td>";
        echo "<td> $ " . htmlspecialchars($row['verkoop_prijs']) . "</td>";
        echo "<td>" . htmlspecialchars($row['product_aantal']) . "</td>";
        echo "<td>" . htmlspecialchars($row['stad']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Sluit het statement
    $stmt->close();
} else {
    echo "Fout bij het voorbereiden van de query: " . $conn->error;
}

// Sluit de database verbinding
$conn->close();
}elseif(empty($locatie) && empty($vindProduct)){
// SQL query to select all product info
$sql = "SELECT  * FROM product
            left join voorraad_has_product on product.idproduct = voorraad_has_product.product_idproduct
            left join locatie on voorraad_has_product.locatie_idlocatie = locatie.idlocatie
            GROUP BY product.idproduct, locatie.idlocatie;";

$result = mysqli_query($conn, $sql);

// Output the data in a table
echo "<table>
<tr>
<th>productID<?th>
<th>productnaam</th>
<th>fabriek</th>
<th>product Type</th>
<th>inkoop prijs</th>
<th>verkoop prijs</th>
<th>aantal</th>
<th>locatie</th>
</tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['idproduct']) . "</td>";
    echo "<td>" . htmlspecialchars($row['productnaam']) . "</td>";
    echo "<td>" . htmlspecialchars($row['fabriek']) . "</td>";
    echo "<td>" . htmlspecialchars($row['productType']) . "</td>";
    echo "<td> $ " . htmlspecialchars($row['inkoop_prijs']) . "</td>";
    echo "<td> $ " . htmlspecialchars($row['verkoop_prijs']) . "</td>";
    echo "<td>" . htmlspecialchars($row['product_aantal']) . "</td>";
    echo "<td>" . htmlspecialchars($row['stad']) . "</td>";
    echo "</tr>";
}
echo "</table>";

// Close the database connection
mysqli_close($conn);

}
if(!empty($vindProduct) && empty($locatie)){
// SQL query to select all products based on location
$sql = "SELECT * FROM product
        LEFT JOIN voorraad_has_product ON product.idproduct = voorraad_has_product.product_idproduct
        LEFT JOIN locatie ON voorraad_has_product.locatie_idlocatie = locatie.idlocatie
        WHERE product.productnaam = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $vindProduct);
    $stmt->execute();
    $result = $stmt->get_result();

    // Output the data in a table
    echo "<table>
    <tr>
    <th>productID</th>
    <th>productnaam</th>
    <th>fabriek</th>
    <th>product Type</th>
    <th>inkoop prijs</th>
    <th>verkoop prijs</th>
    <th>aantal</th>
    <th>locatie</th>
    </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['idproduct']) . "</td>";
        echo "<td>" . htmlspecialchars($row['productnaam']) . "</td>";
        echo "<td>" . htmlspecialchars($row['fabriek']) . "</td>";
        echo "<td>" . htmlspecialchars($row['productType']) . "</td>";
        echo "<td> $ " . htmlspecialchars($row['inkoop_prijs']) . "</td>";
        echo "<td> $ " . htmlspecialchars($row['verkoop_prijs']) . "</td>";
        echo "<td>" . htmlspecialchars($row['product_aantal']) . "</td>";
        echo "<td>" . htmlspecialchars($row['stad']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Sluit het statement
    $stmt->close();
}
}elseif(!empty($vindProduct) && !empty($locatie)){
        // SQL query to select all products based on location
        $sql = "SELECT * FROM product
                LEFT JOIN voorraad_has_product ON product.idproduct = voorraad_has_product.product_idproduct
                LEFT JOIN locatie ON voorraad_has_product.locatie_idlocatie = locatie.idlocatie
                WHERE product.productnaam = ? and locatie.idlocatie = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ss", $vindProduct, $locatie);
            $stmt->execute();
            $result = $stmt->get_result();
        
            // Output the data in a table
            echo "<table>
            <tr>
            <th>productID</th>
            <th>productnaam</th>
            <th>fabriek</th>
            <th>product Type</th>
            <th>inkoop prijs</th>
            <th>verkoop prijs</th>
            <th>aantal</th>
            <th>locatie</th>
            </tr>";
        
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['idproduct']) . "</td>";
                echo "<td>" . htmlspecialchars($row['productnaam']) . "</td>";
                echo "<td>" . htmlspecialchars($row['fabriek']) . "</td>";
                echo "<td>" . htmlspecialchars($row['productType']) . "</td>";
                echo "<td> $ " . htmlspecialchars($row['inkoop_prijs']) . "</td>";
                echo "<td> $ " . htmlspecialchars($row['verkoop_prijs']) . "</td>";
                echo "<td>" . htmlspecialchars($row['product_aantal']) . "</td>";
                echo "<td>" . htmlspecialchars($row['stad']) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        
            // Sluit het statement
            $stmt->close();
}
}
?>