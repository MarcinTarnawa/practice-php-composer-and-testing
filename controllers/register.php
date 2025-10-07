<?php

use Core\App;
use Core\Table;
use Core\Validator;

//variables
$tableName = 'users';
$sanitizedTableName = Validator::sanitizeValues([$tableName]);
$name = $_POST['name'] ?? NULL;
$email = $_POST['email'] ?? NULL;
$password = $_POST['password'] ?? NULL;
$errors = [];
$db = App::resolve('db');
$authenticator = App::resolve('authenticator');
$table = App::resolve(Table::class, [$db, $sanitizedTableName]);
$rules = $table->rules();

//chech for email already exist
$user = $authenticator->getUserDataByEmail($email);

if ($user) {
    $errors['email'][] =  "Email already exists at db";
} else {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $userData = [
            'name' => $name,
            'email' => $email,
            'passwordcheck' => $password,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        //validate users data
        $errors = $table->addField($userData, $rules);
        if (!empty($errors)) {
            $errors;
        }
        else {
            $authenticator->login($user, $email, $password);
        }
    }
}

view('views/register.php', [
    'errors' => $errors
]);