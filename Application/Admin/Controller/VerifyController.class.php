<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-7-29
 * Time: 下午2:08
 */

namespace Admin\Controller;


use Admin\Model\VerifyModel;

class VerifyController extends CommonController{
    public function index(){
        $this -> checkLogin();

        $Verify = new VerifyModel();
        $firstChecks = $Verify -> getFirstCheck($_SESSION['userid']);
        $this -> assign('firstChecks',$firstChecks);
        $secondCheck = $Verify -> getSecondCheck();
        $this -> assign('secondChecks',$secondCheck);

        $totalCheck = $Verify -> getTotalCheck();
        $this -> assign('totalCheck',$totalCheck);
        $this -> display();
    }

    public function detailInfo(){
        $this -> checkLogin();
        $Verify = new VerifyModel();
        $result = $Verify -> detailSecondInfo($_GET['id']);
        $this -> assign('information',$result['information'][0]);
        $this -> assign('feedbacks',$result['feedback']);
        $this -> display();
    }

    public function detailFirstInfo(){
        $this -> checkLogin();
        $Verify = new VerifyModel();
        $result = $Verify -> detailFirstInfo($_GET['id'])[0];
        $this -> assign('information',$result);
        $this -> display();
    }
    public function detailSecondInfo(){
        $this -> checkLogin();
        $Verify = new VerifyModel();
        $result = $Verify -> detailSecondInfo($_GET['id']);
        $this -> assign('information',$result['information'][0]);
        $this -> assign('feedbacks',$result['feedback']);
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

    public function dealSecondInfo(){
        $Verify = new VerifyModel();
        $type = $_GET['type'];
        $arr['EP_id'] = $_GET['id'];
        if($type == 1){
            $arr['EP_status'] = 2;
            $status = $Verify -> modifySecondVerify($arr);
            if($status == true){
                $this-> success('审核成功！','index');
            }else{
                $this -> error('审核失败！');
            }
        }else{
            $arr['EP_status'] = 3;
            $status = $Verify -> modifySecondVerify($arr);
            if($status == true){
                $this-> success('审核成功！','index');
            }else{
                $this -> error('审核失败！');
            }
        }
    }
} 