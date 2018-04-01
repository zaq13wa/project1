<?php
namespace app\index\controller;
use think\Controller;
class Common extends Controller
{

    public function _initialize(){
        if(!session('user_id') || !session('username')){
           $this->error('您尚未登录系统',url('login/index')); 
        }

        // $deadline = db('conf')->where('enname','BMdeadline')->find();
        $userid = session('user_id');
        //dump($userid);die;
        $school = db('team')->field('school')->where('user_id',$userid)->find();
          //dump($school);die;
        $admin = model('Admin')->where('school',$school['school'])->field('time')->find();
           //dump(time());
           //dump($admin->toArray());die;
        // if（!$school）{
        //     $this->error('登录异常',url('login/index')); 
        // }

    	//当前位置
        if(input('cateid')){
            $this->getPos(input('cateid'));
        }
        if(input('artid')){
            $articles=db('article')->field('cateid')->find(input('artid'));
            $cateid=$articles['cateid'];
            $this->getPos($cateid);
        }
        //网站配置项
    	$this->getConf();
        //网站栏目导航
        $this->getNavCates();
        //底部导航信息
        $cateM=new \app\index\model\Cate();
        $recBottom=$cateM->getRecBottom();
        $this->assign('recBottom',$recBottom);
        // $this->assign('deadline',$deadline);
        $this->assign('bmdeadline',$admin->toArray());
        $this->assign('school',$school);
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
