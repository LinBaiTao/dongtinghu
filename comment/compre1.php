﻿<?php 
/* if(!isset($_POST['submit'])){
    exit('非法访问!');
} */
$time=$_POST['time'];
$sql="select  *  from parameter_p where time='".$time."' ";
include('../conn.php');
$result= mysql_query($sql); 
if(mysql_num_rows($result)){
	while($row=mysql_fetch_array($result))
	{	//var_dump($row['place']);
		$CODMn[]=$row['CODMn'];
		$COD[]=$row['COD'];
		$BOD5[]=$row['BOD5'];
		$NH3_N[]=$row['NH3_N'];
		$P[]=$row['P'];
		$Cr[]=$row['Cr'];
		$Hg[]=$row['Hg'];
		$As[]=$row['As'];
		$Cd[]=$row['Cd'];
		$Petroleum[]=$row['Petroleum'];
		$Anionicsurfactant[]=$row['Anionicsurfactant'];
		$Sulfid[]=$row['Sulfid'];
		$Coliforms[]=$row['Coliforms'];
		$address[]=$row['place'];
		$ave[]=$row['average'];
		} 		
}else {
	exit("<script language=JavaScript> alert('此年份没有数据!'); location.replace('compre1.html');</script>");
}

	for($k=0;$k<count($address);$k++) {//count($address)
		$text.="'".$address[$k]."'".",";
		$da_1.=$CODMn[$k].",";
		$da_2.=$COD[$k].",";
		$da_3.=$BOD5[$k].",";
		$da_4.=$NH3_N[$k].",";
		$da_5.=$P[$k].",";
		$da_6.=$As[$k].",";
		$da_7.=$Hg[$k].",";
		$da_8.=$Cd[$k].",";
		$da_9.=$Cr[$k].",";
		$da_10.=$Petroleum[$k].",";
		$da_11.=$Anionicsurfactant[$k].",";
		$da_12.=$Sulfid[$k].",";
		$da_13.=$Coliforms[$k].",";
	
		
	}
?>
 <!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.js"></script> 
<script type="text/javascript" src="../js/highcharts.js"></script> 
<script type="text/javascript" src="../js/modules/exporting.js"></script> 
<script type="text/javascript">
function Check(Form)
{
//检查下拉框是否选择
if(document.getElementById("place").value == "null"){
  alert("请选择地点！");
  return false;
}
if(document.getElementById("time").value == "null"){
  alert("请选择时间！");
  return false;
}
}
</script>
<script type="text/javascript">
var chart,chart1; 
$(function() { 
    chart = new Highcharts.Chart({ 
        chart: { 
            renderTo: 'chart_column', //图表放置的容器，关联DIV#id                                                      
            type: 'bar'                                                    
        },                                                                 
        title: {                                                           
            text: '断面评价参数污染指数'                    
        },                                                                 
        subtitle: {                                                        
            text: ''                                  
        },                                                                 
        xAxis: {                                                           
          // categories: ['Africa', 'America', 'Asia', 'Europe', 'Oceania'],
			categories: [<?php echo $text;?>],
															
            title: {                                                       
                text: null                                                 
            }                                                              
        },                                                                 
        yAxis: {                                                           
            min: 0,                                                        
            title: {                                                       
                text: '污染指数',                             
                align: 'high'                                              
            },                                                             
            labels: {                                                      
                overflow: 'justify'                                        
            }                                                              
        },                                                                 
        tooltip: {                                                         
            valueSuffix: ' millions'                                       
        },                                                                 
    /*     plotOptions: {                                                     
            bar: {                                                         
                dataLabels: {                                              
                    enabled: true                                          
                }                                                          
            }                                                              
        },          */                                                        
        legend: {                                                          
            layout: 'vertical',                                            
            align: 'right',                                                
            verticalAlign: 'top',                                          
            x: -40,                                                        
            y: 100,                                                        
            floating: true,                                                
            borderWidth: 1,                                                
            backgroundColor: '#FFFFFF',                                    
            shadow: true                                                   
        },                                                                 
        credits: {                                                         
            enabled: false                                                 
        },                                                                 
        series: [{                                                         
            name: '高锰酸盐指数',                                             
            data: [<?php echo $da_1;?>]                                   
        },{                                                               
            name: '化学需氧量',                                             
            data: [<?php echo $da_2;?>]                                  
        }, {                                                               
            name: '五日生化需氧量',                                             
            data: [<?php echo $da_3;?>]                                
        },
		{                                                               
            name: '氨氮',                                             
            data: [<?php echo $da_4;?>]                                  
        }, 
		{                                                               
            name: '总磷',                                             
            data: [<?php echo $da_5;?>]                                  
        }, 
		{                                                               
            name: '砷',                                             
            data: [<?php echo $da_6;?>]                                  
        }, 
		{                                                               
            name: '汞',                                             
            data: [<?php echo $da_7;?>]                                  
        }, 
		{                                                               
            name: '镉',                                             
            data: [<?php echo $da_8;?>]                                  
        }, 
		{                                                               
            name: '鉻',                                             
            data: [<?php echo $da_9;?>]                                  
        }, 
		{                                                               
            name: '石油类',                                             
            data: [<?php echo $da_10;?>]                                  
        }, 
		{                                                               
            name: '阴离子表面活性剂',                                             
            data: [<?php echo $da_11;?>]                                  
        }, 
		{                                                               
            name: '硫化物',                                             
            data: [<?php echo $da_12;?>]                                  
        }, 
		{                                                               
            name: '粪大肠菌群',                                             
            data: [<?php echo $da_13;?>]                                  
        }, 
		]           
    }); 
	
	 }); 
	
