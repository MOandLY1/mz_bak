<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Navigation;
use App\Models\Commodity;
use App\Models\Controller_;
use App\Models\Color_;
use App\Models\Memory;
use App\Models\Commodity_details;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{



    public function query_commodity(Request $request){    //获取所有的商品
        $commodity = Commodity_details::where('state',0)->get()->toArray();
        return response()->json([
            'code'=> 1,
            'info'=>'获取成功',
            'data'=>$commodity,

        ]);
    }
    public function insert_stock(Request $request){//查询商品库存
        }//查询商品库存
    public function modify_stock(Request $request){//修改商品库存
        $stock = $request->input('stock');
        $id = $request->input('id');
        $arr = [
            'stock'=>$stock
        ];
        $commodity = Commodity_details::where('id',$id)->update($arr);
        if($commodity){
            return response()->json([
                'code'=>1,
                'info'=>'修改成功'
            ]);
        }else{
            return response()->json([
                'code'=>0,
                'info'=>'失败'
            ]);
        }
    }//修改商品库存
    public function modify_price(Request $request){//修改商品价格
        $price = $request->input('price');
        $id = $request->input('id');
        $arr = [
            'price'=>$price
        ];
        $commodity = Commodity_details::where('id',$id)->update($arr);
        if($commodity){
            return response()->json([
                'code'=>1,
                'info'=>'修改成功'
            ]);
        }else{
            return response()->json([
                'code'=>0,
                'info'=>'失败'
            ]);
        }
    }//修改商品价格
    public function prohibition_commodity(Request $request){//封禁商品
        $id = $request->input('id');
        $arr = [
            'state'=>1
        ];
        $commodity = Commodity_details::where('id',$id)->update($arr);
        if($commodity){
            return response()->json([
                'code'=>1,
                'info'=>'修改成功'
            ]);
        }else{
            return response()->json([
                'code'=>0,
                'info'=>'失败'
            ]);
        }
    }//封禁商品
    public function prohibition_commodity_(){//查询已下架商品
        $commodity = Commodity_details::where('state',1)->get()->toArray();
        return response()->json([
            'code'=>1,
            'info'=>'成功',
            'data'=>$commodity
        ]);
    }//查询已下架商品
    public function upper_shelf_commodity(Request $request){//重新上架被下架的商品
        $id = $request->input('id');
        $arr = [
            'state'=>0
        ];
        $commodity = Commodity_details::where('id',$id)->update($arr);
        if($commodity){
            return response()->json([
                'code'=>1,
                'info'=>'修改成功'
            ]);
        }else{
            return response()->json([
                'code'=>0,
                'info'=>'失败'
            ]);
        }

    }//重新上架被下架的商品

    public function increase_commodity_(Request $request){
        $file = $request->file('file');//接收数据
        $name = date('YmdHis').$file->getClientOriginalName();//生成图片名
        $path = 'img/';//上传的文件类型 or 地址？
        $file->move($path,$name);//
        return response()->json([
            'code'=> 1,
            'info'=>'获取成功',
            'data'=>$path.$name
        ]);
    }//上传图片
    public function insert_photo(Request $request){
        $img = $request->input('img');
        $arr = [
          'img'=>json_encode($img)
        ];
        $insert = Commodity::insert($arr);
        return response()->json([
            'code'=> 1,
            'info'=>'成功',
        ]);
    }
    public function search_superior_id(Request $request){
        $superior_id = Navigation::where('state',0)->get();
        return response()->json([
            'code'=> 1,
            'info'=>'获取成功',
            'data'=>$superior_id
        ]);
    }//获取一级导航栏的信息，一级导航栏在等级上为0
    public function nav_column(Request $request){
        $nav_column = Navigation::where('state',0)->get()->toArray();
        return response()->json([
            'code'=> 1,
            'info'=>'获取成功',
            'data'=>$nav_column
        ]);
    }//获取状态为0的所有一级导航
    public function modify_nav(Request $request){//获取要修改的导航的内容
        $id = $request->input('id');
        $modify_nav = Navigation::where('id',$id)->first()->toArray();
        return response()->json([
            'code'=> 1,
            'info'=>'获取成功',
            'data'=>$modify_nav
        ]);

    }//获取要修改的导航的内容
    public function modify_nav_(Request $request){//修改一级导航栏的内容
        $id = $request->input('id');
        $name = $request->input('name');
        $arr = [
          'name'=>$name
        ];
        $nav = Navigation::where('id',$id)->update($arr);
        return response()->json([
            'code'=>1,
            'info'=>'修改成功'
        ]);
    }//修改一级导航栏的内容
    public function delete_nav(Request $request){
        $id = $request->input('id');
        $delete_nav = Navigation::where('id',$id)->first()->toArray();
        return response()->json([
            'code'=> 1,
            'info'=>'获取成功',
            'data'=>$delete_nav
        ]);
    }//获取要删除的导航的内容
    public function delete_nav_(Request $request){
        $id = $request->input('id');
        $nav = Navigation::where('id',$id)->delete();
        return response()->json([
            'code'=>1,
            'info'=>'修改成功'
        ]);
    }//删除一级导航栏的内容
    public function insert_nav(Request $request){
        $name = $request->input('name');
        $state = $request->input('state');
        $arr = [
            'name'=>$name,
            'state'=>$state
        ];
        $nav = Navigation::insert($arr);
        if($nav){
            return response()->json([
                'code'=>1,
                'info'=>'添加成功'
            ]);
        }else{
            return response()->json([
                'code'=>0,
                'info'=>'添加失败'
            ]);
        }
    }//添加一级导航栏的内容
    public function query_superior(Request $request){//查询所有等级为0的导航栏内容
        $superior = Navigation::get()->toArray();
        return response()->json([
            'code'=> 1,
            'info'=>'获取成功',
            'data'=>$superior
        ]);
    }//查询所有等级为0的导航栏内容
    public function query_selection(Request $request){//查询添加导航栏目中选择的上级导航栏内容
        $name = $request->input('name');
        $user = Navigation::where('name',$name)->first()->toArray();
        return response()->json([
            'code'=>1,
            'info'=>'999',
            'data'=>$user['id']
        ]);
    }//查询添加导航栏目中选择的上级导航栏内容
    public function query_selection_(Request $request){//查询添加导航栏目中选择的上级导航栏内容
        $name = $request->input('name');
        $user = Navigation::where('name',$name)->first()->toArray();
        $commodity = Commodity::where('superior_id',$user['id'])->get()->toArray();
        return response()->json([
            'code'=>1,
            'info'=>'999',
            'data'=>$commodity
        ]);
    }//查询添加导航栏目中选择的上级导航栏内容
    public function query_selection_color_capacity(Request $request){//查询选中的上级商品内容
        $name = $request->input('name');
        $user = Commodity::where('name',$name)->first()->toArray();
        $user['color'] = json_decode($user['color'],true);
        $user['capacity'] = json_decode($user['capacity'],true);
        return response()->json([
            'code'=>1,
            'info'=>'999',
            'data'=>$user
        ]);

    }//查询选中的上级商品内容

    public function insert_commodity_attribute(Request $request){//查找精确添加商品属性的颜色存储属性

    }//查找精确添加商品属性的颜色存储属性
    public function query_commodity_selection(Request $request){//查询商品的上级ID，也就是一级导航栏的内容
        $name = $request->input('name');
        $user = Navigation::where('name',$name)->first();
        $superior_id = $user['id'];
        $secondary_user = Navigation::where('superior_id',$superior_id)->get()->toArray();
        return response()->json([
            'code'=>1,
            'info'=>'成功',
            'data'=>$secondary_user
        ]);

    }//查询商品的上级ID，也就是一级导航栏的内容
    public function query_commodity_name(Request $request){
        $name = $request->input('name');
        $name_ = Commodity::where('name',$name)->first();
        if($name_){
            return response()->json([
                'code'=>1,
                'info'=>'已有该商品内容',
                'data'=>'已有该商品内容'
            ]);
        }else{
            return response()->json([
                'code'=>0,
                'info'=>'未查询到该商品名称，可写入',
                'data'=>'未查询到该商品名称，可写入'
            ]);
        }
    }
    public function search_color(Request $request){//查询颜色
        $secondary_user = Color_::get()->toArray();
        return response()->json([
            'code'=>1,
            'info'=>'成功',
            'data'=>$secondary_user
        ]);

    }//查询颜色
    public function search_memory(Request $request){//查询储存容量
        $secondary_user = Memory::get();
        return response()->json([
            'code'=>1,
            'info'=>'成功',
            'data'=>$secondary_user
        ]);

    }//查询储存容量
    public function insert_color(Request $request){//写入新颜色
        $color = $request->input('color');
        $color_ = Color_::where('name',$color)->first();
        if($color_){
            return response()->json([
                'code' => 1,
                'info' => '已存在此颜色',
            ]);
        }else {
            $time = now();
            $arr = [
                'name' => $color,
                'time' => $time,
            ];
            $user = Color_::insert($arr);
            if ($user) {
                return response()->json([
                    'code' => 1,
                    'info' => '成功',
                ]);
            } else {
                return response()->json([
                    'code' => 1,
                    'info' => '失败',
                ]);
            }
        }
    }//写入新颜色
    public function insert_memory(Request $request){//写入新储存容量
        $memory = $request->input('memory');
        $time = now();
        $arr = [
            'name'=>$memory,
            'time'=>$time,
        ];
        $user = Memory::insert($arr);
        if($user){
            return response()->json([
                'code'=>1,
                'info'=>'成功',
            ]);
        }else{
            return response()->json([
                'code'=>0,
                'info'=>'失败',
            ]);
        }
    }//写入新储存容量
    public function insert_commodity(Request $request){//写入上级商品
        $name = $request->input('name');
        $superior_id = $request->input('superior_id');
        $color = $request->input('color');
        $capacity = $request->input('capacity');
        $stock = $request->input('stock');
        $price = $request->input('price');
        $img = $request->input('img');
        $details = $request->input('details');
        $time = now();
        $arr = [
            'superior_id'=> $superior_id,
            'name'=>$name,
            'color'=>json_encode($color),
            'capacity'=>json_encode($capacity),
            'stock'=>$stock,
            'price'=>$price,
            'details'=>$details,
            'img'=>json_encode($img),
            'time'=>$time,
        ];
//        $user = Commodity::insert($arr);
//        $user_ = Commodity::where($arr)->get();
        $id = Commodity::insertGetId($arr);
        if($id){
            return response()->json([
                'code'=>1,
                'info'=>'成功',
                'data'=>$id
            ]);
        }else{
            return response()->json([
                'code'=>0,
                'info'=>'失败',
            ]);
        }


    }//写入上级商品
    public function insert_commodity_(Request $request){//写入新商品--添加属性
        $id = $request->input('id');
        $commodity = Commodity::where('id',$id)->first()->toArray();
        $commodity['color'] = json_decode($commodity['color'],true);
        $commodity['capacity'] = json_decode($commodity['capacity'],true);
        return response()->json([
            'code'=>1,
            'info'=>'成功',
            'data'=>$commodity
        ]);
    }//写入新商品--添加属性
    public function query_selection_name_(Request $request){
        $name = $request->input('id');
        $commodity = Commodity::where('name',$name)->first()->toArray();
        $commodity['color'] = json_decode($commodity['color'],true);
        $commodity['capacity'] = json_decode($commodity['capacity'],true);
        return response()->json([
            'code'=>1,
            'info'=>'成功',
            'data'=>$commodity
        ]);
    }//写入新商品--添加属性
    public function query_appoint_commodity(Request $request){//写入最下级商品
        $name = $request->input('name');
        $superior_id = $request->input('superior_id');
        $color = $request->input('color');
        $capacity = $request->input('capacity');
        $stock = $request->input('stock');
        $price = $request->input('price');
        $img = $request->input('img');
        $details = $request->input('details');
        $time = now();
        $arr = [
            'superior_id'=> $superior_id,
            'name'=>$name,
            'color'=>$color,
            'capacity'=>$capacity,
            'stock'=>$stock,
            'price'=>$price,
            'details'=>$details,
            'img'=>json_encode($img),
            'time'=>$time,
        ];

        $commodity = Commodity_details::insert($arr);
        if($commodity){
            return response()->json([
                'code'=>1,
                'info'=>'成功',
            ]);
        }else{
            return response()->json([
                'code'=>0,
                'info'=>'失败',
            ]);
        }

    }//写入最下级商品







}