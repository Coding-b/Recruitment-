<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-7-31
 * Time: 上午2:37
 */

namespace Home\Model;


use Think\Model;

class EmploymentModel extends Model{
    public function getEmployment($id){
        $Employment = M('employment');
        return $Employment -> where('EP_user = '.$id) -> join('article ON article.AR_id = employment.EP_position') -> select();
    }

    public function addEmployment($employment){
        $Employment = M('employment');
        return $Employment -> data($employment) -> add();
    }

    public function isHaving($data){
        $Employment = M('employment');
        $num = count($Employment -> where($data) -> select());
        if($num == 0){
            return false;
        }else{
            return true;
        }
    }

    public function cancelEmployment($id){
        $Employment = M('employment');
        $FirstCheck = M('firstcheck');
        $FirstCheck -> where('FC_epid='.$id) -> delete();
        return $Employment -> where('EP_id ='.$id) -> delete();
    }
} 