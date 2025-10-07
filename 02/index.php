<?php
session_start();

use Core\Router;
use Core\Validator;
use Core\Authenticator;
use Core\Middleware\Auth;
use Core\ServiceProvider;
use Core\Middleware\LoggerMiddleware;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'functions.php';
require BASE_PATH . 'vendor/autoload.php'; //composer autoload

require base_path('bootstrap.php');

$tableName = 'names_list';
$sanitizedTableName = Validator::sanitizeValues([$tableName]);
ServiceProvider::boot($sanitizedTableName);

$router = new Router();
$routes = require base_path('routes.php');

//middleware's
$router->addMiddleware(['/dashboard', '/create', '/log', '/edit'], new Auth());
$router->addMiddleware('*', new LoggerMiddleware());

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

//logout
if (isset($_GET['logout'])) {
    Authenticator::logout();
}