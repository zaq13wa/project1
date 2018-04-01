<?php

namespace app\index\controller;

use thinkController;
use weather;
use app\index\model\Team as TeamModel;
use app\index\model\View1Material as MaterialModel;
use app\index\model\Member as MemberModel;
use app\index\model\Record as recordModel;
use app\index\model\Approval as approvalModel;

class Project extends Common
{


     public function groupinfo()
     {
          $userid = session('user_id');
          //dump($userid);die;
          $teamid = db('team')->field('team_id')->where('user_id',$userid)->find();
          // dump($teamid);die;
           
          $team = TeamModel::get($teamid['team_id']);
          //dump($team);die;
          $team->member;
          //$member = $team->member;
          // $ABC =  db('team')->field( 'a.*,b.*' )->alias('a')->join('hz_member b','a.team_id=b.team_id')
          // ->where('a.team_id',1)->select();
          //dump($ABC);
          //dump($member->toArray());die;
          //dump($team->toArray());die;
          if(request()->ispost())
          {
               $data = input('post.');
              
               //dump($data);die;
               $team1 = TeamModel::get($teamid['team_id']);
               $team1['project'] = $data['project'];
               $team1['introduce'] = $data['introduce'];
               $team1['phone'] = $data['phone'];
               $dz = $team1->member()->where('role',2)->find();
               $dz['name'] = $data['name1'];
               $zdls = $team1->member()->where('role',1)->find();
               $zdls['name'] = $data['name2'];

               $Approval = approvalModel::get(['team_id'=>$teamid['team_id'],'type'=>1]);
               $app['status'] = 0;
               $app['message'] = "0";
               $app['time'] = Time();
               $Approval->isUpdate(true)->save($app);
 
               if($team1->save()|$dz->save()|$zdls->save())
               {
                    $this->success('修改团队信息成功！',url('groupinfo'));
               }
               else
                    $this->error('修改团队信息失败！');
               
          }
          $this->assign(array(
               'team' => $team->toArray(),
               ));
          return view();
     }

     public function memberlist()
     {
          $userid = session('user_id');
          $teamid = db('team')->field('team_id')->where('user_id',$userid)->find();

          $member = new MemberModel();
          $memberlist = $member->where('team_id',$teamid['team_id'])->order('role desc')->select();
          //dump($memberlist);die;
          $this->assign('member',$memberlist);
          return view();
     }

     public function memberadd()
     {
          // $team_id = input('team_id');
          // dump($team_id);die;
          $userid = session('user_id');
          $teamid = db('team')->field('team_id')->where('user_id',$userid)->find();
          $school = db('team')->field('school')->where('user_id',$userid)->find();
$schoolinfo = db('admin')->field('school')->select();
        foreach ($schoolinfo as $k=> $s) {
           if($s['school']=="0")
            unset($schoolinfo[$k]);
        }
          if(request()->ispost())
          {
               $data = input('post.');
               //dump($data);die;
               $Approval = approvalModel::get(['team_id'=>$teamid['team_id'],'type'=>1]);
               $app['status'] = 0;
               $app['message'] = "0";
               $app['time'] = Time();
               $Approval->isUpdate(true)->save($app);
               if(MemberModel::create($data))
                    $this->success('添加团队成员成功！',url('memberlist'));
               else
                    $this->error('添加团队成员失败！');

          }
          $this->assign('schoolinfo',$schoolinfo);
          $this->assign('team_id',input('team_id'));
          $this->assign('xuex',$school);
          return view();
     } 

     public function memberedit()
     {
      //dump(input('member_id'));die;
          $memberinfo = MemberModel::get(input('member_id'));
         $schoolinfo = db('admin')->field('school')->select();
        foreach ($schoolinfo as $k=> $s) {
           if($s['school']=="0")
            unset($schoolinfo[$k]);
        }
          //$schoolrender = $schoolinfo->render();
          //dump($schoolinfo);die;
          $this->assign('schoolinfo',$schoolinfo);
          //$this->assign('schoolrender', $schoolrender);
          //dump($memberinfo->toArray());die;
          $this->assign('memberinfo',$memberinfo->toArray());
          if(request()->ispost())
          {
               $data = input('post.');
               //dump($data);die;
               $userid = session('user_id');
               $teamid = db('team')->field('team_id')->where('user_id',$userid)->find();
               $Approval = approvalModel::get(['team_id'=>$teamid['team_id'],'type'=>1]);
               $app['status'] = 0;
               $app['message'] = "0";
               $app['time'] = Time();
               $Approval->isUpdate(true)->save($app);
               if(MemberModel::update($data,['member_id'=>input('member_id')]))
                    $this->success('修改团队成员信息成功！',url('memberlist'));
               else
                    $this->error('修改团队成员信息失败！');

          }
          return view();
     }

