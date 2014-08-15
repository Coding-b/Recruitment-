<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-7-30
 * Time: 下午9:54
 */

namespace Home\Model;


use Think\Model;

class ArticleModel extends Model{
    /**
     * 获取公告公示
     * @param $num 0表示获取所有  其他表示获取条数
     * @return mixed
     */
    public function getAnnouncements($num){
        $Article = M('article');
        if($num == 0)
            return $Article -> where('AR_category = 3') -> order(AR_createTime) -> select();
        else
            return $Article -> where('AR_category = 3') -> order(AR_createTime) -> limit($num) -> select();
    }

    /**
     * 获取指定公告公示
     * @param $id
     * @return mixed
     */
    public function getAnnouncement($id){
        $Article = M('article');
        return $Article -> where('AR_id = '.$id) -> order(AR_createTime) -> select();
    }

    /**
     * 获取最新职位
     * @param $num
     * @return mixed
     */
    public function getJobs($num){
        $Article = M('article');
        if($num == 0)
            return $Article -> where('AR_category = 1') -> order(AR_createTime) -> select();
        else
            return $Article -> where('AR_category = 1') -> order(AR_createTime) -> limit($num) -> select();
    }

    /**
     * 获取学院简介
     * @return mixed
     */
    public function getCollege(){
        $Article = M('article');
        return $Article -> where('AR_category = 2') -> limit(1) -> select();
    }
} 