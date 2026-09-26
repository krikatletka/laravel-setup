<?php
if (isset($_POST["delete_cookie"])) {
    setcookie("username", "", time() - 3600, "/");
    header("Location: index.php");
    exit;
}

if (isset($_POST["name"]) && !empty($_POST["name"])) {
    $name = $_POST["name"];

    setcookie( "username", $name, time() + 7 * 24 * 60 * 60, "/");
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Cookie</title>
</head>
<body>
<h2>Робота з COOKIE</h2>

<?php
if (isset($_COOKIE["username"]))  echo "Привіт, " . $_COOKIE["username"] . "!";
?>

<form method="post">
    <p>
        <label>Ім'я:</label>
        <input type="text" name="name">
    </p>
    <button type="submit">Зберегти ім'я</button>
</form>

<br>
<form method="post">
    <button type="submit" name="delete_cookie"> Видалити cookie </button>
</form>
</body>
</html>