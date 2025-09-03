<?php

namespace LOD;

use LOD\DB;

class App
{
    public DB $db;
    public readonly string $title;
    public readonly string $titleShort;
    public readonly string $version;

    public function __construct()
    {
        $this->db = new DB(
            $_ENV['DB_HOST'],
            $_ENV['DB_USER'],
            $_ENV['DB_PASSWORD'],
            $_ENV['DB_DATABASE'],
            $_ENV['DB_PORT']
        );

        $this->title = $_ENV['GAME_TITLE'];
        $this->titleShort = $_ENV['GAME_TITLE_SHORT'];
        $this->version = $_ENV['GAME_VERSIOn'];
    }
}
