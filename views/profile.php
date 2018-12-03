<div class="modal fade glyphicon-modal-window" id="UserProfile" role="dialog"
     xmlns:props="http://www.w3.org/1999/xhtml">
    <div class="modal-dialog">
        <div class="modal-content" v-if="current!=null">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">User Profile {{current.username}}</h4>
            </div>
            <div class="modal-body" style="background-color: #1b6d85">
                <img src="../img/boy.png" class="img-circle" width="80" height="60">
                <br><br>
                    <label class="appmodallabel">Name :</label>
                    <input  title="name" class="appmodal" type="text" v-model="current.name">
                    <br><br>
                    <label class="appmodallabel">Username :</label>
                    <input  title="username" class="appmodal" type="text" v-model="current.username">
                    <br><br>
                    <label class="appmodallabel">Birthday :</label>
                    <input  title="birthday" class="appmodal" type="text" v-model="current.birthday">
                    <br><br>
                    <label class="appmodallabel">Email :</label>
                    <input  title="Email" class="appmodal" type="text" v-model="current.email">
                    <br><br>
                    <div> <label class="appmodallabel">Biography :</label>
                    <textarea  title="biography" class="appmodal bio"  v-model="current.biography"></textarea>
                    </div><br><br>
                    <label class="appmodallabel">Phone Number :</label>
                    <input  title="phone" class="appmodal " type="text" v-model="current.phone">
                    <br><br>
                    <label class="appmodallabel">Reset Password :</label>
                    <input  title="pass" class="appmodal" type="text" v-model="current.password">
                    <br><br>
                <button type="submit" class="btn btn-success" @click="updateProfile">Update profile</button>
            </div>
            <div class="modal-footer ">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
