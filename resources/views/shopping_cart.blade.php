@extends('layouts.web')


@section('content')

        <div class="shopping_cart_main">

            <div class="shopping_cart_centent">购物车</div>
                <div class="shopping_cart_centent_nav">
                    <div class="shopping_cart_centent_img fl"></div>
                    <div class="shopping_cart_centent_name fl">商品名称</div>
                    <div class="shopping_cart_centent_fill fl "></div>
                    <div class="shopping_cart_centent_color fl ">颜色</div>
                    <div class="shopping_cart_centent_capacity fl ">储存容量</div>
                    <div class="shopping_cart_centent_fill fl "></div>
                    <div class="shopping_cart_centent_stock fl ">数量</div>
                    <div class="shopping_cart_centent_price fl">价格</div>
                        <div class="shopping_cart_centent_fill fl ">操作</div>
                </div>
                <div class="shopping_cart_centent_main">
                        <div class="shopping_cart_centent_">
                                <div class="shopping_cart_centent_img fl">1</div>
                                <div class="shopping_cart_centent_name fl">魅族E3</div>
                                <div class="shopping_cart_centent_fill fl "></div>
                                <div class="shopping_cart_centent_color fl ">蓝色</div>
                                <div class="shopping_cart_centent_capacity fl ">6+64GB</div>
                                <div class="shopping_cart_centent_fill fl "></div>
                                <div class="shopping_cart_centent_stock fl ">*1</div>
                                <div class="shopping_cart_centent_price fl">1999</div>
                                <div class="shopping_cart_centent_fill fl ">删除</div>
                        </div>
                        <div class="shopping_cart_centent_">
                                <div class="shopping_cart_centent_img fl">1</div>
                                <div class="shopping_cart_centent_name fl">魅族E3</div>
                                <div class="shopping_cart_centent_fill fl "></div>
                                <div class="shopping_cart_centent_color fl ">蓝色</div>
                                <div class="shopping_cart_centent_capacity fl ">6+64GB</div>
                                <div class="shopping_cart_centent_fill fl "></div>
                                <div class="shopping_cart_centent_stock fl ">*1</div>
                                <div class="shopping_cart_centent_price fl">1999</div>
                                <div class="shopping_cart_centent_fill fl ">删除</div>
                        </div>
                        <div class="shopping_cart_centent_">
                                <div class="shopping_cart_centent_img fl">1</div>
                                <div class="shopping_cart_centent_name fl">魅族E3</div>
                                <div class="shopping_cart_centent_fill fl "></div>
                                <div class="shopping_cart_centent_color fl ">蓝色</div>
                                <div class="shopping_cart_centent_capacity fl ">6+64GB</div>
                                <div class="shopping_cart_centent_fill fl "></div>
                                <div class="shopping_cart_centent_stock fl ">*1</div>
                                <div class="shopping_cart_centent_price fl">1999</div>
                                <div class="shopping_cart_centent_fill fl ">删除</div>
                        </div>
                        <div class="shopping_cart_centent_">
                                <div class="shopping_cart_centent_img fl">1</div>
                                <div class="shopping_cart_centent_name fl">魅族E3</div>
                                <div class="shopping_cart_centent_fill fl "></div>
                                <div class="shopping_cart_centent_color fl ">蓝色</div>
                                <div class="shopping_cart_centent_capacity fl ">6+64GB</div>
                                <div class="shopping_cart_centent_fill fl "></div>
                                <div class="shopping_cart_centent_stock fl ">*1</div>
                                <div class="shopping_cart_centent_price fl">1999</div>
                                <div class="shopping_cart_centent_fill fl ">删除</div>
                        </div>
                </div>
                <div class="shopping_cart_centent_">
                        <input class="shopping_cart_purchase" type="button" onclick="purchase()" value="确认">
                </div>

        </div>


@stop