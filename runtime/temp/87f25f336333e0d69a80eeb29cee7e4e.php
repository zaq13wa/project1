<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"F:\phpstudy\WWW\project1\project1\public/../application/index\view\login\index.html";i:1522587604;}*/ ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>浙江省科技创新大赛登录</title>
<meta name="description" content="login page">
<meta name="keywords" content="index">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--styles-->
<link href="__INDEX__/style/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="__INDEX__/style/css/font-awesome.min.css" rel="stylesheet">
<link href="__INDEX__/style/css/amazeui.min.css" rel="stylesheet" type="text/css">
<link href="__INDEX__/style/css/admin.css" rel="stylesheet" type="text/css">
<link href="__INDEX__/style/css/app.css" rel="stylesheet" type="text/css">
<link href="__INDEX__/style/css/loginstyle.css" rel="stylesheet" type="text/css">

<!--/styles-->
</head>
<body>
<div class="bg-blur" style="background:url(__INDEX__/style/imgs/bg.jpg)"></div>
 <div class="am-g myapp-login">
    <div class="xa-center">
     <!--系统版本信息-->
     <div id="contentA" class="contentA">
        <!--<div class="xa-login-ver">
            XXXXXXXXXXXXXX系统2.0
        </div>-->
        <div style="width: 100%;height: 25%;"></div>
        <div style="width: 9%;height: 75%;float: left;"></div>
        <div class="xa-login-content" style="float: left; width: 75%;">
           
           <div class="xa-login-contentA" style="padding-top: 10px;">
            <p>浙江农林大学作业提交系统</p>
          <span>版本号：version 0.60 &nbsp; &nbsp;&nbsp;&nbsp; 版权所有：第二小组</span>
           </div>

           <div class="xa-border"></div>
           <!--登陆页消息-->
           <div class="xa-login-cententB">
           <div class="xa-login-news">
                <ul class="xa-login-list">
                    <li><a href="#">
                        <p>
                        <!--<span class="xa-time">【2017.10.10】</span>-->
                        <span class="xa-new" style="color: #eee;">本系统提供以下功能：<br/>
                        1.学生作业上传、上交<br/>
                        2.教师作业布置、收取、批改<br/>
                        3.教师作业布置、提交时间设置
                        </span></p>
                        <!--<div class="xa-more">详情</div>--></a>
                    </li>
                    <li><a href="#" style="color: #eee;">
                        <p>
                        <span class="xa-time"></span>
                        <span class="xa-new">
</span></p>
                        <!--<div class="xa-more">详情</div>--></a>
                    </li>
                  
                </ul>
            </div>
           </div>
           <!--/登陆页消息-->
        </div>
     </div>
     <!--/系统版本信息-->
     <!--登录框-->
     <div id="contentB" class="contentB">
         <div class="xa-kongge" ></div>
         <div class="myapp-login-logo-text">
             <!--移动端标题-->
             <p class="xa-loginM-title">欢迎使用浙江省大学生环境生态科技创新大赛系统</p>
             <!--PC标题-->
             <div class="xa-login-logo-text">用户登录</div>
             <!--<div class="login-font"></div>--><!--添加系统副标题，可选-->
             <div class="am-u-sm-12 login-am-center xa-login-center">
                <form class="am-form "  name="loginform" accept-charset="utf-8" id="login_form" method="post"><input type="hidden" name="did" value="0"/>
                    <!--用户名-->
                    <div class="am-form-group xa-am-form">
                        <input class="xa-first-child" type="text" id="" name="name" placeholder="用户名">
                    </div>
                    <!--密码-->
                    <div class="am-form-group xa-login-mima xa-am-form">
                        <input class="" type="password" id="" name="password" placeholder="密码">
                          <span style="float: right;">忘记密码？<a href="<?php echo url('retrieve'); ?>" style="color: #fff;">点击找回</a></span>
                    </div>
                    <!--验证码-->
                    <div class="am-form-group xa-am-form">
                        <input class="" type="text" id="" name="code" placeholder="验证码，点击图片刷新">
                        <img class="xa-login-yzmB" src="<?php echo captcha_src(); ?>" onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random();" width="100"  alt="captcha" />   
                    </div>
                    <!--登录按钮-->
                    <button class="am-btn am-btn-default" type="submit">登&nbsp;&nbsp;&nbsp;录</button> 
                </form>
                <div >
                    <!--<a href="#" style="float: left;">忘记密码 ?</a>-->
                    <span style="float: right;">没有账号？<a href="<?php echo url('register'); ?>" style="color: #fff;">点击注册</a></span>

                    <!--<span style="float: right;">没有账号？<a href="#">点击注册</a></span>-->
                </div>
                <!--<div class="xa-border xa-border-tz"></div>-->
             </div>
             
         </div>
         <div class="login-font"></div>
         <div class="am-u-sm-10 login-am-center"></div>
     </div>
     <!--/登录框-->
     </div>
 </div>

 <script src="__INDEX__/style/jquery.js"></script>
    <script src="__INDEX__/style/bootstrap.js"></script>
    <script src="__INDEX__/style/jquery_002.js"></script>
    <!--Beyond Scripts-->
    <script src="__INDEX__/style/beyond.js"></script>

</body>
</html>
