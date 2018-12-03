<?php
require_once '../init.php';
$peer_id = $_GET['id'];
$current_id = $_SESSION['_id'];

$reported_user = User::find_by_id($peer_id);
$reporter_user = User::find_by_id($current_id);

if(!(in_array($current_id,$reported_user->reporters->getArrayCopy()))) {
    $reported_user->update([
        '$addToSet' => [
            'reporters' => $current_id
        ]
    ]);
}
if(!(in_array($peer_id,$reporter_user->reporteds->getArrayCopy()))) {
    $reporter_user->update([
        '$addToSet' => [
            'reporteds' => $peer_id
        ]
    ]);
}
