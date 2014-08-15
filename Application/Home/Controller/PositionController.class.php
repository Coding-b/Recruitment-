<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-7-25
 * Time: 上午12:11
 */

namespace Home\Controller;


use Home\Model\ArticleModel;
use Home\Model\ChecklistModel;
use Home\Model\EmploymentModel;
use Home\Model\FirstcheckModel;

class PositionController extends CommonController{
    public function positionCenter(){
        $Article = new ArticleModel();
        $jobs = $Article -> getJobs(0);
        $this -> assign('jobs',$jobs);
        $this -> display();
    }

    public function positionApply(){
        $this -> checkLogin();

        $this -> assign("id",$_GET[id]);

        $this -> display();
    }
    public function addEmployment(){
        $Employment = new EmploymentModel();

        $employment['EP_position'] = $_POST['AR_id'];
        $employment['EP_user'] = session('userid');

        if($Employment -> isHaving($employment)){
            $this -> error('您已申请过了该岗位！');
        }else{
            $employment['EP_time'] = date('Y-m-d H:i:s',time());
            $employment['EP_resume'] = $_POST['resume'];

            $status = $Employment -> addEmployment($employment);
            if($status) {
                $FirstCheck = new FirstcheckModel();
                $CheckList = new ChecklistModel();
                $checklist = $CheckList -> getCheckList($employment['EP_position']);

                $fisrtcheck['FC_epid'] = $status;

                $fisrtcheck['FC_user'] = $employment['EP_user'];
                $fisrtcheck['FC_position'] = $employment['EP_position'];
                $fisrtcheck['FC_time'] = $employment['EP_time'];

                for($i=0;$i<count($checklist);$i++){
                    $fisrtcheck['FC_dpid'] = $checklist[$i]['CL_dpid'];
                    $FirstCheck -> addToFirstcheck($fisrtcheck);
                }

                $this->success('申请成功！','positionCenter');
            }else{
                $this -> error('申请失败！');
            }
        }
    }
}