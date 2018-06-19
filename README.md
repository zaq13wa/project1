浙江农林大学作业管理系统
===============

> 基于ThinkPHP5，要求PHP5.4以上。
[![Total Downloads](https://poser.pugx.org/topthink/think/downloads)](https://packagist.org/packages/topthink/think)
[![Latest Stable Version](https://poser.pugx.org/topthink/think/v/stable)](https://packagist.org/packages/topthink/think)
[![Latest Unstable Version](https://poser.pugx.org/topthink/think/v/unstable)](https://packagist.org/packages/topthink/think)
[![License](https://poser.pugx.org/topthink/think/license)](https://packagist.org/packages/topthink/think)


详细开发文档参考 [docx文件夹下文档]()

## 目录结构

初始的目录结构如下：

~~~
application     采用MVC结构
├─index
│  ├─controller         
│  │  ├─aboutus.php     
│  │  ├─common.php     
│  │  ├─group.php       
│  │  ├─index.php       
│  │  ├─login.php           
│  │  ├─project.php 
│  │  ├─user.php  
│  │  └─work.php 
│  │
│  ├─model         
│  │  ├─aboutus.php     
│  │  ├─cate.php     
│  │  ├─file.php       
│  │  ├─group.php       
│  │  ├─groupwork.php           
│  │  ├─project.php 
│  │  ├─user.php  
│  │  └─usergroup.php 
│  │
│  ├─view         
│     ├─aboutus    
│     │  └─aboutus1.html 
│     ├─group       
│     │  ├─chose.html     
│     │  └─create.html           
│     ├─index       
│     │  ├─index.html     
│     │  └─msg.html 
│     ├─login       
│     │  ├─index.html     
│     │  └─register.html  
│     ├─public       
│     │  ├─left.html    
│     │  └─top.html 
│     ├─user          
│     │  └─psdedit.html 
│     └─work       
│        ├─correct.html 
│        ├─create.html 
│        ├─edit.html 
│        ├─lis.html 
│        ├─memlist.html    
│        └─upload.html
~~~

> router.php用于php自带webserver支持，可用于快速测试
> 切换到public目录后，启动命令：php -S localhost:8888  router.php
> 上面的目录结构和名称是可以改变的，这取决于你的入口文件和配置参数。


### 数据表和字段
*   数据表和字段采用小写加下划线方式命名，例如 `zy_user` 表和 `user_id`字段，详情见zy.sql文件。

## 版权信息
*版权所有：飞飞小组
*本系统提供以下功能：
*1.学生作业上传、上交。
*2.教师作业布置、收取、批量下载。
*3.教师作业布置、提交时间设置、作业内容修改。
*4.教师自定义班级。
*5.教师学生实时互动。
