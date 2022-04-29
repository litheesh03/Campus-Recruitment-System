<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['crmscid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
   $cid=$_GET['editid'];
    $complogo=$_FILES["comlogo"]["name"];
$extension = substr($complogo,strlen($complogo)-4,strlen($complogo));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
   // Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Featured image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}

else
{
//rename company logo
$logo=md5($complogo).time().$extension;

     move_uploaded_file($_FILES["comlogo"]["tmp_name"],"images/".$logo);
     $query=mysqli_query($con, "update tblcompany set CompanyLogo ='$logo' where ID='$cid'");
    if ($query) {
    $msg="Company logo has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
    }
  }
}
  ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>JNN Campus Recruitment Management System-Change Company Logo</title>
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
                        Company Logo
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
                            <form method="post" enctype="multipart/form-data">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <?php
 $eid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblcompany where ID='$eid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <div class="form-group">
                                    <label for="inputAddress2" class="col-form-label">Company Logo</label>
                                    <img src="images/<?php echo $row['CompanyLogo'];?>" width="100" height="100" value="<?php  echo $row['CompanyLogo'];?>">
                                </div>
                                <div class="form-group">
                                            <label for="inputAddress2" class="col-form-label">New Company Logo</label>
                                            <input type="file" class="form-control" name="comlogo" required='true'>
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