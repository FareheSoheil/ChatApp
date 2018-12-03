
<div class="members" v-if="chats!=null">
    <div class="panel-title">Members List</div>
    <div class="contact well-sm">
        <div class="contact-title">
                        {{peer.username}}
        </div>
        <img src="peer.avatar" class="img-circle">
    </div>
</div>
<div v-else="">
    Loading
</div>