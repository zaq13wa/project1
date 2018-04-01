<?php

namespace app\index\controller;

use thinkController;
use weather;
use app\index\model\Aboutus as AboutusModel;

class Aboutus extends Common
{


     public function aboutus1()
     {
          $type1 = AboutusModel::get(['type' => 1]);
          //dump($type1);die;
          $this->assign('type1',$type1);
          return view();
     }

     public function aboutus2()
     {
          $type2 = AboutusModel::get(['type' => 2]);
          $this->assign('type2',$type2);
          return view();
     }

     public function aboutus3()
     {
          $type3 = AboutusModel::get(['type' => 3]);
          $this->assign('type3',$type3);
          return view();
     }

    

}
