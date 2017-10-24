<?php
header("content-type:text/html;charset=utf-8");
function hello(){
	$filename=time().rand(1000,9999);
	return $filename;
}