<?php
require_once '../init.php';
$current = User::currentArrayForm() ;

echo json_encode($current);