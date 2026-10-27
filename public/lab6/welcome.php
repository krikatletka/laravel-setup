<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>

<body>

<h1>Вітаємо, <?= htmlspecialchars($_SESSION["username"]) ?>!</h1>

<p>Ви успішно авторизовані.</p>

<a href="logout.php">Вийти</a>

</body>
</html>