<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 14;

$query = 'SELECT * FROM notes WHERE id = :id';

$note = $db->query($query, [':id' => $_POST['id']])->getOrAbort();

authorize($note['user_id'] === $currentUserId);

$db->query('DELETE FROM notes WHERE id = :id', [':id' => $_POST['id']]);

header('Location: /notes');
exit();

