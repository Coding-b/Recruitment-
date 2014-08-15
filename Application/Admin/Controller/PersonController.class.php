<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-7-29
 * Time: 下午2:04
 */

namespace Admin\Controller;


use Admin\Model\DepartmentModel;
use Admin\Model\UserModel;

class PersonController extends CommonController{
    public function index(){
        $this -> checkLogin();

        $User = new UserModel();
        $Department = new DepartmentModel();
        $users = $User -> getUsers();
        $departments = $Department -> getDepartments();
        $this -> assign('users',$users);
        $this -> assign('departments',$departments);
        $this -> display();
    }

    public function addDepartment(){
        $this -> checkLogin();

        $Department = new DepartmentModel();
        $data = $_POST;
        $data['DP_psd'] = md5($data['DP_psd']);
        $result = $Department -> addDepartment($data);
        if($result == true){
            $this -> success('添加成功' ,'index');
        }else{
            $this -> error("添加失败");
        }
    }

    public function deleteDepartment(){
        $this -> checkLogin();

        $id = $_GET['DP_id'];
        $Department = new DepartmentModel();
        $result = $Department -> deleteDepartment($id);
        if($result == true){
            $this -> success('添加成功' ,'index');
        }else{
            $this -> error("添加失败");
        }
    }
} 