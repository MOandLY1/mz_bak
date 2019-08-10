<?php


namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Navigation;
use App\Models\Commodity;
use App\Models\Email;
use Illuminate\Support\Facades\Session;
use Mail;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    public function Personal_Pages(){    //个人主页
        return view('Personal_Pages');
    }//个人主页
    public function land(){    //登录页面
        return view('land');
    }//登录页面
    public function user_l(Request $request){    //登录页面的后端验证
        $name = $request->input('name');
        $password = $request->input('password');
        $password = md5($password);
        $user =  User::where('name',$name)->first();
        if(!$user){
            $array = [
                'code'=>0,
                'info'=>'不存在该用户'
            ];
            return response()->json($array);
        }
        $user = $user->toArray();    //对象转数组
        if($user['password']!=$password){
            $array = [
                'code'=>0,
                'info'=>'密码错误'
            ];
            return response()->json($array);
        }
        session(['user'=>$user]);      //设置session
        $array = [
            'code'=>1,
            'info'=>'登录成功'
        ];
        return response()->json($array);
    }//登录页面的后端验证
    public function register(){  //注册页面
        return view('register');
    }//注册页面
    public function user_r(Request $request){    //注册页面的后端验证
        $name = $request->input('name');
        $password = $request->input('password');
        $password_ = $request->input('password_');
        if(empty($name)){
            $array = [
                'code'=>0,
                'info'=>'请输入用户名'
            ];
            return response()->json($array);
        }
        if(empty($password||$password_)){
            $array = [
                'code'=>0,
                'info'=>'请输入密码',

            ];
            return response()->json($array);
        }
        if($password!=$password_){
            $array = [
                'code'=>0,
                'info'=>'两次输入的密码不一致',
                'data'=>[
                    'a'=>$password,
                    'b'=>$password_
                ]
            ];
            return response()->json($array);
        }
        $user_name = User::where('name',$name)->first();
        if(!empty( $user_name)){
            $array = [
                'code'=>0,
                'info'=>'已有相同的用户名'
            ];
            return response()->json($array);
        }

        $password = md5($password);
        $arr = [
            'password'=>$password,
            'name'=>$name
        ];
        $user = User::insert($arr);
        if($user){
            $array = [
                'code'=>1,
                'info'=>'注册成功'
            ];
            return response()->json($array);
        }else{
            $array = [
                'code'=>0,
                'info'=>'注册失败'
            ];
            return response()->json($array);
        }



    }//注册页面的后端验证
    public function New_username(Request $request){  //
        $modify_name = $request->input('modify_name');
        if(empty($modify_name)){
            $array = [
                'code'=>0,
                'info'=>'请输入您的新用户名'
            ];
            return response()->json($array);
        }
        $id = session('user')['id'];

        $arr = [
            'name' =>$modify_name
        ];
        $user = User::where('id',$id)->update($arr);    //修改

        $user = User::where('id',$id)->first()->toArray(); //查询
        session(['user'=>$user]);           //设置session
        if($user){
            $array = [
                'code'=>1,
                'info'=>'提交成功'
            ];
            return response()->json($array);
        }
    }
    public function Cancellation(Request $request)
    {
        $request->session()->flush();
        if($request){
            $array = [
                'code'=>1,
                'info'=>'注销成功'
            ];
            return response()->json($array);
        }
    }

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

    public function email(Request $request){
        $email = $request->input('email');
        $min = 100000;
        $max = 999999;
        $str =  mt_rand($min,$max);//发送内容
        $array = [
            'name'=>'您的注册码是'.$str,
            'to'=>$email,
            'subject'=>'邮件标题6666'
        ];
//         Mail::send()的返回值为空，所以可以其他方法进行判断
        $arr = [
            'email'=>$email,
            'password'=>$str,
            'time'=>now(),
        ];
        $b = Email::insert($arr);
//        Redis::setex($email, 60*1, json_encode($arr));
        $a = Mail::send('emails.test',['name'=>$array['name']],function($message) use ($array){
            $to = $array['to'];  // $to = '1352165580@qq.com';发送给谁
            $message ->to($array['to'])->subject($array['subject']);//subject('邮件测试')邮件标题
        });
//        // 返回的一个错误数组，利用此可以判断是否发送成功
        dd(Mail::failures());

    }
    public function email_(Request $request){
        $email = $request->input('email');
        $verification = $request->input('verification');

//        $arr = [
//            'email'=>$email,
//            'verification'=>$verification,
//            'time'=>now(),
//        ];
        $b = Email::where('email',$email)->limit(1)->orderBy('id', 'desc')->first()->toArray();
        $time = $b['time'];
        $time = date('Y-m-d H:i:s',strtotime("$time +1 min"));
        if($b['password']!=$verification){
            return response()->json([
                'code'=>0,
                'info'=>'秘钥错误',
            ]);
        }else{
            if(now()>$time){
                return response()->json([
                    'code'=>0,
                    'info'=>'秘钥已过期',
                ]);
            }else{
                return response()->json([
                    'code'=>1,
                    'info'=>'获取成功',
                ]);
            }
        }


    }
    public function ceshi(Request $request){
        return view('ceshi');
    }


}