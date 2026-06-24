<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$query = 'SELECT * FROM notes WHERE user_id = :user_id';

$currentUserId = 14;

$notes = $db->query($query, [':user_id' => $currentUserId])->getAll();

view('notes/index', ['heading' => 'My Notes', 'notes' => $notes]);