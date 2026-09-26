<?php

session_start();
$timeout = 300;
if (isset($_SESSION["last_activity"])) {
    $inactiveTime = time() - $_SESSION["last_activity"];
    if ($inactiveTime > $timeout) {
        session_unset();
        session_destroy();
        header("Location: index.php?timeout=1");
        exit;
    }
}
$_SESSION["last_activity"] = time();
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Session Activity</title>
</head>
<body>
<h2>Контроль активності сесії</h2>

<?php
if (isset($_GET["timeout"]))  echo "Сесію завершено через неактивність.<br><br>";
echo "Сесія активна.<br>";
echo "Час останньої активності: " . date("H:i:s", $_SESSION["last_activity"]);
?>

</body>
</html>