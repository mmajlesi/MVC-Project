@extends('layouts.layout')
@section('content')

    <head>
        <title>اطلاعات آگهی</title>
    </head>
    <!-- ----------------------------------------------------------------------------------------------- -->
    <div id="mySidenav" class="sidenav">
        <div style="background-color: coral;height: 8%;display:flex;justify-content: space-between;">
            <p style="align-self: center;margin-right:4px;color:white">{{ $advertisement->name }}</p>
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        </div>
        @guest
            <div style="text-align: center;margin: 100% auto;">برای مشاهده پیام‌ها در ابتدا باید وارد حساب خود شوید.</div>
        @else

            @if ($chats->isNotEmpty())

                <div id="chatList" style="height: 100%;overflow-y: scroll;overflow-x: hidden;">
                    @foreach ($chats as $chat)
                        <div style="margin: 5px;">
                            <a href="#" style=" background-color: #ffffff;" onclick="openNav({{ $chat->id }}); ">
                                <span
                                    style="color:black;padding-right : 20px ; font-size:18px">{{ $chat->user->fullName }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>

                <iframe id="messageList" style="height: 100%;display:none;width: 100%;border:none;"></iframe>

            @else
                <div style="text-align: center;margin: 100% auto;">برای این آگهی گفتگویی ثبت نشده است</div>
            @endif
        @endguest

    </div>
    <!-- ----------------------------------------------------------------------------------------------- -->
    <div style="margin:2% 30% 0px 20%;">
        <div style="display: flex;">
            <div style="width:45%;">
                <h3>{{ $advertisement->name }}</h3>
                <hr>
                <div style="margin-top:5%;margin-bottom: 2%; color:gray;display: flex;justify-content: space-between;">
                    <div>قیمت </div>
                    <div style="color:black">{{ $advertisement->price }}</div>
                </div>
                <hr>
                <div style="margin-top:5%;margin-bottom: 2%; color:gray;display: flex;justify-content: space-between;">
                    <div>تگ‌ها</div>
                    <div style="color:black">
                        @foreach ($tags as $tag)
                            {{ $tag->name }}
                            @if ($tag != $tags->last()) ، @endif
                        @endforeach
                    </div>
                </div>
                <hr>
                <div style="display: flex;justify-content: space-between;">
                    <div style="margin-top:5%;">
                        <a class="buy_button" href="/advertisement/purchase/{{ $advertisement->id }}">خرید</a>
                    </div>
                    <div style="margin-top:5%">
                        <a href="#" class="chat_button" onclick="openChatsNav()">چت</a>
                    </div>
                </div>
                <div style="margin-top:5%;text-align: center;">
                    <a href="{{ $advertisement->prev_link }}" class="preview_button">پیش نمایش</a>
                </div>
            </div>
            <div style="margin-right: 20%;">
                <img width="100%" src="{{ $advertisement->img_link }}" alt="بارگیری تصویر ناموفق بود">
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function openChatsNav() {
            document.getElementById("mySidenav").style.width = "25%";
            document.getElementById("main").style.marginRight = "25%";
        }

        function openNav(chat) {

            var chatList = document.getElementById("chatList");
            chatList.style.display = "none";
            var messageList = document.getElementById("messageList");
            messageList.style.display = "block";
            messageList.src = `/messenger/${chat}`
            messageList.scrollTop = messageList.scrollHeight;
            document.getElementById("mySidenav").style.width = "25%";
            document.getElementById("main").style.marginRight = "25%";
        }
        /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */

        function closeNav() {
            var chatList = document.getElementById("chatList");
            var messageList = document.getElementById("messageList");
            if (chatList?.style.display == "none" && messageList?.style.display == "block") {
                chatList.style.display = "block";
                messageList.style.display = "none";
            } else {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginRight = "0";
            }
        }
    </script>
@endsection
