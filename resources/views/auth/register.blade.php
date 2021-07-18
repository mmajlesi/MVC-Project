<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>صفحه ثبت نام</title>
    <link rel="stylesheet" href="css/styles.css">
    <script type="text/javascript" src="./js/JsCodes.js"></script>
</head>

<body>
    <span id="DateTime"
        style="color: rgb(255, 255, 255); position: absolute;top:0;margin-right: 75%;text-shadow: 0px 1px 4px black;"></span>
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
            <form action="/register" method="POST">
                @csrf
                <div style="float: right; width: 50%;">
                    <label for="fullName">* نام و نام خانوادگی</label><br>
                    <input type="text" id="fullName" name="fullName" class="txt_input"><br>
                    <label for="password">* رمزعبور</label>
                    @error('password')
                        <span style="color : red ">
                            <strong>{{ $message }}</strong>
                        </span><br>
                    @enderror
                    <input type="password" id="password" name="password"
                        class="txt_input @error('username') is-invalid @enderror" required><br>
                    <label for="phoneNumber">* تلفن</label><br>
                    <input type="tel" id="phoneNumber" name="phoneNumber"
                        class="txt_input @error('phoneNumber') is-invalid @enderror" required><br>
                    @error('phoneNumber')
                        <span style="color : red ">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <input type="submit" value="ثبت" class="submit_input"><br>
                </div>
                <div style="float:left;width: 50%;">
                    <label for="username">* نام کاربری</label><br>
                    <input type="text" id="username" name="username"
                        class="txt_input @error('username') is-invalid @enderror" required><br>
                    @error('username')
                        <span style="color : red ">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="password-confirm">* تکرار رمزعبور</label><br>
                    <input type="password" id="password-confirm" name="password_confirmation" class="txt_input"
                        required><br>

                    <label for="email">پست الکترونیکی (اختیاری)</label><br>
                    <input type="email" id="email" name="email" class="txt_input"><br><br>
                    <input type="reset" value="تنظیم مجدد" class="submit_input" onclick="setDefault();"><br>
                </div>
            </form>
        </div>
        <span id="Warning"></span>
    </div>
    <?php
    // $mysqli = mysqli_connect("127.0.0.1", "root", "", "ie_project") or die("Connect Faild : $s\n" . mysqli_connect_error());
    
    // if (@isset($_POST["name"]) & @isset($_POST["username"]) & @isset($_POST["pwd"])) {
    //     $name =  @$_POST["name"];
    //     $username = @$_POST["username"];
    //     $password = @$_POST["pwd"];
    //     $phone = @$_POST["phone"];
    //     $email = @$_POST["email"];
    //     $flag = mysqli_query($mysqli, "SELECT * From user where Username = $username") or die(mysqli_error($mysqli));
    //     if ($flag->num_rows == 0) {
    //         $result = mysqli_query($mysqli, "INSERT INTO user(Username,Password,Name,PhoneNumber,Email) VALUES('$username','$password','$name','$phone','$email');") or die(mysqli_error($mysqli));
    //         mysqli_close($mysqli);
    
    //         if ($result == 1) {
    //             header("Location:page_Login.php");
    //         }
    //     } else
    ?>
    {{-- <script type="text/javascript">
            document.getElementById("Warning").innerHTML = "این نام کاربری قبلا انتخاب شده است."
        </script>; --}}
    <?php
    // }
    ?>

    <script type="text/javascript">
        DateTime();
    </script>
</body>
