<?php  require_once '../init.php';
$finalRes = [];
$results = [] ;
$rawResult=[];
$r=[];
$name=$_GET['toFind'];
$pattern = ".*$name.*";

$rawResult=db()->users->find([
    '$or'=>[
        ['username'=>['$regex'=>$pattern]],
        ['name'=>['$regex'=>$pattern]],
    ]
]);

foreach ($rawResult as $r){
    $finalRes[]=@[
        '_id'=>$r->_id.'',
        'username'=>$r->username,
        'name'=>$r->name,
        'type'=>$r->type,
//        'isFriend   '
    ];
}
echo json_encode($finalRes);