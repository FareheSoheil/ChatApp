
var client=new Vue({

    el: '#client',

    data: {
        //all the datas that can be passed to differrent pages
        name: 'Farehe',
        isPrivate: false ,
        messagenum : 3,
        current:null,
        peer_profile : null ,
        messages:[],
        chats:[],
        contacts:[],
        peer_id:null,
        messageBox : ' ',
        channelName: '',
        channelUsername: '',
        groupName: '',
        groupUsername: '',
        searchedUser: '',
        searchedUserResult: null,
        selectedUser: null,
        searchedMessage: '',
        searchedMessageResult: null,
    },
    methods: {
        setCurrent: function(){
            $.ajax({
                url:'server/setCurrent.php',
                dataType: 'json',
                success: function (response) {
                    client.current = response;
                    console.log("setting curr:  "+client.messagenum);
                    console.log(client.current);
                }
            });
        },
        reload : function() {
            // Update contacts
            $.ajax({
                url:'server/sidebar.php',
                dataType:'json',

                success: function(reload_response) {//this response is what comes from ajax
                    //console.log("pro "+client.peer_id);
                    client.chats=reload_response;
                    //console.log('msg num in reload'+client.messagenum);

                }
            });

            //load messages
            if(client.peer_id!=null) {
                    console.log(client.messagenum);
                    console.log(client.isPrivate);
                $.ajax({
                    url:'server/LoadChat.php?peer_id='+client.peer_id + '&num='+client.messagenum +'&isPrivate='+(client.isPrivate?'true':'false' ),
                    dataType: 'json' ,
                    success: function(response) {
                         //console.log(response);

                        client.messages = response;
;
                    }
                });
            }
        },

        loadMoreMassages: function($type) {
            if ($type == 'person') {
                client.messagenum=client.messagenum+2;
            }else {
                client.messagenum=client.messagenum+4;
            }
            console.log("loadmessages more : "+client.messagenum);
        },

        openChat: function(id) {
            client.peer_id=id;
            client.messagenum=3;
            $.ajax({
                url:'server/loadPeerProfile.php?other_id='+client.peer_id,
                dataType : "json" ,
                success: function(response) {
                    client.peer_profile = response ;

                }
            });
        } ,
        chatReopen : function() {
            var peer_id=client.peer_id;
            client.peer_profile=null;
            client.openChat(peer_id);
        },
        send: function() {
            $.ajax({
                url: 'server/writeMessage.php?text='+encodeURIComponent(client.messageBox)+'&to='+client.peer_id,
                success: function () {
                    client.reload();
                    console.log("sending");
                    console.log(client.messageBox);
                    console.log(client.peer_id);
                }
            });
            client.messageBox=' ';
        },

        showContacts :function (){
            $.ajax({
                url:'server/contacts.php',
                dataType:'json',
                success: function(response) {//this response is what comes from ajax
                    client.contacts=response;
                    console.log(response)
                }
            });
        } ,

        unfriend: function(id) {
            $.ajax({
                //remove the contact from friends array
                url:'server/unfriend.php?id='+client.peer_id,
                success: function() {
                    console.log('Unfriended');
                    client.chatReopen();
                }

            });
        },

    Befriend: function(id) {
        $.ajax({
            //remove the contact from friends array
            url:'server/addFriend.php?id='+client.peer_id,
            success: function() {
                console.log("added");
                client.chatReopen();
            }

        });
    },
    leaveGroup: function(id) {
        $.ajax({
            url:'server/send.php?text='+client.current.name+'Left the Group :('+'&to='+id,
            success: function() {
                console.log("left the group");
                client.reload();
            }

        });
        $.ajax({
            url:'server/unfriend.php?id='+id,
            success: function(){
                console.log("left the group");
                client.chatReopen();
            }
        });
    },
    report: function(id) {
        console.log("reporting");
        $.ajax({

            url:'server/report.php?id='+id,
            success: function(){
                console.log("reported");
                client.reload();
            }
        });
    },
    updateProfile: function() {
        console.log("updating");
        $.ajax({
            url : 'server/userProfileUpdate.php',
            type: "POST",
            data: {'data':client.current},
            success : function(){
                console.log("profile updated");
            }

        });
    },
    createChannel: function () {
        console.log('server/createChannel.php?name=' + client.channelName + '&username=' + client.channelUsername);
        $.ajax({
            url: 'server/createChannel.php?name=' + client.channelName + '&username=' + client.channelUsername,
            success: function (m) {
                client.reload();
                console.log("channel created");
            }
        });
        client.channelName = ' ';
        client.channelUsername = ' ';

    },
    createGroup: function () {
        console.log("creating group");
        $.ajax({
            url: 'server/createGroup.php?name=' + client.groupName + '&username=' + client.groupUsername +'&peer_id='+client.peer_id,
            success: function (m) {
                client.reload();
                console.log("group created");
            }
        });
        client.groupName = ' ';
        client.groupUsername = ' ';

    },
        searchUser: function(){
            $.ajax({
                url:'server/searchUser.php?toFind='+client.searchedUser,
                dataType: 'json',
                success: function (response) {
                    client.searchedUserResult = response;
                }
            });

        },

        searchMessage: function() {
            $.ajax({
                url:'server/searchMessage.php?toFind='+encodeURIComponent(client.searchedMessage),
                dataType: 'json',
                success: function (response) {
                    client.searchedMessageResult = response;
                }
            });

        },

        isPrivateChatActive: function($yn) {
            client.isPrivate = $yn;
        },
        selectUser: function (username, _id) {
            console.log(username + ' ' + _id);
            client.selectedUser = {
                username: username,
                _id: _id
            }
        }
    }

});

//client.showContacts();
client.setCurrent();
client.reload();
setInterval(client.reload,500);

//client.setCurrent();
