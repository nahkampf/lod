<?php
// start bootstrapping
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();
require __DIR__ . '/../vendor/autoload.php';
session_start();
$db = new \LOD\DB(
    $_ENV['DB_HOST'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASSWORD'],
    $_ENV['DB_DATABASE'],
    $_ENV['DB_PORT']
);
$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, []);

// Routing
echo $twig->render('page.twig', ['title' => "{$_ENV['GAME_TITLE']} ({$_ENV['GAME_VERSION']})", 'view' => 'mainmenu']);