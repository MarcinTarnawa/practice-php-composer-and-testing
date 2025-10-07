<?php

use Core\App;
use Core\Table;
use Core\Validator;

$tableName = ['log'];
$sanitizeTableName = Validator::sanitizeValues($tableName);
$columns = ['id' => 'ID', 'user_id' => 'User Id', 'operation' => 'Operation', 'table_name' => 'Table Name'];
$sanitizedColumns = Validator::sanitizeArray($columns);

$db = App::resolve('db');
$controller = App::resolve(Table::class, [$db, $sanitizeTableName]);

//require view
view('views/log.php', [
    'controller' => $controller,
    'columns' => $columns,
]);