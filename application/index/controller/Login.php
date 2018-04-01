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

     public function register()
     {
        if(request()->isPost()){
            $data = input('post.');
            //dump($data);die;
            $user = new User();
            if($data['name1']=="")
                 $this->error('用户名不能为空！');
              if($data['name2']=="")
                 $this->error('团队名不能为空！');
             if(strlen($data['name2'])>30)
                 $this->error('团队名过长！');
               if(strlen($data['name1'])>20)
                 $this->error('用户名过长！');
            // dump(strlen($data['name2']));die;
              if($data['school']=="0")
                 $this->error('学校不能为空！');
            if($user->get(['name'=>$data['name1']]))
                $this->error('用户名被使用！');
            if($data['password']!=$data['password1'])
                $this->error('密码不一致！');
                        $user['name'] = $data['name1'];
                        // die;
            $user['password'] = md5($data['password']);
            if($user->save())
            {
                if(db('team')->where('name',$data['name2'])->find())
                    $this->error('团队名被使用！');
                $team['name'] = $data['name2'];
                $team['school'] = $data['school'];
                //$team['project'] = $data['project'];
                //$team['phone'] = $data['phone'];
                if($user->team()->save($team)){
                    //dump($user->team);die;
                    $m = $user->team;
                    $member = new MemberModel();
                    $list = [
                            ['role'=>1,'team_id'=>$m['team_id'],'school'=>$m['school']],
                            ['role'=>2,'team_id'=>$m['team_id'],'school'=>$m['school']],
                    ];
                    $member->saveall($list);

                    $approval = new Approval();
                    $list2 = [
                            ['type'=>1,'team_id'=>$m['team_id'],'school'=>$m['school'],'time'=>time(),'status'=>0],
                            ['type'=>2,'team_id'=>$m['team_id'],'school'=>$m['school'],'time'=>time(),'status'=>-1],
                    ];
            
                    $approval->saveall($list2);

                    $material = new Material();
                    $list3 = [
                            ['title'=>'研究综述','status'=>'未提交','team_id'=>$m['team_id'],'time'=>time()],
                            ['title'=>'竞赛设计及详细技术路线','status'=>'未提交','team_id'=>$m['team_id'],'time'=>time()],
                            ['title'=>'论文','status'=>'未提交','team_id'=>$m['team_id'],'time'=>time()],

                    ];
            
                    $material->saveall($list3);
                    $user = new User();
           if($user->login(['name'=>$data['name1'],'password'=>$data['password']]))
                    $this->success('注册成功，请完善团队信息！',url('register_next'));
                }
                else
                    $this->error('注册失败！');
            }  
        }
        return view();
     }

        public function register_next()
     {
        if(request()->isPost()){
            $data=input("post.");
             $t['project'] = $data['project'];
            $t['phone'] = $data['phone'];
            $team=Model('team')->get(['user_id'=>session('user_id')]);
            if($team->save($t))
           { $team->member;
                       foreach($team['member'] as $m)
                       {
                           if($m['role']=="1")
                               $m->save(['name'=>$data['teacher']]);
                           if($m['role']=="2")
                               $m->save(['name'=>$data['leader']]);
                       }
                 $this->success('信息填写成功，请完善成员信息！','project/memberlist');
                   }
                   else
                    $this->error('操作失败！');
            //dump($data);die;
        }
        return view();
     }
    public function retrieve(){
      if(request()->isPost())
      {
        $data=input("post.");

        if($data['password']!=$data['password1'])
          $this->error('密码不一致！');//dump($data);die;
        $te=[0,0,0,0];
        $te[0]=$data['name']==""?:(db('user')->where('name',$data['name'])->find());
        $te[1]= $data['name2']==""?:( db('team')->where('name',$data['name2'])->find());
        $te[2]=$data['phone']==""?:(db('team')->where('phone', $data['phone'])->find());
        $te[3]= $data['project']==""?:(db('team')->where('project', $data['project'])->find());
     //dump($t);die;
        $id=0;
        foreach($te as $t)
        {
           if(isset($t['user_id']))
           {
            if($id==0)
            {
              $id=$t['user_id'];
            }
            else
            {
              if($id==$t['user_id'])
              {
                  if(db('user')->where('user_id',$id)->update(['password'=>md5($data['password'])]))
                  $this->success('重置密码成功！','index');
                 else
                   $this->error('未知错误！');
              }
              else
              {
                $this->error('信息有误！');
              }
            }
           }
        }
        $this->error('信息不充分！');
      }
        return view();
      }
    

}
