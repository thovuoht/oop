<?php

// echo '<pre>';
// print_r($_SERVER);
// die;

session_start();

require 'vendor/autoload.php';

Dotenv\Dotenv::createImmutable(__DIR__)->load();

require 'routers/index.php';