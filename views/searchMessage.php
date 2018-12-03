
<div class="modal fade " id="searchMessage" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Search Dialog</h4>
            </div>
            <div class="modal-body" style="background-color: #1b6d85">
                <form class="inline-form" role="form" >
                    <label class="appmodallabel" for="usr">Enter hashtag to find</label>
                    <input type="text" class="form-control appmodal" id="usr"  v-model="searchedMessage"
                           placeholder="message to find" @keydown="searchMessage">
                    <br>
                </form>

                <div v-if="searchedMessageResult!=null">
                    <label for="result">Found similar</label>
                    <ul class="searchResult">
                        <li class="well-sm" v-for="result in searchedMessageResult ">
                            {{result.text}}
                        </li>
                    </ul>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>