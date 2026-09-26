<?php

session_start();

if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}

if (isset($_POST["login"]) &&  isset($_POST["password"])) {

    $login = $_POST["login"];
    $password = $_POST["password"];
    if ($login == "admin" && $password == "1234") {
        $_SESSION["user"] = $login;
        header("Location: index.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Session</title>
</head>
<body>
<h2>Робота з SESSION</h2>

<?php
if (isset($_SESSION["user"])) {
    echo "Привіт, " . $_SESSION["user"] . "!";
    ?>
    <form method="post">
        <br>
        <button type="submit" name="logout">  Вихід </button>
    </form>

    <?php
} else {
    ?>

    <form method="post">
        <p> <label>Логін:</label><input type="text" name="login"></p>
        <p> <label>Пароль:</label>  <input type="password" name="password"> </p>
        <button type="submit">Увійти</button>
    </form>
    <?php
}
?>
</body>
</html>