<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-8-3
 * Time: 下午6:07
 */

namespace Department\Controller;


use Department\Model\DepartmentModel;

class UserController extends CommonController{
    public function index(){
        $this -> display();
    }

    public function modify(){
        $Department = new DepartmentModel();

        $array['DP_username'] = $_POST['DP_username'];
        $array['DP_tel'] = $_POST['DP_tel'];
        $array['DP_psd'] = md5($_POST['password']);
        $array['DP_id'] = session('userid');

        $status = $Department -> modify($array);
        if($status){
            $this -> success('修改成功！','index');
        }else{
            $this -> error('修改失败！');
        }
    }
} 