<?php 

function testInterfaceMethods(){
	$class = "ArrayAccess";
	$methods = get_class_methods($class);
	var_dump($methods);
}


function getAllClass(){
	$classes = get_declared_classes();
	return $classes;
}
function getAllInterface(){
	$interfaces = get_declared_interfaces();
	return $interfaces;
}

/*方法属性*/
function testProperty(){
	$classes = getAllClass();
	foreach ($classes as $k => $v) {
		$ref = new ReflectionClass($v);
		$property = $ref->getProperties();
		if ($property) {
			var_dump($v);
			var_dump($property);
			exit;
		}
	}
}
/*方法常量*/
function testConstant(){
	$classes = getAllClass();
	foreach ($classes as $k => $v) {
		$ref = new ReflectionClass($v);
		$constant = $ref->getConstants();
		if ($constant) {
			$name = $constant->getName();
			var_dump($v);
			var_dump($constant);
			exit;
		}
	}
}

/*接口属性*/
function testInterfaceProperty(){
	$interfaces = getAllInterface();
	foreach ($interfaces as $k => $v) {
		$ref = new ReflectionClass($v);
		$property = $ref->getProperties();
		if ($property) {
			var_dump($v);
			var_dump($property);
			exit;
		}
	}
}

/*接口常量*/
function testInterfaceConstant(){
	$interfaces = getAllInterface();
	foreach ($interfaces as $k => $v) {
		$ref = new ReflectionClass($v);
		$constant = $ref->getConstants();
		if ($constant) {
			var_dump($v);
			var_dump($constant);
		}
	}
}
/*接口常量*/
testInterfaceConstant();
 
 ?>