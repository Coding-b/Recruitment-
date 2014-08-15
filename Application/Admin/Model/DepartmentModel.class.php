<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-7-30
 * Time: 上午11:06
 */

namespace Admin\Model;


use Think\Model;

class DepartmentModel extends Model{
    public function getDepartments(){
        $Department = M('department');
        return $Department ->where('DP_level = 1') -> select();
    }
    public function getAllDepartments(){
        $Department = M('department');
        return $Department -> select();
    }
    public function addDepartment($department){
        $Department = M('department');
        return $Department -> data($department) -> add();
    }
    public function deleteDepartment($id){
        $Department = M('department');
        return $Department -> where('DP_id = '.$id) -> delete();
    }

    public function loginCheck($loginArray){
        $Department = M('department');
        $array['DP_username'] = $loginArray['username'];
        //设置用户等级
        $array['DP_level'] = $loginArray['DP_level'];
        $result = $Department -> where($array) -> select();
        $arr = array();
        $arr['status'] = 0;
        if($result != null && count($result) == 1){
            if(strcmp(md5($loginArray['password']) ,$result[0]['DP_psd']) == 0){
                //登陆成功
                $arr['status'] = 1;
                $arr['content'] = '验证成功！';
                $arr['userid'] = $result[0]['DP_id'];
                return $arr;
            }else{
                //登陆失败（密码错误）
                $arr['content'] = '密码错误！' ;
                return $arr;
            }
        }else{
            $arr['content'] = '用户名不存在！';
            return $arr;
        }
    }
    public function modifyPsd($data){
        $Department = M('department');
        return $Department ->  save($data);
    }
} 