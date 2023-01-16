<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbnme = "Login_Signup";
    $conn = mysqli_connect($host, $username, $password, $dbnme);

    $showAlert = false;
    $showError = false;
    $exists = false;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $E_MAIL = $_POST['email'];
        $U_NAME = $_POST['username'];
        $P_WORD = $_POST['password'];
        $CP_WORD = $_POST['cpassword'];

        $sql = "SELECT * FROM users WHERE Username = '$U_NAME'";

        $result = mysqli_query($conn, $sql);

        $num = mysqli_num_rows($result);

        if($num == 0){
            if(($P_WORD == $CP_WORD) && $exists == false){
                $sql = "INSERT INTO `users`(`Email`, `Username`, `Password`) VALUES('$E_MAIL', '$U_NAME', '$P_WORD')";

                $result = mysqli_query($conn, $sql);

                if($result){ $showAlert = true; }
            }
            else{ $showError = "Password do not match"; }
        }
        if($num > 0){ $exists = "Username not available"; }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Signup</title>
</head>
<body>
    <div class="php">
        <?php
            if($showAlert){
                echo '<script>alert("Success! Your account is now created and you can login")</script>';
            }
            if($showError){
                echo '<script>alert("Error! Password do not match")</script>';
            }
            if($exists){
                echo '<script>alert("Error! Username not available")</script>';
            }
        ?>
    </div>
    <div class="center">
        <div class="logo">Sign Up</div>
        <form action="signup.php" method="post">
            <div class="field">
                <input type="email" placeholder="E-mail address" name="email">
            </div>
            <div class="field">
                <input type="text" placeholder="Username" name="username">
            </div>
            <div class="field">
                <input type="password" placeholder="Password" name="password">
            </div>
            <div class="field">
                <input type="password" placeholder="Confirm Password" name="cpassword">
            </div>
            <div class="btn">
                <input type="submit" value="Sign Up">
            </div>
            <div class="log">
                <p>Have an account? <a href="login.html">Sign In</a></p>
                <p>or you can sign in with</p>
                <ul class="option">
                    <li><a href="#"><i class="fa-brands fa-google"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-github"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                </ul>
                <p class="txt">This site is protected by reCAPTCHA and the Google <a href="#">Privacy Policy</a> and <a href="#">Terms of Service </a>apply</p>
            </div>
        </form>
    </div>
</body>
</html>