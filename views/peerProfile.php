<?php include '../js/client.js';?>
<div class="modal fade " id="peerProfile" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" v-if="peer_profile!=null">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Profile</h4>
            </div>
            <br><br>
            <div class="modal-body" style="background-color: #1b6d85">

                <img src="" class="img-circle" width="80" height="60">
                <br>
                <div class="panel panel-primary">
                    <div class="panel-heading">Name</div>
                    <div class="panel-body">
                        <p>{{peer_profile.name}}</p>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">Username</div>
                    <div class="panel-body">
                        <p>{{peer_profile.username}}</p>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">Birthday</div>
                    <div class="panel-body">
                        <p>{{peer_profile.birthday}}</p>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">Email</div>
                    <div class="panel-body">
                        <p>{{peer_profile.email}}</p>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">Biography</div>
                    <div class="panel-body">
                        <p>{{peer_profile.biography}}</p>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">Phone number</div>
                    <div class="panel-body">
                        <p>{{peer_profile.phone}}</p>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>