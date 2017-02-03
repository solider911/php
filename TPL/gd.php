<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/11
 * Time: 14:20
 */

 Class Chart{
     private $image; // 定义图像
     private $title; // 定义标题
     private $ydata; // 定义Y轴数据
     private $xdata; // 定义X轴数据
     private $color; // 定义条形图颜色
     private $bgcolor; // 定义图片背景颜色
     private $width; // 定义图片的宽
     private $height; // 定义图片的长

     /*
      * 构造函数
      * String title 图片标题
      * Array xdata 索引数组，X轴数据
      * Array ydata 索引数组，数字数组,Y轴数据
      */
     function __construct($title,$xdata,$ydata) {
         $this->title = $title;
         $this->xdata = $xdata;
         $this->ydata = $ydata;
         $this->color = array('#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4');
     }

     /*
      * 公有方法，设置条形图的颜色
      * Array color 颜色数组,元素取值为'#058DC7'这种形式
      */
     function setBarColor($color){
         $this->color = $color;
     }

     /*
      * 公有方法，画条形图
      */
     function mkBarChart(){
         $ydataNum = $this->arrayNum($this->ydata); // 取得数据分组的个数
         $max = $this->arrayMax($this->ydata); // 取得所有呈现数据的最大值
         $multi = ($max > 100)? $max/100 : 1; // 如果最大数据是大于100的则进行缩小处理，获取
         $barHeightMulti = 2.2; // 条形高缩放的比例
         $barWidth = (16 - 2*($ydataNum - 1)) > 10 ? (16 - 2*($ydataNum - 1)) : 10; // 条的宽
         $barSpace = 16; // 条之间的间距
         $chartLeft = (1+strlen($max))*12; // 设置图片左边的margin

         $barY = 250; // 初始化条形图的Y的坐标
         // 设置图片的宽、高
         $this->width = ($ydataNum*$barWidth + $barSpace)*count($this->xdata) + $chartLeft;
         $this->height = 300;
         $this->image = imagecreatetruecolor($this->width ,$this->height); // 准备画布
         $this->bgcolor = imagecolorallocate($this->image,255,255,255); // 图片的背景颜色

         // 设置条形图的颜色
         $color = array();
         foreach($this->color as $col) {
             $col = substr($col,1,strlen($col)-1);
             $red = hexdec(substr($col,0,2));
             $green = hexdec(substr($col,2,2));
             $blue = hexdec(substr($col,4,2));
             $color[] = imagecolorallocate($this->image ,$red, $green, $blue);
         }

         // 设置线段的颜色、字体的颜色、字体的路径
         $lineColor = imagecolorallocate($this->image ,0xcc,0xcc,0xcc);
         $fontColor = imagecolorallocate($this->image, 0x95,0x8f,0x8f);
         $fontPath = 'font/simsun.ttc';

         imagefill($this->image,0,0,$this->bgcolor); // 绘画背景

         // 绘画图的分短线与左右边线
         for($i = 0; $i < 6; $i++ ) {
             imageline($this->image,$chartLeft-10,$barY-$barHeightMulti*$max/5/$multi*$i,$this->width,$barY-$barHeightMulti*$max/5/$multi*$i,$lineColor);
             imagestring($this->image,4,5,$barY-$barHeightMulti*$max/5/$multi*$i-8,floor($max/5*$i),$fontColor);
         }
         imageline($this->image,$chartLeft-10,30,$chartLeft-10,$barY,$lineColor);
         imageline($this->image,$this->width-1,30,$this->width-1,$barY,$lineColor);

         // 绘画图的条形
         foreach($this->ydata as $key => $val) {
             if($ydataNum == 1) {
                 // 一个系列数据时
                 $barX = $chartLeft + 3 + ($barWidth+$barSpace)*$key;
                 imagefilledrectangle($this->image,$barX,$barY-$barHeightMulti*$val/$multi,$barX+$barWidth,$barY,$color[$key%count($this->color)]);
             }elseif($ydataNum > 1) {
                 // 多个系列的数据时
                 $cbarSpace = $barSpace + $barWidth*($ydataNum-1);
                 foreach($val as $ckey => $cval) {
                     $barX = $chartLeft + 3 + $barWidth*$key + $ckey*($cbarSpace+$barWidth);
                     imagefilledrectangle($this->image,$barX,$barY-$barHeightMulti*$cval/$multi,$barX+$barWidth,$barY,$color[$key%count($this->color)]);
                 }
             }

         }

         // 绘画条形图的x坐标的值
         foreach($this->xdata as $key => $val) {
             $barX = $chartLeft + ($ydataNum*$barWidth+$barSpace)*$key + $ydataNum*$barWidth/3;
             imagettftext($this->image,10,-45,$barX,$barY+15,$fontColor,$fontPath,$this->xdata[$key]);
         }

         // 绘画标题
         $titleStart = ($this->width - 5.5*strlen($this->title))/2;
         imagettftext($this->image,11,0,$titleStart,20,$fontColor,$fontPath,$this->title);

         // 输出图片
         header("Content-Type:image/png");
         imagepng ( $this->image );
     }

     /*
      * 私有方法，当数组为二元数组时，统计数组的长度
      * Array arr 要做统计的数组
      */
     private function arrayNum($arr) {
         $num = 0;
         if(is_array($arr)) {
             $num++;
             for($i = 0; $i < count($arr); $i++){
                 if(is_array($arr[$i])) {
                     $num = count($arr);
                     break;
                 }
             }
         }
         return $num;
     }

     /*
      * 私有方法，计算数组的深度
      * Array arr 数组
      */
     private function arrayDepth($arr) {
         $num = 0;
         if(is_array($arr)) {
             $num++;
             for($i = 0; $i < count($arr); $i++){
                 if(is_array($arr[$i])) {
                     $num += $this->arrayDepth($arr[$i]);
                     break;
                 }
             }
         }
         return $num;
     }

     /*
      * 私有方法，找到一组中的最大值
      * Array arr 数字数组
      */
     private function arrayMax($arr) {
         $depth = $this->arrayDepth($arr);
         $max = 0;
         if($depth == 1) {
             rsort($arr);
             $max = $arr[0];
         }elseif($depth > 1) {
             foreach($arr as $val) {
                 if(is_array($val)) {
                     if($this->arrayMax($val) > $max) {
                         $max = $this->arrayMax($val);
                     }
                 }else{
                     if($val > $max){
                         $max = $val;
                     }
                 }
             }
         }
         return $max;
     }

     function arrayAver($arr) {
         $aver = array();
         foreach($arr as $val) {
             if(is_array($val)) {
                 $aver = array_merge($aver,$val);
             }else{
                 $aver[] = $val;
             }
         }
         return array_sum($aver)/count($aver);

     }
     // 析构函数
     function __destruct(){
         imagedestroy($this->image);
     }
 }

