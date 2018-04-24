<?php
namespace app\index\model;
use think\Model;
class Project extends Model
{
	public function teacher()
    {
        return $this->belongsTo('User','tid','user_id');
    }
    public function groupwork()
    {
        return $this->hasMany('Groupwork','pid');
    }
    public function file()
    {
        return $this->hasMany('File','pid');
    }
}
?>