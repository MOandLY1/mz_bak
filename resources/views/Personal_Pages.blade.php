<!DOCTYPE html>
<html>
<head>
    <title>个人中心</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/Personal_Center.css">
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script src="./js/mzsc.js"></script>
</head>
<body>
<div class="header">                   <!--头部-->

    <div class="nav">                                           <!--导航条-->
        <div class="header_left fl">
            <div class="header_nav fl">
                <img onclick="jump_homepage()" src="./img/1.png" alt="">
            </div>
            <div class="header_menu fl">魅族商城</div>
            <div class="header_menu fl">魅族手机</div>
            <div class="header_menu fl">魅蓝手机</div>
            <div class="header_menu fl">魅族声学</div>
            <div class="header_menu fl">智能配件</div>
            <div class="header_menu fl">服务</div>
            <div class="header_menu fl">专卖店</div>
            <div class="header_menu fl">Flyme</div>
            <div class="header_menu fl">社区</div>
        </div>


        <div class="header_right fr">
            <div class="nav_input fl">
                <input id="nav_retrieval" class="nav_input_text" placeholder="搜索" type="text">
            </div>
            <span onclick="retrieval()" class="retrieval fl"><img src="./img/30.png" alt=""></span>
            <div class="user_state fl">
                <img onmouseover="Personal_Center()" onmouseout="Personal_Center_()" src="./img/8.png" alt="">
            </div>
            <?php if(empty(session('user'))){ ?>
            <div onmouseout="user_state_details()" onclick="Jump_land()" id="user_state_details" class="user_state_details">未登录，点击登录</div>
            <?php }else{ ?>
            <div onclick="Cancellation()" onmouseout="user_state_details()"  id="user_state_details" class="user_state_details_">用户：<?php  echo session('user')['name']?><br>注销登录</div>
            <?php } ?>



            <div class="Shopping_Cart fl">
                <img src="./img/9.png" alt="">
            </div>
        </div>
    </div>
