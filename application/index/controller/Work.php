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
       $u=Model('User')->get(session('user_id'));
        $u->groupt;
        foreach($u['groupt'] as $g)
        {
           $g->course;
           $c[$g['course']['name']][]=$g->ToArray();
          $c[$g['course']['name']]['course']= $g['course']['name'];
        }
        $u=$u->ToArray();
       // dump($c);
        if(request()->ispost())
          {
            $data=input('post.');
            if(!isset($data['group']))
            echo '<script>parent.layer.msg("请选择班级！");window.history.back();  </script>';
            else{
            $group=$data['group'];
            $data['tid']=session('user_id');
            $data['time']=date("Y-m-d");
            unset($data['group']);
            // dump($group);die;
            $p=Model('project');
            $p->save($data);
            foreach($group as $g1)
            {
               db('groupwork')->insert(['cid'=>$g1,'pid'=>$p['Id']]);
            }
            echo '<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("创建作业成功！");parent.layer.close(index);</script>';
           }
          }
        $this->assign('g',$c);
        return view();
     }
     public function edit()
     {
      $pid=input('get.pid');
     // dump($pid);
      $p=Model('project')->get($pid);
       $u=Model('User')->get(session('user_id'));
        $u->groupt;
        $p->groupwork;
        foreach($p['groupwork'] as $gr)$gr->group;
        foreach($u['groupt'] as $g)
        {
           $g->course;
           $c[$g['course']['name']][]=$g->ToArray();
          $c[$g['course']['name']]['course']= $g['course']['name'];
        }
       
        $u=$u->ToArray();
       // dump($p);
        if(request()->ispost())
          {
            $data=input('post.');
            if(!isset($data['group']))
            echo '<script>parent.layer.msg("请选择班级！");window.history.back();  </script>';
            else{
            $group=$data['group'];
            $data['tid']=session('user_id');
            $data['time']=date("Y-m-d");
            unset($data['group']);
            $p->save($data);
            db('groupwork')->where('pid',$pid)->delete();
            foreach($group as $g1)
            {

               db('groupwork')->insert(['cid'=>$g1,'pid'=>$p['Id']]);
            }
            echo '<script>var index = parent.layer.getFrameIndex(window.name);parent.layer.msg("编辑作业成功！");parent.layer.close(index);</script>';
           }
          }
           $p=$p->Toarray();
        $this->assign('g',$c);
        $this->assign('p',$p);
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
       if($p->file)
       {
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
       unset($p['file']);
     }
      $p=$p->ToArray();
      
      // dump($p);
       $this->assign('file',isset($file)?$file:0);
       $this->assign('p',$p);
       return view();

     }
     function zip()
     {
      $g=input('get.');
      $id=explode(',',$g['id']);
      $p=db('project')->where('Id',$g['pid'])->find();
        $filename = $p['title'].".zip";
        $zip = new \ZipArchive;
        $zip->open($filename,\ZIPARCHIVE::CREATE|\ZIPARCHIVE::OVERWRITE);   //打开压缩包
        foreach ($id as $i) {
          $f=db('file')->where('Id',$i)->find();
          $path = str_replace("public/" ,'',$f['thumb']);
          $zip->addFile($path,basename($path));   
        }
       $zip->close();
      return $filename;
     }
    
}
