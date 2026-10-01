<?php

$uploadDir = "uploads/";

if (isset($_FILES["file"]))
{
    $file = $_FILES["file"];

    $fileName = basename($file["name"]);
    $fileTmp = $file["tmp_name"];
    $fileSize = $file["size"];
    $fileType = $file["type"];

    $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedExtensions = ["png", "jpg", "jpeg"];
    $maxSize = 2 * 1024 * 1024;

    if (!is_uploaded_file($fileTmp))
    {
        echo "Помилка завантаження файлу.";
        exit;
    }

    if (!in_array($extension, $allowedExtensions))
    {
        echo "Дозволені лише файли PNG, JPG та JPEG.";
        exit;
    }

    if ($fileSize > $maxSize)
    {
        echo "Файл занадто великий. Максимальний розмір - 2 МБ.";
        exit;
    }

    $newFileName = $fileName;
    $destination = $uploadDir . $newFileName;

    if (file_exists($destination))
    {
        $nameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME);
        $newFileName = $nameWithoutExtension . "_" . time() . "." . $extension;
        $destination = $uploadDir . $newFileName;
    }


    if (move_uploaded_file($fileTmp, $destination))
    {
        echo "<h2>Файл успішно завантажено!</h2>";

        echo "Ім'я файлу: " . htmlspecialchars($newFileName) . "<br>";
        echo "Тип файлу: " . htmlspecialchars($fileType) . "<br>";
        echo "Розмір: " . round($fileSize / 1024, 2) . " КБ<br><br>";
        echo '<a href="' . htmlspecialchars($destination) . '" download>Завантажити файл</a>';
        echo "<br><br>";
        echo '<a href="index.html">Повернутися назад</a>';
    }
    else
    {
        echo "Не вдалося зберегти файл.";
    }
}
else
{
    echo "Файл не був отриманий.";
}