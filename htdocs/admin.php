<?php
header("content-type:text/html;charset=utf-8");

//绑定模块
define("BIND_MODULE","Admin");
//应用程序目录的位置
define("APP_PATH","application/");
//开启调试模式(默认false)
define("APP_DEBUG",true);
//是否开启目录安全(默认true)
define("BUILD_DIR_SECURE",false);
//包含ThinkPHP入口文件
include_once 'library/ThinkPHP/ThinkPHP.php';