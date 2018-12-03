<div class="modal fade " id="createGroup" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" v-if="current!=null">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Group</h4>
            </div>
            <div class="modal-body" style="background-color: #1b6d85">

                <label class="appmodallabel">Name :</label>
                <input  title="name" class="appmodal" type="text" v-model="groupName">
                <br><br>

                <label class="appmodallabel">Username :</label>
                <input  title="username" class="appmodal" type="text" v-model="groupUsername">
                <br><br>

                <button type="submit" class="btn btn-danger" @click="createGroup">Create Group</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>