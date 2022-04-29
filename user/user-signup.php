
<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $mobno=$_POST['mobilenumber'];
    $stuid=$_POST['stuid'];
    $gender=$_POST['gender'];
    $password=md5($_POST['password']);
   


    $ret=mysqli_query($con, "select Email from tbluser where Email='$email' || MobileNumber='$mobno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
$msg="This email or Contact Number already associated with another account";
    }
    else{
    $query=mysqli_query($con, "insert into tbluser(FullName,Email,MobileNumber,StudentID,Gender,Password) value('$fullname','$email','$mobno','$stuid','$gender','$password')");
    if ($query) {
    $msg="You have successfully registered";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
}

}
 ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    
    <title>JNN Campus Recruitment Management System-Sign Up Page</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>
    <script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Password and Repeat Password field does not match');
document.signup.repeatpassword.focus();
return false;
}
return true;
} 

</script>
</head>
<body class="light">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
<main>
    <div id="primary" class="blue4 p-t-b-100 height-full responsive-phone">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="images/reg.jpg" alt=""style="margin-right: 0px;margin-left: 645px;">
                    <img src="images/png3 .png" alt=""style="margin-right: 0px;margin-left: 645px;">
                </div>
                <div class="col-lg-6 p-t-100" style="margin-left: 0px;border-left-width: 0px;padding-left: 0px;padding-right: 42px;border-right-width: 0px;margin-right: 0px;right: 518px;bottom: 139px;">
                    <div class="text-white">
                        <h1>Welcome</h1>
                        <p class="s-18 p-t-b-20 font-weight-lighter">Welcome to JNN Campus Recruitment Management System</p>
                    </div>
                   <form  action="" name="signup" method="post" onsubmit="return checkpass();" enctype="multipart/form-data">
                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group has-icon"><i class="icon-user-o"></i>
<input type="text" class="form-control form-control-lg no-b" name="fullname" id="fullname" placeholder="Full Name" required="true">
                                </div>
                            </div>
   

                               <div class="col-lg-12">
                                <div class="form-group has-icon"><i class="icon-user-o"></i>
<input type="email" class="form-control form-control-lg no-b" name="email" id="email" placeholder="Enter your email" required="true">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group has-icon"><i class="icon-user-secret"></i>
                                    <input type="text" name="mobilenumber" required="true" placeholder="Enter Your Mobile Number" maxlength="10" pattern="[0-9]+" class="form-control form-control-lg no-b">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group has-icon"><i class="icon-user-secret"></i>
                                    <input type="text" name="stuid" required="true" placeholder="Enter Student ID" class="form-control form-control-lg no-b">
                                </div>
                            </div>
                           <div class="col-lg-12">
              <label class="control-label" style="color: white">Gender: </label>
              <input type="radio" name="gender" id="gender" value="Female" checked="true"><strong style="color: white">Female</strong>
              <label>
              <input type="radio" name="gender" id="gender" value="Male"><strong style="color: white">Male</strong>
              </label>
             
            </div>

                            <div class="col-lg-12">
                                <div class="form-group has-icon"><i class="icon-user-secret"></i>
                                    <input type="password" name="password" required="true" class="form-control form-control-lg no-b"
                                           placeholder="Password">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group has-icon"><i class="icon-user-secret"></i>
                                    <input type="password" name="repeatpassword" required="true" class="form-control form-control-lg no-b"
                                           placeholder="Repeat Password">
                                </div>
                            </div>
                           
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-success btn-lg btn-block" name="submit" value="Sign Up">
            <p class="forget-pass text-white">
    <a href="login.php"> Already Have an Account ? </a></p>
                                <p class="forget-pass text-white"><a href="forgot-password.php"> Back to Home!!</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>

<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="assets/js/app.js"></script>
</body>
</html>