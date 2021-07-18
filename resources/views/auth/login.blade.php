<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>صفحه ورود</title>
    <link rel="stylesheet" href="Css/styles.css">
    <script type="text/javascript" src="./js/JsCodes.js"> </script>
</head>

<body>
    <span id="Datetime"
        style="color: rgb(255, 255, 255); position: absolute;top:0;margin-right: 75%;text-shadow: 0px 1px 4px black;"></span>
    <div class="LoginForm">
        <h1>
            سایت کتابفروشی آنلاین
        </h1>
        <br>
        <h3>
            ورود به حساب کاربری
        </h3>
        <br>
        <form action="/login" method="POST">
            @csrf
            <input type="text" id="username" name="username" class="txt_input" placeholder="نام کاربری"><br>
            <input type="password" id="password" name="password" class="txt_input" placeholder="رمزعبور"><br><br>
            <input type="submit" value="ورود" class="submit_input"><br>
        </form>
        <p>
            آیا حسابی ندارید؟
            <a href="/register" target="_blank">
                ایجاد حساب
            </a>
        </p>
    </div>

    <script type="text/javascript">
        Datetime();
    </script>
</body>

</html>
