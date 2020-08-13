<?php
    session_start();
    if(!empty($_SESSION))
    {
        if(empty($_SESSION['status']) or $_SESSION['userType']!="User")
        {
            header('location:logout.php');
        }
    }
    else
    {
        if(empty($_COOKIE['status']) or $_COOKIE['usertype']!="User")
        {
            header('location:logout.php');
        }
    }
?>

<!DOCKTYPE html>
<title>userhome</title>
<fieldset>
    <p align="center">User's Home Page<p>
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
            <td><a href="uprofile.php">Profile</a></td>
        </tr>
        <tr>
            <td><a href="uchangepassword.php">Change Password</a></td>
        </tr>
        <tr>
            <td><a href="logout.php">Logout</a></td>
        </tr>
    </table>
    </form>
</fieldset>