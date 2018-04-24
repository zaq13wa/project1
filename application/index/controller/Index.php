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
     	$this->assign('user',$u->ToArray());
        return view();
     }

}
