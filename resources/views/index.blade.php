<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>صفحه اصلی</title>
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
        <a href="#" class="active">صفحه اصلی</a>
        <a href="/advertisements">محصولات</a>
        <a href="userPanel.php#insertBook">ایجاد آگهی</a>
        <a href="#about us">درباره ما</a>
        <!-- سمت چپ -->
        <div style="float: left;">
            <?php session_start();
            if (!isset($_SESSION["auth"])) {
            ?>
                <a href="/login">ورود</a>

                <a href="/register">ثبت نام</a>
            <?php
            } else {
            ?>
                <div class="dropdown active">
                    <button class="dropbtn" onclick="window.location='userPanel.php'">
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
            <a class='fas fa-cart-plus' href="userPanel.php#cart" style="float:right;padding:18px; cursor:pointer; color:white; font-size:24px;"></a>
        </div>
    </div>
    <!--------------------------------------------------------------------------------------------------------------------------------------->
    <!--------------------------------------------------------- متن های ابتدایی ------------------------------------------------------------>
    <div style="margin-right: 5%;">
        <h1>معرفی سایت کتابفروشی آنلاین</h1>
        <hr width="400px">
        <p>
            سعی ما در این وبگاه این است تا با ارائه محصولاتی در زمینه‌های فرهنگی ، اجتماعی و علمی در بخش‌هایی شامل :
        <ul style="list-style-position: inside;">
            <li>رمان</li>
            <li>تخصصی</li>
        </ul>
        شما را در امر یادگیری علم و ترویج فرهنگ کتاب و کتابخوانی یاری کنیم.
        </p>
        <br>
        <ul style="list-style:circle;list-style-position: inside;font-size: 15px;">
            <li>برای مشاهده محصولات در قسمت منو بر روی محصولات کلیک کنید.</li>
        </ul>
        <br>
        <hr>
        <!--------------------------------------------------------------------------------------------------------------------------------->
        <!------------------------------------------------------------ درباره ما --------------------------------------------------------------->
        <h1 id="about us">درباره ما</h1>
        <hr width="150px">
        <p>
            این وبگاه توسط میلاد مجلسی برای درس مهندسی اینترنت تهیه و تولید شده است.
        </p>
        <!--------------------------------------------------------------------------------------------------------------------------------->
        <!----------------------------------------------------------- برگزیدگان ---------------------------------------------------------------->
        <footer>
            <fieldset style="margin-left: 5%; border-color:#e79925;">
                <legend class="Legend">کتاب‌های برگزیده</legend>
                <div style="width : 15%; margin: auto;">
                    <?php
                    $mysqli = mysqli_connect("127.0.0.1", "root", "", "ie_project") or die("Connect Faild : $s\n" . mysqli_connect_error());
                    $result = mysqli_query($mysqli, "SELECT * FROM chosen,books WHERE chosen.book_id = books.id") or die(mysqli_error($mysqli));
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="SlideShow">
                            <figure>
                                <img src="<?php echo $row['ImageLink'] ?>" alt="بارگیری تصویر ناموفق بود" style="width:100%">
                                <figcaption>
                                    <h5><?php echo $row['Name'] ?></h5>
                                    <h6>قیمت : <?php echo $row['Price'] ?> تومان</h6>
                                    <a class="info_button" href="product_info.php?product_id=<?php echo $row['id'] ?>">اطلاعات محصول</a>
                                </figcaption>
                            </figure>
                        </div>
                    <?php }
                    mysqli_free_result($result);
                    mysqli_close($mysqli);
                    ?>
                    <div style="text-align: center;">
                        <a class="next" onclick="changeSlides(+1)">&#10094;</a>
                        <span id="numbertext"></span>
                        <a class="prev" onclick="changeSlides(-1)">&#10095;</a>
                    </div>
                </div>
            </fieldset>
        </footer>
        <br>
    </div>

    <script type="text/javascript">
        DateTime();

        var slideIndex = 0;
        var flag = false;
        showSlides(slideIndex);

        function changeSlides(n) {
            flag = true;
            showSlides(n);
        }

        function showSlides(n2) {
            var i;
            var slides = document.getElementsByClassName("SlideShow");
            if (flag == false) {
                slideIndex++;
            } else {
                slideIndex += n2;
            }
            if (slideIndex > slides.length || slideIndex < 1) {
                slideIndex = 1;
            }
            document.getElementById("numbertext").innerHTML = slideIndex + "/" + slides.length;
            for (i = 0; i < slides.length; i++) {
                if (i == (slideIndex - 1))
                    slides[slideIndex - 1].style.display = "block";
                else
                    slides[i].style.display = "none";
            }
            if (flag == false)
                setTimeout(showSlides, 7000);
            flag = false;
        }
    </script>
</body>

</html>