<?php
header("content-type=texe/html;charset=utf-8");
require './Application/back/model/AdminModel.class.php';
class AdminController{

	function LoginAction(){
		include './Application/back/view/login.html';
	
	}
	function AdminAction(){
		include './Application/back/view/MyAdmin.html';
	}
	function ShowLoginAction(){	
		//include './Application/back/view/login.html';
	//}
	//function MyAdminAction(){
		//cookie的使用，把它当成一个数组$_COOKIE
		if(!empty($_COOKIE['mycookie'])&&$_COOKIE["mycookie"]==="1")
			{

	         include './Application/back/view/MyAdmin.html';
			}
			else
		    {
			include './Application/back/view/login.html';
			}
	}
    function CheckLoginAction(){
			session_start();
		$yanzhengma = $_POST['captcha'];
		
       if($_SESSION['result'] !== $yanzhengma)
        {  
		  include './Application/back/view/tiaozhuan_1.html';
        }
		else
        {
		$name=$_POST['name'];
		$password=$_POST['password'];
		$pass=!empty($_POST['pass'])?$_POST['pass']:'';
		$check=new AdminModel;
		$result=$check->CheckLogin($name,$password);
		if($result===true){
			//设置cookie为ture
				if($pass==1){
				  setCookie('mycookie',"1",time()+3600*24);
			      include './Application/back/view/tiaozhuan.html';
				}
				else{
					setCookie('mycookie','');
					include './Application/back/view/tiaozhuan_3.html';
					}
		}
		else{
			
			
			
		    //提示失败，并跳转到登录页面
			include './Application/back/view/tiaozhuan_1.html';
		}
	  }
	
	}

	function AdminliuyanAction(){
          $show=new AdminModel;
		  $arrs=$show->Adminliuyan();//展示留言
		  $arrs_back=$show->Adminhuifu();//展示回复
		  $date=$show->Countliuyan();//得到留言条数
      include './Application/back/view/Adminliuyan.html';
    }

	function AdminxiugaiAction(){
		 include './Application/back/view/Adminxiugai.html';	
	}
	function DeleteliuyanAction(){
	    $id=$_GET['liuyan_id'];
		$del=new AdminModel;
		$result=$del->Deleteliuyan($id);
		
		include './Application/back/view/tiaozhuan_2.html';					
	}
	function DeletehuifuAction(){
		$id=$_GET['liuyan_id'];
		$del=new AdminModel;
		$result=$del->Deletehuifu($id);
		include './Application/back/view/tiaozhuan_2.html';
	
	}

}
?>