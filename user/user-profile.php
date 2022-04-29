<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['crmsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $uid=$_SESSION['crmsuid'];
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $mobno=$_POST['mobilenumber'];
    $stuid=$_POST['stuid'];
    $gender=$_POST['gender'];
    $add=$_POST['add'];
    $age=$_POST['age'];
    $dob=$_POST['dob'];
    
  
     $query=mysqli_query($con, "update tbluser set FullName ='$fullname', Email='$email',MobileNumber='$mobno',StudentID='$stuid',Gender='$gender',Address='$add',Age='$age',DOB='$dob' where ID='$uid'");
    if ($query) {
    $msg="Your profile has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
    }
  }
  ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>JNN Campus Recruitment Management System-User Profile</title>
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
<?php include_once('includes/sidebar.php');?>
<!--Sidebar End-->
<?php include_once('includes/header.php');?>
    <div class="page has-sidebar-left">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-package"></i>
                        User Profile
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="animatedParent animateOnce">
        <div class="container-fluid my-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                   
                        <div class="card-body b-b">
                            <form method="post">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <?php
$uid=$_SESSION['crmsuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4" class="col-form-label">Full Name</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?php  echo $row['FullName'];?>" required='true'>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputPassword4" class="col-form-label">Email</label>
                                        <input type="text" id="email" name="email" class="form-control" value="<?php  echo $row['Email'];?>" required='true'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress" class="col-form-label">Mobile Number</label>
                                    <input type="text" id="mobilenumber" name="mobilenumber" class="form-control" value="<?php  echo $row['MobileNumber'];?>" required='true'>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress" class="col-form-label">Student ID</label>
                                    <input type="text" id="stuid" name="stuid" class="form-control" value="<?php  echo $row['StudentID'];?>" required='true'>
                                </div>
                                
                                <div class="form-group">
              <label class="control-label">Gender: </label>
              <?php  if($row['Gender']=="Female"){ ?>
              <input type="radio" name="gender" id="gender" value="Female" checked="true">Female
              <input type="radio" name="gender" id="gender" value="male">Male
              <?php } else { ?>
              <label>
              <input type="radio" name="gender" id="gender" value="Male" checked="true">Male
              <input type="radio" name="gender" id="gender" value="Female">Female
              </label>
             <?php } ?>
            </div>
            
            <div class="form-group">
                                    <label for="inputAddress" class="col-form-label">Address</label>
                                    <input type="text" id="add" name="add" class="form-control" value="<?php  echo $row['Address'];?>"  required='true'>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2" class="col-form-label">Photo</label>
                                    <img src="images/<?php echo $row['Image'];?>" width="200" height="150" value="<?php  echo $row['Image'];?>"><a href="changeimage.php?editid=<?php echo $row['ID'];?>"> &nbsp; Upload Image</a>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2" class="col-form-label">Age</label>
                                    <input type="text" id="age" name="age" class="form-control" value="<?php  echo $row['Age'];?>"  required='true'>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2" class="col-form-label">Date of Birth</label>
                                    <input type="date" id="dob" name="dob" class="form-control" value="<?php  echo $row['DOB'];?>"  required='true'>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2" class="col-form-label">Registration Date</label>
                                    <input type="text" id="" name="" class="form-control" value="<?php  echo $row['UserRegdate'];?>"  readonly='true'>
                                </div>
                               <?php } ?>
                               
                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                
                    </div>
                </div>
         
            </div>
        </div>
    </div>
</div>
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="assets/js/app.js"></script>
</body>
</html>
<?php } ?>