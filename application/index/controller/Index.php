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
     //  
     	$u=Model('User')->get(2);
     	unset($u['password']);
     	$u->group;
     	$u->groupt;
     	dump($u->ToArray());die;
     	$this->assign('user',$u);
        return view();
     }

}
