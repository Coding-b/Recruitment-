<?php
/**
 * Created by PhpStorm.
 * User: 华龄太子
 * Date: 14-3-23
 * Time: 下午11:06
 */

namespace Admin\Controller;

use Think\Controller;

class CommonController extends Controller{
    public function checkLogin(){
        header("Content-type:text/html;charset=utf-8");
        $username=$_SESSION['username'];
        $userlevel = $_SESSION['userlevel'];

        if(empty($username)||!isset($username)||($userlevel != 2)){
            echo "<script type='text/javascript'>alert('请先登录!');</script>";
            $this->redirect('/Admin/Login/login');
            exit;
        }else{
            return $username;
        }
    }
}