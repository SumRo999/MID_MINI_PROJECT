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
			$conn = mysqli_connect('127.0.0.1', 'root', '', 'mini project');
			$result= mysqli_query($conn, "select * from registration where id='".$id."';");
			$d1=mysqli_fetch_assoc($result);
			mysqli_close($conn);
			if(empty($d1['id']))
			{
				if($password == $confirm_password)
				{
					$conn = mysqli_connect('127.0.0.1', 'root', '', 'mini project');
					$result = mysqli_query($conn, "insert into `registration`(`id`, `name`, `email`, `password`,`userType`) values ('".$id."','".$name."','".$email."','".$password."','".$userType."');");
					mysqli_close($conn);
					header("location:login.html");				
				}
				else
					echo "Password and confirm password not same";
			}
			else
				echo "Username Already exist";
		}
	}
	else
	{
		header("location:login.html");
	}
?>