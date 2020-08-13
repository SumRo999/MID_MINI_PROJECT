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
<table width="100%" border="1">
    <tr>
        <td colspan="4" align="center">Users</td>
    </tr>
    <tr>
        <td width="25%">ID</td>
        <td width="25%">NAME</td>
        <td width="25%">EMAIL</td>
        <td width="25%">USER TYPE</td>
    </tr>
    <?php
        $connection = mysqli_connect('127.0.0.1', 'root', '', 'mini project');
        $result= mysqli_query($connection, "select * from registration;");
        foreach ($result as $data)
        {
            echo "<tr><td>".$data['id']."</td><td>".$data['name']."</td><td>".$data['email']."</td><td>".$data['userType']."</td></tr>";
        }
    ?>
    <tr>
        <td colspan="4" align="right">
            <a href="adminhome.php">Go Home</a>
        </td>
    </tr>
</table>
</fieldset>