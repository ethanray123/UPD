<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container-fluid">
            <div>
                <ul class="nav navbar-nav">
                  <li class=""><a href="cart.php">View Drugs</a></li>
                    <?php
                        if(isset($_SESSION['name'])){ 
                            echo "<li class=''><a href='profile.php'>Your Profile</a></li>";
                        }
                    ?>
                </ul>
                <div class="pull-right nav navbar-nav">
                    <?php 
                        if(isset($_SESSION['name'])){ 
                            echo "<a class='btn btn-md btn-outline' href='logout.php' style='margin-top:2px;'>
                                    <span class='glyphicon glyphicon-off' aria-hidden='true' aria-label='Log-out'></span>
                                </a>";
                        }else{
                            echo "<form class='form-inline' method='post' action='login_check.php' autocomplete='off' style='margin-top:10px;'> 
                                    <input type='email' name='email' class='form-control' placeholder='Email' autocomplete='off' />
                                    <input type='password' name='password'  class='form-control' placeholder='Password'>
                                    <button class='btn btn-success'>Login</button>
                                </form>";
                        }
                    ?>
                </div>
            </div>
            <!-- Brand and toggle get grouped for better mobile display -->
            <!-- <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand pull-center" href="#page-top">Up Pharma Down</a>
            </div> -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio">Portfolio</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">About</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Contact</a>
                    </li>
                </ul>
            </div> -->
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>