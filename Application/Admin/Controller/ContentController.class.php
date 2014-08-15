<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-7-29
 * Time: 上午10:23
 */
namespace Admin\Controller;
date_default_timezone_set('prc');

use Admin\Model\ArticleModel;
use Admin\Model\CategoryModel;
use Admin\Model\ChecklistModel;
use Admin\Model\DepartmentModel;
use Admin\Model\SlideModel;

class ContentController extends CommonController{

    public function index(){
        $this -> checkLogin();

        $ArticleModel = new ArticleModel();
        $Slide = new SlideModel();
        $articles = $ArticleModel -> getArticles();
        $slides = $Slide -> getSlides();
        $this -> assign('slides',$slides);
        $this -> assign('articles',$articles);
        $this->display();
    }

    /**
     * 添加文章
     */
    public function add(){
        $this -> checkLogin();
        $Department = new DepartmentModel();
        $departments = $Department -> getAllDepartments();

        $category = new CategoryModel();
        $categories = $category -> getCategories();
        $this -> assign('categories',$categories);
        $this -> assign('departments',$departments);
        $this->display();
    }
    public function modify(){
        $this -> checkLogin();

        $category = new CategoryModel();
        $categories = $category -> getCategories();
        $this -> assign('categories',$categories);
        $Article = new ArticleModel();
        $AR_id = $_GET['AR_id'];
        $article = $Article -> getArticle($AR_id);
        $this -> assign('article',$article[0]);
        $this->display();
    }

    public function delete(){
        $this -> checkLogin();

        $AR_id = $_GET[AR_id];
        $Article = new ArticleModel();
        $status = $Article -> deleteArticle($AR_id);
        if($status == true){
            $this -> success('添加成功' ,'index');
        }else{
            $this -> error("添加失败");
        }
    }

    public function modifyArticle(){
        $Article = new ArticleModel();
        $article['AR_id'] = $_POST['AR_id'];
        $article['AR_content'] = $_POST['AR_content'];
        $article['AR_title'] = $_POST['AR_title'];
        $status = $Article ->modifyArticle($_POST);
        if($status == true){
            $this -> success('添加成功' ,'index');
        }else{
            $this -> error("添加失败");
        }
    }

    public function addArticle(){
        $ArticleModel = new ArticleModel();
        $request = array();
        $request['AR_title'] = $_POST['title'];
        $request['AR_category'] = $_POST['category'];
        $request['AR_content'] = $_POST['content'];
        $request['AR_createTime'] = date('Y-m-d',time());
        //说明是招聘信息，提取相关要求信息
        if($request['AR_category'] == 1){
            $request['AR_numPerson'] = $_POST['personNum'];
            $request['AR_education'] = $_POST['education'];
            $request['AR_major'] = $_POST['major'];
            $request['AR_deadTime'] = $_POST['deadTime'];
            $request['AR_age'] = $_POST['age'];
        }
//        $request['AR_creator'] = $_SESSION['user'];
        $request['AR_creator'] = "Admin";
        $status = $ArticleModel -> addArticle($request);
        if($status == true){
            //向firstcheck表添加数据
            $firstCheckBoxs = $_POST['firstCheckBox'];
            $Checklist = new ChecklistModel();

            $check['CL_arid'] = $status;

            for($i = 0;$i < count($firstCheckBoxs);$i ++){
                $check['CL_dpid'] = $firstCheckBoxs[$i];
                $Checklist -> addToCheck($check);
            }
            $this -> success('添加成功' ,'index');
        }else{
            $this -> error("添加失败");
        }
    }
    public function modifySlide(){
        $Slide = new SlideModel();

        $slide['SL_id'] = $_POST['SL_id'];
        $slide['SL_order'] = $_POST['SL_order'];


        $upload = new  \Think\Upload();// 实例化上传类

        $slide['SL_addr'] = '/zhaoping/Public/Common/Image/index/slidePic/'.$_FILES['slideImage']['name'][0];

        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Public/Common/Image/index/slidePic/'; // 设置附件上传根目录
        $upload->savePath =  '';// 设置附件上传目录
        $oldSlide = $Slide -> getSlideAddr($slide['SL_id'])[0];
        $path = '.'.substr($oldSlide['SL_addr'],9,200);


        $info = $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功

            //删除旧的图片

            if(strcmp($oldSlide,$slide['SL_addr']) != 0){
                if(file_exists($path))
                    unlink($path);
            }
            //添上新图
            $Slide ->modifySlide($slide);

            $image = new \Think\Image();
            $image->open($path);
            //将图片裁剪为400x400并保存为corp.jpg
            $image->thumb(636, 450,\Think\Image::IMAGE_THUMB_FIXED)->save($path);

            $this->success('上传成功！');
        }
    }
} 