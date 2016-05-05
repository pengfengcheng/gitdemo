<?php
//一  文字内容确定
//1 先确定文字库 26个大写字母和数字
session_start();
$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$length = strlen($str);//字符串的长度

$result = '';//保存验证码的内容(4位)，初始化为空

//2 通过随机数，设置验证码中的内容
for($i=0;$i<4;$i++)
{
	$result = $result.$str[rand(0,$length-1)];

}

$_SESSION['result']=$result;

//二 画图，即把文字内容放到图片上然后输出
//1 创建一个画布 （拿一张纸）
$img = imagecreatetruecolor(210,23);

//2 创建画笔颜色 (选一个笔的颜色)
$font = imagecolorallocate($img,0,0,255);//字体颜色
$bk= imagecolorallocate($img,100,200,100);//背景颜色
$frame = imagecolorallocate($img,125,125,125);//边框颜色

//3 画背景
//参数100：填充区域的长度  30是填充区域的宽
imagefill($img,0,0,$bk);


//4 画边框，也就是画个矩形
//参数：5 矩形左上角的x坐标，5是坐标  95：矩形的常  25：矩形的宽
//imagerectangle($img,0,0,140,20,$frame);

$black = imagecolorallocate($img, 0,0,0);     //此条及以下三条为设置的颜色
$white = imagecolorallocate($img, 255,255,255);
$gray = imagecolorallocate($img, 200,200,200);
$red = imagecolorallocate($img, 255, 0, 0);

//5写文字上去
//10：文字的大小，80：文字位置的x坐标,3：y坐标
imagestring($img,10,80,3,$result,$font);
for($i=0;$i<100;$i++)  //加入干扰象素
{
     imagesetpixel($img, rand(0,210), rand(0,23), $black);    //加入点状干扰素
     imagesetpixel($img, rand(0,210), rand(0,23), $red);
     imagesetpixel($img, rand(0,210), rand(0,23), $gray);
     //imagearc($img, rand(0,145), rand(0,20), 10, 10, 10, 170, $black);    //加入弧线状干扰素
     //imageline($img, rand(0,20), rand(0,20), rand(0,20), rand(0,20), $red);    //加入线条状干扰素
}

header("Content-type:image/jpeg");//正常网页都是文字输出，但是图片是二进制码，所以需要把输出格式转换一下

//6 输出图片
imagejpeg($img);

?>