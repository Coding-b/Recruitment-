<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-8-3
 * Time: 下午4:42
 */

namespace Department\Model;


use Think\Model;

class VerifyModel extends Model{
    public function getFirstCheck($id){
        $Firstcheck = M('firstcheck');
        return $Firstcheck -> where('FC_dpid = '. $id .' AND FC_status = 0')  -> join('LEFT JOIN user ON user.US_ID = firstcheck.FC_user') -> join('LEFT JOIN article ON article.AR_ID = firstcheck.FC_position') -> select();
    }
    public function detailFirstInfo($id){
        $FirstCheck = M('firstcheck');
        $FC_id = $id;
        return $FirstCheck -> where('FC_id = '.$FC_id) -> join('LEFT JOIN article ON firstcheck.FC_position = article.AR_id') -> join('LEFT JOIN employment ON firstcheck.FC_epid = employment.EP_id') -> select();
    }
    public function modifyVerify($array){
        $FirstCheck = M('firstcheck');
        $status = $FirstCheck -> data($array) -> save();
        if($status){
            $FC_epid = $FirstCheck -> where('FC_id = '.$array['FC_id']) -> select();

            $arr['FC_epid'] = $FC_epid[0]['FC_epid'];
            $arr['FC_status'] = array('neq',0);

            $total = count($FirstCheck -> where('FC_epid = '.$FC_epid[0]['FC_epid']) -> select());
            $okNum = count($FirstCheck -> where($arr) -> select());
            
            if($total == $okNum){
                $Employment = M('employment');
                $arr['EP_id'] = $FC_epid[0]['FC_epid'];
                $arr['EP_status'] = 1;
                $Employment -> data($arr) -> save();
            }
        }
        return $status;
    }
} 