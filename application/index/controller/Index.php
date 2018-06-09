<?php

namespace app\index\controller;
use app\index\model\Index as IndexModel;
use app\index\model\Approval as approvalModel;
use weather;

class Index extends Common
{
     public function index()
     {
     	//$a= Model('Project')->get(1)->file[0]->project;

     	$u=Model('User')->get(session('user_id'));
     	unset($u['password']);
          if(!$u['groups']=$u->groupt)
          {
             $u['groups']=$u->usergroup;
             unset($u["usergroup"]);
             foreach( $u['groups'] as $g){
               $g['Id']=$g['group']['Id'];
               $g["name"]=$g['group']['name'];
               $g["leader"]=$g['group']['leader'];
               $g['pid']=$g->group->course["name"];
               $g['teacher']=$g->group->teacher['name'];
               unset($g['group']);
             }
          }
          else{
             foreach( $u['groups'] as $g){
              $g['pid']=$g->course['name'];
              $g['teacher']=session('username');
              unset($g['course']);
             } 
          }
     	   unset($u['groupt']);
     //	dump($u->ToArray());die;
          $u->usergroup;
        $k=0;
        foreach($u['usergroup'] as $g)
        {
            $g->group->groupwork;
            $g['group']->course;
            foreach($g['group']['groupwork'] as $w)
            {
              //if($k>2)break;
              $w->project;
              if(!db('file')->where('uid',session('user_id'))->where('pid',$w['project']['Id'])->find()&&time() < strtotime($w['project']['time']))
               { $list[$k]['teacher']=$g['group']->teacher['name'];
              $list[$k]['group']=$g['group']['name'];
              $list[$k]['project']=$w['project']->ToArray();
               $list[$k]['course']=$g['group']['course']['name'];
               $k++;
              }
            }
            
        }
        isset($list)?:$list='';
       //dump($u->ToArray());die;
        $this->assign('list',$list);
     	$this->assign('user',$u->ToArray());
        return view();
     }
     public function msg(){
        $u=Model('User')->get(session('user_id'));
      unset($u['password']);
          if(!$u['groups']=$u->groupt)
          {
             $u['groups']=$u->usergroup;
             unset($u["usergroup"]);
             foreach( $u['groups'] as $g){
               $g['Id']=$g['group']['Id'];
               $g["name"]=$g['group']['name'];
               $g["leader"]=$g['group']['leader'];
               $g['pid']=$g->group->course["name"];
               $g['teacher']=$g->group->teacher['name'];
               unset($g['group']);
             }
          }
          else{
             foreach( $u['groups'] as $g){
              $g['pid']=$g->course['name'];
              $g['teacher']=session('username');
              unset($g['course']);
             } 
          }
         unset($u['groupt']);
      //dump($u->ToArray());die;
         $u=$u->ToArray();
         $this->assign('g',$u['groups']);
        return view();
     }
     public function msgsend(){
         $data=input('get.');
         $data['uid']=session('user_id');
         $data['time']=date('Y-m-d H:i:s');
         dump($data);
         db('msg')->insert($data);
         return $data;
     }
     public function msgshow(){
         $data=input('get.gid');
         $s=db('msg')->where('gid',$data)->order('time')->select();
         foreach($s as &$a)
         {
            $u= db('user')->where('user_id',$a['uid'])->find();
            $a['uid']=$u['name'];
            $a['time']=date("H:i:s",strtotime($a['time']));
         }
         return $s;
     }
}
