<?php require_once '../init.php';
include '../models/Message.php';

use MongoDb\BSON\ObjectID;

$num = $_GET['num'];
$isPrivate=$_GET['isPrivate'];
//var_dump($num);
$iterator=0;
$my_id = $_SESSION['_id'];
$peer_id = $_GET['peer_id'];
$peer = User::find_by_id($peer_id);
$options = ['$sort' => [['_id' => -1]]];
$results = [] ;
$mainResult = [] ;

if($peer->type != 'person') {
    $messages = db()->Messages->find(['to' => $peer_id], $options);
} else {
$messages = db()->Messages->find([
        '$or' => [
            ['from' =>$my_id, 'to' => $peer_id],
            ['to' => $my_id, 'from' => $peer_id],
        ]
    ], $options) ;
}

foreach($messages as $msg) {

    $message = new Message($msg);
    $results[]=$message->convertToArray();
}
$size = count($results);
if($size>=$num) {
    $iterator = $size - $num;

}else {
    $iterator = 0 ;
}

if($isPrivate =='false') { // not a private chat

    while($iterator< $size) {
        $mainResult[] = $results[$iterator];
        $iterator++;
    }
}
else {
//    var_dump("here");
    $mainResult[]=$results[$size-1];
}

//var_dump("first",$mainResult[0]);
//var_dump("last",$mainResult[$size-1]);
//
//
echo json_encode($mainResult);