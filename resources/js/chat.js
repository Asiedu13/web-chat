const messageInput = document.getElementById("message");
const sendBtn = document.getElementById("send");
const chatDisplay = document.getElementById( "display-chat" );
const me = document.getElementById( 'me' );
const you = document.getElementById( 'you' );
const statusDisplay = document.getElementById( 'user_status' );
let urlNew = new URL( window.location );
let username = urlNew.searchParams.get( 'username' );


window.addEventListener( 'load', function () {
    window.Echo.channel( "kingschat" ).listen( ".SentChat", ( res ) => {
        console.log( 'Connection established' );
    } )

    messageInput.addEventListener( 'keydown', ( e ) => {
        window.axios( {
            method: "post",
            url: "/chat/sending",
            data: {
                username,
            }
         
        } );
        window.axios.defaults.headers.common["X-Socket-ID"] = Echo.socketId();
        window.Echo.channel( "typing_status" ).listen( ".Typing", ( res ) => {
            console.log( 'typing' );
            if ( username != res.username ) {
                statusDisplay.innerHTML = 'typing...'
            }
        
        } )

    } )

    document.addEventListener( "keypress", ( event ) => {
        let keyCode = event.keyCode ? event.keyCode : event.which;

        if ( keyCode === 13 ) {
            sendMessage(
                "post",
                "chat/sendMessage",
                messageInput.value,
                "kingschat",
                ".SentChat"
            );
    
        }
    } );

    sendBtn.addEventListener( "click", ( e ) => {
        e.preventDefault();
        console.log( "sending" );
        console.log( messageInput.value );

        sendMessage( "post", "chat/sendMessage", messageInput.value, "kingschat", '.SentChat' );
    
    } )
} );

    


function sendMessage(method, url, messageValue, channel, event) {
    if (messageInput.value != "") {
        window.axios({
            method,
            url,
            data: {
                username,
                message: messageValue,
            },
        });
    }
}

window.axios.defaults.headers.common["X-Socket-ID"] = Echo.socketId();

window.Echo.channel('kingschat').listen('.SentChat', (res) => {
    console.log("Connection established");
    console.log(res);
    if (res.username == username) {
        var tag = document.createElement("p");
        tag.classList.add("me");
        var text = document.createTextNode(`${res.message}`);
        var user = document.createElement("p");
        var userText = document.createTextNode(`${"me"}`);

        user.appendChild(userText);
        tag.appendChild(user);
        tag.appendChild(text);

        chatDisplay.appendChild(tag);
    } else {
        var tag = document.createElement("p");
        var text = document.createTextNode(res.message);
        tag.classList.add("you");
        var user = document.createElement("p");
        var userText = document.createTextNode(`${res.username}`);

        user.appendChild(userText);
        tag.appendChild(user);
        tag.appendChild(text);
        chatDisplay.appendChild(tag);
    }

    messageInput.value = "";
    statusDisplay.innerHTML = "";
});
