                               //主页的JS效果
 $.ajaxSetup({
     headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
});
function jump_mzsc1(){           //点击各个页面上的导航图片跳回主页
window.location.href="/mzsc1";
}//点击各个页面上的导航图片跳回主页
function jump_mzsc(){           //点击各个页面上的导航图片跳回主页
    window.location.href="/mzsc";
}//点击各个页面上的导航图片跳回主页
function asd(){
    alert('99999')
}//备用未完成，页首广告的点击关闭事件
function Personal_Center(){//个人状态鼠标移入事件
    $("#user_state_details").attr("style","display:block;");
    $("#user_state_details_").attr("style","display:block;");
}//个人状态鼠标移入事件
function Personal_Center_(){//个人状态鼠标移出事件
    var div = document.getElementById("user_state_details");
    var x=event.clientX;
    var y=event.clientY;
    var divx1 = div.offsetLeft;
    var divy1 = div.offsetTop;
    var divx2 = div.offsetLeft + div.offsetWidth;
    var divy2 = div.offsetTop + div.offsetHeight;
    if( x < divx1 || x > divx2 || y < divy1 || y > divy2){
        $('#user_state_details').css("display","none");

    }
}//个人状态鼠标移出事件

function retrieval() {                   //搜索
    var nav_retrieval  = $('#nav_retrieval').val();
    // alert(nav_retrieval);
    $.ajax({
        type: 'GET',
        url: './Commodity_details_',
        data: {nav_retrieval:nav_retrieval},
        dataType: "json",
        success: function (data) {
            if(data.code==1){
                window.location.href="/Commodity_details";
            }
        }
    });
}              //搜索
function user_state_details(){         //鼠标移出事件，移出后关闭个人状态
    $('#user_state_details').css("display", "none");
    $('#user_state_details_').css("display", "none");
}//鼠标移出事件，移出后关闭个人状态
function Jump_land(){          //点击事件，未登录下点击个人中心跳转到登录页面
    window.location.href="/land";
}//点击事件，未登录下点击个人中心跳转到登录页面
function Jump_Personal_Center(){    //点击事件，未登录下点击个人中心跳转到个人中心页面
    window.location.href="/Personal_Pages";
}//点击事件，未登录下点击个人中心跳转到个人中心页面

function Secondary_navigation(a){    //鼠标移动到导航栏，展示二级导航
    // alert(a);
    $('.Secondary_navigation_').css("display","none");
    var v = a+'bb';
    $('.'+v).css("display","block")
}//鼠标移动到导航栏，展示二级导航
function Secondary_navigation_(a){      //鼠标离开导航栏，关闭二级导航
    // alert(a)
    var div = document.getElementById(a+'bb');

    // var div = $('.'+v);
    var x=event.clientX;
    var y=event.clientY;
    var divx1 = div.offsetLeft;
    var divy1 = div.offsetTop;
    var divx2 = div.offsetLeft + div.offsetWidth;
    var divy2 = div.offsetTop + div.offsetHeight;
    // alert(divx1)
    if( x < divx1 || x > divx2 || y < divy1 || y > divy2){
        // alert(2)
        $('.Secondary_navigation_').css("display","none");
        // $('.'+a+'bb').css("display","none");
    }
}//鼠标离开一级导航栏，关闭二级导航
function leave_secondary_nav(a){
    $('.Secondary_navigation_').css("display","none");
    var v = a+'bb';
    $('.'+v).css("display","none");
}
function commodity_details(a){

    // alert(a);
    // var phone = $('#phone').val();
    window.location.href="/Commodity_details?id="+a;
}

                                 //注册页面的JS效果
