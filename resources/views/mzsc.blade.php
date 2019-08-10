<?php
use App\Models\Navigation;
$Navigation_mzsc = Navigation::where('Superior_id','0')->get()->toArray();//查询
foreach($Navigation_mzsc as $key =>$value){
    $secondary = Navigation::where('Superior_id',$value['id'])->get()->toArray();
    $Navigation_mzsc[$key]['secondary'] = $secondary;
}
//$phone_name =
//echo "<pre>";
//var_dump($Navigation_mzsc);
//exit;
?>
<!DOCTYPE html>
<html>
<head>
    <title>魅族商城</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/mzsc.css">
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
                <img onclick="jump_mzsc()" src="./img/1.png" alt="">
            </div>

            <?php $a = 0; ?>
            <?php foreach($Navigation_mzsc as $key => $value){ ?>
            <?php $a++; ?>
            <div id="<?php echo $a.'c'; ?>" onmouseover="Secondary_navigation(<?php echo $a; ?>)" onmouseout="Secondary_navigation_(<?php echo $a; ?>)"  class="header_menu fl <?php echo $a.'a'; ?>"><?php echo $value['name'] ?></div>

            <div onmouseout="leave_secondary_nav(<?php echo $a; ?>)" class="Secondary_navigation_ <?php echo $a.'bb' ?> "><!--二级导航栏，绝对定位块-->
                <?php foreach($value['secondary'] as $k =>$v ){ ?>
                <div class="secondary_nav fl">{{$v['name']}}</div>
                <?php  } ?>
            </div>
            <?php } ?>

{{--                        <div class="header_menu fl">魅族手机</div>--}}
{{--                        <div class="header_menu fl">魅蓝手机</div>--}}
{{--                        <div class="header_menu fl">魅族声学</div>--}}
{{--                        <div class="header_menu fl">智能配件</div>--}}
{{--                        <div class="header_menu fl">服务</div>--}}
{{--                        <div class="header_menu fl">专卖店</div>--}}
{{--                        <div class="header_menu fl">Flyme</div>--}}
{{--                        <div class="header_menu fl">社区</div>--}}
        </div>


        <div class="header_right fr">
            <div class="nav_input fl">
                <input class="nav_input_text" type="text">
                <input class="nav_input_submit" type="submit">
            </div>
            <div class="user_state fl">
                <img onmouseover="Personal_Center()" onmouseout="Personal_Center_()" src="./img/8.png" alt="">
            </div>
            <?php  if(empty(session('user'))){ ?>
            <div onmouseout="user_state_details()" onclick="Jump_land()" id="user_state_details" class="user_state_details">未登录，点击登录</div>
            <?php }else{ ?>
            <div onmouseout="user_state_details()" onclick="Jump_Personal_Center()"  id="user_state_details_" class="user_state_details_">用户：<?php echo session('user')['name'] ?><br>个人中心</div>
            <?php } ?>

            <div class="Shopping_Cart fl">
                <img src="./img/9.png" alt="">
            </div>
        </div>
    </div>
