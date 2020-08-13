<?php
    session_start();
    if(!empty($_SESSION))
    {
        if(empty($_SESSION['status']))
        {
            header('location:login.html');
        }
    }
    else
    {
        if(empty($_COOKIE['status']))
        {
            header('location:login.html');
        }
    }
?>
<!DOCKTYPE html>
<fieldset>
    <legend><b>CHANGE PASSWORD</b></legend>
    <form method="POST">
        <table>
            <tr>
                <td><font size="3">Current Password</font></td>
            </tr>
            <tr>
                <td><input type="password" name="c_password"/></td>
            </tr>
            <tr>
                <td><font size="3">New Password</font></td>
            </tr>
            <tr>
                <td><input type="password" name="n_password"/></td>
            </tr>
            <tr>
                <td><font size="3">Retype New Password</font></td>
            </tr>
            <tr>
                <td><input type="password" name="re_n_password"/></td>
            </tr>
        </table>
        <hr/>
        <input type="submit" name="Change" value="Change"/>
        <a href="adminhome.php">Home</a>
    </form>
</fieldset>

<?php
    if(isset($_POST['Change']))
    {
        if($_POST['c_password']!="" and $_POST['n_password']!="" and $_POST['re_n_password']!="")
        {
            if(!empty($_SESSION))
            {
                if($_SESSION['password']==$_POST['c_password'])
                {
                    if($_POST['n_password']==$_POST['re_n_password'])
                    {
                        $connection = mysqli_connect('127.0.0.1', 'root', '', 'mini project');
                        $result= mysqli_query($connection, "update `registration` SET `password`='".$_POST['n_password']."' WHERE id='".$_SESSION['id']."'");
                        $_SESSION['password']=$_POST['n_password'];
                        mysqli_close($connection);
                        echo "password changed";
                    }
                    else
                        echo "New Password and Retype New Password have to be same";

                }
                else
                    echo "Current Password is Wrong";

            }
            else
            {
                if($_COOKIE['password']==md5($_POST['c_password']))
                {
                    if($_POST['n_password']==$_POST['re_n_password'])
                    {
                        $connection = mysqli_connect('127.0.0.1', 'root', '', 'mini project');
                        $result= mysqli_query($connection, "update `registration` SET `password`='".$_POST['n_password']."' WHERE id='".$_COOKIE['id']."'");
                        setcookie('password',md5($_POST['n_password']),time()+6000,'/');
                        mysqli_close($connection);
                        echo "password changed";
                    }
                    else
                        echo "New Password and Retype New Password have to be same!";

                }
                else
                    echo "Current Password is Wrong";
            }
        }
        else
            header('location:achangepassword.php');

    }
?>