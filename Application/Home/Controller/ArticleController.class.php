<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-7-24
 * Time: 下午3:38
 */

namespace Home\Controller;


use Home\Model\ArticleModel;

class ArticleController extends CommonController{
    public function articleList(){
        $Article = new ArticleModel();
        $announcements = $Article -> getAnnouncements(0);
        $this -> assign('announcements',$announcements);
        $this -> assign('totalNum',count($announcements));
        $this -> display();
    }
    public function article(){
        $id = $_GET['id'];
        $Article = new ArticleModel();
        $article = $Article -> getAnnouncement($id);
        $this -> assign('article',$article[0]);
        $this -> display();
    }
} 