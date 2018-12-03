<?php
require_once '../init.php';

$message = urldecode($_GET['text']);
$to = $_GET['to'];
$from = $_SESSION['_id'];

db()->Messages->insertOne([
    "text"=>$message ,
    "to" => $to ,
    "from" =>$from
  ]);

preg_match_all('/(?<=@)[^\s]+/', $message, $results);

foreach ($results as $result) {

    $user = User::find_by_key('username', $result[0]);

    if ($user->data == null) {
        continue;

    }else {
        if (!in_array($_GET['to'], $user->friends->getArrayCopy())) {
            continue;
        }
    }
    $user->update(['$addToSet' => ['mentions' => $_GET['to']]]);



}
