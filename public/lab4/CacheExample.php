<?php

class CacheExample
{
    private static array $cache = [];
    public static function getData(): array
    {

        if (isset(self::$cache["data"])) return ["source" => "static cache", "data" => self::$cache["data"]];
        sleep(2);
        $data = ["USD" => rand(3800, 4200) / 100, "EUR" => rand(4100, 4500) / 100];

        self::$cache["data"] = $data;

        return ["source" => "generated", "data" => $data];
    }
}
