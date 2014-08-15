<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-8-3
 * Time: 下午4:30
 */

namespace Department\Controller;


use Department\Model\VerifyModel;

class VerifyController extends CommonController{
    public function index(){
        $this -> checkLogin();

        $Verify = new VerifyModel();
        $firstChecks = $Verify -> getFirstCheck($_SESSION['userid']);
        $this -> assign('firstChecks',$firstChecks);

        $this -> display();
    }

    public function detailInfo(){
        $Verify = new VerifyModel();
        $result = $Verify -> detailFirstInfo($_GET['id'])[0];
        $this -> assign('information',$result);
        $this -> display();
    }

    public function dealFirstInfo(){
        $Verify = new VerifyModel();
        $type = $_GET['type'];
        $arr['FC_id'] = $_GET['id'];
        if($type == 1){
            $arr['FC_status'] = 1;
            $status = $Verify -> modifyVerify($arr);
            if($status == true){
                $this-> success('审核成功！','index');
            }else{
                $this -> error('审核失败！');
            }
        }else{
            $arr['FC_reason'] = $_GET['feedback'];
            $arr['FC_status'] = 2;
            $status = $Verify -> modifyVerify($arr);
            if($status == true){
                $this-> success('审核成功！','index');
            }else{
                $this -> error('审核失败！');
            }
        }
    }
} 