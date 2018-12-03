<?php  require_once '../init.php';
$newChannel=db()->users->insertOne([
        'username'=>$_GET['username'],
        'name'=>$_GET['name'],
        'type'=>'channel',
        'admin'=>$_SESSION['_id'],
    ]
);

var_dump($newChannel);

User::currentRaw()->update([
    '$push'=>[
        'friends'=> $newChannel->getInsertedId().''
    ]
]);