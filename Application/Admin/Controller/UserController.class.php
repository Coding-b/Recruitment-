<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-7-29
 * Time: 下午2:21
 */

namespace Admin\Controller;


use Admin\Model\DepartmentModel;

class UserController extends CommonController{
    public function index(){
        $this -> checkLogin();

        $this -> display();
    }

    public function modifyPsd(){
        $this -> checkLogin();

        $Department = new DepartmentModel();
        $array['DP_username'] = $_POST['DP_username'];
        $array['DP_tel'] = $_POST['DP_tel'];
        $array['DP_psd'] = md5($_POST['password']);
        $array['DP_id'] = session('userid');

        $result = $Department -> modifyPsd($array);
        if($result == true){
            $this -> success('修改成功' ,'index');
        }else{
            $this -> error("修改失败");
        }
    }
}