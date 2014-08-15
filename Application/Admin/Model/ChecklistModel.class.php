<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-8-1
 * Time: 下午11:49
 */

namespace Admin\Model;


use Think\Model;

class ChecklistModel extends Model{
    public function addToCheck($data){
        $CheckList = M('checklist');
        return $CheckList -> add($data);
    }
} 