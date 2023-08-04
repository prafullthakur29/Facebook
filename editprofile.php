<style>
    body {
        margin-top: 20px;
        background-color: #f2f6fc;
        color: #69707a;
    }

    .img-account-profile {
        height: 10rem;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .card-header {
        padding: 1rem 1.35rem;
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }

    .form-control,
    .dataTable-input {
        display: block;
        width: 100%;
        padding: 0.875rem 1.125rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1;
        color: #69707a;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #c5ccd6;
        border-radius: 0.35rem;

    }
</style>
<div class="container-xl px-4 mt-4">
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0">Profile</a>
    </nav>

    <?php
    $profile_photo='';
    $name="";
    $gender='';
    $education='';
    $bio='';
    $email='';
    $phone='';
    $dob='';
    $post='';
    $res='';
    session_start();
    $email=$_SESSION['email'];

    $con=mysqli_connect('localhost','root','','facebook');
            if(!$con){
                echo 'connection not set';
            }
            else{
                $q="select * from user_profile where email='$email'";
                $res=mysqli_query($con,$q);
                $rows=mysqli_num_rows($res);
                $data=mysqli_fetch_assoc($res);
                $profile_photo=$data['profile_photo'];
                $name=$data['name'];
                $gender=$data['gender'];
                $education=$data['education'];
                $bio=$data['bio'];
                $email=$data['email'];
                $phone=$data['phone'];
                $dob=$data['dob'];
                $post=$data['post'];

            }



    if (isset($_POST['submit'])) {
        $filename=$_FILES['fileInput']['name'];
        $tmpfile=$_FILES['fileInput']['tmp_name'];
        $res=move_uploaded_file($tmpfile,"img/".$filename);

        $name=$_POST['name'];
        $gender=$_POST['gender'];
        $education=$_POST['education'];
        $bio=$_POST['bio'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $dob=$_POST['dob'];

        $filename1=$_FILES['fileInput1']['name'];
        $tmpfile1=$_FILES['fileInput1']['tmp_name'];
        $res=move_uploaded_file($tmpfile1,"img/".$filename1);
       $con=mysqli_connect('localhost','root','','facebook');
        if (!$con) {
            echo "connetion not set";
        }
        else{
                $q="UPDATE user_profile SET profile_photo='$filename', name='$name', gender='$gender',bio='$bio', education='$education', email='$email',phone=$phone, dob='$dob', post='$filename1' where email='$email'";
                $res=mysqli_query($con,$q);
                if($filename==""){
                    $res=move_uploaded_file($tmpfile, "img/".$profile_photo);
                    $res=move_uploaded_file($tmpfile1, "img/".$post);
                }
                else{
                    $res=move_uploaded_file($tmpfile, "img/".$filename);
                    $res=move_uploaded_file($tmpfile1, "img/".$filename1);
                }
            
                    header("Location:4.php");
                
            }
        
    }
    ?>
    <hr class="mt-0 mb-4">
    <form method="post" enctype='multipart/form-data'>
        <div class="row">
            <div class="col-xl-4">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <img class="img-account-profile rounded-circle mb-2" src=<?php echo "./img/" .$profile_photo ?>
                        >
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <input type="file" name="fileInput" value='<?php echo $filename ?>'>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="small mb-1">Full Name</label>
                            <input class="form-control" type="text" placeholder="Enter your Full name" name="name"
                                value="<?php echo $name?>">
                        </div>
                        <div class="mb-3">
                            <label>Gender </label><br>
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="Male">Male
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="Female" />Female
                            </label>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1">Education</label>
                                <input class="form-control" type="text" placeholder="Enter your education"
                                    name="education" value="<?php echo $education?>">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1">Bio</label>
                                <input class="form-control" type="text" placeholder="About Yourself" name="bio"
                                    value="<?php echo $bio?>">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1">Email address</label>
                            <input class="form-control" type="email" placeholder="Enter your email address" name="email"
                                value="<?php echo $email?>">
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1">Phone number</label>
                                <input class="form-control" type="tel" placeholder="Enter your phone number"
                                    name="phone" value="<?php echo $phone?>">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1">Birthday</label>
                                <input class="form-control" type="text" placeholder="Enter your birthday" name="dob"
                                    value="<?php echo $dob?>">
                            </div>
                        </div>
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header">Add Your Post</div>
                            <div class="card-body text-center">
                                <img class="img-account-profile rounded-circle mb-2" src=<?php echo "./img/" .$post ?> >
                                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                <input type="file" name="fileInput1" value="<?php echo " ./img/".$post ?>">
                            </div>
                            <br>
                            <br>
                            <button class="btn btn-primary" name="submit" type="submit  ">Save changes</button>
    </form>
</div>
</div>
</div>
</div>
</div>