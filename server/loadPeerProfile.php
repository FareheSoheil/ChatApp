<?php  require_once '../init.php';

$peerUser=User::find_by_id($_GET['other_id']);
$current_user =User::find_by_id($_SESSION['_id']);

$isFriend = $current_user->isFriend($peerUser->_id);
$isReported= $current_user->isReported($peerUser->id);

//toArray the needed infos
$profile=$peerUser->convertToArray($isFriend,$isReported);

echo json_encode($profile);