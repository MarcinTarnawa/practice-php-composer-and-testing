<?php

use Core\App;

//variables
$email = $_COOKIE['login'] ?? $_POST['email'] ?? NULL;
$password = $_COOKIE['password'] ?? $_POST['password'] ?? NULL;
$errors = [];
$db = App::resolve('db');
$authenticator = App::resolve('authenticator');

//check for email
$user = $authenticator->getUserDataByEmail($email);
$userLog = $user['email'] ?? NULL;

//require view with no errors
if(!isset($email)){
 return view('views/index.php');
}

//check password nad email
if(!$user || !password_verify($password, $user['password'])){
    $errors['email'][] = "Wrong email or password";
    view('views/index.php', [
    'errors' => $errors
    ]);
    return;
}

//start session
$authenticator->login($user, $userLog, $password);