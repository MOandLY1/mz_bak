<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>登录页面</title>
    <link rel="stylesheet" href="./css/land.css">
    <script src="https://libs.cdnjs.net/jquery/3.4.1/jquery.js"></script>
    <script type="text/javascript"  src="./js/mzsc.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="wrap">
    <div class="a"></div>
    <div class="main">
        <div class="main_header">登录魅族商城</div>
        <div class="main_main">
                <div class="b">
                    <input class="main_input_text" id="name" name="name" type="text" placeholder="输入账号">
                </div>
                <div class="b">
                    <input id="main_input_password" name="password" class="main_input_password fl" type="password" placeholder="输入密码" value="">

                    <input id="main_input_password_" name="password_" class="main_input_password_ fl" type="text" placeholder="输入密码" value="">
                    <span onclick="switch_password()" class="c fl"><img src="./img/31.png" alt=""></span>
                </div>
                <div class="b">
                    <input type="button" class="main_input_submit" onclick="Submission()" placeholder="提交" value="提交">
                </div>
        </div>
        <div class="footer">没有账号*<a href="{{url('/register')}}">注册</a></div>
    </div>
</div>

<script>



</script>

</body>
</html>