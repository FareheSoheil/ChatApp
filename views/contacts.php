<div class="modal fade glyphicon-modal-window" id="contacts" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" v-if="current!=null">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">User Profile {{current.username}}</h4>
            </div>
            <div class="modal-body" style="background-color: #1b6d85">
                <div v-for="contact in contacts" >
               <ul class="scroll">
                <li>

                 <img src="" class="img-circle" width="80" height="60">
                <br><br>
                <label class="appmodallabel">Name :</label>
                <input  title="name" class="appmodal" type="text" v-model="current.name">
                <br><br>
                </li>
                   </ul>
                </div>
            </div>
            <div class="modal-footer ">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
