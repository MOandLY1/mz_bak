@extends('layouts.web')


@section('content')
    <div class="main_phone">                      <!--手机-->

        <div class="main_phone_h">                <!--手机块头部-->
            <div class="phone_header_1 fl">搜索结果</div>
        </div>
        <div class="main_phone_m">               <!--手机块的主体-->
            <div class="phone_t">
                <?php $a = 0; ?>
                <?php foreach ($phone_information as $key => $value ){ ?>
                <?php $a++; ?>
                <div id="<?php echo $a.'c'; ?>" onclick="commodity_details(<?php $a; ?>)" class="phone_top fl <?php echo $a.'a'; ?>">
                    <div class="phone_top_img"><img class="limit_img" src="<?php echo $value['img'][0] ?>"></div>
                    <div class="phone_top_name"><?php echo $value['name'] ?></div>
                    <div class="phone_top_price"><?php echo $value['price'] ?></div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>                    <!--手机-->


@stop
