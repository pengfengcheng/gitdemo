<?php
class AdminModel{
	function CheckLogin($name,$password){
	      $link=mysqli_connect("localhost","root","123","db_kaishi");
	      mysqli_query($link,"set names utf8");
          $sql="select count(*) from user where user_name='$name' and password=md5('$password')";
		  $result=mysqli_query($link,$sql);
		  $rec=mysqli_fetch_row($result);
		 $date=$rec[0];
		  if($date==1){//表示找到一条数据，就是正确的身份验证
		      //登陆成功后，应该去更新这条数据
			  $sql="update user set login_time=login_time+1,last_login_time=now()"; 
			  $sql .="where user_name='$name' and password=md5('$password')";
			  $result=mysqli_query($link,$sql);
			  return true;
		  }
		  else{//其他都是错的
		      return false;
		  }
	
	}

	function ShowName(){
	   $link=mysqli_connect("localhost","root","123","db_kaishi");
	   mysqli_query($link,"set names utf8");
	   $sql="select * from liuyan";
	   $result=mysqli_query($link,$sql);
	   while($rec=mysqli_fetch_assoc($result)){
		    $arr[]=$rec;
		  }
		  if(!empty($arr))
		  {
			  return $arr;    		
		  }
		  else
		  {
			  return false;
		  }
    }

	function Adminliuyan(){
		$link=mysqli_connect("localhost","root","123","db_kaishi");
	   mysqli_query($link,"set names utf8");
	   $sql="select * from liuyan";
	   $result=mysqli_query($link,$sql);
	   while($rec=mysqli_fetch_assoc($result)){
		    $arr[]=$rec;
		  }
		  if(!empty($arr))
		  {
			  return $arr;    		
		  }
		  else
		  {
			  return false;
		  }	
	}
	function Adminhuifu(){
	   $link=mysqli_connect("localhost","root","123","db_kaishi");
	   mysqli_query($link,"set names utf8");
	   //$sql="select huifu_text,huifu_time,liuyan_id from huifu join liuyan on huifu.liuyan_id=liuyan.id ";
       $sql="select * from huifu";
	   $result=mysqli_query($link,$sql);
	   if($result===false){
			  echo"<p>sql语句执行失败，请参考如下信息：";
			  echo"<br />错误代号：".mysqli_errno($link);
			  echo"<br />错误信息：".mysqli_error($link);
			  echo"<br />错误语句：".$sql;
			  die();

		   }
	   while($rec=mysqli_fetch_assoc($result)){
		    $arr[]=$rec;
		  }
		  if(!empty($arr))
		  {
			  return $arr;    		
		  }
		  else
		  {
			  return false;
		  }
   }

   function Deleteliuyan($id){
	   $link=mysqli_connect("localhost","root","123","db_kaishi");
	   mysqli_query($link,"set names utf8");
	   $sql="delete from liuyan where id=$id";
	   $result=mysqli_query($link,$sql); 
   }
   function Deletehuifu($id){
	   $link=mysqli_connect("localhost","root","123","db_kaishi");
	   mysqli_query($link,"set names utf8");
	   $sql="delete from huifu where liuyan_id=$id";
	   $result=mysqli_query($link,$sql); 
   }
   function Countliuyan(){
	   $link=mysqli_connect("localhost","root","123","db_kaishi");
	   mysqli_query($link,"set names utf8");
	   $sql="select count(*) from liuyan";
	   $result=mysqli_query($link,$sql);
	   $rec=mysqli_fetch_row($result);
	   $date=$rec[0];
	   return $date;
   
   
   }


}

?>