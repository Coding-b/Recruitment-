<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-7-31
 * Time: 上午2:31
 */

namespace Home\Model;


use Think\Model;

class UserModel extends Model{
    public function getUserInfo($id){
        $User = M('user');
        return $User -> where("US_id = ".$id) -> select();
    }
    public function loginCheck($loginArray){
        $User = M('user');
        $array['US_username'] = $loginArray['username'];
        $result = $User -> where($array) -> select();
        $arr = array();
        $arr['status'] = 0;
        if($result != null && count($result) == 1){
            if(strcmp(md5($loginArray['password']) ,$result[0]['US_psd']) == 0){
                //登陆成功
                $arr['status'] = 1;
                $arr['content'] = '验证成功！';
                $arr['userid'] = $result[0]['US_id'];
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
    public function addUser($data){
        $User = M('user');
        return $User -> data($data) -> add();
    }
    public function modifyUser($data){
        $User = M('user');
        return $User -> save($data);
    }
} 