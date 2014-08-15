<?php
/**
 * Created by PhpStorm.
 * User: 水
 * Date: 14-7-25
 * Time: 上午10:51
 */

namespace Home\Controller;
use Home\Model\EmploymentModel;
use Home\Model\UserModel;

/**
 * Class PersonController
 * @package Home\Controller
 * 个人中心控制器
 */
class PersonController extends CommonController{
    /**
     * 我的求职中心
     */
    public function personCenter(){
        $this -> checkLogin();

        $User = new UserModel();
        $Employment = new EmploymentModel();
        $employments = $Employment -> getEmployment($_SESSION['userid']);
        $user = $User -> getUserInfo($_SESSION['userid']);
        $this -> assign('user',$user[0]);
        $this -> assign('employments',$employments);
        $this -> display();
    }
    public function register(){
        $User = new UserModel();

        $user['US_username'] = $_POST['register_username'];
        $user['US_psd'] = md5($_POST['register_password']);
        $status = $User -> addUser($user);
        $this -> ajaxReturn($status);
    }

    public function modify(){
        $this -> checkLogin();

        $User = new UserModel();

        $user['US_id'] = session('userid');
        if(strlen($_POST['US_name']) != 0){
            $user['US_name'] = $_POST['US_name'];
        }
        if(strlen($_POST['US_sex']) != 0){
            $user['US_sex'] = $_POST['US_sex'];
        }
        if(strlen($_POST['US_birth']) != 0){
            $user['US_birth'] = $_POST['US_birth'];
        }
        if(strlen($_POST['US_face']) != 0){
            $user['US_face'] = $_POST['US_face'];
        }
        if(strlen($_POST['US_highest']) != 0){
            $user['US_highest'] = $_POST['US_highest'];
        }
        if(strlen($_POST['US_major']) != 0){
            $user['US_major'] = $_POST['US_major'];
        }


        if(strlen($_FILES['US_image']['name'][0]) == 0){
            $status = $User ->modifyUser($user);
            if($status) {
                $this->success('上传成功！','personCenter');
            }else{
                $this -> error('修改失败！');
            }
        }else{
            $upload = new  \Think\Upload();// 实例化上传类

            $user['US_image'] = '/zhaoping/Public/Common/User/'.$_FILES['US_image']['name'][0];

            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Public/Common/User/'; // 设置附件上传根目录
            $upload->savePath =  '';// 设置附件上传目录
            $oldImage = $User -> getUserInfo($user['US_id'])[0];
            $path = '.'.substr($oldImage['US_image'],9,200);


            $info = $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功

                //删除旧的图片

                if(strcmp($oldImage,$user['US_image']) != 0){
                    if(file_exists($path)){
                        unlink($path);
                    }
                }
                //添上新图
                $User ->modifyUser($user);

                $image = new \Think\Image();
                $image->open($path);
                //将图片裁剪为120*160并保存为corp.jpg
                $image->thumb(120, 160,\Think\Image::IMAGE_THUMB_FIXED)->save($path);

                $this->success('上传成功！');
            }
        }
    }

    public function cancelEmployment(){
        $this -> checkLogin();

        $Employment = new EmploymentModel();
        $id = $_GET['id'];
        $status = $Employment -> cancelEmployment($id);
        if($status){
            $this->success('取消申请成功！','personCenter');
        }else{
            $this->error('取消申请失败！');
        }
    }
} 