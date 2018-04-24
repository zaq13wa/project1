<?php

namespace app\index\controller;
use app\index\model\Index as IndexModel;
use app\index\model\Approval as approvalModel;
use weather;

class Work extends Common
{
     public function lis()
     {
     	$u=Model('User')->get(2);
        $u->usergroup;
        $k=0;
        foreach($u['usergroup'] as $g)
        {
            $g->group->groupwork;
            foreach($g['group']['groupwork'] as $w)
            {
                $list[$k]['teacher']=$g['group']->teacher['name'];
              $list[$k]['group']=$g['group']['name'];
              $list[$k]['project']=$w->project->ToArray();
               $k++;
            }
           
        }
       //dump($list);die;
        $this->assign('list',$list);
        return view();
     }
     public function create()
     {
      
        return view();
     }
      public function correct()
     {
      
        return view();
     }
     public function upload()
     {
          $g=input('get.');
          $p=Model('Project')->get($g['pid']);
          $p['tid']=$p->teacher['name'];
          $p['uid']=session('user_id');
          unset($p['teacher']);
          if(request()->ispost())
          {
               $data = input('post.');//dump($_FILES['img']);die;
              Model('File')->save($data)? : $this->error('上传失败'); 
            echo '<script>window.close();</script>';
           }
         // dump($p->ToArray());die;
          $this->assign('p',$p->ToArray());
        return view();
     }
}
