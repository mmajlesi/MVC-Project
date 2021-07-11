DateTime = function () {
    var d = new Date();
    var dat = d.toString().split("G");
    document.getElementById("DateTime").innerHTML = dat[0]; 
    setTimeout(DateTime, 1000);
};

function setDefault() {
    var warningSpan = (document.getElementById("Warning").innerHTML = "");
    document.getElementById("PassWarning").innerHTML = "";
    AllTxt_input = document.getElementsByClassName("txt_input");
    for (var i = 0; i < AllTxt_input.length; i++)
        AllTxt_input[i].style.border = "1px solid #b6b6b6";
}
function checkRegisterForm() {
    var namePattern = /[^ a-zA-Z\u0600-\u06FF\s]/;
    var phonePattern = /^09\d{9}/;
    var inputname = document.getElementById("name");
    var inputusername = document.getElementById("username");
    var inputpwd = document.getElementById("pwd");
    var inputrepwd = document.getElementById("repwd");
    //   var inputphone = document.getElementById('phone');
    var warningSpan = document.getElementById("Warning");

    //baraye meqdar dehi avalie dobare b input ha , bara zamani k red mishan
    setDefault();
    //-------------------------------------------------------------------------
    var flag = false;
    if (
        inputname.value.length != 0 &&
        inputusername.value.length != 0 &&
        inputpwd.value.length != 0 &&
        inputrepwd.value.length != 0
    ) {
        if (inputname.value.match(namePattern)) {
            inputname.style.borderColor = "red";
            flag = true;
        }
        if (inputpwd.value.length < 6) {
            document.getElementById("PassWarning").innerHTML =
                "(*رمز عبور حداقل باید 6 کاراکتر باشد.)";
            inputpwd.style.borderColor = "red";
            inputrepwd.style.borderColor = "red";
            flag = true;
        }
        if (inputpwd.value != inputrepwd.value) {
            document.getElementById("PassWarning").innerHTML =
                "(*عدم تطابق گذرواژه)";
            inputpwd.style.borderColor = "red";
            inputrepwd.style.borderColor = "red";
            flag = true;
        }
        if (
            inputphone.value.length != 0 &&
            !inputphone.value.match(phonePattern)
        ) {
            inputphone.style.borderColor = "red";
            flag = true;
        }
        if (flag == true) {
            warningSpan.innerHTML = "برخی از مقادیر وارد شده نامعتبر هستند.";
            warningSpan.style.color = "red";
            return false;
        } else {
            window.alert("ثبت نام شما با موفقیت انجام شد.");
            return true;
        }
    } else {
        var warningSpan = document.getElementById("Warning");
        warningSpan.style.color = "red";
        warningSpan.innerHTML = "لطفا تمامی فیلدهای اجباری را پرکنید.";
        return false;
    }
}

function sendbyEnter(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        sendMessage();
    }
}

function openNav() {
    document.getElementById("mySidenav").style.width = "20%";
    document.getElementById("main").style.marginRight = "20%";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginRight = "0";
}

function sendMessage() {
    var messageList = document.getElementById("messageList");
    var inputText = document.getElementsByClassName("inputMessage")[0];
    if (inputText.value != "") {
        var parentDiv = document.createElement("div");
        parentDiv.style.textAlign = "right";

        var message = document.createElement("div");
        message.classList.add("isMineMessage");

        var messageText = document.createElement("p");
        messageText.innerHTML = inputText.value;
        messageText.style.textAlign = "initial";

        var messageTime = document.createElement("p");
        var TimeNow = new Date().toString().split(" ")[4].split(":");
        messageTime.innerHTML = TimeNow[0] + ":" + TimeNow[1];
        messageTime.style = "font-size: 10px;color:#DDDDDD";

        message.appendChild(messageText);
        message.appendChild(messageTime);
        parentDiv.appendChild(message);
        messageList.appendChild(parentDiv);
        messageList.scrollTop = messageList.scrollHeight;

        inputText.value = "";
    }
}
