<?php

namespace app\index\controller;
use app\index\model\View1News as NewsModel;
use thinkController;
use weather;

class News extends Common
{


     public function tongzhi()
     {
     	/*$data=db('View1News')->where("type","通知")->paginate(10);
     	$data1=$data->render();
     	$this->assign(array(
               'data' => $data,
               'data1' => $data1,
          ));*/
        $news=new NewsModel();
        $newsres=$news->getnews('通知');
        //dump($newsres);die;
        $newsdata=$newsres->toArray();
        //dump($newsdata);die;
        $newsrender=$newsres->render();
        $this->assign(array(
               'newsdata' => $newsdata,
               'newsrender' => $newsrender,
          ));
        return view();
     }

    public function xinwen() {
      $news = new NewsModel();
      $newsres=$news->getnews('新闻');
      $newsdata=$newsres->toArray();
      $newsrender=$newsres->render();
      $this->assign(array(
               'newsdata' => $newsdata,
               'newsrender' => $newsrender,
          ));
      return view();
    }
    public function article() {
     $id=input('id');
     //dump($id);die;
     $type = input('type');
     // dump($type);die;
     $news=new NewsModel();
     $news=$news->where('id',$id)->find();
     $data=$news->toArray();
     $this->assign(array(
               'data' => $data,
               'type' => $type
          ));
     return view();
    }


}
