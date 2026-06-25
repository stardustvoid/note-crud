<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
];

$form = LoginForm::validate($attributes);

$signedIn = (new Authenticator)->attempt($attributes);

if (!$signedIn) {
    $form->error(
        'email', 'No user found with this email and password'
    )->throw();
}

redirect("/");