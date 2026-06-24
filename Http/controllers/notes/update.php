<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 14;

$query = 'SELECT * FROM notes WHERE id = :id';

$note = $db->query($query, [':id' => $_POST['id']])->getOrAbort();

authorize($note['user_id'] === $currentUserId);

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'Note text of no more than 1000 characters is required';
}

if (!empty($errors)) {
    return view('notes/edit', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note,
    ]);
}

$query = 'UPDATE notes SET body = :body WHERE id = :id';

$db->query($query, [':id' => $_POST['id'], ':body' => $_POST['body']]);

header('Location: /notes');
exit();

