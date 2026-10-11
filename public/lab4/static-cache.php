<?php
require_once "CacheExample.php";
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Static Cache</title>
</head>
<body>
<h1>Static cache</h1>

<?php
$result1 = CacheExample::getData();
echo "<p>";
echo "Перший виклик: " . $result1["source"];
echo "</p>";
echo "USD: ". $result1["data"]["USD"] . "<br>";
echo "EUR: ". $result1["data"]["EUR"] . "<br><br>";
$result2 = CacheExample::getData();
echo "<p>";
echo "Другий виклик: " . $result2["source"];
echo "</p>";
echo "USD: " . $result2["data"]["USD"] . "<br>";
echo "EUR: ". $result2["data"]["EUR"];
?>

</body>
</html>