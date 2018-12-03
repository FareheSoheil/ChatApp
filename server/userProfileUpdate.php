<?php
require_once '../init.php';

$updatedUser = $_POST['data'];
unset($updatedUser['avatar']);
unset($updatedUser['_id']);

//var_dump($updatedUser);

User::currentRaw()->update(['$set' => $updatedUser]);
