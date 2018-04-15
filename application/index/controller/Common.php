<?php
namespace app\index\controller;
use think\Controller;
class Common extends Controller
{

    public function _initialize(){
        if(!session('user_id') || !session('username')){
           $this->error('您尚未登录系统',url('login/index')); 
        }
        
        $userid = session('user_id');
    }



    public function getNavCates(){
        $cateres=db('cate')->where(array('pid'=>0))->limit(3)->select();
        foreach ($cateres as $k => $v) {
            $children=db('cate')->where(array('pid'=>$v['id']))->select();
            if($children){
                $cateres[$k]['children']=$children;
            }else{
                $cateres[$k]['children']=0;
            }
        }
        $this->assign('cateres',$cateres);
    }

    public function getConf(){
        $conf=new \app\index\model\Conf();
        $_confres=$conf->getAllConf();
        $confres=array();
        foreach ($_confres as $k => $v) {
            $confres[$v['enname']]=$v['value'];
        }
        $this->assign('confres',$confres);

    }

    public function getPos($cateid){
        $cate= new \app\index\model\Cate();
        $posArr=$cate->getparents($cateid);
        // dump($posArr); die;
        $this->assign('posArr',$posArr);
    }


}
