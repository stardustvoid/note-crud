<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'Note text of no more than 1000 characters is required';
}

if (!empty($errors)) {
    return view('notes/create', [
        'heading' => 'Create New Note',
        'errors' => $errors
    ]);
}

$query = 'INSERT INTO notes (user_id, body) VALUES (:user_id, :body)';

$currentUserId = 14;

$db->query($query, [':user_id' => $currentUserId, ':body' => $_POST['body']]);

header('Location: /notes');
exit();