</div>


    <div class="wrap">
        <div class="wrap1">


            <div class="Rotary_Planting_Map"></div>  <!--轮播图-->

            <div class="main">                                <!--主体-->
                <div class="main_Discount">                   <!--折扣-->
                    <div class="main_Discount_option fl">         <!--折扣选项-->
                    </div>
                    <div class="main_Discount_centent fl">
                        <img src="./img/10.png" alt="">
                    </div>
                    <div class="main_Discount_centent fl">
                        <img src="./img/11.png" alt="">
                    </div>
                    <div class="main_Discount_centent fl">
                        <img src="./img/12.png" alt="">
                    </div>
                    <div class="main_Discount_centent fl">
                        <img src="./img/13.png" alt="">
                    </div>
                </div>                 <!--折扣-->

                <div class="main_Recommend">                   <!--推荐-->
                    <div class="Recommend_h">
                        <div class="Recommend_header_l"></div>
                        <div class="Recommend_header_r"></div>
                    </div>
                    <div class="Recommend_m">
                        <div class="Recommend_main fl"><img src="./img/rptj/rptj1.png"></div>
                        <div class="Recommend_main fl"><img src="./img/rptj/rptj2.png"></div>
                        <div class="Recommend_main fl"><img src="./img/rptj/rptj3.png"></div>
                        <div class="Recommend_main fl"><img src="./img/rptj/rptj4.png"></div>
                        <div class="Recommend_main fl"><img src="./img/rptj/rptj5.png"></div>
                    </div>
                </div>            <!--推荐-->

                <div class="main_Advertisement">              <!--广告-->
                    <img class="main_Advertisement_Close " src="./img/32.png">
                    <img class="z-index " src="./img/3.png" alt="">
                </div>            <!--广告-->

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
                            <div class="phone_top fl">
                                <div class="phone_top_img"><img src="./img/sj/1.png"></div>
                                <div class="phone_top_name"><?php  ?></div>
                                <div class="phone_top_price"><?php  ?></div>
                            </div>
                        </div>

                        <div class="phone_margin"></div>

                        <div class="phone_b">
                            <div class="phone_top fl"><img src="./img/sj/sj2.png" alt="">
                            </div>
                        </div>

                        </div>
                    </div>
                </div>                    <!--手机-->

                <div class="main_Advertisement">              <!--广告2-->
                    <img src="./img/4.png" alt="">
                    <img class="main_Advertisement_Close" src="./img/31.png" alt="">
                </div>             <!--广告-->

                <div class="main_parts">                      <!--配件-->
                    <div class="parts_h">
                        <div class="parts_header_1 fl">数码配件</div>
                        <div class="parts_header_2 fl">
                            <div class="parts_header_font">超值推荐</div>
                            <div class="parts_header_border"></div>
                        </div>
                        <div class="parts_header_3 fr">更多></div>
                    </div>
                    <div class="parts_m">
                        <div class="parts_t">
                            <div class="parts_top fl"><img src="./img/smpj/smpj1.png" alt=""></div>
                            <div class="parts_top fl"><img src="./img/smpj/smpj2.png" alt=""></div>
                            <div class="parts_top fl"><img src="./img/smpj/smpj3.png" alt=""></div>
                            <div class="parts_top fl"><img src="./img/smpj/smpj4.png" alt=""></div>
                            <div class="parts_top fl"><img src="./img/smpj/smpj5.png" alt=""></div>
                        </div>
                        <div class="parts_b">
                            <div class="parts_bottom fl"><img src="./img/smpj/smpj6.png" alt=""></div>
                            <div class="parts_bottom fl"><img src="./img/smpj/smpj7.png" alt=""></div>
                            <div class="parts_bottom fl"><img src="./img/smpj/smpj8.png" alt=""></div>
                            <div class="parts_bottom fl"><img src="./img/smpj/smpj9.png" alt=""></div>
                            <div class="parts_bottom fl"><img src="./img/smpj/smpj10.png" alt=""></div>
                        </div>
                    </div>
                </div>                     <!--配件-->

                <div class="main_Advertisement">
                    <img src="./img/5.png" alt="">
                </div>        <!--广告-->

                <div class="main_periphery">                 <!--周边-->
                    <div class="periphery_h">
                        <div class="periphery_header_1 fl">手机周边</div>
                        <div class="periphery_header_2 fl">
                            <div class="periphery_header_font">超值推荐</div>
                            <div class="periphery_header_border1"></div>
                        </div>
                        <div class="periphery_header_3 fl">
                            <div class="periphery_header_font2">数据线/电源适配器</div>
                            <div class="periphery_header_border2"></div>
                        </div>
                        <div class="periphery_header_4 fl">
                            <div class="periphery_header_font3">保护套/后盖/贴膜</div>
                            <div class="periphery_header_border3"></div>
                        </div>
                        <div class="periphery_header_5 fr">更多></div>
                    </div>
                    <div class="periphery_m">
                        <div class="periphery_t">
                            <div class="periphery_top fl"><img src="./img/sjzb/sjzb1.png" alt=""></div>
                            <div class="periphery_top fl"><img src="./img/sjzb/sjzb2.png" alt=""></div>
                            <div class="periphery_top fl"><img src="./img/sjzb/sjzb3.png" alt=""></div>
                            <div class="periphery_top fl"><img src="./img/sjzb/sjzb4.png" alt=""></div>
                            <div class="periphery_top fl"><img src="./img/sjzb/sjzb5.png" alt=""></div>
                        </div>
                        <div class="periphery_b">
                            <div class="periphery_bottom fl"><img src="./img/sjzb/sjzb6.png" alt=""></div>
                            <div class="periphery_bottom fl"><img src="./img/sjzb/sjzb7.png" alt=""></div>
                            <div class="periphery_bottom fl"><img src="./img/sjzb/sjzb8.png" alt=""></div>
                            <div class="periphery_bottom fl"><img src="./img/sjzb/sjzb9.png" alt=""></div>
                            <div class="periphery_bottom fl"><img src="./img/sjzb/sjzb10.png" alt=""></div>
                        </div>
                    </div>
                </div>            <!--手机周边-->


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
