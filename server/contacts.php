<?php require_once '../init.php';
use MongoDb\BSON\ObjectID;

$user = User::find_by_id($_SESSION['_id']);

//all connections groups and channels and people
$connections=array();
//just people
$friends = array();
//get user's friends
$connections= $user->friends;

foreach ($connections as $connection) {

    $Obj_id = new ObjectID($connection);
    $peer = db()->users->findOne(['_id'=>$Obj_id]);
        $friends[]= $peer->username;

}


echo json_encode($connections);