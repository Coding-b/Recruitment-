<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-8-3
 * Time: 下午4:32
 */

namespace Department\Controller;


use Think\Controller;

class CommonController extends Controller{
    public function checkLogin(){
        header("Content-type:text/html;charset=utf-8");
        $username=$_SESSION['username'];
        $userlevel = $_SESSION['userlevel'];

        if(empty($username)||!isset($username)||($userlevel != 1)){
            echo "<script type='text/javascript'>alert('请先登录!');</script>";
            $this->redirect('/Admin/Login/login');
            exit;
        }else{
            return $username;
        }
    }
} 