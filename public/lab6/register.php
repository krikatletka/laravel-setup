<?php

require_once "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if (empty($username) || empty($email) || empty($password)) {
        $message = "Заповніть усі поля.";
    } else {
        $check = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $check->execute([$username, $email]);

        if ($check->fetch()) {
            $message = "Користувач з таким ім'ям або email вже існує.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $hashedPassword]);

            $message = "Реєстрація успішна. Тепер можна увійти.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Реєстрація</title>
</head>

<body>

<h1>Реєстрація</h1>

<?php
if (!empty($message)) echo "<p>$message</p>";
?>

<form method="post">
    <p>
        <label>Ім'я користувача:</label>
        <input type="text" name="username" required>
    </p>

    <p>
        <label>Email:</label>
        <input type="email" name="email" required>
    </p>

    <p>
        <label>Пароль:</label>
        <input type="password" name="password" required>
    </p>

    <button type="submit">Зареєструватися</button>
</form>

<br>

<a href="login.php">Уже є акаунт? Увійти</a>

</body>
</html>