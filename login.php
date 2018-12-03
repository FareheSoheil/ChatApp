<?php
define('NO_LOGIN',true);
require_once 'init.php';
//include  'js/client.js';

//check if one of the buttoms is clicked
if(isset($_POST['entrance'])) {
    //get forms info
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user=db()->users->findOne(['username'=>$username]);

    switch ($_POST['entrance']) {
        case 'signup' :
            //check if the username isn;t used
            if($user!=null) {
                $massage = 'Username already is used';
                break;
            }

            // Create
            db()->users->insertOne([
                'username'=>$username,
                'password'=>encrypt($password),
                'type'=>'person',
                'reporteds'=>[],
                'friends'=>[],
                'reporters'=>[],

            ]);
            $massage = 'You have successfully signed up now login';
            break;
        case 'login' :

            if(count($user->reporters)>5) {
                echo ("you can't login you are reported");
                break;
            }
            else if($user!=null && $user->password == encrypt($password) ) {
                $_SESSION['_id'] = $user->_id.'';
                //redirect to the chats
                header('Location: index.php');
                break;
            }
            $massage = 'wrong code :)) ';
        //TODO : check in the db if usr and pass match
        break;
    }

}

;?><!DOCTYPE html>
<html>
<head>
    <title>My Chat App</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body >
<!--username and pass forms-->
<div class="flex">
    <?php if(isset($massage)) : ?>
    <div class="alert alert-danger"><?php echo $massage ?></div>
    <?php endif; ?>


<form action="login.php" method="post" class="login">

    <label for="username">Username : </label>
    <input type="text" name="username" class="forms">
    <br><br>
    <label  for="password">Password : </label>
    <input type="text" name="password" class="forms">
    <br><br><br>
    <button type="submit" name="entrance" value="login" class="btn btn-danger btn-sm login-btn">log in</button>

    <button type="submit" name="entrance" value="signup" class="btn btn-success btn-sm signup-btn">sign up</button>
</form>
<!--end of forms-->
<br><br><br><br>
<div id="footer" > Enjoy talking to your friends <3</div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>