</script>
<style type="text/css">
div#container{width:100%;background-color:#BCD4E3;}
div#header {background-image:url(../image/header.png);height:150px;width:100%;background-size:100% 100%;}
div#navigation {background-color:#3C72C4; opacity: 0.6;width:100%;height:40px;
						position: relative;
						  left: 0px;
						  top: 110px;}
div#br {width:100%;height:10px;}
div#center {background-color:;height:3100px;width:960px; margin:0 auto;}
div#menu {background-color:#7488B8;height:3100px;width:190px;float:left;border-radius:10px;border:2px solid #7488B8;}
div#divise {background-color:;height:500px;width:10px;float:left;}
div#content {background-color:#EEEEEE;height:3100px;width:750px;float:left;border-radius:10px;border:2px solid#7488B8;}
div#footer {background-image:url(image/footer.png);height:50px;width:100%;;background-size:100% 100%;clear:both;text-align:center;}
h1 {margin-bottom:0;}
h2 {margin-bottom:0;font-size:18px;}
ul {margin:0;}
li {list-style:none;}
a { text-decoration: none;} 

.padding {
	padding:0.15cm 5.5cm; }
 .nav{
	font-family : 微软雅黑,宋体;
	font-size : 1.2em;
	color :#FFFFFF;}
 .nav1{
	font-family : 微软雅黑,宋体;
	font-size : 1.2em;
	color :#000;
	font-weight:bold;}
.function{
	background-color:#203A66;
	border-radius:10px;
	width:192px;
	height:45px;
	font-family : 微软雅黑,宋体;
	font-size : 1em;
	color :#FFFFFF;
}	
.subnav{
	font-family : 微软雅黑,宋体;
	font-size : 0.8em;
	color :#FFFFFF;
}
.subnav1{
	font-family : 微软雅黑,宋体;
	font-size : 0.8em;
	color :#203A66;
	font-weight:bold;
}
.title{font-family : 微软雅黑,宋体;
				font-size : 1em;
				color :#203A66;
				position: relative;
			 left: 20px;
}
 .input{width:80px;height=100px;
				font-family : 微软雅黑,宋体;
				font-size : 1em;
				color :#203A66;
				position: relative;
			 left: 250px;}
.choice{
	width:200px;
	font-family : 微软雅黑,宋体;
	font-size : 0.8em;
	color :#000;}			 
*{
margin:0px;
padding:0px;
}
 #nav2{ background-color:#eee; width:600px; height:40px; margin:0 auto;}/*设置导航的长度和宽度，左右居中显示*/
 ul{ list-style:none;}/*去除列表样式*/
 ul li{ float:left; line-height:40px;  text-align:center;}/*设置样式的行高以及居中显示*/

 ul li a{
 text-decoration:none;color:#000;/*定义A标签的样式 颜色 去除下划线*/
 display:block;padding:0 10px;
 }
 ul li ul li{ /*去除浮动，设置背景颜色，内边距以上方为两个像素*/
float:none;background:#7488B8;
margin-top:0px;
 }
 ul li ul{
 position:absolute;/*定位显示的位置*/
 display:none;/*隐藏第二个样式的内容*/
 }
 ul li:hover ul{
 display:block;/*鼠标经过时显示内容*/
 width:190px;
 }

ul li a:hover{
 background:#7488B8;
 }

 ul li ul li a:hover{
background:#00ABC3;/*鼠标经过时显示内容*/
 width:170px;
 }
 #t{ /*定义地二个列表样式*/
 float:none;
  position:absolute;
  display:none;
  padding-left:2px;
 top:0px;
  left:0px;
 }
 ul li ul li:hover #t{/*鼠标移上导航显示下拉列表*/
 display:block;
 }	
 
 
 
 .btn-select { 
position: relative; 
display: inline-block; 
width: 150px; 
height: 25px; 
background-color: #f80; 
font: 14px/20px "Microsoft YaHei"; 
color: #eee;
} 
.btn-select .cur-select { 
position: absolute; 
display: block; 
width: 150px; 
height: 35px; 
line-height: 25px; 
background:#7488B8; url(ico-arrow.png) no-repeat 125px center; 
text-indent: 10px; 
} 
.btn-select:hover .cur-select { 
background-color: #7488B8;
} 
.btn-select select { 
position: absolute; 
top: 0; 
left: 0; 
width: 150px; 
height: 35px; 
opacity: 0; 
filter: alpha(opacity: 0;); 
font: 14px/20px "Microsoft YaHei"; 
color: #7488B8;<!-- 选项字体颜色-->
} 
.btn-select select option { 
text-indent: 15px; 
} 
.btn-select select option:hover { 
background-color: #7488B8;
color:#7488B8;
} 
 
