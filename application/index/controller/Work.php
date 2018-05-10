<?php

namespace app\index\controller;
use app\index\model\Index as IndexModel;
use app\index\model\Approval as approvalModel;
use weather;

class Work extends Common
{
     public function lis()
     {
     	$u=Model('User')->get(session("user_id"));
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
        $u=Model('User')->get(session('user_id'));
        $u->project;
        
        $k=0;
        foreach($u['project'] as $g)
        {
            $g->groupwork;
            foreach ($g['groupwork'] as $w) {
                $w->group;
            }
        }
        //dump($u->ToArray());die;
        $u=$u->ToArray();
        $this->assign('list',$u['project']);
        return view();
        return view();
     }
     public function upload()
     {
          $g=input('get.');
          $p=Model('Project')->get($g['pid']);
          $p['tid']=$p->teacher['name'];
          $p['uid']=session('user_id');
          unset($p['teacher']);
          $p['file']=db('file')->where('uid',$p['uid'])->where('pid',$p['Id'])->find()?:0;
          if(request()->ispost())
          {
            if($_FILES['img']["tmp_name"]!='')
             {  
                $data = input('post.');//dump($_FILES['img']["tmp_name"]);die;
                $data['time']=date("Y-m-d");
                if($p['file']==0)
                $t= Model('File')->save($data)? '<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("上传文件成功！");parent.layer.close(index);</script>': '<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("上传文件失败！");parent.layer.close(index);</script>'; 
                else{
                   $f= Model('File')->get($p['file']['Id']);
                  $t= $f->save($data)? '<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("更新文件成功！");parent.layer.close(index);</script>': '<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("更新文件失败！");parent.layer.close(index);</script>'; 
                }
            echo $t;
             }
             else
              echo '<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("未上传文件！");parent.layer.close(index);</script>';
           }
          //dump($p->ToArray());die;
          $this->assign('p',$p->ToArray());
        return view();
     }
     function memlist(){
       $g=input('get.');
       $p=Model('Project')->get($g['pid']);
       $p->file;
       foreach ($p['file'] as $k=> $f) {
         $f->user->usergroup;
         $i=0;
         foreach($f['user']['usergroup'] as $gr)
         {
                $gr['gid']==$g['gid']?$i++:"";
         }
         $f['uid']=$f['user']['name'];
         unset($f['user']);
         if($i!=0)$file[]=$f->ToArray();
       }
      $p=$p->ToArray();
      unset($p['file']);
      // dump($p);
       $this->assign('file',$file);
       $this->assign('p',$p);
       return view();

     }
     function zip()
     {
      $g=input('get.');
      $id=explode(',',$g['id']);
      $p=db('project')->where('Id',$g['pid'])->find();
        
        $filename = $p['title'];
        $zip = new \ZipArchive;
        $zip->open($filename,ZipArchive::CREATE);   //打开压缩包
        foreach ($id as $i) {
          $f=db('file')->where('Id',$i)->find();
          $path = $f['thumb'];
          $zip->addFile($path,basename($path));   //向压缩包中添加文件
        }
       $zip->close();
      return $id;
     }
}
