
<div class="text-field" xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div class="form-group">

        <input class="form-control input-lg" type="text" placeholder="Message..." autofocus v-model="messageBox"  v-on:key.enter="send">
            <br><br>
        <div v-if="(peer_profile.type =='channel')">
<!--            <label>current id :{{current._id}}</label>-->
            <div v-if="(current._id != peer_profile.admin)">
<!--                <label>type :{{peer_profile.type}}</label>-->
<!--                <label>peer id :{{peer_profile.admin}}</label>-->
            <button  class="btn btn-info btn-lg pull-right" type="submit" value="send" name="send" @click="send" disabled>Send</button>
            </div>
            <div v-else="">
                <label>bye there :{{peer_profile._id}}</label>
                <button  class="btn btn-info btn-lg pull-right" type="submit" value="send" name="send" @click="send" >Send</button>
            </div>
        </div>
        <div v-else=""><button  class="btn btn-info btn-lg pull-right" type="submit" value="send" name="send" @click="send" >Send</button></div>

    </div>

</div>

