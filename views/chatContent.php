<ul class="chat scroll" v-if="messages != null" xmlns:v-bind="http://www.w3.org/1999/xhtml" style="overflow:hidden; overflow-y:scroll;">
    <li class="left clearfix" v-for="message in messages">

        <div v-if="message.isMe==true"><span class="chat-img pull-left title" >
             <img class="img-circle" src="../img/boy.png">

        </span></div>
        <div v-else=""><span class="chat-img pull-left title" >
             <img class="img-circle" src="../img/boy.png">
        </span></div>

        <div class="chat-body clearfix">
            <div class="header">

               <div v-if="message.isMe"> <strong class="primary-font" >{{current.name}}</strong></div>
                <div v-else=""> <strong class="primary-font" >{{peer_profile.name}}</strong></div>

                <small class="pull-right text-muted">
                    <span class="glyphicon glyphicon-time"></span>
                </small>
            </div>
            <div style="margin-left:15px;padding-left: 15px "><p>{{message.text}}</p></div>
        </div>
    </li>
</ul>
