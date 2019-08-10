<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Navigation;
use App\Models\Commodity;
use App\Models\Controller_;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redis;
//use Mail;

class UserController extends Controller
{
    public function user(){

        return response()->json([
            'code'=>1,
            'info'=>'获取成功',
            'data'=>[
                'a'=>3,
                'b'=>4
            ]
        ]);
    }
    public function commodity(){

        $user = User::get()->toArray(); //查询

        return response()->json([
            'code'=>1,
            'info'=>'获取成功',
            'data'=>$user
        ]);
    }
    public function modify(Request $request){      //以id查询需要修改的对象
        $id = $request->input('id');
        $user = User::where('id',$id)->first()->toArray(); //查询    first一维数组，get二维数组只查询一条数据用first，查多条用get且在接搜数据的页面循环出来。


        return response()->json([
            'code'=>1,
            'info'=>'获取成功',
            'data'=>$user
        ]);
    }//查询个人信息
    public function modify_(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $age = $request->input('age');
        $phone = $request->input('phone');
        $arr = [
            'name' => $name,
            'age' => $age,
            'phone' => $phone
        ];
        $user = User::where('id',$id)->update($arr);    //修改

        return response()->json([
            'code'=>1,
            'info'=>'获取成功',
        ]);
    }   //修改个人信息
    public function banning(Request $request){
        $id = $request->input('id');
        $user = User::where('id',$id)->first()->toArray();
        $arr = [
            'code'=>1,
            'info'=>'获取成功',
            'data'=>$user
        ];
        $aee = [
            'code'=>0,
            'info'=>'获取失败',
            'data'=>$user
        ];
        if($user){
            return response()->json($arr);
        }else{
            return response()->json($aee);
        }
    }//查询封禁状态
    public function banning_(Request $request){//修改封禁状态
        $id = $request->input('id');
        $banning = User::where('id',$id)->value('banning');  //只查一个字段，用value且括号里带上字段名称
        if($banning==0) {
            $user = User::where('id', $id)->update(['banning' => 1]);    //修改
            return response()->json([
                'code' => 1,
                'info' => '已封禁',
            ]);
        }else{
            $user = User::where('id', $id)->update(['banning' => 0]);    //修改
            return response()->json([
                'code' => 1,
                'info' => '解开封禁',
            ]);
        }
    }//修改封禁状态
    public function query_banning(Request $request){
        $user = User::where('banning',1)->get()->toArray(); //查询
        return response()->json([
            'code'=>1,
            'info'=>'获取成功',
            'data'=>$user
        ]);
    }//查出所有的，被封禁的用户
    public function relieve_prohibition(Request $request){//解除用户的封禁
        $id = $request->input('id');
        $arr = [
            'banning'=>0
        ];
        $user = User::where('id',$id)->update($arr);
        if($user){
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
    }//解除用户的封禁
    public function admin_land(Request $request){
        $name = $request->input('name');
        $password = $request->input('password');
        $user = Controller_::where('name',$name)->where('password',$password)->first();
        if($user) {
            $token = md5($user->id.time());
            try{
                Redis::setex($token, 60*60*24, json_encode($user));
            }catch (\Exception $e){
                $redis_ = $e->getMessage();
            }
//            Reids::set($token,json_encode($user));
//            $user = $user->toArray();//对象转数组
            $name = $user['name']; //数组取值方式
            $name = $user->name; //对象取值方式
            return response()->json([
                'code' => 1,
                'info' => '获取成功',
                'data' => [
                    'token'=>$token,
                    'user'=>$user,
                ]
            ]);
        }{
            return response()->json([
                'code' => 0,
                'info' => '获取失败',
                'data' => '用户名或密码错误'
            ]);
        }

    }//管理员登录
    public function query_jurisdiction_superior(Request $request){//查询所有管理员信息
        $superior = Controller_::get()->toArray();
        return response()->json([
            'code'=> 1,
            'info'=>'获取成功',
            'data'=>$superior
        ]);

    }//查询所有管理员信息
    public function query_land_administration(Request $request){//查询已登录的管理员信息
        $name = $request->input('name');
        $superior = Controller_::where('name',$name)->first()->toArray();
        return response()->json([
            'code'=> 1,
            'info'=>'获取成功',
            'data'=>$superior
        ]);
    }//查询已登录的管理员信息
    public function added_administrator(Request $request){//注册
        $name = $request->input('name');
        $password = $request->input('password');
        $password_ = $request->input('password_');
        $user = Controller_::where('name',$name)->first();
        if($user){
            return response()->json([
                'code'=>0,
                'info'=>'已有相同的用户名'
            ]);
        }
        if($password!=$password_){
            return response()->json([
                'code'=>0,
                'info'=>'前后输入的密码不一致'
            ]);
        }
        $arr = [
            'name'=>$name,
            'password'=>$password
        ];
        $nav = Controller_::insert($arr);
        return response()->json([
            'code'=>1,
            'info'=>'添加成功'
        ]);
    }//添加管理员

    public function aaa(Request $request){

    }

//




}