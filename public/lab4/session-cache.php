<?php

session_start();
$cacheLifetime = 60;
if (isset($_SESSION["products"]) && isset($_SESSION["products_time"]) && (time() - $_SESSION["products_time"]) < $cacheLifetime)
{
    $products = $_SESSION["products"];
    $source = "SESSION cache";
}
else
{

    sleep(2);
    $products = [
        [
            "name" => "Laptop",
            "price" => rand(500, 1500)
        ],

        [
            "name" => "Phone",
            "price" => rand(300, 1000)
        ],

        [
            "name" => "Headphones",
            "price" => rand(50, 300)
        ]
    ];


    $_SESSION["products"] = $products;
    $_SESSION["products_time"] = time();
    $source = "Нові дані";
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>SESSION Cache</title>
</head>
<body>
<h1>Товари</h1>
<p>Джерело: <b><?= $source ?></b></p>

<?php
foreach ($products as $product) echo $product["name"] . " - " . $product["price"] . " €<br>";
?>

</body>
</html>