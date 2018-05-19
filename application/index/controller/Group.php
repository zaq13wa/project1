<?php

namespace app\index\controller;
use app\index\model\Index as IndexModel;
use app\index\model\Approval as approvalModel;
use weather;

class Group extends Common
{
     public function chose()
     {
     	$c=db('user')->where('cid',0)->select();
        $this->assign('g',$c);
        return view();
     }
     public function create()
     {
        $c=db('group')->where('pid',0)->select();
          if(request()->ispost())
          {
            $data=input('post.');
            $data['tid']=session('user_id');
            if($data['name']==''||!isset($data['pid']))
                 echo '<script>parent.layer.msg("未填写完整！");window.history.back();  </script>';
            	else 
            	 echo db('group')->insert($data)? '<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("创建班级成功！");parent.layer.close(index);</script>':'<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("创建班级失败！");parent.layer.close(index);</script>';
        }
        $this->assign('c',$c);
        return view();
     }
     public function teacher(){
         $i=input('get.id');
         $u=Model('User')->get($i);
        $u->groupt;
        foreach($u['groupt'] as $g)
        {
           $g->course;
           $c[$g['course']['name']][]=$g->ToArray();
          $c[$g['course']['name']]['course']= $g['course']['name'];
        }
         return $c;
     }
     public function cho(){
     	$c=input('get.id');
     	echo db('usergroup')->where('gid',$c)->where('uid',session('user_id'))->find()?'<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("已有班级！");parent.layer.close(index);</script>':db('usergroup')->insert(['gid'=>$c,'uid'=>session('user_id')])?'<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("选择班级成功！");parent.layer.close(index);</script>':'<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("选择班级失败！");parent.layer.close(index);</script>';

     }
}
