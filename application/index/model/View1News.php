<?php
namespace app\index\model;
use think\Model;
class View1News extends Model
{

  	public function getnews($type){
  	$count=0;
   	$res=$this::where('type',$type)->paginate(10);
   	$count=$this::where('type',$type)->count();
    for($i=0; $i<$count; $i++) {
    	$oldTime=time()-strtotime($res[$i]['time']);

    	if($oldTime<60) {
    		$newTime=$oldTime.'秒前发布';
    	}
      else if($oldTime<(60*60)) {
    		$newTime=(int)($oldTime/60).'分钟前发布';
    	} 
      else if($oldTime<(60*60*24)) {
    		$newTime=(int)($oldTime/(60*60)).'小时前发布';
    	} 
      else if($oldTime<(60*60*24*30)) {
    		$newTime=(int)($oldTime/(60*60*24)).'天前发布';
    	} 
      else if($oldTime<(60*60*24*30*12)) {
    		$newTime=(int)($oldTime/(60*60*24*30)).'月前发布';
    	} 
      else {
    		$newTime=(int)($oldTime/(60*60*24*30*12)).'年前发布';
    	}
    	$res[$i]['time']=$newTime;
      //dump($newTime);
      }//die; 
      //dump($oldTime);die;
   	return $res;
   }

   public function team()
    {
        return $this->hasOne('Team');
    }
}
