<?php
/**
 * Created by PhpStorm.
 * User: 华龄太子
 * Date: 14-7-4
 * Time: 下午4:48
 */

namespace Home\Controller;


use Home\Model\UserModel;

class LoginController extends CommonController{
    public function login(){
        $this -> display();
    }

    public function loginCheck(){
        $User = new UserModel();
        $loginArray['username'] = $_POST['username'];
        $loginArray['password'] = $_POST['password'];
        $result = $User -> loginCheck($loginArray);
        if($result['status']){
            $_SESSION['username'] = $loginArray['username'];
            $_SESSION['userid'] = $result['userid'];
            $_SESSION['userlevel'] = 0;
            $this -> ajaxReturn($result);
        }else{
            $this -> ajaxReturn($result);
        }
    }
} 