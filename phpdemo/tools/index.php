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
			//生成文件
			$file = $funcPath."\\index.json";
			//函数模板文件
			$Template = '
			{
				"functionname": "'.$v.'",
			}
			';
			file_put_contents($file, $Template);
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
		//生成文件
		$file = $path."\\index.json";
		//函数模板文件
		$Template = '
		{
			"interfacename": "'.$value.'",
		}
		';
		file_put_contents($file, $Template);
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
		//生成文件
		$file = $path."\\index.json";
		//函数模板文件
		$Template = '
		{
			"classname": "'.$value.'",
		}
		';
		file_put_contents($file, $Template);
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
		//生成文件
		$file = $path."\\index.json";
		//函数模板文件
		$Template = '
		{
			"traitname": "'.$value.'",
		}
		';
		file_put_contents($file, $Template);
	}
}

//生成目录入口
function index(){
	getAllFunctions();
	getAllInterface();
	getAllClasses();
	getAllTraits();
}

//index();


//生成类的函数
function getClassMethods(){
	$classes = get_declared_classes();
	$basePath = $path = dirname(__DIR__)."\\class\\";
	createDir($basePath);	
	foreach ($classes as $key => $value) {
		//根目录生成
		$path = $basePath.$value;
		createMethodFiles($value,$path);
	}
}


//生成接口的函数
function getInterfaceMethods(){
	$interfaces = get_declared_interfaces();
	$basePath = $path = dirname(__DIR__)."\\interface\\";
	createDir($basePath);
	foreach ($interfaces as $key => $value) {
		//根目录生成
		$path = $basePath.$value;
		createMethodFiles($value,$path);
	}
}

/*创建方法文件*/
function createMethodFiles($value,$path){
	createDir($path);	
	$methods = get_class_methods($value);
	if ($methods) {
		$methodPath = $path."\\Methods\\";
		createDir($methodPath);	
		foreach ($methods as $mk => $mv) {
			$methodDir = $methodPath.$mv;
			/*创建方法目录*/
			createDir($methodDir);
			/*创建方法文件*/
			$methodFile = $methodDir."\\index.json";
			methodFile($methodFile,$value,$mv);	
		}
	}
}

/*创建类的方法文件*/
function methodFile($file,$class,$method){
	$content = ["class"=>$class,"methodName"=>$method];
	createFile($file,json_encode($content));
}

function createDir($path){
	if (!is_dir($path)) {
		mkdir($path);
	}
}
function createFile($file,$content){
	file_put_contents($file,$content);
}
 

// getClassMethods();
getInterfaceMethods();
 ?>
