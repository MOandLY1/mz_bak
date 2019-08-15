<?php
use App\Models\Navigation;
use App\Models\Commodity;
$Navigation_mzsc = Navigation::where('state','0')->get()->toArray();//查询
foreach ($Navigation_mzsc as $key => $value){
$Navigation_mzsc_id = Commodity::where('id',$value['id'])->get();
//    $Navigation_mzsc[$key]['name'] = $Navigation_mzsc_id;

}
//echo "<pre>";
//var_dump($Navigation_mzsc_id);
//exit;

?>
<!DOCTYPE html>
<html>
<head>
    <title>魅族商城</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/mzsc1.css">
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>

</head>
<body>
<div class="header">                   <!--头部-->
    <div id="Advertisement" onclick="asd()" class="Advertisement"><img  src="./img/6.png">
        <div id="Advertisement_Close" onclick="Advertisement_Close()" class="Advertisement_Close"><img src="./img/32.png" alt="">
        </div>
    </div>  <!--页首广告-->


    <div class="nav">                                           <!--导航条-->
        <div class="header_left fl">
            <div class="header_nav fl">
                <img onclick="jump_mzsc1()" src="./img/1.png" alt="">
            </div>

            <?php $a = 0; ?>
            <?php foreach($Navigation_mzsc as $key => $value){ ?>
            <?php $a++; ?>
            <div id="<?php echo $a.'c'; ?>" onmouseover="Secondary_navigation(<?php echo $a; ?>)" onmouseout="Secondary_navigation_(<?php echo $a; ?>)"  class="header_menu fl <?php echo $a.'a'; ?>"><?php echo $value['name'] ?>
            </div>

            <div onmouseout="leave_secondary_nav(<?php echo $a; ?>)" id="<?php echo $a.'bb' ?>" class="Secondary_navigation_ <?php echo $a.'bb' ?> "><!--二级导航栏，绝对定位块-->

            </div>

            <?php } ?>
        </div>


        <div class="header_right fr"><!--导航栏的右边，为搜索，个人中心，购物车-->
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

        </div><!--导航栏的右边，为搜索，个人中心，购物车-->


    </div>
</div>


<div class="wrap">
    <div class="wrap1">


        <div class="Rotary_Planting_Map"></div>  <!--轮播图-->


        <div class="main">                                <!--主体-->


            <div class="main_phone">                      <!--手机-->

                <div class="main_phone_h">                <!--手机块头部-->
                    <div class="phone_header_1 fl">手机</div>
                    <div class="phone_header_2 fl">
                        <div class="phone_header_2_font">热销机型</div>
                        <div class="phone_header_2_border"></div>
                    </div>
                    <div class="phone_header_3 fr">更多></div>
                </div>
                <div class="main_phone_m">               <!--手机块的主体-->
                    <div class="phone_t">
                        <?php $a = 0; ?>
                        <?php foreach ($phone_information as $key => $value ){ ?>
                        <?php $a++; ?>

                        <div  onclick="commodity_details(<?php echo $value['id'] ?>)" class="phone_top fl <?php echo $a.'a'; ?>">

                            <input type="hidden" id = "<?php echo $a.'phone_id' ?>" name="id" value="<?php echo $value['id'] ?>">

                            <div class="phone_top_img"><img class="limit_img" src="<?php echo $value['img'][0] ?>"></div>
                            <div class="phone_top_name"><?php echo $value['name'] ?></div>
                            <div class="phone_top_price"></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>                    <!--手机-->


        <div class="main_Advertisement">              <!--广告2-->
            <img src="./img/4.png" alt="">
    </div>             <!--广告-->


        <div class="main_parts">                      <!--声学-->
            <div class="parts_h">
                <div class="parts_header_1 fl">声学</div>
                <div class="parts_header_2 fl">
                    <div class="parts_header_font">超值推荐</div>
                    <div class="parts_header_border"></div>
                </div>
                <div class="parts_header_3 fr">更多></div>
            </div>
            <div class="parts_m">
                <div class="phone_t">
                    <?php foreach ($voice_information as $key => $value ){ ?>
                    <div class="phone_top fl">
                        <div class="phone_top_img"><img class="limit_img" src="<?php echo $value['img'][0] ?>"></div>
                        <div class="phone_top_name"><?php echo $value['name'] ?></div>
                        <div class="phone_top_price"><?php echo $value['price'] ?></div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>                     <!--声学-->


        <div class="main_Advertisement">
            <img src="./img/5.png" alt="">
        </div>        <!--广告-->


        <div class="main_periphery">                 <!--配件-->
            <div class="periphery_h">
                <div class="periphery_header_1 fl">配件</div>
                <div class="periphery_header_2 fl">
                    <div class="periphery_header_font">超值推荐</div>
                    <div class="periphery_header_border1"></div>
                </div>
                <div class="periphery_header_5 fr">更多></div>
            </div>
            <div class="phone_t">
                <?php foreach ($parts_information as $key => $value ){ ?>
                <div class="phone_top fl">
                    <div class="phone_top_img"><img class="limit_img" src="<?php echo $value['img'][0] ?>"></div>
                    <div class="phone_top_name"><?php echo $value['name'] ?></div>
                    <div class="phone_top_price"><?php echo $value['price'] ?></div>
                </div>
                <?php } ?>
            </div>
        </div>            <!--配件-->

        <div class="main_Advertisement">              <!--广告2-->
                <img src="./img/2.png" alt="">
            </div>             <!--广告-->

        <div class="main_periphery">                 <!--生活-->
            <div class="periphery_h">
                <div class="periphery_header_1 fl">魅族生活</div>
                <div class="periphery_header_2 fl">
                    <div class="periphery_header_font">超值推荐</div>
                    <div class="periphery_header_border1"></div>
                </div>
                <div class="periphery_header_5 fr">更多></div>
            </div>
            <div class="phone_t">
                <?php foreach ($life_information as $key => $value ){ ?>
                <div class="phone_top fl">
                    <div class="phone_top_img"><img class="limit_img" src="<?php echo $value['img'] ?>"></div>
                    <div class="phone_top_name"><?php echo $value['name'] ?></div>
                    <div class="phone_top_price"><?php echo $value['price'] ?></div>
                </div>
                <?php } ?>
            </div>
        </div>            <!--生活-->


    </div>

    <div class="layout_div"></div>                   <!--布局填充-->




</div>

</div>

@yield('content')




<div class="footer">                               <!--底部-->
    <div class="footer_main">
        <div class="footer_l fl">
            <div class="footer_left_t">
                <div class="footer_left_top fl">顺丰包邮</div>
                <div class="footer_left_top fl">100+城市次日送达</div>
                <div class="footer_left_top fl">7天无理由退货</div>
                <div class="footer_left_top fl">15天换货保障</div>
            </div>
            <div class="footer_left_b">
                <div class="footer_left_bottom fl">1年免费保修</div>
                <div class="footer_left_bottom fl">2300+线下体验店</div>
                <div class="footer_left_bottom fl">远程支持服务</div>
                <div class="footer_left_bottom fl">上门快修</div>
            </div>
        </div>
        <div class="footer_r fr">
            <div class="footer_r_1 "><div class="fr">24小时全国服务热线</div></div>
            <div class="footer_r_2 "><div class="fr">400-788-3333</div></div>
            <div class="footer_r_3"><div class="fr"><img src="./img/yw/yw2.png"></div></div>
        </div>
    </div>

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
</div>

</div>                         <!--底部-->
<script src="./js/mzsc.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>





</body>
</html>
