<?php

function get_db_config()
{
    if(getenv('IS_IN_HEROKU')) {
        $url = parse_url(getenv("DATABASE_URL"));

        return $db_config = [
            'connetion' => 'pgsql',
            'host' => $url["host"],
            'database' => substr($url["PATH"],1),
            'username' => $url["user"],
            'password' => $url["pass"],
        ];
    } else{
        return $db_config = [
            'connection' => env('DB_CONNECTION','mysql'),
            'host' => env('DB_HOST','localhost'),
            'database' => env('DB_DATABASE', 'example_app'),
            'username' => env('DB_USERNAME', 'sail'),
            'password' => env('DB_PASSWORD', 'password'),
        ];
    }
}
