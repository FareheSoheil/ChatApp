<?php  require_once '../init.php';
$result = [];
$finalResult=[];
$message=urldecode($_GET['toFind']);
//$pattern = ".*#$message.*";

if(strpos($message,'#')!== false){
    $pattern = ".*#$message.*";
}else {
    $pattern = ".*$message.*";
}


$results=db()->Messages->find( [
    'text'=>['$regex'=>$pattern]
]);



foreach ($results as $result){
    $finalResult[]=@[
        'text'=>$result->text,
    ];
}
echo json_encode($finalResult);