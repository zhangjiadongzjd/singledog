<?php
namespace Admin\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class LoginController extends Controller {
	public function index(){
		$this->display();
	}
	public function check(){
		//var_dump($_POST);
		$username=$_POST['username'];
		$pwd=$_POST['pwd'];
		$result=M('manager')->where("username='{$username}' and password='{$pwd}'")->find();
		//var_dump($result);
		if($result){
			$_SESSION['msg']=$result;
			$this->success('登陆成功',__APP__."/Home/index",null);
		}else{
			$this->error('登录失败','index',null);
		}
	}
	public function logout(){
		unset($_SESSION['msg']);
		$this->success('退出登录成功',__APP__."/Login/index",5);
	}
}