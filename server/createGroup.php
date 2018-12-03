<?php  require_once '../init.php';
$peer = User::find_by_id($_GET['peer_id']);
$newGroup=db()->users->insertOne([
        'username'=>$_GET['username'],
        'name'=>$_GET['name'],
        'type'=>'group',
        'admin'=>$_SESSION['_id'],
    ]
);
var_dump($newGroup);
User::currentRaw()->update([
    '$push'=>[
        'friends'=> $newGroup->getInsertedId().''
    ]
]);

if($peer){
if(($peer->type == 'person')) {
User::find_by_id($_GET['peer_id'])->update([
    '$push'=>[
        'friends'=> $newGroup->getInsertedId().''
    ]
]);
}}