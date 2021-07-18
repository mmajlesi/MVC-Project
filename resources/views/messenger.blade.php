<head>
    <title>اطلاعات آگهی</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/Light.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script type="text/javascript" src="/js/JsCodes.js"></script>

</head>

<div id="messageList" style="height: 85%;overflow-y: scroll;overflow-x: none;">
    @if ($chatMessage->messages->isNotEmpty())
        @foreach ($chatMessage->messages as $message)
            @php
                if ($message->receiver == Auth::user()->id && $message->seen == false) {
                    App\models\Message::where('id', $message->id)->update(['seen' => true]);
                }
            @endphp
            @if ($message->sender == Auth::user()->id)
                <div style="text-align: right;">
                    <div class="isMineMessage">
                        <p style="font-size: 14px;font-weight: bold;color: #ffffff">
                        <p>{{ $message->text }}</p>
                        <p style="font-size: 10px;margin-top:2px;color:#DDDDDD">
                            {{ $message->created_at->format('Y-m-d H:i') }}
                            @if ($message->seen == true)
                                <i class="fa fa-check" aria-hidden="true"
                                    style="color:green; margin-right:5px;font-size : 12px"></i>
                            @else
                                <i class="fa fa-check" aria-hidden="true" style="margin-right:5px;font-size : 12px"></i>
                            @endif
                        </p>
                    </div>
                </div>
            @else
                <div style="text-align: left;">
                    <div class="isNotMineMessage">
                        <p style="font-size: 14px;font-weight: bold;color:rgb(252, 138, 97)">
                            {{ $message->user->fullName }}</p>
                        <p>{{ $message->text }}</p>
                        <p style="font-size: 10px;color:#C4C4C4">
                            {{ $message->created_at->format('Y-m-d H:i') }}
                        </p>
                    </div>
                </div>
            @endif
        @endforeach
    @else
        <div id='noMessages' style="text-align: center;margin: 50% auto;">برای شما در این آگهی پیامی ثبت نشده</div>
    @endif
</div>
<div style="display: flex;margin: 4px 0px 4px 4px;">
    @php
        if ($chatMessage->advertiser == Auth::user()->id) {
            $senderId = Auth::user()->id;
            $receiverId = $chatMessage->buyer;
        } else {
            $senderId = Auth::user()->id;
            $receiverId = $chatMessage->advertiser;
        }
    @endphp
    <button class="sendMessage" onclick="sendMessage({{ $senderId }},{{ $receiverId }});"><i
            class="material-icons" style="color: white;">send</i></button>
    <input class="inputMessage" type="text" placeholder="متن پیام ..."
        onkeyup="sendbyEnter(event,{{ $senderId }},{{ $receiverId }});">
</div>


<script type="text/javascript">
    function sendbyEnter(event, senderId, receiverId) {
        if (event.keyCode === 13) {
            event.preventDefault();
            sendMessage(senderId, receiverId);
        }
    }

    function sendMessage(senderId, receiverId) {
        var messageList = document.getElementById("messageList");
        var noMessages = document.getElementById("noMessages");
        var inputText =
            document.getElementsByClassName("inputMessage")[0];

        if (inputText.value != "") {

            var parentDiv = document.createElement("div");
            parentDiv.style.textAlign = "right";
            var message = document.createElement("div");
            message.classList.add("isMineMessage");
            var messageText = document.createElement("p");
            handleRequest(inputText.value, senderId, receiverId, (res) => {
                if (noMessages != null)
                    noMessages.style.display = "none";
                messageText.innerHTML = res.message.text;
                messageText.style.textAlign = "initial";

                var messageTime = document.createElement("p");
                messageTime.innerHTML = res.message.created_at;
                messageTime.style = "font-size: 10px;color:#DDDDDD";

                var messageSeen = document.createElement("i");
                messageSeen.className = "fa fa-check";
                messageSeen.style = "margin-right:5px;font-size : 12px";
                messageTime.appendChild(messageSeen)

                message.appendChild(messageText);
                message.appendChild(messageTime);
                parentDiv.appendChild(message);
                messageList.appendChild(parentDiv);
                messageList.scrollTop = messageList.scrollHeight;
                inputText.value = "";
            });
        }
    }

    function handleRequest(messageText, senderId, receiverId, callBack) {
        axios.post('http://127.0.0.1:8000/api/addMessage', {
            chatId: "{{ $chatMessage->id }}",
            sender: senderId,
            receiver: receiverId,
            text: messageText,
        }).then(function(response) {
            return callBack(response.data)
        }).catch(function(e) {
            console.log(e);
        })
    }
</script>
