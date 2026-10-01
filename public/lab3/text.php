<?php

$fileName = "log.txt";
if ( isset($_POST["text"]) && !empty(trim($_POST["text"])))
{
    $text = trim($_POST["text"]);
    file_put_contents($fileName,  $text . PHP_EOL, FILE_APPEND);
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Робота з текстовим файлом</title>
</head>
<body>
<h2>Вміст файлу log.txt</h2>

<?php
if (file_exists($fileName))
{
    $content = file_get_contents($fileName);
    echo nl2br(htmlspecialchars($content));
}
else
{
    echo "Файл поки що не існує.";
}

?>

<br><br>
<a href="index.html">Повернутися назад</a>
</body>
</html>