     public function memberdel()
     {
          //dump(input('member_id'));die;
           $userid = session('user_id');
           $teamid = db('team')->field('team_id')->where('user_id',$userid)->find();
           $Approval = approvalModel::get(['team_id'=>$teamid['team_id'],'type'=>1]);
           $app['status'] = 0;
           $app['message'] = "0";
           $app['time'] = Time();
           $Approval->isUpdate(true)->save($app);
          if(MemberModel::destroy(['member_id'=>input('member_id')]))
               $this->success('删除团队成员成功！');
          else
               $this->error('删除团队成员失败！');
     }

     public function materiallist()
     {
        $cailiao=new MaterialModel(); 
        
        $cailiaores=$cailiao->getnews();
        $materialdata=$cailiaores->toArray();
        $materialrender=$cailiaores->render();
        $materialdata=$cailiao->changetime($materialdata);
        $deadline=db('conf')->where('enname','Deadline')->find();
        $this->assign(array(
               'materialdata' => $materialdata,
               'materialrender' => $materialrender,
               'deadline' => $deadline,
          ));

          return view();
     }

     public function materialedit()
     {

          $material_id=input("id");
          $cailiao = MaterialModel::get(['material_id' => $material_id]);
          

          if(request()->isPost()){

            //上传文件
            $data=input('post.');
            $data['time']=time();
            $data['title']=$cailiao->title;
            $data['material_id']=$material_id;
            $material=new MaterialModel;
            $save=$material->isUpdate(true)->save($data,['material_id' => $material_id]);
            //END

            if($save){
              $userid = session('user_id');
          //dump($userid);die;
          $teamid = db('team')->field('team_id')->where('user_id',$userid)->find();
          // dump($teamid);die;
              $Approval = approvalModel::get(['team_id'=>$teamid['team_id'],'type'=>2]);
               $app['status'] = 0;
               $app['message'] = "0";
               $app['time'] = Time();
               $Approval->isUpdate(true)->save($app);
                $this->success('上传文件成功',url('materiallist'));
            }else{
                $this->error('上传文件失败！');
            }
            return;
        }


          $data=$cailiao->toArray();
          $this->assign(array(
               'data' => $data,
          ));
          return view();
     }


     public function recordlist()
     {
        $record=new recordModel();        
        $recordRes=$record->getRecord();
        //$recordRender=$recordRes->render();
        $deadline=db('conf')->where('enname','Deadline')->find();
        $team=db('team')->where('user_id',session('user_id'))->find();
        $ms=db('material')->where('team_id',$team['team_id'])->select();
        $n=0;
        foreach($ms as $m)
        {
          if($m['title']!='论文')
          $m['status']=='已提交'?$n++:"";
        }
        $this->assign(array(
          'recordData'=>$recordRes,
          //'recordRender'=>$recordRender,
          'deadline' => strtotime($deadline['value']),
          'mission'=>$n,
          ));
        return view();
     }

     public function recordadd() {
        $user_id=$_SESSION['think']['user_id'];
        $team=db('team')->where('user_id', $user_id)->find();
        $team_id=$team['team_id'];
        //$userName=db('team')->where('user_id', $user_id)->value('name');
        
        if(request()->isPost()) {
          
          $data['time']=time();
          $data['team_id']=$team_id;
          //$data['name']=$team['name'];
         // $data['presenter']=$userName;
          $record=new recordModel();
          $save=$record->save($data);
          if($save){
              $this->success('上传文件成功',url('recordlist'));
          }else{
              $this->error('上传文件失败！');
          }
        }
        $Approval = approvalModel::get(['team_id'=>$team_id,'type'=>2]);
        //dump($Approval);die;
        $app['status'] = 0;
        $app['message'] = "0";
        $app['time'] = Time();
        $Approval->isUpdate(true)->save($app);
        return view();
     }
    
      public function upload($record_id) {
          $record=recordModel::get(['record_id' => $record_id]);
          $record->getFile($record_id)?:$this->error('文件打开失败！');
          return view();
      }
      public function upload_material($material_id) {
          $material=new MaterialModel();
          //dump($material_id);
          $material->getFile($material_id)?:$this->error('文件打开失败！');
          // return view('upload');
      }
}
