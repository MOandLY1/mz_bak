@extends('layouts.web')


@section('content')
    <div class="wrap">
        <div class="Details_page_main">

            <div class="Details_page_main_left fl">
                <div class="Details_page_main_left_centent">
                    <?php $a = 0 ?>
                    <?php foreach ($commodity_information['img'] as $key => $value){ ?>
                    <?php $a++ ?>
                    <img class="img_ img_<?php echo $a ?>" style="width: 400px;display: none;height:400px;" src="<?php echo $value ?>" alt="">
                    <?php } ?>
                </div>
                <div class="Details_page_main_left_centent__Small">
                    <div class="Details_page_main_left_centent_Small_ fl">
                        <img src="./img/spxq_luyou/1.jpg" alt="">
                    </div>
                    <div class="Details_page_main_left_centent_Small_ fl">
                        <img src="./img/spxq_luyou/2.jpg" alt="">
                    </div>
                    <div class="Details_page_main_left_centent_Small_ fl">
                        <img src="./img/spxq_luyou/3.jpg" alt="">
                    </div>
                    <div class="Details_page_main_left_centent_Small_ fl">
                        <img src="./img/spxq_luyou/4.jpg" alt="">
                    </div>
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
                            <div class="Details_page_service_1_2 fl">广东省深圳市</div>
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