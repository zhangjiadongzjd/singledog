<?php
namespace Admin\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class HomeController extends Controller {
	public function index(){
		$this->display();
	}
}