<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST["name"];
    $surname = $_POST["surname"];

    if (empty($name) || empty($surname))
    {
        echo "Поля пусті";
    }
    else
    {
        if (is_string($name) && is_string($surname))
        {
            echo "Privit, " . $name . " " . $surname . "!";
        }
        else
        {
            echo "Неправильний тип даних";
        }
    }
}
else
{
    echo "Дані не були отримані.";
}

