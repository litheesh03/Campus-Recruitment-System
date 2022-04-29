 <header>
                    <div class="top-head ml-lg-auto text-center">
                        <div class="row">

                            <div class="col-md-4">
                                <span>Welcome!</span>
                            </div>
<?php

 if($_SESSION['crmsuid']==0){?>

                            <div class="col-md-3 sign-btn">
                                <a href="user/login.php" data-target="#exampleModalCenter">
                                    <i class="fas fa-lock"></i> Sign In</a>
                            </div>
                            <div class="col-md-3 sign-btn">
                                <a href="user/user-signup.php" data-target="#exampleModalCenter2">
                                    <i class="far fa-user"></i> Register</a>
                            </div>
                           <?php } else {?>

                            <div class="col-md-5 sign-btn">
                                <a href="user/user-signup.php" data-target="#exampleModalCenter2">
     <i class="far fa-user"></i> <?php echo $_SESSION['fname'];?></a> | <a href="user/logout.php">Logout </a>
                            </div>
                           <?php } ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="logo">
                            <h1>
                                <a class="navbar-brand" href="index.php">
                                <img src="https://cdn.npfs.co/uploads/college/image/5cb8a02ed2f9e786643619_logo2.png" alt=" " style="width:338px; height:168px;"></a>
                            </h1>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <i class="fas fa-bars"></i>
                            </span>

                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-lg-auto text-center">
                                <li class="nav-item">
                                    <a  class="nav-link" href="index.php">Home
                                       
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.php">About Us</a>
                                </li>
<?php

 if($_SESSION['crmsuid']==0){?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Student
                                        <i class="fas fa-angle-down"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="user/login.php">Sign In</a>
                                        <a class="dropdown-item" href="user/user-signup.php" title="">Sign Up</a>
                                       
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="admin/login.php">Admin</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Company
                                        <i class="fas fa-angle-down"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="company/login.php"> Sign In</a>
                                        <a class="dropdown-item" href="company/comp-signup.php">Sign Up</a>
                                       
                                    </div>
                                </li>

                            <?php } else {?>
  <li class="nav-item active" style="border-bottom-width: 7‒;padding-top: 27px;"> 
                                    <a class="btn" href="user/dashboard.php">User Dashboard</a> </li> <a class="nav-link" href="jobs-listed.php"> Listed Job</a>
                                </li>
                            <?php } ?>
                                <li class="nav-item">
                                    
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contact</a>
                                </li>
                            </ul>

                        </div>
                    </nav>
                </header>