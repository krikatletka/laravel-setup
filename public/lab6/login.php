<?php

session_start();

require_once "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        $message = "Заповніть усі поля.";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];

            header("Location: welcome.php");
            exit;
        } else {
            $message = "Неправильний логін або пароль.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Авторизація</title>
</head>

<body>

<h1>Вхід</h1>

<?php
if (!empty($message)) echo "<p>$message</p>";
?>

<form method="post">
    <p>
        <label>Ім'я користувача:</label>
        <input type="text" name="username" required>
    </p>

    <p>
        <label>Пароль:</label>
        <input type="password" name="password" required>
    </p>

    <button type="submit">Увійти</button>
</form>

<br>

<a href="register.php">Зареєструватися</a>

</body>
</html>