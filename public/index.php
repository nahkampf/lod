<?php
// start bootstrapping
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();
session_start();
$app = \LOD\App::getInstance();
$loader = new \Twig\Loader\FilesystemLoader('./views');
$twig = new \Twig\Environment($loader, []);

// Routing
echo $twig->render('page.twig', ['title' => "{$app->title} ({$app->version})", 'view' => 'mainmenu']);