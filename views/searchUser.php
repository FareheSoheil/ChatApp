<div class="modal fade " id="searchUser" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Search For Users,Groups and Channels</h4>
            </div>
            <div class="modal-body" style="background-color: #1b6d85">

                <label class="appmodallabel" for="user">Enter the name</label>
                <input type="text" class="form-control appmodal" id="user" placeholder="Name to find" v-model="searchedUser"
                       @keydown="searchUser">
                <br>
                <button type="submit" class="btn btn-info" @click="searchUser">Search</button>
                <br><br>
                <div v-if="searchedUserResult!=null">
                    <label for="result">Results : </label>
                    <ul class="searchResult">
                        <li class="well-sm" v-for="result in searchedUserResult"
                            @click="selectUser(result.username,result._id)">
                            {{result.username}}
                        </li>
                    </ul>
                </div>
                <br>
                <div v-if="selectedUser!=null">
<!--                    <label>selected id: {{selectedUser._id}} , type: {{selectedUser.type}} , isFreind:  {{selectedUser.isFriend}}</label>-->
                    <div v-if="(selectedUser.type)==person">
                        <div v-if="(selectedUser.isFriend) == false">
                        <button type="submit" class="btn btn-success" @click="Befriend(selectedUser._id)">Add
                            {{selectedUser.username}}
                        </button>
                        <button type="submit" class="btn btn-warning" @click="openChat(selectedUser._id)">Send unknown
                            message to {{selectedUser.username}}
                        </button>
                        </div>
                        <div v-else="" >
                            <button type="submit" class="btn btn-warning" @click="openChat(selectedUser._id)">Send
                                message to {{selectedUser.username}}
                            </button>
                        </div>
                    </div>
                    <div v-else="">
                        <button type="submit" class="btn btn-success" @click="Befriend(selectedUser._id)">Join
                            {{selectedUser.username}}
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>