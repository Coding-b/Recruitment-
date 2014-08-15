<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-7-29
 * Time: 下午10:32
 */

namespace Admin\Model;


use Think\Model;

class UserModel extends Model{
    /**
     * 添加用户
     * @param $user
     * @return bool
     */
    public function addUser($user){
        $User = new Model('user');
        return $User -> data($user) -> add();
    }

    /**
     * 获取用户
     * @return mixed
     */
    public function getUsers(){
        $User = new Model('user');
        return $User-> select();
    }

    /**
     * 登录验证
     * @param $loginArr
     * @return $arr
     */
    public function loginCheck($loginArr){
        $User = new Model('user');
        $array['US_name'] = $loginArr['US_name'];
        //设置用户等级为管理员
        $array['Us_level'] = 2;
        $result = $User -> where($array) -> select();
        $arr = array();
        $arr['status'] = 0;
        if($result != null && count($result) == 1){
            if(strcmp(md5($loginArr['password']) ,$result[0]['password']) == 0){
                //登陆成功
                $arr['status'] = 1;
                $arr['content'] = '验证成功！';
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
} 