<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
use Home;
header("content-type:text/html;charset=utf-8");
class LoginController extends Controller{
	public function index(){
		$_SESSION['url']=$_SERVER[HTTP_REFERER];
		$this->display();
	}
	public function check(){
		//var_dump($_POST);
		$username=$_POST['username'];
		$pwd=md5($_POST['password']);
		//var_dump($pwd);
		$check_result=M('user')->where("username='{$username}' && password='{$pwd}'")->find();
		//var_dump($check_result);
		if($check_result){
		 	$_SESSION['usermsg']=$check_result;
			header("location:".$_SESSION['url']);
		}else{
			$this->error('登录失败',__APP__."/Login/index",3);
		} 
	}
	public function logout(){
		unset($_SESSION['usermsg']);
		header("location:".__APP__."/Home/index");
	}
}