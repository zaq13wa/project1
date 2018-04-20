<?php

namespace app\index\controller;

use think\Controller;
//use weather;
use app\index\model\User;
use app\index\model\Member as MemberModel;
use app\index\model\Approval;
use app\index\model\Material;

class Login extends Controller
{
	public function index()
    {
        //dump($bmdeadline);die;
        if(request()->isPost()){
            $this->check(input('code'));
            //dump(input('code'));die;
        	$user = new User();
            //dump($user->select());die;
        	$num=$user->login(input('post.'));
            //dump($num);die;
        	if($num==1){
        		$this->error('用户不存在！');
        	}
        	if($num==2){
        		$this->success('登录成功！',url('index/index'));
        	}
        	if($num==3){
        		$this->error('密码错误！');
        	}
        	return;
        }
        return view();
    }

    // 验证码检测
    public function check($code='')
    {
        if (!captcha_check($code)) {
            $this->error('验证码错误');
        } else {
            return true;
        }
    }

   public function register(){
      $class=db('group')->where('pid',"<>",0)->select();
     // dump($class);die;
     if(request()->isPost()){
        $data=input('post.');//dump($data);die;
        $data['name']!=""?:$this->error("请输入用户名");
        $data['password']= $data['password']==$data['password1'] ? Md5($data['password']):$this->error("密码不一致");
        $data['cid']==-1?$this->error("请选择班级"):"";
        unset($data['password1']);
        $u=new User();
        $u->save($data)?$this->success('注册成功'):$this->error("操作失败");
     }
     $this->assign('class',$class);
            return view();
   }

    
}
