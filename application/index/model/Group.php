<?php
namespace app\index\model;
use think\Model;
class Group extends Model
{
	 public function teacher()
    {
        return $this->belongsTo('User','tid','user_id');
    }
     public function user()
    {
        return $this->hasMany('User','cid');
    }
      public function groupwork()
    {
        return $this->hasMany('Groupwork','cid');
    }
}
?>