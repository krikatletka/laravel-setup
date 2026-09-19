<?php

// 1. Створення базового PHP-скрипта


// Виводимо текст "Hello, World!" на веб-сторінку
echo "<h2>1. Базовий PHP-скрипт</h2>";
echo "Hello, World!";


// 2. Змінні та типи даних

echo "<h2>2. Змінні та типи даних</h2>";


$name = "Kristina";
$age = 20;
$averageGrade = 95.5;
$isStudent = true;

echo "Ім'я: " . $name . "<br>";
echo "Вік: " . $age . "<br>";
echo "Середній бал: " . $averageGrade . "<br>";
echo "Студент: " . ($isStudent ? "так" : "ні") . "<br><br>";

var_dump($name);
echo "<br>";
var_dump($age);
echo "<br>";
var_dump($averageGrade);
echo "<br>";
var_dump($isStudent);


// 3. Конкатенація рядків:

echo "<h2>3. Конкатенація рядків</h2>";

$firstName = "Kristina";
$lastName = "Mozhaieva";

$fullName = $firstName . " " . $lastName;
echo "Повне ім'я: " . $fullName;


// 4. Умовні конструкції

echo "<h2>4. Умовні конструкції</h2>";

$number = 7;

if ($number % 2 == 0) 
{
    echo "Число $number є парним.";
} else {
    echo "Число $number є непарним.";
}


// 5. Цикли

echo "<h2>5. Цикли</h2>";
echo "Цикл for: ";

for ($i = 1; $i <= 10; $i++){
    echo $i . " ";
}

echo "<br><br>";
echo "Цикл while: ";
$i = 10;

while ($i >= 1) {
    echo $i . " ";
    $i--;
}


// 6. Масиви

echo "<h2>6. Масиви</h2>";
$student = [
    "name" => "Kristina",
    "surname" => "Mozhaieva",
    "age" => 20,
    "specialty" => "Computer Science"
];


echo "Ім'я: " . $student["name"] . "<br>";
echo "Прізвище: " . $student["surname"] . "<br>";
echo "Вік: " . $student["age"] . "<br>";
echo "Спеціальність: " . $student["specialty"] . "<br>";


$student["averageGrade"] = 95.5;
echo "<br>Оновлений масив:<br>";

foreach ($student as $key => $value) {
    echo $key . ": " . $value . "<br>";
}

