<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-7-25
 * Time: 下午8:56
 */

namespace Home\Controller;


use Home\Model\ArticleModel;

class CollegeController extends CommonController{
    public function college(){
        $Article = new ArticleModel();
        $college = $Article -> getCollege();
        $this -> assign('college',$college[0]);
        $this -> display();
    }
} 