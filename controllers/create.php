<?php

use Core\App;
use Core\Actions;

//attributes
$errors = [];
$operationType = Actions::INSERT;
$db = App::resolve('db');
$authenticator = App::resolve('authenticator');
$table = App::resolve('table');
$sanitizedTableName = App::resolve('sanitizedTableName');
$user = $authenticator->getCurrentUserId();
$rules = $table->rules();

//check for input
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!$db->canPerformAction($user, $sanitizedTableName, $operationType)) {
        $errors['firstName'][] = "No autroization";
    
    //check for insert data from user
    } elseif (isset($_POST['firstName']) && isset($_POST['lastName'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $userData = [
            'firstName' => $firstName,
            'lastName' => $lastName,
        ];

        //validate data
        $errors = $table->addField($userData, $rules);
        if (!empty($errors)) {
            $errors;
        }
        else {
            $db->addLog($user, $operationType, $sanitizedTableName);
            $table->refreshView();
        }}
    }

//require view
view('views/create.php', [
    'errors' => $errors,
    'rules' => $rules
]);