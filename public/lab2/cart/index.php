<?php

session_start();
if (!isset($_SESSION["cart"]))  $_SESSION["cart"] = [];

if (isset($_POST["product"])) {

    $product = $_POST["product"];
    $_SESSION["cart"][] = $product;
}


if (isset($_POST["finish"])) {

    $previousPurchases = [];
    if (isset($_COOKIE["previous_purchases"]))  $previousPurchases = json_decode($_COOKIE["previous_purchases"], true);

    foreach ($_SESSION["cart"] as $product) $previousPurchases[] = $product;

    setcookie("previous_purchases", json_encode($previousPurchases), time() + 30 * 24 * 60 * 60,  "/");

    $_SESSION["cart"] = [];

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Корзина</title>
</head>
<body>
<h2>Корзина покупок</h2>
<form method="post">

    <button name="product" value="Ноутбук"> Додати ноутбук </button>
    <button name="product" value="Телефон">  Додати телефон</button>
    <button name="product" value="Навушники"> Додати навушники </button>

</form>
<h3>Корзина:</h3>
<?php
if (empty($_SESSION["cart"])) {
    echo "Корзина пуста.";
} else {
    foreach ($_SESSION["cart"] as $product) {
        echo $product . "<br>";
    }
}
?>

<br>
<form method="post">
    <button name="finish"> Завершити покупку </button>
</form>
<h3>Попередні покупки:</h3>
<?php
if (isset($_COOKIE["previous_purchases"])) {

    $previousPurchases = json_decode($_COOKIE["previous_purchases"], true);

    foreach ($previousPurchases as $product) {
        echo $product . "<br>";
    }

} else {

    echo "Попередніх покупок немає.";
}
?>

</body>
</html>