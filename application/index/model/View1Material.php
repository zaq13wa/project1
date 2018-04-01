<?php
namespace app\index\model;
use think\Model;
class View1Material extends Model
{

  	public function getnews(){
    $userid=$_SESSION['think']['user_id'];
    $team=Model('User')->get(['user_id' => $userid])->team;
   	return $this::where('team_id',$team->team_id)->order('material_id')->paginate(20);
   }


   public function changetime($data){
    foreach ($data["data"] as $key => $value) {
      $data["data"][$key]["time"]=date("Y-m-d",$data["data"][$key]["time"]);
      //$data["data"][$key]["deadline"]=date("Y-m-d",$data["data"][$key]["deadline"]);
    }
    return $data;
   }

   public function getFile($material_id) {
    $material=$this::get(['material_id' => $material_id]);
    //dump($material_id);
    //dump($material);
    $route=$material['route'];
    //dump(file_exists($route));die;
    if($route){
      $file=fopen($route,"r");
      $fileinfo = pathinfo($route);
      $filename= $material['title'].".".$fileinfo['extension']; 
    //文件拓展名
      header("Content-Type: application/octet-stream");
      header("Accept-Ranges: bytes");
      header("Accept-Length: ".filesize($route));
      header("Content-Disposition: attachment; filename=$filename");
      echo fread($file,filesize($route));
      fclose($file);
    }
    else{
      return false;
    }
  }


    protected static function init()
    {
        View1Material::event('before_insert',function($material){
          $userid=$_SESSION['think']['user_id'];
          $team=Model('User')->get(['user_id' => $userid])->team;
          $teamid=$team->team_id;
          $teamname=$team->data['name'];
          if($_FILES['upload']['name']){
                $file = request()->file('upload');
                $info = $file->rule('uniqid')->validate(['ext' => 'doc,pdf,docx,xls,xlsx'])->move(ROOT_PATH . 'public' . DS . 'uploads'. DS . $teamname. DS .'material','竞赛设计');
                if($info){
                    // $thumb=ROOT_PATH . 'public' . DS . 'uploads'.'/'.$info->getExtension();
                    $thumb='uploads'.'/'.$teamname.'/'.'material'.'/'.$info->getSaveName();
                    $material['route']=$thumb;
                }
            }
      });


        View1Material::event('before_update',function($material){
          $userid=$_SESSION['think']['user_id'];
          $team=Model('User')->get(['user_id' => $userid])->team;
          $teamname=$team->data['name'];
          if($_FILES['upload']['name']){
              $arts = View1Material::get(['material_id' => $material->material_id]);
              $thumbpath=$_SERVER['DOCUMENT_ROOT'].$arts['route'];
                if(file_exists($thumbpath)){
                  @unlink($thumbpath);
                }
                $file = request()->file('upload');
                if($material->title=='竞赛设计及详细技术路线'){
                 $info = $file->rule('uniqid')->validate(['ext' => 'doc,pdf,docx,xls,xlsx'])->move(ROOT_PATH . 'public' . DS . 'uploads'. DS . $teamname. DS .'material','竞赛设计');
                }
                else{
                  $info = $file->rule('uniqid')->validate(['ext' => 'doc,pdf,docx,xls,xlsx'])->move(ROOT_PATH . 'public' . DS . 'uploads'. DS . $teamname. DS .'material',$material->title);
                }
                if($info){
                    // $thumb=ROOT_PATH . 'public' . DS . 'uploads'.'/'.$info->getExtension();
                    $thumb='uploads'.'/'.$teamname.'/'.'material'.'/'.$info->getSaveName();
                    $material['status']='已提交';
                    $material['route']=$thumb;
                }
                else{
                  return false;
                }
            }
            else{ return false;}
      });

        View1Material::event('before_delete',function($material){
          
              $arts=View1Material::find($material->material_id);
              $thumbpath=$_SERVER['DOCUMENT_ROOT'].$arts['upload'];
                if(file_exists($thumbpath)){
                  @unlink($thumbpath);
                }
        });


    }

}
