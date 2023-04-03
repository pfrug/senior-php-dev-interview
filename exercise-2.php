<?php
/**
 * Exercise 2: What modifications would you make to the following code to optimize it and make it more maintainable?
 * 
 * This script displays a product list with their prices, discounts, taxes, and final prices.
 *
 * The script performs the following tasks:
 * 1. Define an array of products with their name, price, discount, and tax values.
 * 2. Calculate the final price for each product using a separate function.
 * 3. Render the product list as an HTML table with a function that generates the table rows.
 */

$products = [
    ['name' => 'Laptop', 'price' => 1200, 'discount' => 0.15, 'tax' => 0.10],
    ['name' => 'Desktop', 'price' => 1500, 'discount' => 0.10, 'tax' => 0.10],
    ['name' => 'Tablet', 'price' => 600, 'discount' => 0.05, 'tax' => 0.10],
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Unoptimized PHP & HTML</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Tax</th>
            <th>Final Price</th>
        </tr>
        <?php
        for ($i = 0; $i < count($products); $i++) {
            echo "<tr>";
            echo "<td>" . $products[$i]['name'] . "</td>";
            echo "<td>$" . $products[$i]['price'] . "</td>";
            echo "<td>" . $products[$i]['discount'] * 100 . "%</td>";
            echo "<td>" . $products[$i]['tax'] * 100 . "%</td>";
            $discountedPrice = $products[$i]['price'] * (1 - $products[$i]['discount']);
            $finalPrice = $discountedPrice * (1 + $products[$i]['tax']);
            echo "<td>$" . number_format($finalPrice, 2) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
