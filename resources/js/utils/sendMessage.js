function sendMessage(method, url, messageInput , messageValue, channel, event) {
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
    window.axios.defaults.headers.common["X-Socket-ID"] = Echo.socketId();
    window.Echo.channel(channel).listen(event, (res) => {
        console.log("Connection established");

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
}
