<style>
  .bg-fb-blue {
    background-color: #3b5998 !important;
  }
</style>
<main>
  <?php
             if(isset($_POST['submit'])){
                $conn=mysqli_connect("localhost","root","","facebook");
                $email=mysqli_real_escape_string($conn, $_POST['email']);
               // $password=md5($_POST['password']);
               $password=$_POST['password'];
                $sql= "SELECT * FROM users WHERE email='$email' AND password='$password'";
                
                $result=mysqli_query($conn,$sql);
                $data=mysqli_fetch_assoc($result);
                print_r($data);
                session_start();
                $_SESSION['email']=$email;
                header("Location:4.php");
               
             }
          ?>
  <div class="row bg-fb-blue pt-5">
    <div class="container">
      <div class="row no-gutters pl-2 pr-2">
        <div class="col-sm-12 col-md-6">
          <h1 class="text-white logo">facebook</h1>
        </div>
        <div class="col-sm-12 col-md-6">
          <form class="float-right" method="post">
            <div class="form-row">
              <div class="col-auto">
                <label class="sr-only" for="emailPhone">Email</label>
                <input type="text" name="email" class="form-control form-control-sm mb-2" placeholder="Email">
              </div>
              <div class="col-auto">
                <label class="sr-only" for="emailPhone">Password</label>
                <input type="password" name="password" class="form-control form-control-sm mb-2" placeholder="Password">
              </div>
            </div>
            <div class="col-auto">
              <input type="submit" id="submit" name="submit" class="btn btn-sm btn-fb mb-2 align-bottom" value="Login">
            </div>
        </div>
        </form>

      </div>
    </div>
  </div>
  </div>