<?php

$router->get('/', 'controllers/index.php');
$router->post('/', 'controllers/index.php');
$router->get('/create', 'controllers/create.php');
$router->post('/create', 'controllers/create.php');
$router->get('/dashboard', 'controllers/dashboard.php');
$router->post('/dashboard', 'controllers/dashboard.php');
$router->get('/edit', 'controllers/edit.php');
$router->post('/edit', 'controllers/edit.php');
$router->get('/register', 'controllers/register.php');
$router->post('/register', 'controllers/register.php');
$router->get('/log', 'controllers/log.php');
$router->post('/log', 'controllers/log.php');