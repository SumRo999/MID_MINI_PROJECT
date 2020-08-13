<?php
    session_start();
    if(!empty($_SESSION))
    {
        if(empty($_SESSION['status']) or $_SESSION['userType']!="Admin")
        {
            header('location:logout.php');
        }
    }
    else
    {
        if(empty($_COOKIE['status']) or $_COOKIE['userType']!="Admin")
        {
            header('location:logout.php');
        }
    }
?>

<!DOCKTYPE html>
<title>userhome</title>
<fieldset>
    <p align="center">Admin's Home Page<p>
</fieldset>
<br/>
<fieldset>
    <form action = "logcheck.php" method = "post">
    <table align="center">
        <?php
        if(!empty($_SESSION))
        {
            echo "<p align='center'>Welcome ".$_SESSION['name']."!</p>";
        }
        else
            echo "<p align='right'>Welcome ".$_COOKIE['name']."!</p>";
        ?>
        <tr>
            <td><a href="aprofile.php">Profile</a></td>
        </tr>
        <tr>
            <td><a href="achangepassword.php">Change Password</a></td>
        </tr>
        <tr>
            <td><a href="users.php">View Users</a></td>
        </tr>
        <tr>
            <td><a href="logout.php">Logout</a></td>
        </tr>
    </table>
    </form>
</fieldset>