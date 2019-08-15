@extends('layouts.web')


@section('content')
    <div class="wrap">
        <div class="Details_page_main">

            <div class="Details_page_main_left fl">
                <div class="Details_page_main_left_centent">
                    <?php $a = 0 ?>
                    <?php foreach ($commodity_information['img'] as $key => $value){ ?>
                    <?php $a++ ?>
                    <img class="img_ img_<?php echo $a ?>" style="width: 450px;display: none;height:500px;" src="<?php echo $value ?>" alt="">
                    <?php } ?>
                </div>
                <div class="Details_page_main_left_centent__Small">
                    <?php $a = 0 ?>
                    <?php foreach ($commodity_information['img'] as $key => $value){ ?>
                    <?php $a++ ?>
                        <div onclick="switch_img(<?php echo $a ?>)" class="Details_page_main_left_centent_Small_ fl">
                            <img style="width: 120px;height:120px" src="<?php echo $value ?>" alt="">
                        </div>
                    <?php } ?>
{{--                    <div class="Details_page_main_left_centent_Small_ fl">--}}
{{--                        <img src="./img/spxq_luyou/2.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="Details_page_main_left_centent_Small_ fl">--}}
{{--                        <img src="./img/spxq_luyou/3.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="Details_page_main_left_centent_Small_ fl">--}}
{{--                        <img src="./img/spxq_luyou/4.jpg" alt="">--}}
{{--                    </div>--}}
                </div>
            </div><!--图片部分-->

            <div class="Details_page_main_right fr">
                <div class="Details_page_right_"></div>
                <div class="Details_page_right_">
                    <div class="Details_page_name" ><?php echo $commodity_information['name'] ?></div>
                    <div class="Details_page_Propaganda" >10W快速充电 无线即放即充</div>
                </div>
                <div class="Details_page_right_">
                    <div class="Details_page_Price" >￥<?php echo $commodity_information['price'] ?></div>
                </div>
                <div class="Details_page_right_">
                    <div class="Details_page_Support">
                        <div class="Details_page_Support_1 fl">支持</div>
                        <div class="Details_page_Support_2 fl">顺丰发货</div>
                        <div class="Details_page_Support_2 fl">七天无理由退货</div>
                    </div>
                    <div class="Details_page_service">
                        <div class="Details_page_service_1 ">
                            <div class="Details_page_service_1_1 fl">配送服务</div>
                            <div class="Details_page_service_1_2 fl">
                                <select id="province" onchange="province()">
                                    <option>请选择</option>
                                    <option>北京</option>
                                    <option>上海</option>
                                    <option>天津</option>
                                    <option>重庆</option>
                                    <option>天津</option>
                                    <option>广东</option>
                                    <option>福建</option>
                                    <option>江苏</option>
                                    <option>浙江</option>
                                    <option>安徽</option>
                                    <option>陕西</option>
                                    <option>山西</option>
                                    <option>山东</option>
                                    <option>湖南</option>
                                    <option>湖北</option>
                                    <option>河南</option>
                                    <option>辽宁</option>
                                    <option>河北</option>
                                    <option>吉林</option>
                                    <option>黑龙江</option>
                                    <option>海南</option>
                                    <option>四川</option>
                                    <option>云南</option>
                                    <option>贵州</option>
                                    <option>青海</option>
                                    <option>甘肃</option>
                                    <option>江西</option>
                                    <option>内蒙古</option>
                                    <option>宁夏</option>
                                    <option>新疆</option>
                                    <option>西藏</option>
                                    <option>广西</option>
                                    <option>香港</option>
                                    <option>澳门</option>
                                </select>

                                <select id="region" onchange="region()">
                                    <option>请选择</option>
                                </select>
                            </div>
                        </div>
                        <div class="Details_page_service_2">本商品由 魅族 负责发货并提供售后服务</div>
                    </div>
                </div>
                <div class="Details_page_right_">
                    <div class="Details_page_classification fl" >颜色分类</div>
                    <div class=" Details_page_classification_ fl">

                        <div class="Details_page_classification_1">
                            <div class="Details_page_classification_2 fl"><img src="./img/spxq_luyou/5.png" alt=""></div>
                            <div class="Details_page_classification_2 fl"><?php echo $commodity_information['color'] ?></div>
                        </div>

                    </div>
                </div>
                <div class="Details_page_right_">
                    <div class="Details_page_Number fl">数量</div>
                    <div class="Details_page_Number_ fl">
                        <div onclick="Details_page_Number_1()" class="Details_page_Number_1 fl">-</div>
                        <?php $Details_page_Number_2 = 1; ?>
                        <div id="Details_page_Number_2" class="Details_page_Number_2 fl">
                            <?php echo $Details_page_Number_2 ?>
                        </div>
                        <div onclick="Details_page_Number_1_()" class="Details_page_Number_1 fl">+</div>
                    </div>
                </div>
                <div class="Details_page_right_">
                    <div id="Details_page_purchase" onmousemove="Details_page_purchase()"
                         onmouseout="_Details_page_purchase()" class="Details_page_purchase fl" >立即购买</div>
                    <div id="Details_page_purchase_" onmousemove="Details_page_purchase_()"
                         onmouseout="_Details_page_purchase_()"class="Details_page_purchase_ fl">加入购物车</div>
                </div>
            </div><!--详情部分-->
        </div>
    </div>
    <div class="layout"></div>



@stop