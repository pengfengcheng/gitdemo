<?php
header("content-type:text/html;charset=utf-8");
$p=!empty($_GET['p'])?$_GET['p']:"front";
$c=!empty($_GET['c'])?$_GET['c']:"Liuyanban";

require './Application/'.$p.'/controller/'.$c.'Controller.class.php';//引入哪个控制器文件

$controller=$c.'Controller';//构建一个类名
$addliuyan=new $controller;//实例化这个类


$act=!empty($_GET['a'])?$_GET['a']:"Showliuyan";//决定调用控制器的哪方法
$action=$act."Action";
$addliuyan->$action();


?>