<?php include '../js/client.js';?>
<div>
<img src="../img/boy.png" class="img-circle" style="float: left">
<div style="float:left; width:100px; height:30px; margin-right: 30px; padding-left: 15px">{{peer_profile.username}}</div>
<span class="label label-info" v-if="!peer_profile.isFriend">Unknown</span>
<br><br>
</div>
<div style="padding-left:70px">
<span v-if="(peer_profile.type)!='person'">
    <button v-if="peer_profile.isFriend" class="btn btn-warning btn-sm" @click="leaveGroup(peer_profile._id)">Leave</button>
    <button v-else="" class="btn btn-warning btn-sm" @click="Befriend(peer_profile._id)">Join</button>
</span>

<span v-else="">
<button v-if="peer_profile.isFriend" class="btn btn-warning btn-sm" @click="unfriend(peer_profile._id)">Unfriend</button>
<button v-else="" class="btn btn-warning btn-sm" @click="Befriend(peer_profile._id)">Befriend</button>
</span>

<button class="btn btn-default btn-sm" @click="loadMoreMassages(peer_profile.type)">More Message</button>

<button v-if="!peer_profile.isReported" class="btn btn-danger btn-sm" @click="report(peer_profile._id)">Report</button>
<button v-else="" class="btn btn-danger btn-sm">Already reported</button>

<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#peerProfile">
Load Profile
</button>
<button v-if="!isPrivate" class="btn btn-primary btn-sm" @click="isPrivate=!isPrivate">Private Chat</button>
 <button v-else="" class="btn btn-primary btn-sm"  @click="isPrivate=!isPrivate" >Normal Chat</button>
</div>

