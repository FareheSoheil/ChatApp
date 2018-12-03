<?php

// Start Session
session_start();

// Models
require_once 'models/User.php';

// Composer
require_once 'vendor/autoload.php';

// Connect to database
global $db;
$m = new MongoDB\Client('mongodb://localhost:27017');
$db = $m->chat;

function db() {
    global $db;
    return $db;
}

// Check login
if (!isset($_SESSION['_id']) && !defined('NO_LOGIN')) {
    echo ("first login");
    header('Location: login.php');
    die();
}
 if(isset($_SESSION['_id'])&& count($current_id->reporters)>5) {
     echo ("you are reported");
     unset($_SESSION['_id']);
     header('Location: login.php');
 }

global $current_id;
$current_id = User::find_by_id($_SESSION['_id']);

function user() {
    global $current_id;
    return $current_id;
}
//check reports
//if()

function encrypt($d) {
    return sha1(sha1($d));
}
