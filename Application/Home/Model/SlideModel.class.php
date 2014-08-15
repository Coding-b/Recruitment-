<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-8-1
 * Time: 上午2:34
 */

namespace Home\Model;


use Think\Model;

class SlideModel extends Model{
    public function getSlides(){
        $Slide = M('slide');
        return $Slide -> order('SL_order') -> select();
    }
} 