<?php

$router->mount('/admin', function() use ($router) {

    $router->get('/', function() {
        echo 'Dashboard Page';
    });

    $router->get('/products', function() {
        echo 'Products Page';
    });
});