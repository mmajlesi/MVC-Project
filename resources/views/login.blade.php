<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>صفحه ورود</title>
    <link rel="stylesheet" href="Css/styles.css">
    <script type="text/javascript" src="./js/JsCodes.js"> </script>
</head>

<body>
    <span id="Datetime" style="color: rgb(255, 255, 255); position: absolute;top:0;margin-right: 75%;text-shadow: 0px 1px 4px black;"></span>
    <div class="LoginForm">
        <h1>
            سایت کتابفروشی آنلاین
        </h1>
        <br>
        <h3>
            ورود به حساب کاربری
        </h3>
        <br>
        <form action="page_Login.php" method="POST">
            <input type="text" id="username" name="username" class="txt_input" placeholder="نام کاربری"><br>
            <input type="password" id="pwd" name="pwd" class="txt_input" placeholder="رمزعبور"><br><br>
            <input type="submit" value="ورود" class="submit_input"><br>
        </form>
        <p>
            آیا حسابی ندارید؟
            <a href="/register" target="_blank">
                ایجاد حساب
            </a>
        </p>
        <?php

        // $mysqli = mysqli_connect("127.0.0.1", "root", "", "ie_project") or die("Connect Faild : $s\n" . mysqli_connect_error());

        if (@isset($_POST['username']) & @isset($_POST['pwd'])) {
            $username = @$_POST['username'];
            $password = @$_POST['pwd'];

            //     if (EI_UserTable($username, $password)) {
            //         $record = UserInformation($username);
            //         session_start();
            //         $_SESSION['auth'] = TRUE;
            //         $_SESSION['name'] = $record['Name'];
            //         $_SESSION['username'] = $record['Username'];
            //         $_SESSION['pwd'] = $record['Password'];
            //         $_SESSION['Credit'] = $record['Credit'];
            //         if (isset($record['PhoneNumber']) && !empty($record['PhoneNumber']))
            //             $_SESSION['phone'] = $record['PhoneNumber'];
            //         if (isset($record['Email']) && !empty($record['Email']))
            //             $_SESSION['email'] = $record['Email'];
            //         header("Location: index.php");
            //     } elseif (EI_AdminTable($username, $password)) {
            //         $record = AdminInformation($username);
            //         session_start();
            //         $_SESSION['auth'] = TRUE;
            //         $_SESSION['username'] = $record['Username'];
            //         $_SESSION['Admin_id'] = $record['id'];
            //         header("Location: page_Management.php");
            //     } else {
            // 
        ?>
            <!--          <br> <span style="color: red;font-weight: bold;font-size: 20px;">نام کاربری یا رمز عبور را اشتباه وارد کرده‌اید.</span> -->
            <!-- <?php
                    //     }
                }
                    ?>

    </div>

    <script type="text/javascript">
        Datetime();
    </script>
</body>

</html>