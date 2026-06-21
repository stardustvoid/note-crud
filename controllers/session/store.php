<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

//validate form

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password)) {
    $errors['password'] = 'Please provide a valid password';
}

//if validation fails return form with validation errors

if (!empty($errors)) {
    return view('session/create', [
        'errors' => $errors
    ]);
}

//if no validation errors, check if user already exists

$db = App::resolve(Database::class);

$query = 'SELECT * FROM users WHERE email = :email';

$user = $db->query($query, [':email' => $email])->get();

//if user exists check if password matches

if ($user) {
    if (password_verify($password, $user['password'])) {
        login($user);
        header('Location: /');
        exit;
    };
}

$errors['email'] = 'No user found with this email and password';

return view('session/create', [
    'errors' => $errors
]);