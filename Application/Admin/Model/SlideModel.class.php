<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-7-29
 * Time: 下午10:55
 */

namespace Admin\Model;


use Think\Model;

class SlideModel extends Model{
    public function modifySlide($slide){
        $Slide = new Model('slide');
        return $Slide -> save($slide);
    }
    public function getSlides(){
        $Slide = new Model('slide');
        return $Slide -> select();
    }
    public function getSlideAddr($id){
        $Slide = new Model('slide');
        return $Slide -> where('SL_id = '.$id) -> select();
    }
} 