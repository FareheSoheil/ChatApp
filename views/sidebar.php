<div class="contact" v-if="chats!=null" xmlns:v-bind="http://www.w3.org/1999/xhtml">
    <div  v-for="chat in chats" @click="openChat(chat._id)"
          v-bind:class="['contact', (peer_profile && chat._id==peer_profile._id) ? 'selected' : '']">
        <div class="contact-title">
            <i class="glyphicon glyphicon-flag" v-if="(peer_profile &&!peer_profile.isFriend)"></i>
            {{chat.username}} : {{chat.type}}
            <i class="glyphicon glyphicon-flag" v-if="(peer_profile &&!peer_profile.isFriend)"></i>

        </div>
        <img src='../img/boy.png' class="img-circle">
    </div>
</div>
<div v-else="">
    Loading
</div>
<!--[(peer_profile) ? 'peer_profile.avatar' : '']-->