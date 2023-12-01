<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">
                <?php 
                    
                    include("php/dbcon.php");
                    if(isset($_POST['submit'])){
                    $username = mysqli_real_escape_string($con,$_POST['username']);
                    $password = mysqli_real_escape_string($con,$_POST['password']);

                    $result = mysqli_query($con,"SELECT * FROM register WHERE username='$username' AND password='$password' ") or die("Select Error");
                    $row = mysqli_fetch_assoc($result);

                    if(is_array($row) && !empty($row)){
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['password'] = $row['password'];

                    }else{
                        echo "<div class='message'>
                            <p>Wrong Username or Password</p>
                            </div> <br>";
                        echo "<a href='index.php'><button class='btn'>Log In Now</button>";
                
                    }
                    if($result-> num_rows==1){
                        header("Location: datatable.php");
                    }
                    }else{

                
                ?>
            <header class="ulo">Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username" style="color:white;">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password" style="color:white;">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have account? <a class="openkana" href="registration.php">Sign Up Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
      
</body>
</html>