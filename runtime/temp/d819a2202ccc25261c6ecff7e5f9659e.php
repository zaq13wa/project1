<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:86:"F:\phpstudy\WWW\project1\project1\public/../application/index\view\login\register.html";i:1522587780;s:83:"F:\phpstudy\WWW\project1\project1\public/../application/index\view\public\left.html";i:1509535995;}*/ ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>浙江省大学生环境生态科技创新大赛</title>
<meta name="description" content="这是一个 index 页面">
<meta name="keywords" content="index">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="icon" type="image/png" href="__INDEX__//i/favicon.png">
<link rel="apple-touch-icon-precomposed" href="__INDEX__//i/app-icon72x72@2x.png">
<meta name="apple-mobile-web-app-title" content="Amaze UI" />
<link rel="stylesheet" href="__INDEX__/css/bootstrap.css" />
<link rel="stylesheet" href="__INDEX__/css/amazeui.min.css" />
<link rel="stylesheet" href="__INDEX__/css/admin.css">
<link rel="stylesheet" href="__INDEX__/css/app.css">
<link rel="stylesheet" href="__INDEX__/font-awesome.css" >
<link rel="stylesheet" href="__INDEX__/css/style.css">
<script src="__INDEX__/js/echarts.min.js"></script>
</head>

<body data-type="index">

   
<header class="am-topbar am-topbar-inverse admin-header">
  <div class="am-topbar-brand"> <span  class="nav-titlle">浙江省大学生环境生态科技创新大赛
</span> </div>
  
  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list tpl-header-list">

      <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle> <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">  </a>

      </li>

      
     
      
    
    </ul> 
  </div>
</header>

   <div class="tpl-page-container tpl-page-header-fixed">
    <!--引用侧边栏-->
<!--      <div class="tpl-left-nav tpl-left-nav-hover">

  <div class="tpl-left-nav-list">
    <ul class="tpl-left-nav-menu">
      <li class="tpl-left-nav-item"> <a href="<?php echo url('index/index'); ?>" class="nav-link active"> <i class="am-icon-home" style="width:23px"></i> <span>首页</span> </a> </li>

      <li class="tpl-left-nav-item"> <a href="javascript:;" class="nav-link tpl-left-nav-link-list"> <i class="am-icon-newspaper-o"style="width:23px"></i> <span>新闻通知</span> <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right "></i> </a>
        <ul class="tpl-left-nav-sub-menu">
          <li>
            <a href="<?php echo url('news/tongzhi'); ?>"> <i class="am-icon-angle-right"></i> <span>通知公告</span> </a>
            <a href="<?php echo url('news/xinwen'); ?>"> <i class="am-icon-angle-right"></i> <span>新闻资讯</span> </a> </li>
          </ul>
        </li>
        <li class="tpl-left-nav-item"> <a href="javascript:;" class="nav-link tpl-left-nav-link-list"> <i class="am-icon-user" style="width:23px"></i> <span>关于我们</span> <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right "></i> </a>
          <ul class="tpl-left-nav-sub-menu">
          <li> <a href="<?php echo url('aboutus/aboutus1'); ?>"> <i class="am-icon-angle-right"></i> <span>联赛介绍</span> </a> </li>
            <li> <a href="<?php echo url('aboutus/aboutus2'); ?>"> <i class="am-icon-angle-right"></i> <span>组织框架</span> </a> </li>
            <li> <a href="<?php echo url('aboutus/aboutus3'); ?>"> <i class="am-icon-angle-right"></i> <span>联系方式</span> </a> </li>
          </ul>
        </li>
        <li class="tpl-left-nav-item "> <a href="javascript:;" class="nav-link tpl-left-nav-link-list"> <i class="am-icon-pencil-square-o" style="width:23px"></i> <span>项目管理</span> <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right "></i> </a>
          <ul class="tpl-left-nav-sub-menu jz-tpl-left-nav-sub-menu" >
            <li><a href="<?php echo url('project/groupinfo'); ?>"> <i class="am-icon-angle-right"></i> <span>团队信息</span> </a></li>
            <li><a href="<?php echo url('project/memberlist'); ?>"> <i class="am-icon-angle-right"></i> <span>团队成员</span> </a></li>
            <li><a href="<?php echo url('project/materiallist'); ?>"> <i class="am-icon-angle-right"></i> <span>材料提交</span> </a></li>
            <li><a href="<?php echo url('project/recordlist'); ?>"> <i class="am-icon-angle-right"></i> <span>实验记录</span> </a></li>
          </ul>
        </li>


      </ul>
    </div>
  </div>  -->
    <!--/引用侧边栏-->



        <div class="tpl-content-wrapper xa-tpl-content-wrapper" style="padding: 0;">
            
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        用户注册
                    </div>
                  


                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">


                        <div class="am-u-sm-12 am-u-md-9">
                            <form class="am-form am-form-horizontal" method="post">
                                
                                 <div class="am-form-group xa-sm-am-form-group">
                                    <label for="user-name" class="am-u-md-3 am-u-sm-12 am-form-label">用户名</label>
                                    <div class="am-u-md-9 am-u-sm-12">
                                        <input type="text" name="name1" id="user-name" placeholder="设置后不可更改，10字以内">
<!--                                        <small>输入你的名字，让我们记住你。</small>-->
                                    </div>
                                </div>
                                 <div class="am-form-group xa-sm-am-form-group">
                                    <label for="project-name" class="am-u-md-3 am-u-sm-12 am-form-label">密码</label>
                                    <div class="am-u-md-9 am-u-sm-12">
                                        <input type="password" name="password" id="password-name" maxlength="16" placeholder="长度4~16个字符，支持大小写字母，不可有空格  ">
<!--                                        <small>输入你的名字，让我们记住你。</small>-->
                                    </div>
                                </div>
                                <div class="am-form-group xa-sm-am-form-group">
                                    <label for="project-name" class="am-u-md-3 am-u-sm-12 am-form-label">确认密码</label>
                                    <div class="am-u-md-9 am-u-sm-12 ">
                                        <input type="password" name="password1" id="password-name" maxlength="16" placeholder="请再次输入密码">
<!--                                        <small>输入你的名字，让我们记住你。</small>-->
                                    </div>
                                </div>
                                <div class="am-form-group xa-sm-am-form-group">
                                    <label for="team-name" class="am-u-md-3 am-u-sm-12 am-form-label">团队名称</label>
                                    <div class="am-u-md-9 am-u-sm-12">
                                        <input type="text" name="name2" id="team-name" placeholder="团队名称请在10字以内">
<!--                                        <small>输入你的名字，让我们记住你。</small>-->
                                    </div>
                                </div>

                                 



        
                                <div class="am-form-group" style="text-align: center;">
                                

                                 <button class="btn btn-info am-radius xa-sm-btn" type="submit">下一步</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>










        </div>

    </div>

    <script  src="__INDEX__/js/distpicker.data.js"></script> 
    <script  src="__INDEX__/js/distpicker.js"></script> 
    <script src="__INDEX__/js/jquery.min.js"></script>
    <script src="__INDEX__/js/amazeui.min.js"></script>
    <script src="__INDEX__/js/app.js"></script>
    <script src="__INDEX__/js/bootstrap.js"></script>   
    <script src="__INDEX__/js/fileinput.js"></script>
</body>

</html>