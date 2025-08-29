<?php
require "../vendor/autoload.php";

// load env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

// start twig
$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, [
]);
echo $twig->render('page.twig', ['title' => "{$_ENV['GAME_TITLE']} ({$_ENV['GAME_VERSION']})", 'content' => 'korv']);