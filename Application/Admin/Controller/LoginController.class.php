<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-7-26
 * Time: 下午4:39
 */

namespace Admin\Controller;


use Admin\Model\DepartmentModel;
use Think\Controller;

class LoginController extends Controller{
    public function login(){
        session('username',null);
        session('userid',null);

        $this -> display();
    }
    public function loginCheck(){
        $Department = new DepartmentModel();
        $loginArray['username'] = $_POST['username'];
        $loginArray['password'] = $_POST['password'];
        $loginArray['DP_level'] = $_POST['type'];

        $result = $Department -> loginCheck($loginArray);
        if($result['status']){
            $_SESSION['username'] = $loginArray['username'];
            $_SESSION['userid'] = $result['userid'];
            $_SESSION['userlevel'] = $_POST['type'];
            $result['type'] = $_POST['type'];

            $this -> ajaxReturn($result);
        }else{
            $this -> ajaxReturn($result);
        }
    }
} 