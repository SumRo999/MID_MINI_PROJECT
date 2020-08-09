<?php
    session_start();
	if(isset($_POST['Register']))
	{
		$name = $_POST['name'];
		$id = $_POST['id'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confirmPassword'];
		$userType = $_POST['userType'];
		
		if(empty($id)||empty($password)||empty($email)||empty($confirm_password)||empty($name)||empty($userType))
		{
			header("location:registration.html");
		}
		else{
			if($password == $confirm_password)
			{
				$file = fopen('user.txt','a');
				fwrite($file, $name.'|'.$id.'|'.$password.'|'.$confirmPassword.'|'.$email.'|'.$userType."/r/n");
				fclose($file);
                header("location:login.html");				
			}
			else
			{
				header("location:registration.html");
			}
		}
	}
	else
	{
		header("location:login.html");
	}
?>