<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


  ?>
<aside class="main-sidebar fixed offcanvas shadow">
    <section class="sidebar">
        <div class="w-80px mt-3 mb-3 ml-3">
        <h2 align="center"> CRMS</h2>
        </div>
        <div class="relative">
            <a data-toggle="collapse" href="#userSettingsCollapse" role="button" aria-expanded="false"
               aria-controls="userSettingsCollapse" class="btn-fab btn-fab-sm fab-right fab-top btn-primary shadow1 ">
                <i class="icon icon-cogs"></i>
            </a>
            <div class="user-panel p-3 light mb-2">
                <div>

<?php
$cid=$_SESSION['crmscid'];
$ret=mysqli_query($con,"select CompanyName,CompanyLogo from tblcompany where ID='$cid'");
$row=mysqli_fetch_array($ret);
$name=$row['CompanyName'];
$logo=$row['CompanyLogo'];
?>

                    <div class="float-left image">
<img class="user_avatar" src="images/<?php echo $logo; ?>" alt="<?php echo $name; ?>" height="60">
                    </div>
                    <div class="float-left info">

                        <h6 class="font-weight-light mt-2 mb-1"><?php echo $name; ?></h6>
                        <a href="#"><i class="icon-circle text-primary blink"></i> Online</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="collapse multi-collapse" id="userSettingsCollapse">
                    <div class="list-group mt-3 shadow">
                        <a href="company-profile.php" class="list-group-item list-group-item-action ">
                            <i class="mr-2 icon-umbrella text-blue"></i>Profile
                        </a>
                        <a href="change-password.php" class="list-group-item list-group-item-action"><i
                                class="mr-2 icon-cogs text-yellow"></i>Settings</a>
                        <a href="logout.php" class="list-group-item list-group-item-action"><i
                                class="mr-2 icon-security text-purple"></i>Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu">
            
            <li class="treeview"><a href="dashboard.php">
                <i class="icon icon-sailing-boat-water purple-text s-18"></i> <span>Dashboard</span> 
            </a>
                
            </li>
            <li class="treeview"><a href="#">
                <i class="icon icon icon-package blue-text s-18"></i>
                <span>Post Vacancy</span>
                
            </a>
                <ul class="treeview-menu">
                    <li><a href="add-vacancy.php"><i class="icon icon-circle-o"></i>Add Vacancy</a>
                    </li>
                    <li><a href="manage-vacancy.php"><i class="icon icon-add"></i>Manage Vacancy </a>
                    </li>
                </ul>
            </li>
            <li class="treeview"><a href="#"><i class="icon icon-documents3 text-blue s-18"></i>Job Applications<i
                    class="icon icon-angle-left s-18 pull-right"></i></a>
                <ul class="treeview-menu">
<li><a href="new-applications.php"><i class="icon icon-circle-o"></i> New Applications</a>
                    </li>
                    <li><a href="sort-listed-applications.php"><i class="icon icon-check"></i> Sort Listed Applications</a>
                    </li>
                    <li><a href="rejected-applications.php"><i class="icon icon-close"></i>Rejected Applications</a>
                    </li>
                    <li><a href="all-applications.php"><i class="icon icon-circle-o"></i> All Applications</a>
                    </li>
                </ul>
            </li>
           
            
            <li class="treeview ">
                <a href="#">
                    <i class="icon icon-package text-lime s-18"></i> <span>Reports</span>
                    <i class="icon icon-angle-left s-18 pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="vacancy-reports.php"><i class="icon icon-circle-o"></i>Vacancy Reports</a>
                    </li>
                    <li><a href="application-counts-reports.php"><i class="icon icon-date_range"></i>Applications Count Reports</a>
                    </li>
                    
                </ul>
            </li>
    
        </ul>
    </section>
</aside>