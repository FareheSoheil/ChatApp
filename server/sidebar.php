<?php require_once '../init.php';
use MongoDb\BSON\ObjectID;

$current = User::find_by_id($_SESSION['_id']);

//all connections groups and channels and people
$connections=array();
//just people
$friends = array();
//get user's friends
$connections= $current->friends;

foreach ($connections as $connection) {

    $peer = User::find_by_id($connection);
    $peer->data->_id = $connection;
    $friends[]= $peer->convertToArray($current->isFriend($connection),$current->isReported($connection));

}

// Get Unknown messages
$unknown_users = db()->Messages->distinct('from',
    ['$and' => [
    ['to' => User::currentRaw()->_id . ''],
    ['from' => ['$nin' => User::currentRaw()->friends]]
]]);
$unknown_users2 = db()->dialogs->distinct('to', ['$and' => [
    ['from' => User::currentRaw()->_id . ''],
    ['to' => ['$nin' => User::currentRaw()->friends]]
]]);
foreach (array_unique(array_merge($unknown_users, $unknown_users2)) as $unknown_user) {
    $u = User::find_by_id($unknown_user);
    if ($u->type == 'person')
        $friends[] = $u->convertToArray($current->isFriend($unknown_user),$current->isReported($unknown_user));
}
echo json_encode($friends);