<?php
/**
 * Created by PhpStorm.
 * User: 华龄太子
 * Date: 14-7-4
 * Time: 下午4:49
 */

namespace Home\Controller;


use Think\Controller;

class CommonController extends Controller{
    public function checkLogin(){
        header("Content-type:text/html;charset=utf-8");
        $username=$_SESSION['username'];
        $userlevel = $_SESSION['userlevel'];

        if(empty($username)||!isset($username)||($userlevel != 0)){
            echo "<script type='text/javascript'>alert('请先登录!');</script>";
            $this->redirect('/Home/Login/login');
            exit;
        }else{
            return $username;
        }
    }
} 