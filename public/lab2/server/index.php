<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: redirected.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>SERVER</title>
</head>
<body>
<h2>Інформація про сервер</h2>
<?php
echo "IP-адреса клієнта: " . $_SERVER["REMOTE_ADDR"] . "<br>";
echo "Браузер: " . $_SERVER["HTTP_USER_AGENT"] . "<br>";
echo "Назва скрипта: " . $_SERVER["PHP_SELF"] . "<br>";
echo "Метод запиту: " . $_SERVER["REQUEST_METHOD"] . "<br>";
echo "Шлях до файлу: " . $_SERVER["SCRIPT_FILENAME"] . "<br>";
?>
</body>
</html>