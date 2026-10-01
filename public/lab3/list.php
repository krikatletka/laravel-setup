<?php
$uploadDir = "uploads/";
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Список файлів</title>
</head>
<body>

<h2>Список завантажених файлів</h2>
<?php

$files = scandir($uploadDir);
foreach ($files as $file)
{
    if ($file != "." && $file != "..")
    {
        echo htmlspecialchars($file);
        echo ' - <a href="' . $uploadDir . rawurlencode($file) . '" download>Завантажити</a>';
        echo "<br>";
    }
}
?>

<br>
<a href="index.html">Повернутися назад</a>
</body>
</html>