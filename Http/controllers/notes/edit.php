<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 14;

$query = 'SELECT * FROM notes WHERE id = :id';

$note = $db->query($query, [':id' => $_GET['id']])->getOrAbort();

authorize($note['user_id'] === $currentUserId);

view('notes/edit', [
    'heading' => 'Edit note',
    'note' => $note,
    'errors' => []
]);

