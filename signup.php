<?php 
    include("dbConnection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 m-auto">
                <br><br>
                <form action="" method="POST" name="f">
                    <div style="display:flex;width:320px;padding:5px;">
                            <input type="text" name="name" required placeholder="Enter Your Name" class="form-control" style="width:270px;">
                    </div>
                    <div style="display:flex;width:320px;padding:5px;">
                            <input type="number" name="age" required placeholder="Enter Your Age" class="form-control" style="width:270px;">
                    </div>
                    <div style="display:flex;width:320px;padding:5px;">
                        <select name="gender" class="form-control">
                            <option value="">Select Your Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div style="display:flex;width:320px;padding:5px;">
                            <input type="text" name="username" required placeholder="Enter Your Username" class="form-control" style="width:270px;">
                    </div>
                    <div style="display:flex;width:320px;padding:5px;">
                            <input type="text" name="password" required placeholder="Enter Your Password" class="form-control" style="width:270px;">
                    </div>
                    <div style="display:flex;width:320px;padding:5px;">
                            <input type="text" name="conpassword" required placeholder="Enter Your Confirm Password" class="form-control" style="width:270px;">
                    </div>
                    <div style="display:flex;width:320px;padding:5px;">
                        <input type="submit" name="signupBtn" value="Sign up" onclick="return check()" class="btn btn-info">
                    </div>
                </form>    
            </div>
        </div>
    </div>

    <?php
        if(isset($_POST["signupBtn"])){
            $name = $_POST["name"];
            $age = $_POST["age"];
            $gender = $_POST["gender"];
            $username = $_POST["username"];
            $password = $_POST["password"];

            $insert = "insert into register(Name,Age,Gender,Username,Password)values('$name','$age','$gender','$username','$password')";

            $run = mysqli_query($con,$insert);
            if($run){
                echo "<script>
                    alert('Sign up  Succefully')
                    window.location.href = 'login.php';
                </script>";
            }
            else{
                echo "<script>
                    alert('Registration Failed')
                </script>";
            }
        }
    ?>
    <script>
        function check(){
            var pass = f.password.value;
            var cpass = f.conpassword.value;
            if(pass != cpass){
                alert('Confirm password not Match');
                return false;
            }
            else{
                return true;
            }
        }
    </script>
</body>
</html>