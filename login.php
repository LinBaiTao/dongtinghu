﻿<?php
session_start();

 //注销登录
/* if($_GET['action'] == "logout"){
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    echo '注销登录成功！点击此处 <a href="login.html">登录</a>';
    exit;
} */

//登录
if(!isset($_POST['submit'])){
    exit('非法访问!');
}
$username = htmlspecialchars($_POST['username']);
$password = MD5($_POST['password']);
//$username="1";
//$password="1";
//包含数据库连接文件
include('conn.php');
//检测用户名及密码是否正确
$check_query = mysql_query("select uid from user where username='$username' and password='$password' 
limit 1");
if($result = mysql_fetch_array($check_query)){
    //登录成功
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $result['uid'];
require_once("main.html");
    echo $username,' 欢迎你！';
    exit;
} else {
    exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');
}  
$url="main.html";
//Header("HTTP/1.1 303 See Other"); 
Header("Location: $url"); 

?>