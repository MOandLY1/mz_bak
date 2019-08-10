<?php


namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Navigation;
use App\Models\Commodity;
use App\Models\Commodity_details;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{

    public function Commodity_details_(Request $request){          //搜索
        $nav_retrieval = $request->input('nav_retrieval');
        $commodity = Navigation::where('name',$nav_retrieval)->first(); //查询
        if($commodity){
            $array = [
                'code'=>1,
                'info'=>$nav_retrieval
            ];
            return response()->json($array);
        }else{
            $array = [
                'code'=>1,
                'info'=>'没找到该商品'
            ];
            return response()->json($array);
        }

} //搜索
    public function mzsc()
    {
        return view('mzsc');
    }
    public function search(Request $request)
    {
        $Navigation_mzsc = Navigation::where('state','0')->get()->toArray();//查询
//        foreach ($Navigation_mzsc['id'] as $ke =>$val){
//            $Navigation_mzsc_id = Commodty::where('id',$Navigation_mzsc['id'])->get();
//        }
        //查询的手机的内容
        $phone_name =Navigation::where('name','魅族手机')->get()->toArray();
        foreach($phone_name as $key =>$value){
            $phone_information = Commodity::where('superior_id',$value['id'])->limit(10)->orderBy('id', 'desc')->get()->toArray(); //ordeby,设置排序，从前往后或者从后往前，第一个是字段名，第二个是排序规则
        }
        foreach($phone_information as $k => $v){
            $phone_information[$k]['img'] = json_decode($v['img']);
        }
        return view('search',['Navigation_mzsc'=>$Navigation_mzsc,'phone_information'=>$phone_information,]);
    }

    public function mzsc1(Request $request){
        $Navigation_mzsc = Navigation::where('state','0')->get()->toArray();//查询
//        foreach ($Navigation_mzsc['id'] as $ke =>$val){
//            $Navigation_mzsc_id = Commodty::where('id',$Navigation_mzsc['id'])->get();
//        }
        //查询的手机的内容
        $phone_name =Navigation::where('name','魅族手机')->get()->toArray();
        foreach($phone_name as $key =>$value){
            $phone_information = Commodity::where('superior_id',$value['id'])->limit(10)->orderBy('id', 'desc')->get()->toArray(); //ordeby,设置排序，从前往后或者从后往前，第一个是字段名，第二个是排序规则
        }
        foreach($phone_information as $k => $v){
            $phone_information[$k]['img'] = json_decode($v['img']);
        }

        //查询的声学的内容
        $voice_name =Navigation::where('name','魅族声学')->get()->toArray();
        foreach($voice_name as $key1 =>$value1){
            $voice_information = Commodity::where('superior_id',$value1['id'])->limit(10)->orderBy('id', 'desc')->get()->toArray(); //ordeby,设置排序，从前往后或者从后往前，第一个是字段名，第二个是排序规则 desc 是从后往前，asc是从前往后
        }
        foreach($voice_information as $k1 => $v1){
            $voice_information[$k1]['img'] = json_decode($v1['img']);
        }

        //查询的配件的内容
        $parts_name =Navigation::where('name','智能配件')->get()->toArray();
        foreach($parts_name as $key2 =>$value2){
            $parts_information = Commodity::where('superior_id',$value2['id'])->limit(10)->orderBy('id', 'desc')->get()->toArray(); //ordeby,设置排序，从前往后或者从后往前，第一个是字段名，第二个是排序规则 desc 是从后往前，asc是从前往后
        }
        foreach($parts_information as $k2 => $v2){
            $parts_information[$k2]['img'] = json_decode($v2['img']);
        }

        //查询的魅族生活的内容
        $life_name =Navigation::where('name','魅族生活')->get()->toArray();
        foreach($life_name as $key3 =>$value3){
            $life_information = Commodity::where('superior_id',$value3['id'])->limit(10)->orderBy('id', 'desc')->get()->toArray(); //ordeby,设置排序，从前往后或者从后往前，第一个是字段名，第二个是排序规则 desc 是从后往前，asc是从前往后
        }
        foreach($life_information as $k3 => $v3){
            $life_information[$k3]['img'] = json_decode($v3['img']);
        }

        return view('mzsc1',['Navigation_mzsc'=>$Navigation_mzsc,'voice_information'=>$voice_information,'phone_information'=>$phone_information,'parts_information'=>$parts_information,'life_information'=>$life_information]);
    }

    public function Commodity_details(Request $request)
    {
        $commodity_id = $request->input('id',60); //如果没有值传过来，那默认（default）是60

        $commodity_information = Commodity_details::where('superior_id',$commodity_id)->where('state',0)->limit(1)->orderBy('id', 'asc')->first()->toArray();

//        $commodity_information =Commodity::where('id',$commodity_id)->first()->toArray();
        $commodity_information['img'] = json_decode($commodity_information['img'],true);
//        $commodity_information['capacity'] = json_encode($commodity_information['capacity'],true);
        //json_encode 数组转json encode不用true这个参数    json_decode  json转数组
//        $commodity_information['capacity'] = json_decode($commodity_information['capacity'],true);

//        echo "<pre>";
//        echo $commodity_id;
//        var_dump($commodity_information);
//        exit;
        return view('Commodity_details',['commodity_information'=>$commodity_information]);
    }
    public function query_commodity(Request $request){    //获取所有的商品
        $commodity =Commodity::get()->toArray();
        return response()->json([
            'code'=> 1,
            'info'=>'获取成功',
            'data'=>$commodity

        ]);
    }
    public function increase_commodity(Request $request){
        $file = $request->file('file');
        $name = date('YmdHis').$file->getClientOriginalName();
        $path = 'img/';
        $file->move($path,$name);
        return response()->json([
            'code'=> 1,
            'info'=>'获取成功',
            'data'=>$path.$name
        ]);

    }//上传图片
    public function search_superior_id(Request $request){
        $superior_id = Navigation::where('superior_id',0)->get()->toArray();
        return response()->json([
            'code'=> 1,
            'info'=>'获取成功',
            'data'=>$superior_id
        ]);
    }//获取一级导航栏的信息，一级导航栏在等级上为0
    public function nav_column(Request $request){
        $nav_column = Navigation::where('superior_id',0)->where('state',0)->get()->toArray();
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
        $superior_id = $request->input('superior_id');
        $name = $request->input('name');
        $state = $request->input('state');
        $arr = [
            'superior_id'=>$superior_id,
            'name'=>$name,
            'state'=>$state
        ];
        $nav = Navigation::insert($arr);
        return response()->json([
            'code'=>1,
            'info'=>'添加成功'
        ]);
    }//添加一级导航栏的内容





}