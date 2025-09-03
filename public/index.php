<?php
// start bootstrapping
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();
require __DIR__ . '/../vendor/autoload.php';
session_start();
$app = new \LOD\App();
$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, []);

// Routing
echo $twig->render('page.twig', ['title' => "{$app->title} ({$app->version})", 'view' => 'mainmenu']);