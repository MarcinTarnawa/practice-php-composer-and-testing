<?php

use Core\App;
use Core\Actions;

$id = $_GET['id'] ?? NULL;
$errors = [];
$db = App::resolve('db');
$authenticator = App::resolve('authenticator');
$table = App::resolve('table');
$sanitizedTableName = App::resolve('sanitizedTableName');
$user = $authenticator->getCurrentUserId();
$rules = $table->rules();
$value = $db->selectRecordById($id, $sanitizedTableName);
$operationType = Actions::UPDATE;

//edit record
if (isset($_POST['firstName']) && isset($_POST['lastName'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $userData = [
        'firstName' => $firstName,
        'lastName' => $lastName,
    ];
    if (!$db->canPerformAction($user, $sanitizedTableName, $operationType)) {
        $errors['firstName'][] = "No autroization";
    } else {
        $errors = $table->updateField($userData, $rules, $id);
        if (!empty($errors)) {
            $errors;
        }
        else {
            $db->addLog($user, $operationType, $sanitizedTableName);
            $table->refreshView();
    }}
}

//require view
view('views/edit.php', [
    'errors' => $errors,
    'rules' => $rules,
    'value' => $value
]);