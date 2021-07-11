<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>صفحه آگهی‌ها</title>
    <link rel="stylesheet" href="/css/Light.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script type="text/javascript" src="/js/JsCodes.js"></script>
</head>

<body>
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
        <a href="#" class="active">محصولات</a>
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
    </div>
    <!--------------------------------------------------------------------------------------------------------------------------------------->
    <div style="margin-right: 5%;">
        <h1>لیست محصولات</h1>
        <hr width="240px">
        <!------------------------------------------------------------------------------------------------------------------------------------->
        <!-------------------------------------------------- لیست محصولات -------------------------------------------------------------->
        <h2 id="takhasosi" style="margin: 10px; color: coral;text-align: center;">تخصصی</h2>
        <hr>
        <div class="ProductList">
            <?php
            $mysqli = mysqli_connect("127.0.0.1", "root", "", "ie_project") or die("Connect Faild : $s\n" . mysqli_connect_error());
            $result = mysqli_query($mysqli, "SELECT * FROM books WHERE Specialty = 1") or die(mysqli_error($mysqli));
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <figure name="<?php echo $row['id'] ?>">
                    <img src="<?php echo $row['ImageLink'] ?>" alt="بارگیری تصویر ناموفق بود" style="width:100%">
                    <figcaption>
                        <h5><?php echo $row['Name'] ?></h5>
                        <h6>قیمت : <?php echo $row['Price'] ?> تومان</h6>
                        <a class="info_button" href="/advertisement_info/<?php echo $row['id'] ?>">اطلاعات محصول</a>
                    </figcaption>
                </figure>
            <?php
            }
            mysqli_free_result($result);
            mysqli_close($mysqli);
            ?>
        </div>
        <div class="ProductList">
            <h2 id="roman" style="margin-bottom: 10px; color: coral;">رمان‌</h2>
            <hr>
            <?php
            $mysqli = mysqli_connect("127.0.0.1", "root", "", "ie_project") or die("Connect Faild : $s\n" . mysqli_connect_error());
            $result = mysqli_query($mysqli, "SELECT * FROM books WHERE Specialty = 0") or die(mysqli_error($mysqli));
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <figure name="<?php echo $row['id'] ?>">
                    <img src="<?php echo $row['ImageLink'] ?>" alt="بارگیری تصویر ناموفق بود" style="width:100%">
                    <figcaption>
                        <h5><?php echo $row['Name'] ?></h5>
                        <h6>قیمت : <?php echo $row['Price'] ?> تومان</h6>
                        <a class="info_button" href="/advertisement_info/<?php echo $row['id'] ?>">اطلاعات محصول</a>
                    </figcaption>
                </figure>
            <?php
            }
            mysqli_free_result($result);
            mysqli_close($mysqli);
            ?>

        </div>
    </div>
    <script type="text/javascript">
        DateTime();
    </script>
</body>

</html>