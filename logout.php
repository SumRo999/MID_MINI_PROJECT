<?php
	session_start();
	session_destroy();

	setcookie('name',$_COOKIE['name'],time()-6000,'/');
	setcookie('email',$_COOKIE['email'],time()-6000,'/');
	setcookie('id',$_COOKIE['id'],time()-6000,'/');
	setcookie('password',md5($_COOKIE['password']),time()-6000,'/');
	setcookie('userType',$_COOKIE['userType'],time()-6000,'/');
	setcookie('status','ok',time()-6000,'/');
	header('location:login.html');
?>