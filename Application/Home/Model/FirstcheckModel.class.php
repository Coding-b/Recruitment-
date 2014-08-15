<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-8-2
 * Time: 上午12:06
 */

namespace Home\Model;


use Think\Model;

class FirstcheckModel extends Model{
    public function addToFirstcheck($data){
        $Fisrtcheck = M('firstcheck');
        return $Fisrtcheck -> add($data);
    }
} 