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
    public function usergroup()
    {
        return $this->hasMany('Usergroup','gid',"id");
    }
    public function course()
    {
        return $this->belongsTo('Group','pid',"id");
    }
    public function child()
    {
        return $this->hasMany('Group','Id',"pid");
    }
}
?>