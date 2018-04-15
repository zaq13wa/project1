<?php

namespace app\index\controller;
use app\index\model\Index as IndexModel;
use app\index\model\Approval as approvalModel;
use weather;

class Index extends Common
{
     public function index()
     {
     	$a= Model('Project')->get(1)->file[0]->project;
        dump($a);die;
        return view();
     }

}
