<?php 
//获取所有函数
function getAllFunctions(){
	$funs = get_defined_functions();
	$basePath = $path = dirname(__DIR__)."\\function\\";
	if (!is_dir($basePath)) {
		mkdir($basePath);
	}
	foreach ($funs as $key => $value) {
		//根目录生成
		$path = $basePath.$key;
		if (!is_dir($path)) {
			mkdir($path);
		}
		//函数目录生成
		foreach ($value as $k => $v) {
			$funcPath = $path."\\".$v;
			if (!is_dir($funcPath)) {
				mkdir($funcPath);
			}
		}
	}
}
//获取所有接口
function getAllInterface(){
	$interfaces = get_declared_interfaces();
	$basePath = $path = dirname(__DIR__)."\\interface\\";
	if (!is_dir($basePath)) {
		mkdir($basePath);
	}
	foreach ($interfaces as $key => $value) {
		//根目录生成
		$path = $basePath.$value;
		if (!is_dir($path)) {
			mkdir($path);
		}
	}
}
//获取所有类
function getAllClasses(){
	$classes = get_declared_classes();
	$basePath = $path = dirname(__DIR__)."\\class\\";
	if (!is_dir($basePath)) {
		mkdir($basePath);
	}
	foreach ($classes as $key => $value) {
		//根目录生成
		$path = $basePath.$value;
		if (!is_dir($path)) {
			mkdir($path);
		}
	}
}
//获取所有traits
function getAllTraits(){
	$traits = get_declared_traits();
	$basePath = $path = dirname(__DIR__)."\\trait\\";
	if (!is_dir($basePath)) {
		mkdir($basePath);
	}
	foreach ($traits as $key => $value) {
		//根目录生成
		$path = $basePath.$value;
		if (!is_dir($path)) {
			mkdir($path);
		}
	}
}

//生成目录入口
function index(){
	getAllFunctions();
	getAllInterface();
	getAllClasses();
	getAllTraits();
}

index();

 ?>