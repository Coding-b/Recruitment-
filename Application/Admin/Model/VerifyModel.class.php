<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-7-29
 * Time: 下午11:01
 */

namespace Admin\Model;


use Think\Model;

class VerifyModel extends Model{
    public function getTotalCheck(){
        $Employment = M('employment');
        $arr['EP_status'] = array('EGT',2);
        return $Employment -> where($arr) -> join('LEFT JOIN user ON employment.EP_user = user.US_id') -> join('LEFT JOIN article ON employment.EP_position = article.AR_id') -> select();
    }
    public function getSecondCheck(){
        $Employment = M('employment');
        return $Employment -> where('EP_status = 1')  -> join('LEFT JOIN user ON employment.EP_user = user.US_id') -> join('LEFT JOIN article ON employment.EP_position = article.AR_id') -> select();
    }
    public function getFirstCheck($US_id){
        $FirstCheck = M('firstcheck');
        return $FirstCheck -> where('FC_dpid = '. $US_id .' AND FC_status = 0')  -> join('LEFT JOIN user ON user.US_ID = firstcheck.FC_user') -> join('LEFT JOIN article ON article.AR_ID = firstcheck.FC_position') -> select();
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
    public function detailFirstInfo($id){
        $FirstCheck = M('firstcheck');
        $FC_id = $id;
        return $FirstCheck -> where('FC_id = '.$FC_id) -> join('LEFT JOIN article ON firstcheck.FC_position = article.AR_id') -> join('LEFT JOIN employment ON firstcheck.FC_epid = employment.EP_id') -> select();
    }
    public function detailSecondInfo($id){
        $Employment = M('employment');
        $FirstCheck = M('firstcheck');
        $EP_id = $id;
        $result = array();
        $result['information'] = $Employment -> where('EP_id = '.$EP_id) -> join('LEFT JOIN article ON employment.EP_position = article.AR_id') -> join('LEFT JOIN user ON employment.EP_user = user.US_id') -> select();
        $result['feedback'] = $FirstCheck -> where('FC_epid = '.$EP_id .' AND FC_status = 2') -> join('LEFT JOIN department ON firstcheck.FC_dpid = department.DP_id ') -> select();
        return $result;
    }
    public function modifySecondVerify($array){
        $Employment = M('employment');
        return $Employment -> data($array) -> save();
    }
} 