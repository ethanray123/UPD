<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<style type="text/css">
    .btn{
        color: white;
        padding: 
        background-color: #18BC9C;
        border-radius: 0px;
        font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
    }
    #register{
        padding-top: 30px;
    }
</style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Up Pharma Down - Drug Database</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

</head>

<body id="page-top" class="index animated fadeIn">
<div id="skipnav"><a href="#maincontent">Skip to main content</a></div>

    <!-- Navigation -->
    <?php require("navbar.php"); ?>

    <!-- Header -->
    <header>
        <div class="container" id="maincontent" tabindex="-1">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-circle" src="img/updlogo.png" alt="">
                    <div class="intro-text">
                        <h1 class="name">Up Pharma Down</h1>
                        <hr class="star-light">
                        <span class="skills">Point of Sales, Inventory and Delivery System</span>
                    </div>
            <br><br>
            <br><br>
            <br>
                </div>
            </div>
        </div>
    </header>
    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Sign Up</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 ">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <!-- logincheck.php -->
                    
                    <!-- fullname email add pass retype pass address date of birth contact no -->
                    <!-- floating-label-form-group controls -->
                    <form class="form" action="register.php" method="post" autocomplete="off">
                          <div class="form-group">
                              <div class="col-xs-6">
                                  <label><h4>Full Name</h4></label>
                                  <input type="text" class="form-control" name="name" placeholder="John Doe" title="Enter Your Name" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-xs-6">
                                  <label><h4>Email Address</h4></label>
                                  <input type="email" class="form-control" name="email" placeholder="you@email.com" title="Enter an Email" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-xs-6">
                                 <label><h4>Password</h4></label>
                                  <input type="password" class="form-control" name="password" placeholder="Enter Password" title="Enter a Password" required>
                              </div>
                          </div> 
                          <div class="form-group">
                              <div class="col-xs-6">
                                 <label><h4>Retype Password</h4></label>
                                  <input type="password" class="form-control" name="password2" placeholder="Retype Password" title="Retype Password" required>
                              </div>
                          </div> 
                          <div class="form-group">
                              <div class="col-xs-6">
                                 <label><h4>Date of Birth</h4></label>
                                  <input type="date" class="form-control" name="dob" title="Enter your Birthdate" required>
                              </div>
                          </div> 
                          <div class="form-group">
                              <div class="col-xs-6">
                                  <label><h4>Address</h4></label>
                                  <input type="text" class="form-control" name="address" placeholder="Location" title="Enter a Location" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-xs-6">
                                 <label><h4>Contact Number</h4></label>
                                 <input type="text" class="form-control" name="contact_no" placeholder="Cell Phone Number" title="Enter your Contact Number" required>
                                 <input type="hidden" name="type" value="consumer">
                              </div>
                          </div>
                          
                          
                          <div class="form-group">
                               <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-md btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                    <button class="btn btn-md" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p>Up Pharma Down is a website designed to store information related to the drugs served at your nearby pharmacy. In addition it gives you the option of buying your medicine online and having it delivered to your respected home for you to pay on delivery.</p> 
                    <p></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Up Pharma Down 2017
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>


    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

</body>

</html>
<script>
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() > $(document).height() - 100) {  //+ $(window).scrollTop()
                $(".scroll-top").removeClass("hidden");
            }else{
                $(".scroll-top").addClass("hidden");
            }
        });
    });    
</script>
