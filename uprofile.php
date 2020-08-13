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
<table border="1" align="center">
    <tr>
        <td colspan="2" align="center">Profile</td>
    </tr>
    <tr>
        <td>ID</td>
        <td>
            <?php
                if(!empty($_SESSION))
                {
                    echo $_SESSION['id'];
                }
                else
                    echo $_COOKIE['id'];
            ?>
        </td>
    </tr>       
    <tr>
        <td>Name</td>
        <td>
        <?php
            if(!empty($_SESSION))
            {
                echo $_SESSION['name'];
            }
            else
                echo $_COOKIE['name'];
        ?>
    </td>
    </tr>
    <tr>
        <td>Email</td>
        <td>
            <?php
                if(!empty($_SESSION))
                {
                    echo $_SESSION['email'];
                }
                else
                    echo $_COOKIE['email'];
            ?>
        </td>
    </tr>       

    <tr>
        <td>User Type</td>
        <td>
            <?php
                if(!empty($_SESSION))
                {
                    echo $_SESSION['userType'];
                }
                else
                    echo $_COOKIE['userType'];
            ?>
        </td>
    </tr>
    <tr>
        <td colspan="2"><a href="userhome.php">Go back</a></td>
    </tr>
</table>
</fieldset>