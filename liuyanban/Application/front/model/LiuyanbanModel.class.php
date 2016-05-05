<?php
header("content-type:text/html;charset=utf-8");

class LiuyanbanModel{
   function Addliuyan($name,$zhuti,$text){
	   $link=mysqli_connect("localhost","root","123","db_kaishi");
	   mysqli_query($link,"set names utf8");
       
	   $sql="insert into liuyan(id,name,zhuti,text,liuyan_time) values (null,'$name','$zhuti','$text',now())";
	   $result=mysqli_query($link,$sql);
	   if($result!=1)
	   
	   {
		      echo"<p>sql语句执行失败，请参考如下信息：";
			  echo"<br />错误代号：". mysqli_errno($link);
			  echo"<br />错误信息：". mysqli_error($link);
			  echo"<br />错误语句：".$sql;}     
     return $result;
   } 

   function Showliuyan(){
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

   function Addhuifu($back_text,$id){
	   $link=mysqli_connect("localhost","root","123","db_kaishi");
	   mysqli_query($link,"set names utf8");
	   $sql="insert into huifu(huifu_id,huifu_text,huifu_time,liuyan_id) values (null,'$back_text',now(),$id)";
	   $result=mysqli_query($link,$sql);
	   if($result!=1)
	   
	   {
		      echo"<p>sql语句执行失败，请参考如下信息：";
			  echo"<br />错误代号：". mysqli_errno($link);
			  echo"<br />错误信息：". mysqli_error($link);
			  echo"<br />错误语句：".$sql;}
	
     
     return $result;
   } 
   function Showhuifu(){
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

}


?>