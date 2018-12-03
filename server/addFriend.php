<?php
require_once '../init.php';
$peer_id = $_GET['id'];
$current_id = $_SESSION['_id'];

$user = User::find_by_id($current_id);
$user->update([
    '$addToSet' => [
        'friends'=>$peer_id
    ]
]);
