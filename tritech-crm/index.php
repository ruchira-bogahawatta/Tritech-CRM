<?php include ('config/constants.php');
?>

<html>
<head>
    <title>Login - TriTech CRM</title> <!-- Login Page -->
    <link rel="stylesheet" href="css/main.css">
</head>
<body background="assets/login-background.png">
<img src="assets/logo2.svg" alt="logo" class="login-logo">
    <div class="login-form text-center">
        <h1>LOGIN</h1>
        
        <div class="alert-login-page">
        <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
        </div>
        <form action="" method="POST">
            
                Username: 
                <input type="text" name="username" placeholder="Enter Your Username"> 
                <br>
                Password: 
                <input type="password" name="password" placeholder="Enter Your Password">
                <br>
                <input type="submit" name="submit" value="Login" class="btn-login">
        </form>  
       
        
        
    </div>
</body>
</html>

<?php

    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
  
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        $row = mysqli_fetch_array($res);
        if($count==1)
        {   
            if($row["user_type"]=="User")
            {
                $_SESSION['login'] = "<div class='top-login-alert'>Login Successful.</div>";
                $_SESSION['user'] = $username;
                $_SESSION ['full_name'] = $row['full_name'];         //FOR MENU BAR
                $_SESSION ['username'] = $row['username'];
                header('location: http://localhost/tritech-crm/user-home/user-home.php');
            }
            elseif($row["user_type"]=="Admin")
            {
                $_SESSION['login'] = "<div class='top-login-alert'>Login Successful.</div>";
                $_SESSION['user'] = $username;

                $_SESSION ['full_name'] = $row['full_name'];           //FOR MENU BAR
                $_SESSION ['username'] = $row['username'];
                header('location: http://localhost/tritech-crm/home.php');
            }
            else
            {
                $_SESSION['login'] = "<div class='login-alert-failed text-center'>Whoops! Username or Password is incorrect.</div>";
                header('location: http://localhost/tritech-crm/');
            }

        }


        else
        {
            $_SESSION['login'] = "<div class='login-alert-failed text-center'>Whoops! Username or Password did not match.</div>";
            header('location: http://localhost/tritech-crm/');
            
        }
    }

?> 