<?php

use Core\App;
use Core\Table;
use Core\Database;
use Core\Container;
use Core\Authenticator;
use Core\Query;

$container = new Container();

$container->bind('Core\Database', function () {
    $config = require base_path('config.php');

    return new Database($config['database']);
});

$container->bind('Core\Table', function ($db, $tableName) {
    return new Table($db, $tableName);
});

$container->bind('Core\Authenticator', function ($db, $tableName) {
    return new Authenticator($db, $tableName);
});

$container->bind('Core\Query', function () {
    return new Query();
});

App::setContainer($container);