function switch_password1(){    //点击切换密码明文暗文，切换时将之前输入的内容传给切换后的框
    var v = $('#password').css("display");
    if(v=='block'){
        var password = $('#password').val();
        $('#password').css("display", "none");
        $('#password_').css("display", "block");
        $('#password_').val(password);
    }else{
        var password = $('#password').val();
        $('#password').css("display", "block");
        $('#password_').css("display", "none");
        $('#password').val(password);
    }
}//点击切换密码明文暗文，切换时将之前输入的内容传给切换后的框/密码
function switch_password2(){    //点击切换密码明文暗文，切换时将之前输入的内容传给切换后的框
    var v = $('#_password').css("display");
    if(v=='block'){
        var _password = $('#_password').val();
        $('#_password').css("display", "none");
        $('#_password_').css("display", "block");
        $('#_password_').val(_password);
    }else{
        var _password = $('#_password').val();
        $('#_password').css("display", "block");
        $('#_password_').css("display", "none");
        $('#_password').val(_password);
    }
}//点击切换密码明文暗文，切换时将之前输入的内容传给切换后的框/确认密码
function register(){            //注册。JS效果为把信息提交给后端，再响应后端传回的数据
    var name = $('#name').val();
    var v = $('#password').css("display");
    if(v=='block'){
        var password = $('#password').val();
    }else{
        var password = $('#password_').val();
    }
    var u = $('#_password').css("display");
    if(v=='block'){
        var password_ = $('#_password').val();
    }else{
        var password_ = $('#_password_').val();
    }
    $.ajax({
        type: 'GET',
        url: './user_r',
        data: {name:name,password:password,password_:password_},
        dataType: "json",
        success: function (data) {
            alert(data.info)
            if(data.code==1){
                window.location.href="/land";
            }
        },
    });
}//注册。JS效果为把信息提交给后端，再响应后端传回的数据


//登录页面的JS效果
function switch_password(){       //点击切换密码明文暗文，切换时将之前输入的内容传给切换后的框
    var v = $('#main_input_password').css("display");
    if(v=='block'){
        var password = $('#main_input_password').val();
        $('#main_input_password').css("display", "none");
        $('#main_input_password_').css("display", "block");
        $('#main_input_password_').val(password);
    }else{
        var password = $('#main_input_password_').val();
        $('#main_input_password').css("display", "block");
        $('#main_input_password_').css("display", "none");
        $('#main_input_password').val(password);
    }
}//点击切换密码明文暗文，切换时将之前输入的内容传给切换后的框
function Submission() {              //登录，JS效果为把信息提交给后端，再响应后端传回的数据
    var name = $('#name').val();
    var v = $('#main_input_password').css("display");
    if(v=='block'){
        var password = $('#main_input_password').val();
    }else{
        var password = $('#main_input_password_').val();
    }
    $.ajax({
        type: 'GET',
        url: './user_l',
        data: {name:name,password:password},
        dataType: "json",
        success: function (data) {
            alert(data.info);
            if(data.code==1){
                modify_name_();
                window.location.href="/mzsc";
            }
        },
    });
} //登录，JS效果为把信息提交给后端，再响应后端传回的数据


         //个人中心的JS效果
function Cancellation(){
    $.ajax({
        type: 'GET',
        url: './Cancellation',
        data: {name:111},
        dataType: "json",
        success: function (data) {
            alert(data.info);
            if(data.code==1){

            }
        },
    });
}
function modify_name(){          //打开修改用户名的窗口
   $('#user_name').css("display", "none");
   $('#user_name_').css("display", "block");
}                  //打开修改用户名的窗口
function modify_name_(){          //关闭修改用户名的窗口
   $('#user_name').css("display", "block");
   $('#user_name_').css("display", "none");
}                 //关闭修改用户名的窗口
function Change_Password(){                     //打开更改密码的窗口
   $('#Change_Password').css("display", "none");
   $('#Change_Password_').css("display", "block");
}              //打开更改密码的窗口
function Change_Password_(){                    //关闭更改密码的窗口
   $('#Change_Password').css("display", "block");
   $('#Change_Password_').css("display", "none");
}             //关闭更改密码的窗口
function Change_Mailbox(){                     //打开更改邮箱的窗口
   $('#Change_security').css("display", "none");
   $('#Change_security_').css("display", "block");
}               //打开更改邮箱的窗口
function Change_Mailbox_(){                    //关闭更改邮箱的窗口
   $('#Change_security').css("display", "block");
   $('#Change_security_').css("display", "none");
}              //关闭更改邮箱的窗口
function Change_phone(){                      //打开更改手机的窗口
   $('#Change_phone').css("display", "none");
   $('#Change_phone_').css("display", "block");
}                 //打开更改手机的窗口
function Change_phone_(){                     //关闭改手机的窗口
   $('#Change_phone').css("display", "block");
   $('#Change_phone_').css("display", "none");
}                //关闭更改手机的窗口
function Change_Password_insurance(){        //关闭更改密保的窗口
   $('#Change_Password_insurance').css("display", "none");
   $('#Change_Password_insurance_').css("display", "block");
}    //关闭更改密保的窗口
function Change_Password_insurance_(){         //关闭更改密保的窗口
   $('#Change_Password_insurance').css("display", "block");
   $('#Change_Password_insurance_').css("display", "none");
}   //关闭更改密保的窗口

