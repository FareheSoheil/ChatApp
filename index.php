<?php require_once 'init.php';?><!DOCTYPE html>
<head>
    <title>My Chat App</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/app.css">
</head>
<div id="client" >
<div id="header">
    <h3  align="center" >Carol's Chat ( <?php echo($current_id->data->username)?> )</h3>
</div>

<div id="client">
<?php //include 'views/nav.php' ?>
    <div class="navbar  mynavbar" >
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav ">
                <li class="nav-item active">
                    <a class="nav-link fontS" data-toggle="modal" data-target="#UserProfile">Profile <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fontS" href="../views/contacts.php">Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fontS" data-toggle="modal" data-target="#searchUser">Search User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fontS" data-toggle="modal" data-target="#searchMessage">Search message</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fontS" data-toggle="modal" data-target="#createGroup">create group</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fontS" data-toggle="modal" data-target="#createChannel">create channel</a>
                </li>

            </ul>

        </div>
    </div>

    <div class="container">

        <div class="left-container col-md-9" >

            <div v-if="peer_profile!=null">
                <div class="title panel panel-heading ">
                    <?php include 'views/chatHeader.php'; ?>
                    <br><br>
                </div>

                <?php include 'views/chatContent.php'; ?>
                <br><br>

                <div class="compose">

                    <?php include 'views/writeMassage.php'; ?>

                </div>

            </div>

            <div v-else="">
                <div class="alert alert-info">First choose a chat :P</div>
            </div>

        </div>
        <div class=" right-container col-md-3" >
            <br>
            <?php include 'views/sidebar.php'; ?>
        </div>
    </div>
    </div>

    <?php include 'views/profile.php'; ?>
    <?php include 'views/searchUser.php'; ?>
    <?php include 'views/searchMessage.php'; ?>
    <?php include 'views/createChannel.php'; ?>
    <?php include 'views/createGroup.php'; ?>
    <?php include 'views/peerProfile.php'; ?>

</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/vue.js"></script>
<script src="js/client.js"></script>







