<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>注册页面</title>
    <link rel="stylesheet" href="./css/register.css">
    <script type="text/javascript"  src="./js/mzsc.js"></script>
    <script src="https://libs.cdnjs.net/jquery/3.4.1/jquery.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="wrap">
    <div class="a"></div>
    <div class="main">
        <div id="main_header" class="main_header">注册魅族账号</div>
        <div class="main_main">
                <div class="b">
                    <input id="name" class="main_input_text" type="text" placeholder="输入用户名">
                </div>
                <div class="b">
                    <input id="password" class="main_input_password fl" type="password" placeholder="输入密码">
                    <input id="password_" class="main_input_password_ fl" type="text" placeholder="输入密码">
                    <span onclick="switch_password1()" class="c fl"><img src="./img/31.png" alt=""></span>
                </div>
                <div class="b">
                    <input id="_password" class="main_input_password fl" type="password" placeholder="确认密码">
                    <input id="_password_" class="main_input_password_ fl" type="text" placeholder="确认密码">
                    <span onclick="switch_password2()" class="c fl"><img src="./img/31.png" alt=""></span>
                </div>
                <div class="b">
                    <input class="main_input_submit" onclick="register()" type="submit" placeholder="提交">
                </div>
        </div>
        <div class="footer">已有账号*<a href="{{url('/land')}}">登录</a></div>
    </div>
</div>

</body>
</html>