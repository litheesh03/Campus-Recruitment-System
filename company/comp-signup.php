
<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $comname=$_POST['comname'];
    $conperson=$_POST['conperson'];
    $comurl=$_POST['comurl'];
    $compadd=$_POST['compadd'];
    $mobno=$_POST['mobilenumber'];
    $compemail=$_POST['compemail'];
    $password=md5($_POST['password']);
   
    $logo=$_FILES["complogo"]["name"];
$extension = substr($logo,strlen($logo)-4,strlen($logo));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Featured image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename images
$complogo=md5($logo).time().$extension;
 move_uploaded_file($_FILES["complogo"]["tmp_name"],"images/".$complogo);
    $ret=mysqli_query($con, "select CompanyEmail from tblcompany where CompanyEmail='$compemail' || MobileNumber='$mobno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
$msg="This email or Contact Number already associated with another account";
    }
    else{
    $query=mysqli_query($con, "insert into tblcompany(CompanyName,ContactPerson,CompanyUrl,CompanyAddress, MobileNumber, CompanyEmail,CompanyLogo,Password) value('$comname','$conperson','$comurl','$compadd', '$mobno', '$compemail','$complogo','$password')");
    if ($query) {
    $msg="You have successfully registered";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
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
                    <img src="assets/img/icon/company-registration.jpg" height="700" width="600" alt="">
                </div>
                <div class="col-lg-6 p-t-100">
                    <div class="text-white">
                        <h1>Welcome</h1>
                        <p class="s-18 p-t-b-20 font-weight-lighter">Welcome to Campus Recruitment Management System</p>
                    </div>
                   <form method="post" action="" name="signup" method="post" onsubmit="return checkpass();" enctype="multipart/form-data">
                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group has-icon"><i class="icon-user-o"></i>
<input type="text" class="form-control form-control-lg no-b" name="comname" id="comname" placeholder="Name of Company" required="true">
                                </div>
                            </div>
   <div class="col-lg-12">
                                <div class="form-group has-icon"><i class="icon-user-o"></i>
<input type="text" class="form-control form-control-lg no-b" name="conperson" id="conperson" placeholder="Name of Contact Person" required="true">
                                </div>
                            </div>

                               <div class="col-lg-12">
                                <div class="form-group has-icon"><i class="icon-user-o"></i>
<input type="email" class="form-control form-control-lg no-b" name="compemail" id="compemail" placeholder="Email of Company" required="true">
                                </div>
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
                                <div class="form-group has-icon"><i class="icon-user-secret"></i>
                                    <input type="text" name="mobilenumber" required="true" placeholder="Enter Your Mobile Number" maxlength="10" pattern="[0-9]+" class="form-control form-control-lg no-b">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group has-icon"><i class="icon-user-secret"></i>
                                    <input type="text" name="comurl" required="true" placeholder="Enter Company URL" class="form-control form-control-lg no-b">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group has-icon"><i class="icon-user-secret"></i>
                                    <input type="text" name="compadd" required="true" placeholder="Address of Company" class="form-control form-control-lg no-b">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group has-icon"><i class="icon-user-secret"></i>
 <input type="file" name="complogo" required="true" class="form-control form-control-lg no-b" title="Company logo">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-success btn-lg btn-block" name="submit" value="Sign Up">
                                <p class="forget-pass text-white"><a href="login.php"> Already Have an Account</a></p>
                                <p class="forget-pass text-white"><a href="../index.php"> Back to Home!!</a></p>
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