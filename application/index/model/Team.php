<?php
namespace app\index\model;
use think\Model;

class Team extends Model
{
	//团队表与团队成员表的一对多关系
	public function member()
	{
		return $this->hasMany('Member');
	}

	//团队表与用户表的一对一关系
	public function user()
	{
		return $this->hasOne('User');
	}

	//团队表与材料表的一对多关系
	public function material()
	{
		return $this->hasMany('material');
	}

	//团队表与审批表的一对一关系
	public function approval()
	{
		return $this->hasOne('Approval');
	}
}
?>