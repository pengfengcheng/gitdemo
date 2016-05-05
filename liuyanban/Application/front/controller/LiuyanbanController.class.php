<?php
require './Application/front/model/LiuyanbanModel.class.php';
header("content-type:text/html;charset=utf-8");
class LiuyanbanController{
      function AddliuyanAction(){
		  $name=!empty($_POST['name'])?$_POST['name']:'匿名';
		  $zhuti=!empty($_POST['zhuti'])?$_POST['zhuti']:'无';
		  $text=!empty($_POST['text'])?$_POST['text']:'无';
		  $add=new LiuyanbanModel;
          $result=$add->Addliuyan($name,$zhuti,$text);
		  include './Application/front/view/tiaozhuan.html';
		  
	  }
	  function ShowliuyanAction(){
          $show=new LiuyanbanModel;
		  $arrs=$show->Showliuyan();//展示留言
		  $arrs_back=$show->Showhuifu();//展示回复
      include './Application/front/view/index.view.html';
	  }

	  function AddhuifuAction(){
		  $back_text=!empty($_POST['huifu_text'])?$_POST['huifu_text']:'空';
		  $id=!empty($_GET['id'])?$_GET['id']:null;
          $show=new LiuyanbanModel;
		  $arrs=$show->Addhuifu($back_text,$id);
		  include './Application/front/view/tiaozhuan.html';
      
	  }
	 	 
}


?>

