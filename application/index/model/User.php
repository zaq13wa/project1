<?php
namespace app\Index\model;
use think\Model;
class User extends Model
{
    public function deluser($id){
        if($this::destroy($id)){
            return 1;
        }else{
            return 2;
        }
    }

    public function login($data){
        $user=User::getByName($data['name']);
        //dump($user);die;
        if($user){
            if($user['password']==md5($data['password'])){
                session('user_id', $user['user_id']);
                session('username', $user['name']);
                session('class',$user['cid']);
                // session('thumb', $user['thumb']);
                return 2; //登录密码正确的情况
            }else{
                return 3; //登录密码错误
            }
        }else{
            return 1; //用户不存在的情况
        }
        

    }

    public function usergroup()//学生班级
    {
        return $this->hasMany('Usergroup','uid',"user_id");
    }
     public function file()//学生文件
    {
        return $this->hasMany('File','uid');
    }
     public function groupt()//教师班级
    {
        return $this->hasMany('Group',"tid");
    }
     public function project()//教师作业
    {
        return $this->hasMany('Project',"tid");
    }
    public function detectpwd($pwd)
    {
        $userid = session('user_id');
        $password = db('user')->field('password')->where('user_id',$userid)->find();
        if($pwd == $password['password'])
            return 1;
        else
            return 0;
        // dump($pwd);
        // dump($password);die;
    }


}
