<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-8-3
 * Time: 下午6:28
 */

namespace Department\Model;


use Think\Model;

class DepartmentModel extends Model{
    public function modify($array){
        $Department = M('department');
        return $Department -> data($array) -> save();
    }
} 