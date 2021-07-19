<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/Light.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="/js/JsCodes.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!--------------------------------------------------- تصویر بالای صفحه ---------------------------------------------------------------->
    <header class="topImagePage">
        <img src="/images/FirstBanner.jpg" alt="img_index">
        <span id="DateTime"
            style=" position: absolute;top:0;margin-right: 88%;color: rgb(255, 115, 0);text-shadow: 2px 0px 5px black;"></span>

        {{-- <form action="/advertisements/search" method="POST" style=" position: absolute;top:0;margin-top: 18%;margin-right:12px;">
            <input type="text" name="searchBar" />
            <input type="submit" /> --}}
        </form>
    </header>
    <!------------------------------------------------------------------------------------------------------------------------------------->
    @php
        $user = Auth::user();
    @endphp
    <!-------------------------------------------------- نوار منو بالای صفحه -------------------------------------------------------------->
    <div class="NavigationBar">
        <!-- سمت راست -->
        <a href="/">صفحه اصلی</a>
        <a href="/advertisements">آگهی‌ها</a>
        <a href="/#about us">درباره ما</a>

        <div class="search-container">
            <form action="/advertisements/search" method="POST">
                @csrf
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <!-- سمت چپ -->
        <div style="float: left;">
            @guest
                <a href="/login">ورود</a>
                <a href="/register">ثبت نام</a>
            @else
                <div class="dropdown active">
                    <button class="dropbtn" onclick="window.location='/panel'">
                        <span id="1">
                            @if ($user->fullName != null)
                                {{ $user->fullName }} خوش آمدید
                            @else
                                ناشناس
                            @endif
                        </span>
                        <i class="fa fa-caret-down" style="margin-right: 5px;"></i>
                    </button>
                    <div class="dropdown-content" style="left: 60px; min-width:15%">
                        <div style=" padding-right:10px">
                            <span>
                                نام :
                                @if ($user->fullName != null)
                                    {{ $user->fullName }}
                                @else
                                    ندارد
                                @endif
                            </span>
                        </div>
                        <div style=" padding-right:10px">
                            <span>
                                نام کاربری :
                                @if ($user->username != null)
                                    {{ $user->username }}
                                @else
                                    ندارد
                                @endif

                            </span>
                        </div>
                        <div style=" padding-right:10px">
                            <span>
                                اعتبار :
                                @if ($user->credit > 0)
                                    {{ $user->credit }} تومان
                                @else
                                    فاقد اعتبار
                                @endif
                            </span>
                        </div>
                        <div style=" padding-right:10px">
                            <span>
                                شماره تلفن :
                                @if ($user->phoneNumber != null)
                                    {{ $user->phoneNumber }}
                                @else
                                    ندارد
                                @endif
                            </span>
                        </div>
                        <div style=" padding-right:10px">
                            <span>
                                ایمیل :
                                @if ($user->email != null)
                                    {{ $user->email }}
                                @else
                                    ندارد
                                @endif
                            </span>
                        </div>
                        <hr>
                        <a style="cursor: pointer;" href="/logout"
                            onclick="event.preventDefault();
                                                                                                document.getElementById('logout-form').submit();">خروج</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest
            <a class='fas fa-cart-plus' href="/panel#cart"
                style="float:right;padding:18px; cursor:pointer; color:white; font-size:24px;"></a>
        </div>
    </div>
    @yield('content')
    <script type="text/javascript">
        DateTime();
    </script>
</body>

</html>
