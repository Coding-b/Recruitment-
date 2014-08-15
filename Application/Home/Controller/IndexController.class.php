<?php
namespace Home\Controller;
use Home\Model\ArticleModel;
use Home\Model\SlideModel;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $Article = new ArticleModel();
        $Slide = new SlideModel();
        $slides = $Slide -> getSlides();
        $announcements = $Article -> getAnnouncements(3);
        $this -> assign('announcements',$announcements);
        $this -> assign('slides',$slides);
        $jobs  = $Article -> getJobs(4);
        $this -> assign('jobs',$jobs);
        $this -> display();
    }
}