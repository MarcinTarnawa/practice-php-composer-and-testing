<?php

use Core\App;
use Core\Actions;
use Core\Validator;

$columns = ['id' => 'ID', 'firstName' => 'Name', 'lastName' => 'Last Name'];
$sanitizedColumns = Validator::sanitizeArray($columns);
$errors = [];
$db = App::resolve('db');
$authenticator = App::resolve('authenticator');
$table = App::resolve('table');
$sanitizedTableName = App::resolve('sanitizedTableName');
$user = $authenticator->getCurrentUserId();
$rules = $table->rules();
$operationType = Actions::DELETE;

// delete record from db by id
if ($_GET['remove'] ?? NULL) {
    $id = $_GET['remove'];
    confirm();
    if (isset($_POST['confirm'])) {
        if ($db->canPerformAction($user, $sanitizedTableName, $operationType)) {
            if ($GLOBALS['loggerMiddleware'] === 'active') {
                $db->addLog($user, $operationType, $sanitizedTableName);
            }
            $table->removeItem($id);
            $table->refreshView();
        }
        $errors['err'][] = "No autroization";
    }
}

//require view
view('views/dashboard.php', [
    'controller' => $table,
    'columns' => $sanitizedColumns,
    'errors' => $errors
]);