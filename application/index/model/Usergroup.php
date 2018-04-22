<?php
namespace app\Index\model;
use think\Model;
class Usergroup extends Model
{
       public function group()//学生班级
    {
        return $this->BelongsTo('Group','gid',"id");
    }
     public function user()//学生班级
    {
        return $this->BelongsTo('User','uid',"user_id");
    }
}
