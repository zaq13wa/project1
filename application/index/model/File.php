<?php
namespace app\index\model;
use think\Model;
class File extends Model
{
	protected static function init()
    {
      	File::event('before_insert',function($article){
          if($_FILES['img']['tmp_name']){
                $file = request()->file('img');
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                if($info){
                    // $thumb=ROOT_PATH . 'public' . DS . 'uploads'.'/'.$info->getExtension();
                    $thumb= 'public' . DS .'uploads'.'/'.$info->getSaveName();
                    $article['thumb']=$thumb;
                }
            }
      });


      	File::event('before_update',function($article){
          if($_FILES['img']['tmp_name']){//dump($article);die;
                 $arts=File::find($article->Id);
                 $thumbpath=$_SERVER['DOCUMENT_ROOT'].$arts['thumb'];
                if(file_exists($thumbpath)){
                  @unlink($thumbpath);
                }
                $file = request()->file('img');
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                if($info){
                    // $thumb=ROOT_PATH . 'public' . DS . 'uploads'.'/'.$info->getExtension();
                    $thumb= 'public' . DS .'uploads'.'/'.$info->getSaveName();
                    $article['thumb']=$thumb;
                }
            }
      });

      	File::event('before_delete',function($article){
          
          		$arts=File::find($article->id);
          		$thumbpath=$_SERVER['DOCUMENT_ROOT'].$arts['thumb'];
                if(file_exists($thumbpath)){
                	@unlink($thumbpath);
                }
        });
    }
	 public function user()
    {
        return $this->belongsTo('User','uid','user_id');
    }
    public function project()
    {
        return $this->belongsTo('Project','pid','id');
    }
}
?>