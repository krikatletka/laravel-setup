<?php

$cacheDir = __DIR__ . "/cache";
$cacheFile = $cacheDir . "/report.html";

$cacheLifetime = 10 * 60;

if (!is_dir($cacheDir)) mkdir($cacheDir);
if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheLifetime)
{
    echo "<p><b>Дані отримані з кешу.</b></p>";
    echo file_get_contents($cacheFile);
    exit;
}

sleep(3);
ob_start();

?>

<h1>Звіт</h1>

<table border="1" cellpadding="5">

    <tr>
        <th>ID</th>
        <th>Ім'я</th>
        <th>Сума</th>
        <th>Дата</th>
    </tr>

<?php

$names = ["Anna", "Kristina", "Maria", "Olena", "Ivan", "Andrii"];
for ($i = 1; $i <= 1000; $i++)
{
    $name = $names[array_rand($names)];
    $amount = rand(100, 10000);
    $date = date("Y-m-d", strtotime("-" . rand(0, 365) . " days"));

    echo "<tr>";
    echo "<td>$i</td>";
    echo "<td>$name</td>";
    echo "<td>$amount</td>";
    echo "<td>$date</td>";
    echo "</tr>";
}

?>

</table>

<?php

$html = ob_get_clean();
file_put_contents($cacheFile, $html);
echo "<p><b>Новий звіт було згенеровано.</b></p>";
echo $html;

