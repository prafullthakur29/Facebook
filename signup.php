<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #wrap {
            background-image: -ms-linear-gradient(top, #FFFFFF 0%, #D3D8E8 100%);

            background-image: -o-linear-gradient(top, #FFFFFF 0%, #D3D8E8 100%);
            / background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #FFFFFF), color-stop(1, #D3D8E8));

            background-image: linear-gradient(to bottom, #FFFFFF 0%, #D3D8E8 100%);
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        legend {

            font-size: 25px;
            font-weight: bold;
        }

        .signup-btn {
            background: #79bc64;
            font-family: Arial;
            color: #ffffff;
            font-size: 20px;
            padding: 10px 20px 10px 20px;
            border: solid #3b6e22 1px;

        }

        .form .form-control {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>


</body>

</html>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<?php
$sql="";
$res="";
if (isset($_POST['submit'])) 
{   
$name=($_POST['name']);
$email=($_POST['email']);
$password=($_POST['password']);
$dob=($_POST['date']);
$gender=($_POST['gender']);
    $con=mysqli_connect("localhost","root","","facebook");

    $sql= "insert into users values('$name','$email','$password','$dob','$gender')";
    $res=mysqli_query($con,$sql);
    $q="INSERT INTO `user_profile`(`name`, `gender`, `email`, `dob`) VALUES ('$name','$gender','$email','$dob')";
    $res2=mysqli_query($con,$q);
    if ($res or $res2) {
        header("location:2.php");
    }
}
?>
<div class="container" id="wrap">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="" method="post" accept-charset="utf-8" class="form">
                <legend>Sign Up</legend>
                <h4>It's free and always will be.</h4>
                <input type="text" name="name" class="form-control input-lg" placeholder="Full Name" />
                <input type="text" name="email" class="form-control input-lg" placeholder="Your Email" />
                <input type="password" name="password" class="form-control input-lg" placeholder="Password" />
                <input type="password" name="confirm_password" class="form-control input-lg"
                    placeholder="Confirm Password" /> <label>Birth Date</label>
                <div class="row">
                    <div class="col-xs-4 col-md-4">
                        <input type="date" name="date">
                    </div>
                </div>
                <label>Gender : </label>
                <label class="radio-inline">
                    <input type="radio" name="gender" value="Male" id=male />Male
                </label>
                <label class="radio-inline">
                    <input type="radio" name="gender" value="Female" id=female />Female
                </label>
                <br />
                <span class="help-block">By clicking Create my account, you agree to our Terms and that you have read
                    our Data Use Policy, including our Cookie Use.</span>
                <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" name="submit">Create my
                    account</button>
            </form>
        </div>
    </div>
</div>
</div>