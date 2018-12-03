<div class="modal fade " id="createChannel" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" v-if="current!=null">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Channel</h4>
            </div>
            <div class="modal-body" style="background-color: #1b6d85">

                <label class="appmodallabel">Name :</label>
                <input  class="appmodal" type="text" v-model="channelName">
                <br><br>

                <label class="appmodallabel">Username :</label>
                <input  class="appmodal" type="text" v-model="channelUsername">
                <br><br>

                <button type="submit" class="btn btn-danger" @click="createChannel">Create Channel</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>