function New_username(){              //更改用户名
   var modify_name  = $('#modify_name').val();
   $.ajax({
       type: 'GET',
       url: './New_username',
       data: {modify_name:modify_name},
       dataType: "json",
       success: function (data) {
           alert(data.info);
           if(data.code==1){
               modify_name_();
               $('#user_name').html('用户**'+modify_name+'<img onclick="modify_name()" src="./img/35.png" alt="">');
           }
       },
   });
}                   //更改用户名

function Change_Password_Submission(){   //提交给后台的修改密码
   var password  = $('#password').val();
   var confirm_password  = $('#confirm_password').val();
   $.ajax({
       type: 'GET',             //设定提交方式,get或post
       url: './Modify_personal_information',         //提交的url
       data: {password:password,confirm_password:confirm_password},    //第一个参数相当于form表单的name，第二个参数则是里面的内容
       //提交给服务器的数据
       dataType: "json",            //服务器返回的数据格式
       success: function (data) {        //执行成功的方法
           alert(data.info);
           if(data.code==1){
               $('#Change_Password').css("display", "block");
               $('#Change_Password_').css("display", "none");    //直接调用JS方法

           }
       },
   });
}     //更改密码

function Binding_Mailbox(){             //绑定邮箱
   var mailbox = $('#mailbox').val();
   $.ajax({
       type: 'GET',
       url: './Binding_Mailbox',
       data: {mailbox:mailbox},
       dataType:"json",
       success: function (data){
           alert(data.info);
           if(data.code==1){
               Change_Mailbox_();
               $('#mailbox').html(mailbox);
           }
       }

   })
}                //绑定邮箱

function binding_phone(){       //绑定手机
   var phone = $('#phone').val();
   $.ajax({
       type:'GET',
       url:'./binding_phone',
       data:{phone:phone},
       dataType:"json",
       success: function(data){
           alert(data.info);
           if(data.code==1){
               Change_phone_();
               $('#Password_Protection').html(Password_Protection);
               $('#Password_Protection_Answers').html(Password_Protection_Answers);
           }
       }
   })
}                  //绑定手机






//商品详情的JS效果
function myFunction(){
    alert('.img_'+1);
    $('.img_'+1).css("display", "block");
}











//搜索页面的JS效果




                               //测试
function asdz(){
    var email = $('#asdz').val();

    $.ajax({
        type:'GET',
        url:'./email',
        data:{email:email},
        dataType:"json",
        success: function(data){
            alert(data.info);
            if(data.code==1){
                alert('成功');
            }
        }
    })
}
function asdzxc(){
   var email = $('#asdz').val();
    var verification = $('#asdzxc').val();

   $.ajax({
       type:'GET',
       url:'./email_',
       data:{email:email,verification:verification},
       dataType:"json",
       success: function(data){
           alert(data.info);
           if(data.code==1){

           }
       }
   })
}
