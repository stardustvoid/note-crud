<?php

use Core\App;
use Core\Database;
use Core\Validator;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

//validate form

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Valid email is required';
}

if (!Validator::string($name, 3, 255)) {
    $errors['name'] = 'User name must be at least 3 characters';
}

if (!Validator::string($password, 7, 20)) {
    $errors['password'] = 'Password must be 7-20 characters long';
}

//if validation fails return form with validation errors

if (!empty($errors)) {
    return view('registration/create', [
        'errors' => $errors
    ]);
}

//if no validation errors, check if user already exists

$db = App::resolve(Database::class);

$query = 'SELECT * FROM users WHERE email = :email';

$user = $db->query($query, [':email' => $email])->get();

//if user exists return form with validation errors

if ($user) {
    $errors['user'] = 'This email is already in use.<br>Please use a different email, or go to the login page.';
    return view('registration/create', [
        'errors' => $errors
    ]);
}

//if user does not exist, add new user to the database

$query = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';

$db->query($query, [':name' => $name, ':email' => $email, ':password' => $password]);

//write name and email to session

$_SESSION['user'] = $name;

//redirect to home page

header('Location: /');
exit();