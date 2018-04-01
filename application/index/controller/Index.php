<?php

namespace app\index\controller;
use app\index\model\Index as IndexModel;
use app\index\model\Approval as approvalModel;
use weather;

class Index extends Common
{
     public function index()
     {
     	  $index=new IndexModel();
        $newsres=$index->getindexnews(1);
        //dump($newsres);
        $newsdata=$newsres->toArray();
        foreach($newsdata['data'] as &$n)
        {
            $n["article"]=str_replace("<p>"," ",$n["article"]);
            $n["article"]= str_replace("</p>"," ",$n["article"]);
        }
        //dump($newsdata);die;
        $newsrender=$newsres->render();
        
        $team=$index->getindexteam();
        $team->member;
        //dump($team);die;

        $teamdata=$team->toArray();
        //dump($teamdata );die;

        $app = new approvalModel();
        $userid = session('user_id');
        //dump($userid);
        $teamid = db('team')->field('team_id')->where('user_id',$userid)->find();
        //dump($teamid);die;
        $message = $app->where('team_id',$teamid['team_id'])->select();
        //dump($message);die;
        
        $this->assign(array(
               'newsdata' => $newsdata,
               'newsrender' => $newsrender,
               'teamdata'=>$teamdata,
               'message' => $message
          ));
       //dump($newsrender);die;
        return view();
     }

}
