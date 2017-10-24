<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class RegistController extends Controller{
	public function index(){
		$_SESSION['url']=$_SERVER[HTTP_REFERER];
		$this->display();
	}
	public function checkusername(){
		$username=$_POST['username'];
		$user_re=M('user')->where("username='{$username}'")->find();
		if($user_re){
			echo 1;
		}else{
			echo 2;
		}
	}
	public function checkmail(){
		$email=$_POST['email'];
		$pattern="/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/";
		//$email=2;
		//var_dump($email);
		//$pattern="/\d+/";
		$email_re=preg_match_all($pattern,$email,$match);
		//var_dump($email_re);
		if($email_re){
			echo 2;
		}else{
			echo 1;
		}
	}
	
	public function regist(){
		//var_dump($_POST);
		unset($_POST['password1']);
		$password=md5($_POST['password']);
		$_POST['password']=$password;
		$regist_re=M('user')->data($_POST)->add();
		//var_dump($regist_re);
		if($regist_re){
			$_SESSION['usermsg']=$_POST;
			header("location:".$_SESSION['url']);
		}else{
			$this->error('注册失败',__APP__."/Regist/index",3);
		}
		
	}
} 