</div>
<div class="wrap">

    <div class="main">                    <!--主体-->
        <div class="main_account_management">     <!--账号管理-->
            <div class="account_management">
                <div class="Account">账号管理</div>
                <div class="Account_Underline"></div>
            </div>
            <div class="account_status">
                <div class="head_portrait fl"><img src="./img/34.png" ></div>
                <div class="user fl">

                    <div id="user_name" class="user_name">用户**<?php echo session('user')['name'] ?> <img onclick="modify_name()" src="./img/35.png" alt=""></div>
                    <div id="user_name_" class="user_name_">
                        <input type="text" id="modify_name" placeholder="输入您的新用户名">
                        <input type="button" onclick="New_username()" value="提交">
                        <input type="button" onclick="modify_name_()" value="取消">
                    </div>

                </div>
            </div>
        </div>

        <div class="main_account_security">              <!--账号安全-->
            <div class="account_security">账号安全</div>
            <div class="account_security_details">



                <div id="Change_Password" class="Account_security_details">
                    <div class="Account_security_name fl">密码</div>
                    <div class="Account_security_centent fl"></div>
                    <div onclick="Change_Password()" class=" Account_security_modify fl">修改</div>
                </div>

                <div id="Change_Password_" class="Account_security_details_">
                    <div>修改密码</div>
                    <div>
                        <input id="password" type="text" placeholder="输入新密码">
                        <br>
                        <input id="confirm_password" type="text" placeholder="确认新密码">
                        <br>
                        <input onclick="Change_Password_Submission()" type="button" value="确认">
                        <input onclick="Change_Password_()" type="button" value="取消">
                    </div>
                </div>


                <?php if(empty(session('user')['mailbox'])){ ?>
                <div id="Change_security" class="Account_security_details">
                    <div class="Account_security_name fl">邮箱</div>
                    <div class="Account_security_centent fl">未绑定</div>
                    <div onclick="Change_Mailbox()" class="Account_security_modify fl">绑定</div>
                </div>

                <div id="Change_security_" class="Account_security_details_">
                    <div>绑定邮箱</div>
                    <div>
                        <input type="text" id="mailbox" placeholder="绑定邮箱">
                        <br>
                        <input type="button" onclick="Binding_Mailbox()" value="确认">
                        <input onclick="Change_Mailbox_()" type="button" value="取消">
                    </div>
                </div>
                <?php }else{ ?>
                <div id="Change_security" class="Account_security_details">
                    <div class="Account_security_name fl">邮箱</div>
                    <div class="Account_security_centent fl">已绑定</div>
                    <div onclick="Change_Mailbox()" class="Account_security_modify fl">修改</div>
                </div>

                <div id="Change_security_" class="Account_security_details_">
                    <div>修改绑定邮箱</div>
                    <div>
                        <input type="text" id="mailbox" placeholder="<?php echo session('user')['mailbox'] ?>">
                        <br>
                        <input type="button" onclick="Binding_Mailbox()" value="确认">
                        <input onclick="Change_Mailbox_()" type="button" value="取消">
                    </div>
                </div>
                <?php }?>    <!--邮箱-->



                <?php if(empty(session('user')['phone'])){ ?>
                <div id="Change_phone" class="Account_security_details">
                    <div class="Account_security_name fl">手机号码</div>
                    <div class="Account_security_centent fl">未绑定</div>
                    <div onclick="Change_phone()" class="Account_security_modify fl">绑定</div>
                </div>

                <div id="Change_phone_" class="Account_security_details_">
                    <div>绑定手机</div>
                    <div>
                        <input id="phone" type="text" placeholder="输入手机号">
                        <br>
                        <input onclick="binding_phone()" type="button" value="确认">
                        <input onclick="Change_phone_()" type="button" value="取消">
                    </div>
                </div>
                <?php }else{ ?>
                <div id="Change_phone" class="Account_security_details">
                    <div class="Account_security_name fl">手机号码</div>
                    <div class="Account_security_centent fl">已绑定</div>
                    <div onclick="Change_phone()" class="Account_security_modify fl">修改</div>
                </div>

                <div id="Change_phone_" class="Account_security_details_">
                    <div>修改绑定手机</div>
                    <div>
                        <input id="phone" type="text" placeholder="<?php echo session('user')['phone'] ?>">
                        <br>
                        <input onclick="binding_phone()" type="button" value="确认">
                        <input onclick="Change_phone_()" type="button" value="取消">
                    </div>
                </div>
                <?php } ?>       <!--手机-->



                <?php if(empty(session('user')['phone'])){ ?>
                <div id="Change_Password_insurance" class="Account_security_details">
                    <div class="Account_security_name fl">密保问题
                    </div>
                    <div class="Account_security_centent fl">未设置</div>
                    <div onclick="Change_Password_insurance()" class="Account_security_modify fl">设置</div>
                </div>

                <div id="Change_Password_insurance_" class="Account_security_details_">
                    <div>修改密保</div>
                    <div>
                        <input id="Password_Protection" type="text" placeholder="输入密保问题">
                        <br>
                        <input id="Password_Protection_Answers" type="text" placeholder="输入密保答案">
                        <br>
                        <input onclick="Submission_Password_protection()" type="button" value="确认">
                        <input onclick="Change_Password_insurance_()" type="button" value="取消">
                    </div>
                </div>
                <?php  }else{  ?>
                <div id="Change_Password_insurance" class="Account_security_details">
                    <div class="Account_security_name fl">密保问题
                    </div>
                    <div class="Account_security_centent fl">已设置</div>
                    <div onclick="Change_Password_insurance()" class="Account_security_modify fl">修改</div>
                </div>

                <div id="Change_Password_insurance_" class="Account_security_details_">
                    <div>修改密保</div>
                    <div>
                        <input id="Password_Protection" type="text" placeholder="<?php echo session('user')['Password_insurance'] ?>">
                        <br>
                        <input id="Password_Protection_Answers" type="text" placeholder="<?php echo session('user')['Password_Protection_Answers'] ?>">
                        <br>
                        <input onclick="Submission_Password_protection()" type="button" value="确认">
                        <input onclick="Change_Password_insurance_()" type="button" value="取消">
                    </div>
                </div>
            <?php } ?>          <!--密保-->
            </div>
        </div>


    </div>                                <!--主体-->



    <div class="layout_div"></div>                   <!--布局填充-->

    <div class="footer">                               <!--底部-->



        <div class="footer_footer">
            <div class="footer_footer_t">
                <div class="footer_footer_top fl">了解魅族</div>
                <div class="footer_footer_top fl">加入我们</div>
                <div class="footer_footer_top fl">联系我们</div>
                <div class="footer_footer_top fl">Flyme</div>
                <div class="footer_footer_top fl">魅族社区</div>
                <div class="footer_footer_top fl">天猫旗舰店</div>
                <div class="footer_footer_top fl">问题反馈</div>
                <div class="footer_footer_top fl">线上销售授权公示名单</div>
            </div>
            <div class="footer_footer_b">
                <div class="footer_footer_bottom_l fl">
                    <p class="fl">
                        ©2017 Meizu Telecom Equipment Co., Ltd. All rights reserved. 粤ICP备13003602号-2 合字B2-20170010 营业执照 法律声明 粤公网安备 44049102496009 号 </p>
                    <img class="footer_img fl" src="./img/ywx/ywx1.png">
                    <img class="footer_img fl" src="./img/ywx/ywx2.png">
                </div>
                <div class="footer_footer_bottom_r fr">
                    <img src="./img/ywx/ywx4.png" >
                    <img src="./img/ywx/ywx5.png" >
                    <img src="./img/ywx/ywx6.png" >

                </div>
            </div>
        </div>

    </div>                         <!--底部-->


</div>

</div>








</body>
</html>