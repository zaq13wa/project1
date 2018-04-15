<?php
namespace app\index\model;
use think\Model;
class File extends Model
{
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