<?php

require_once "dbconnection.php";
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $qry = "SELECT * FROM `login` WHERE `email`='$email' AND `password`='$password'";
    $run = mysqli_query($dbcon, $qry);
    $row = mysqli_num_rows($run);
    if ($row < 1) {
?>
        <script>
            alert("Opps! plz Enter Your Username and Pswd again..");
            window.open('index.php', '_self');
        </script> <?php
                } else {
                    $data = mysqli_fetch_assoc($run);
                    $id = $data['u_id'];    //fetch id value of user
                    $email = $data['email'];
                    $_SESSION['uid'] = $id;   //now we can use it until session destroy
                    $_SESSION['emm'] = $email;
                    ?>
        <script>
            alert(" WELCOME 🙏");
            window.open('home/home.php', '_self');
            // changes made here
        </script> <?php

                }
            }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <style>
        body {
            background-image: url('images/0.jpg');
            background-repeat: no-repeat;
            background-size:cover;           
        }
        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%; 
            min-height: 100%;
        }


    </style>
</head>

<body>
<video autoplay muted loop id="myVideo">
    <source src="4 (1).mp4" muted loop autoplay></video>

     
    <div class="container" style="margin-top: 60px; width:50%;">
        <div class="row">
            <div class="col-md-12">
                <br>
                <br>
                <h3 style="color:white;">Login</h3 >
                <h4  style="color:white;">Please Fill Your ⮯⮯</h4>
                <!-- <?php echo $error; ?> -->
                <form action="" method="post">
                    <div class="form-group">
                        <label style="color:white;font-size:15px;">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter username/email-Id" required />
                    </div>
                    <div class="form-group">
                        <label style="color:white;font-size:15px;">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit"  style="color:white;" name="submit" class="btn btn-primary" value="SignIn" />
                        <button onclick="window.location.href='resetpswd.php'" class="btn btn-danger" style="cursor:pointer">Reset Password</button>
                    </div>
                    <h5 style="color:white;">Don't have an account?⮞➤ <a href="register.php" style="color:white;">Register here</a></h5>

                </form>
            </div>
        </div>
    </div>
    
</body>

</html>