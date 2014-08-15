<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-7-29
 * Time: 下午11:16
 */

namespace Admin\Model;


use Think\Model;

class CategoryModel extends Model{
    public function getCategories(){
        $Category = new Model('category');
        return $Category -> select();
    }
} 