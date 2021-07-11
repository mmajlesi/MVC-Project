<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>صفحه ثبت نام</title> 
    <link rel="stylesheet" href="Css/styles.css">
    <script type="text/javascript" src="J./js/JsCodes.js"> </script>
</head>

<body>
    <span id="Datetime" style="color: rgb(255, 255, 255); position: absolute;top:0;margin-right: 75%;text-shadow: 0px 1px 4px black;"></span>
    <div style="margin-top: 10%;">
        <div class="RegisterFormText">
            <h1>
                سایت کتابفروشی آنلاین
            </h1>
            <br>
            <h3>
                ایجاد حساب
            </h3>
        </div>
        <div class="RegisterForm">
            <form action="page_Register.php" method="POST" onsubmit="return checkRegisterForm();">
                <div style="float: right; width: 50%;">
                    <label for="name">* نام و نام خانوادگی</label><br>
                    <input type="text" id="name" name="name" class="txt_input"><br>
                    <label for="pass">* رمزعبور</label>
                    <span id="PassWarning" style="font-size: 10px;color: red;"></span><br>
                    <input type="password" id="pwd" name="pwd" class="txt_input"><br>
                    <label for="phone">تلفن (اختیاری)</label><br>
                    <input type="tel" id="phone" name="phone" class="txt_input"><br><br>
                    <input type="submit" value="ثبت" class="submit_input"><br>
                </div>
                <div style="float:left;width: 50%;">
                    <label for="user">* نام کاربری</label><br>
                    <input type="text" id="username" name="username" class="txt_input"><br>
                    <label for="pass">* تکرار رمزعبور</label><br>
                    <input type="password" id="repwd" name="repwd" class="txt_input"><br>
                    <label for="email">پست الکترونیکی (اختیاری)</label><br>
                    <input type="email" id="email" name="email" class="txt_input"><br><br>
                    <input type="reset" value="تنظیم مجدد" class="submit_input" onclick="setDefault();"><br>
                </div>
            </form>
        </div>
        <span id="Warning"></span>
    </div>
    <?php
    $mysqli = mysqli_connect("127.0.0.1", "root", "", "ie_project") or die("Connect Faild : $s\n" . mysqli_connect_error());

    if (@isset($_POST["name"]) & @isset($_POST["username"]) & @isset($_POST["pwd"])) {
        $name =  @$_POST["name"];
        $username = @$_POST["username"];
        $password = @$_POST["pwd"];
        $phone = @$_POST["phone"];
        $email = @$_POST["email"];
        $flag = mysqli_query($mysqli, "SELECT * From user where Username = $username") or die(mysqli_error($mysqli));
        if ($flag->num_rows == 0) {
            $result = mysqli_query($mysqli, "INSERT INTO user(Username,Password,Name,PhoneNumber,Email) VALUES('$username','$password','$name','$phone','$email');") or die(mysqli_error($mysqli));
            mysqli_close($mysqli);

            if ($result == 1) {
                header("Location:page_Login.php");
            }
        } else
    ?>
        <script type="text/javascript">
            document.getElementById("Warning").innerHTML = "این نام کاربری قبلا انتخاب شده است."
        </script>;
    <?php
}
    ?>

    <script type="text/javascript">
        Datetime();
    </script>
</body>