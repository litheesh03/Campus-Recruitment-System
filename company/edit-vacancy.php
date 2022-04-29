<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['crmscid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $jid=$_GET['editid'];
    $jtitle=$_POST['jobtitle'];
    $salary=$_POST['salary'];
    $jobdecs=$_POST['jobdecs'];
    $noofopenings=$_POST['noofopenings'];
    $jobloc=$_POST['jobloc'];
    $applydate=$_POST['applydate'];
    $lastdate=$_POST['lastdate'];
     
    $query=mysqli_query($con, "update tblvacancy set JobTitle='$jtitle',MonthlySalary='$salary',JobDescriptions='$jobdecs',NoofOpenings='$noofopenings',JobLocation='$jobloc',ApplyDate='$applydate',LastDate='$lastdate' where  ID='$jid'");
    if ($query) {
    $msg="Job Detail Has been Updated.";
  }
  else
    {
        $msg="Something Went Wrong. Please try again";
    }

  
}
  ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
   
    <title>JNN Campus Recruitment Management System-Update Vacancy</title>
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
                        Update Vacancy
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
                            <p>Job Information</p>
                        </div>
                        <div class="card-body b-b">
                            <form method="post">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <?php
 $jid=$_GET['editid'];
$ret=mysqli_query($con,"select * from  tblvacancy where ID='$jid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4" class="col-form-label">Job Title</label>
                                        <input type="text" class="form-control" id="jobtitle" name="jobtitle" required="true" 
                                               value="<?php  echo $row['JobTitle'];?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4" class="col-form-label">Monthly In-hand Salary </label>
                                        <input type="text" class="form-control" id="salary" name="salary" 
                                               value="<?php  echo $row['MonthlySalary'];?>" required="true">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress" class="col-form-label">Job Descriptions</label>
                                    <textarea type="text" class="form-control" id="jobdecs" name="jobdecs" 
                                            required="true"><?php  echo $row['JobDescriptions'];?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress" class="col-form-label">Job Location</label>
                                    <input type="text" class="form-control" id="jobloc" name="jobloc" 
                                           value="<?php  echo $row['JobLocation'];?>" required="true">
                                </div>
                               
                                <div class="form-row">
                                    
                            <div class="card-title">No of Opening</div>
                            <div class="input-group">
                                <input type="text" class="form-control"
                                        name="noofopenings" required="true"  value="<?php  echo $row['NoofOpenings'];?>">
                                
                            </div>
                       
                                   
                                    
                            <div class="card-title" style="padding-top: 20px">Apply Date</div>
                            <div class="input-group">
                                <input type="text" class="date-time-picker form-control"
                                       data-options='{"timepicker":false, "format":"d-m-Y"}' id="applydate" name="applydate" required="true" value="<?php  echo $row['ApplyDate'];?>">
                                <span class="input-group-append">
                                    <span class="input-group-text add-on white">
                                        <i class="icon-calendar"></i>
                                    </span>
                                </span>
                            </div>
                        
                                  
                                    
                            <div class="card-title" style="padding-top: 20px">Last Date</div>
                            <div class="input-group">
                                <input type="text" class="date-time-picker form-control"
                                       data-options='{"timepicker":false, "format":"d-m-Y"}' id="lastdate" name="lastdate" required="true" value="<?php  echo $row['LastDate'];?>">
                                <span class="input-group-append">
                                    <span class="input-group-text add-on white">
                                        <i class="icon-calendar"></i>
                                    </span>
                                </span>
                            </div>
                       
                                   
                                </div>
                                <?php } ?>
                               <hr />
                                <button type="submit" class="btn btn-primary" name="submit">Update</button>
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
<?php }  ?>