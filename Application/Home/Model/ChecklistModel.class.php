<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-8-2
 * Time: 上午12:06
 */

namespace Home\Model;


use Think\Model;

class ChecklistModel extends Model{
    public function getCheckList($AR_id){
        $CheckList = M('checklist');
        return $CheckList -> where('CL_arid = '.$AR_id) -> select();
    }
} 