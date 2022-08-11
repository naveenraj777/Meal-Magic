<?php
include("../config/constants.php");
?>

<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel - Login Page</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body class="login-bg">
        <div class="login txt-center">
        <h1>Login</h1><br>
        <p>created by <a href="#">MNS friends</a></p><br>
        <?php
        if(isset($_SESSION['login'])){
            echo $_SESSION['login']."<br><br>";
            unset($_SESSION['login']);
        }
        if(isset(  $_SESSION['no-login'])){
            echo $_SESSION['no-login']."<br><br>";
           unset($_SESSION['no-login']);
        }
        ?>
        <form action="" method="POST">
        User Name: <input class="inputbox" type="text" name="username" placeholder=" Enter your username"><br><br>
        Password: <input class="inputbox" type="password" name="password"  placeholder=" Enter your password"><br><br>
        <input class="btn2" type="submit" value="Login" name="submit"><br><br>
        </form>
        </div>
    </body>
</html>

<?php

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM table_admin WHERE username='$username' AND password='$password'";
        $res = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($res);

        if($count==1){
            $_SESSION['login'] = "<div class='success'>Successfully logged in</div>";
            $_SESSION['user'] = $username;
            header("location:".SITEURL.'admin/');
        }
        else{
            $_SESSION['login'] = "<div class='error'>User Name or Password did not exist</div>";
            header("location:".SITEURL.'admin/login.php');
        }
    }
?>