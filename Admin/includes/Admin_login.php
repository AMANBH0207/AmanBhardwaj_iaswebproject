<?php
require("Connection.php")

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="assets/dist/css/stylesheet.css">
</head>

<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form method="POST">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" placeholder="Enter Admin Name" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" placeholder="Enter Password" id="password" name="password" required>
            </div>
            <button type="submit" name="login">Login</button>
        </form>
    </div>

    <?php
    if(isset($_POST["login"])){
        $query="SELECT * FROM `admin_login` WHERE `Admin_Name`='$_POST[username]'AND `Admin_Password`='$_POST[password]'";
        $result=mysqli_query($con,$query);
        if(mysqli_num_rows($result)==1){
        session_start();
            $_SESSION["AdminLoginId"]=$_POST["username"];
            header("location: Admin_Panel.php");
        }else{
            echo "<script>alert('incorrect Password')</script>";
        }
    }
    
    
    
    ?>
    




</body>

</html>