</style>
</head>

<body>

<div id="container">

<div id="header">
<div id="navigation">
<p class="padding">
<a href="../main.html" class="nav">首页</a>&nbsp;&nbsp;&nbsp;
<a href="../input.html"  class="nav">数据录入与管理</a>&nbsp;&nbsp;&nbsp;
<a href="../comment.html"  class="nav1">水环境评价</a>&nbsp;&nbsp;&nbsp;
<a href="../analysis.html"  class="nav">分析决策</a>&nbsp;&nbsp;&nbsp;
<a href=""  class="nav">后台管理</a>&nbsp;&nbsp;&nbsp;
<a href="login.php?action=logout" class="nav">退出</a> &nbsp;&nbsp;&nbsp;&nbsp;
</p>
</div>
</div>
<div id="br"></div>
<div id="center">
<div id="menu">
<center><input type="button" name="test" value="功 能 导 航" onClick="location.href='comment.html'" class="function"/>
<br/><br/>
<a href="eutrophy.html" class="subnav">水体营养状况</a><br/><br/>
<hr style="filter: alpha(opacity=100, finishopacity=0, style=3)" width="100%" color="#203A66" SIZE="3"><br/>

<p class="btn-select " id="btn_select"> 
<span class="cur-select">断面水体主要污染物</span> 
<select onchange='document.location.href=this.options[this.selectedIndex].value;'> 
<option value="" select="">请选择</option>
<option value="pollutant2.html">断面水体污染分担率均值</option>
<option value="pollutant.html">断面水体主要污染物</option> 

</select> 
</p><br/><br/>
<hr style="filter: alpha(opacity=100, finishopacity=0, style=3)" width="100%" color="#203A66" SIZE="3">
<ul>
<li> <a href="#" class="subnav1">&nbsp;&nbsp;&nbsp;&nbsp;水体水质综合污染指数&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</a>

<ul>
<li><a href="compre1.html" class="subnav">断面评价参数污染指数</a></li>
<li><a href="compre2.html" class="subnav">断面综合污染指数</a></li>
<li><a href="compre.html" class="subnav">污染分子数均值</a><hr style="filter: alpha(opacity=100, finishopacity=0, style=3)" width="100%" color="#203A66" SIZE="3"></li>

</ul>
</li>
</ul>
<hr style="filter: alpha(opacity=100, finishopacity=0, style=3)" width="100%" color="#203A66" SIZE="3"><br/>

</center>
</div>
<div id="divise"></div>
<div id="content"><br/><p class="title">断面评价参数污染指数评价</p><br/>
<form action="compre1.php" method="post" onSubmit="return Check(this)" name="Form"> 
<p class="title">
时间：
<select name="time" id="time"  class="choice" >
<option  value="null">请选择</opton>
<?php  include('../conn.php');  $sq="select  distinct time from parameter_k "; $result = mysql_query($sq,$conn);
$i=0;
while($row=mysql_fetch_array($result))
{  
	echo "<option value=".$row['time'].">".$row['time']."</option>" ;
	$i=$i+1;
}
?>
</select>
<input type="submit" value="确定" class="input" />&nbsp;&nbsp;&nbsp;
 <input type="reset" value="重置"  class="input" /></p>
</form> <br/>
<div id="chart_column" style="width: 720px; height: 3000px; margin: 0 auto"></div> <br>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
</div>
</div>
</div>

</body>
</html>
 