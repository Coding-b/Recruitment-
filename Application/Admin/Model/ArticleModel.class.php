<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-7-29
 * Time: 下午10:20
 */

namespace Admin\Model;


use Think\Model;

class ArticleModel extends Model{
    /**
     * 添加文章
     * @param $article
     */
    public function addArticle($article){
        $Article = new Model('article');
        return $Article -> data($article) -> add();
    }

    /**
     * 获取指定文章
     * @param $id
     */
    public function getArticle($id){
        $Article = new Model('article');
        return $Article -> where('AR_id = '.$id) -> select();
    }

    /**
     * 修改文章
     * @param $article
     */
    public function modifyArticle($article){
        $Article = new Model('article');
        return $Article -> save($article);
    }

    /**
     * 获取所有文章
     * @return mixed
     */
    public function getArticles(){
        $Article = new Model('article');
        return $Article ->join('LEFT JOIN category ON category.CG_id = article.AR_category') -> order(AR_id) -> select();
    }

    public function deleteArticle($id){
        $Article = new Model('article');
        return $Article -> where('AR_id = '.$id) -> delete();
    }
} 