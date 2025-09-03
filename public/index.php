<?php
require "../vendor/autoload.php";
session_start();

// load env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

// start twig
$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, []);

// Routing
echo $twig->render('page.twig', ['title' => "{$_ENV['GAME_TITLE']} ({$_ENV['GAME_VERSION']})", 'view' => 'mainmenu']);