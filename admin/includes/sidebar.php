<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


  ?>
<aside class="main-sidebar fixed offcanvas shadow">
    <section class="sidebar">
        <div class="w-80px mt-3 mb-3 ml-3">
 <h2 align="center">JNN CRMS</h2>
        </div>
        <div class="relative">
            <a data-toggle="collapse" href="#userSettingsCollapse" role="button" aria-expanded="false"
               aria-controls="userSettingsCollapse" class="btn-fab btn-fab-sm fab-right fab-top btn-primary shadow1 ">
                <i class="icon icon-cogs"></i>
            </a>
            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left image">
                        <img class="user_avatar" src="assets/img/dummy/image.png" alt="User Image">
                    </div>
                    <div class="float-left info">
                        <?php
$aid=$_SESSION['crmsaid'];
$ret=mysqli_query($con,"select AdminName from tbladmin where ID='$aid'");
$row=mysqli_fetch_array($ret);
$name=$row['AdminName'];

?>
                        <h6 class="font-weight-light mt-2 mb-1"><?php echo $name; ?></h6>
                        <a href="#"><i class="icon-circle text-primary blink"></i> Online</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="collapse multi-collapse" id="userSettingsCollapse">
                    <div class="list-group mt-3 shadow">
                        <a href="admin-profile.php" class="list-group-item list-group-item-action ">
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
            <li class="treeview"><a href="total-regcompany.php">
                <i class="icon icon icon-package blue-text s-18"></i> <span>Total Regd Company</span> 
            </a>
                
            </li>
            <li class="treeview"><a href="total-regusers.php">
                <i class="icon icon-account_box light-green-text s-18"></i> <span>Total Regd Users</span> 
            </a>
                
            </li>
             
            
            <li class="treeview"><a href="#"><i class="icon icon-documents3 text-blue s-18"></i>Pages<i
                    class="icon icon-angle-left s-18 pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="about-us.php"><i class="icon icon-circle-o"></i>About Us</a>
                    </li>
                    <li><a href="contact-us.php"><i class="icon icon-add"></i>Contact Us</a>
                    </li>
                    
                </ul>
            </li>
            <li class="treeview no-b"><a href="#">
                <i class="icon icon-package light-green-text s-18"></i>
                <span>Reports</span>
                
            </a>
                <ul class="treeview-menu">
                    <li><a href="between-dates-reports.php"><i class="icon icon-circle-o"></i>B/w dates Company Regd Reports</a>
                    </li>
                    <li><a href="vacancy-reports.php"><i class="icon icon-add"></i>Vacancy Reports</a>
                    </li>
                </ul>
            </li>
      
 
        </ul>
    </section>
</aside>