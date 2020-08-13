<?php
	session_start();

	if(isset($_POST['Login']))
	{
		$id 		= $_POST['id'];
		$password 	= $_POST['password'];

		if(empty($id) || empty($password))
		{
			echo "null submission";
		}
		else
		{
			$conn = mysqli_connect('127.0.0.1', 'root', '', 'mini project');
		    $result= mysqli_query($conn, "select * from registration where id='".$id."' and password = '".$password."';");
			$d1=mysqli_fetch_assoc($result);
			mysqli_close($conn);
			if(!empty($d1))
			{
				if(isset($_POST['remember_me']))
				{
					setcookie('name',$d1['name'],time()+6000,'/');
					setcookie('id',$d1['id'],time()+6000,'/');
					setcookie('email',$d1['email'],time()+6000,'/');
				    setcookie('password',md5($d1['password']),time()+6000,'/');
					setcookie('userType',$d1['userType'],time()+6000,'/');
					setcookie('status','ok',time()+6000,'/');
					if ($_COOKIE['userType']=="Admin") 
					{
						header('location:adminhome.php');
					}
					else 
					{
						header('location:userhome.php');
					}
				}
				else
				{
					$_SESSION['name']= $d1['name'];
					$_SESSION['email'] = $d1['email'];
					$_SESSION['id']= $d1['id'];
					$_SESSION['password']= $d1['password'];
					$_SESSION['userType'] = $d1['userType'];
					$_SESSION['status']  = "set";
					if ($_SESSION['userType']=="Admin") 
					{
						header('location:adminhome.php');
					}
					else
					{
						header('location:userhome.php');
					}
				}
			}
			else
			{
				echo "Invalid username/password";
			}
		
		}

	}
	else
	{
		header("location:login.html");
	}
?>