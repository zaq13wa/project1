<?php
namespace app\index\model;
use think\Model;
class Groupwork extends Model
{
	 public function group()
    {
        return $this->belongsTo('Group','cid','id');
    }
    public function project()
    {
        return $this->belongsTo('Project','pid','id');
    }
}
?>