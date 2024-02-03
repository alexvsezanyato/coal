<?php

if (! function_exists('sql_path')) {
    function sql_path(): string
    {
        return database_path() . '/sql';
    }
}

if (! function_exists('get_sql')) {
    function get_sql($target): ?string
    {
        $path = sql_path() . "/$target.sql";
        $content = @file_get_contents($path);

        if ($content === false) return null;
        return $content;
    }
}

if (! function_exists('get_sql_or_fail')) {
    function get_sql_or_fail($target): string
    {
        $sql = get_sql($target);
        if (is_null($sql)) throw new \RuntimeException(sql_path() . "/$target.sql not found");
        return $sql;
    }
}
