<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>اطلاعات محصول</title>
    <link rel="stylesheet" href="/css/Light.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script type="text/javascript" src="/js/JsCodes.js"> </script>
    <script>

    </script>
</head>

<body>
    <div id="main">
        <!--------------------------------------------------- تصویر بالای صفحه ---------------------------------------------------------------->
        <header class="topImagePage">
            <img src="/images/img_index.png" alt="img_index">
            <span id="DateTime" style=" position: absolute;top:0;margin-right: 88%;color: rgb(255, 115, 0);text-shadow: 2px 0px 5px black;"></span>
        </header>
        <!------------------------------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------- نوار منو بالای صفحه -------------------------------------------------------------->

        <div class="NavigationBar">
            <!-- سمت راست -->
            <a href="/">صفحه اصلی</a>
            <a href="/advertisements" class="dropbtn">محصولات</a>
            <a href="/#about us">درباره ما</a>
            <!-- سمت چپ -->
            <div style="float: left;">
                <?php session_start();
                if (isset($_SESSION["auth"]) == false) {
                ?>
                    <a href="/login">ورود</a>
                    <a href="/register">ثبت نام</a>
                <?php
                } else {
                ?>
                    <div class="dropdown active">
                        <button class="dropbtn">
                            <span id="1">
                                <?php
                                if (isset($_SESSION["name"]) && !empty($_SESSION["name"]))
                                    echo $_SESSION["name"] . " خوش آمدید.";
                                else
                                    echo "ناشناس";
                                ?>
                            </span>
                            <i class="fa fa-caret-down" style="margin-right: 5px;"></i>
                        </button>
                        <div class="dropdown-content" style="left: 60px; min-width:15%">
                            <div style=" padding-right:10px">
                                نام :<span>
                                    <?php
                                    if (isset($_SESSION["name"]) && !empty($_SESSION["name"]))
                                        echo $_SESSION["name"];
                                    else
                                        echo "ندارد";
                                    ?>
                            </div>
                            <div style=" padding-right:10px">
                                نام کاربری :<span>
                                    <?php
                                    if (isset($_SESSION["username"]) && !empty($_SESSION["username"]))
                                        echo $_SESSION["username"];
                                    else
                                        echo "ندارد";
                                    ?>
                                </span>
                            </div>
                            <div style=" padding-right:10px">
                                اعتبار :<span>
                                    <?php
                                    if (isset($_SESSION["Credit"]) && !empty($_SESSION["Credit"]))
                                        echo $_SESSION["Credit"] . " تومان";
                                    else
                                        echo "0 تومان";
                                    ?>
                                </span>
                            </div>
                            <div style=" padding-right:10px">
                                شماره تلفن :<span>
                                    <?php
                                    if (isset($_SESSION["phone"]) && !empty($_SESSION["phone"]))
                                        echo $_SESSION["phone"];
                                    else
                                        echo "ندارد";
                                    ?>
                                </span>
                            </div>
                            <div style=" padding-right:10px">
                                ایمیل :<span>
                                    <?php
                                    if (isset($_SESSION["email"]) && !empty($_SESSION["email"]))
                                        echo $_SESSION["email"];
                                    else
                                        echo "ندارد";
                                    ?>
                                </span>
                            </div>
                            <hr>
                            <a style="cursor: pointer;" href="LogOut.php">خروج</a>
                        </div>
                    </div>
                <?php
                }
                ?>
                <a class='fas fa-cart-plus' href="page_Purchase.php" style="float:right;padding:18px; cursor:pointer; color:white; font-size:24px;"></a>
            </div>

        </div>
        <!-- ----------------------------------------------------------------------------------------------- -->
        <div id="mySidenav" class="sidenav">
            <div style="background-color: coral;height: 8%;display:flex;justify-content: space-between;">
                <p style="align-self: center;margin-right:4px;color:white">نام آگهی</p>
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            </div>

            <div id="messageList" style="height: 84%;overflow-y: scroll;overflow-x: hidden;">

                <div style="text-align: right;">
                    <div class="isMineMessage">
                        <p>سلام</p>
                        <p style="font-size: 10px;margin-top:2px;color:#DDDDDD">06:54</p>
                    </div>
                </div>

                <div style="text-align: left;">
                    <div class="isNotMineMessage">
                        <p>سلام</p>
                        <p style="font-size: 10px;color:#C4C4C4">06:54</p>

                    </div>
                </div>

                <div style="text-align: left;">
                    <div class="isNotMineMessage">
                        <p>وضعیت کتاب به چه صورت است؟</p>
                        <p style="font-size: 10px;margin-top:2px;color:#C4C4C4">06:54</p>
                    </div>
                </div>

                <div style="text-align: right;">
                    <div class="isMineMessage">
                        <p>در حد نو است.</p>
                        <p style="font-size: 10px;margin-top:2px;color:#DDDDDD">06:54</p>
                    </div>
                </div>
            </div>
            <div style="display: flex;margin: 4px 0px 4px 4px;">
                <button class="sendMessage" onclick="sendMessage()"><i class="material-icons" style="color: white;">send</i></button>
                <input class="inputMessage" type="text" placeholder="متن پیام ..." onkeyup="sendbyEnter(event);">
            </div>

        </div>
        <!-- ----------------------------------------------------------------------------------------------- -->
        <div style="margin:2% 30% 0px 20%;">

            <div style="display: flex;">
                <div style="width:45%;">
                    <h3>نام آگهی</h3>
                    <hr>

                    <div style="margin-top:5%;margin-bottom: 2%; color:gray;display: flex;justify-content: space-between;">
                        <div>قیمت </div>
                        <div style="color:black"> قیمت آگهی</div>
                    </div>
                    <hr>

                    <div style="margin-top:5%;margin-bottom: 2%; color:gray;display: flex;justify-content: space-between;">
                        <div>تگ</div>
                        <div style="color:black">تخصصی</div>
                    </div>
                    <hr>
                    <div style="display: flex;justify-content: space-between;">
                        <div style="margin-top:5%;">
                            <a class="buy_button" href="buy.php?product_id=1">خرید</a>
                        </div>
                        <div style="margin-top:5%">
                            <a href="#" class="chat_button" onclick="openNav()">چت</a>
                        </div>
                    </div>
                    <div style="margin-top:5%;text-align: center;">
                        <a href="لینک پیش نمایش" class="preview_button">پیش نمایش</a>
                    </div>
                </div>
                <div style="margin-right: 20%;">
                    <img width="100%" src="لینک عکس" alt="بارگیری تصویر ناموفق بود">
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        DateTime();
    </script>
</body>

</html>