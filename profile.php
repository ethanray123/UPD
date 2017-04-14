<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("location: index.php");
    }
    require("conn.php");
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
    .greeting{
        position: relative;
        top: 15px;
        color: white;
    }.panel-heading{
        background-color: #2c3e50 !important;
        color: white !important;
    }
    footer{

    }
</style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UPD | Profile</title>

    <!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="css/animate.css">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index animated fadeIn">
<div id="skipnav"><a href="#maincontent">Skip to main content</a></div>

    <!-- Navigation -->
    <?php 
        require("navbar.php"); 

        $userinfoquery = mysqli_query($conn,"SELECT * FROM user WHERE user_id='{$_SESSION['user_id']}'");
        $row = mysqli_fetch_assoc($userinfoquery);
    ?>
    <!-- Contact Section -->
    <section id="profile">
        <div class='container-fluid'>
      <!-- Page Content -->
      <div class="container animated fadeIn">
        <div class="row"><br><br>
            <div class="col-sm-8" id="name"><h1><?php echo $_SESSION['name']?><br><br></h1></div>
        </div>
        <div class="row">
          <div class="col-sm-3"><!--left col-->
                  
              
               
              <!-- NOTICE: if you want to use the fa classes, add <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">  they add icons --> 
              <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"> 
              <div class="panel panel-default">
                <div class="panel-heading">Profile<i class="fa fa-link fa-1x"></i></div>

                <li class='list-group-item text-right' id='email'><span class='pull-left'><strong>Email</strong></span>
                  <?php if($row["email"]!=""){
                          echo $row["email"];
                        }else{
                          echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                        }
                  ?>
                </li>
                <li class='list-group-item text-right' id='address'><span class='pull-left'><strong>Address</strong></span>
                  <?php if($row["address"]!=""){
                          echo $row["address"];
                        }else{
                          echo "&nbsp;&nbsp;&nbsp;&nbsp;"; 
                        }
                  ?>
                </li>
                <li class='list-group-item text-right' id='dob'><span class='pull-left'><strong>Age</strong></span>
                  <?php if($row["dob"]!="" && $row["dob"]!="0000-00-00"){
                            echo date_diff(date_create($row['dob']), date_create('today'))->y;
                        }else{
                          echo "&nbsp;&nbsp;&nbsp;&nbsp;"; 
                        }
                  ?>
                </li>
                <li class='list-group-item text-right' id='contact_no'><span class='pull-left'><strong>Contact Number</strong></span>
                      <?php if($row["contact_no"]!=""){
                                echo $row["contact_no"];
                            }else{
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;"; 
                            }
                      ?>
                </li>

                </div> 
          </div><!--/col-3-->
          <div class="col-sm-9">
              
              <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#transactions" data-toggle="tab">Transactions</a></li>
                <!-- <li><a href="#notification" data-toggle="tab">Notifications</a></li> -->
                <li ><a href="#update" data-toggle="tab">Update Information</a></li>
              </ul>    
              <div class="tab-content">
                 <div class="tab-pane active posts animated fadeIn" id="transactions">
                  
                     <hr>
                      <!-- <nav aria-label="Page navigation" class="col-md-4 col-md-offset-4 text-center">
                        <ul class="pagination">
                          <li class="page-item"><a class="page-link" href="#home" data-toggle="tab">Home</a></li>
                          <li class="page-item"><a class="page-link" href="#messages" data-toggle="tab">Messages</a></li>
                          <li class="page-item"><a class="page-link" href="#update" data-toggle="tab">update</a></li>
                        </ul>
                      </nav> -->
                      <!-- <h4>Recent Transactions</h4> -->
                      <hr>
                 </div><!--/tab-pane-->
                 <!--<div class="tab-pane animated fadeIn" id="notification">
                   <h2></h2>
                   <ul class="list-group">
                       notification 
                   </ul> 
                   
                 </div> --><!--/tab-pane-->
                 <div class="tab-pane animated fadeIn" id="update">
                      <hr>
                      <form class="form updateinfo" action="updateinfo.php" method="post" id="updateform" autocomplete="off">
                          <div class="form-group">
                              <div class="col-xs-6">
                                  <label><h4>Email</h4></label>
                                  <input type="email" class="form-control" name="email" placeholder="you@email.com" title="Enter an Email">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-xs-6">
                                  <label><h4>Address</h4></label>
                                  <input type="text" class="form-control" name="address" placeholder="location" title="Enter a Location">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-xs-6">
                                 <label><h4>Contact Number</h4></label>
                                  <input type="text" class="form-control" name="contact_no" placeholder="Cell Phone Number" title="Enter your Contact Number">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-xs-6">
                                 <label><h4>New Password</h4></label>
                                  <input type="password" class="form-control" name="newpassword" placeholder="enter a new password" title="New password">
                              </div>
                          </div> 
                          <div class="form-group">
                              <div class="col-xs-6">
                                 <label><h4>Old Password</h4></label>
                                  <input type="password" class="form-control" name="oldpassword" placeholder="enter your old password" title="Current Password">
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

                      <hr><br><br>
                 </div><!--/tab-pane-->
              </div><!--/tab-content-->
              
          </div><!--/col-9-->
        </div><!--/row-->
      </div><!--/.container-->
      <div id="contribute" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 name="ctitle" id="ctitle" class="modal-title"></h4>
                  <input name="aid" type="hidden" value="" id="aid">
                </div>
                <div class="modal-body">
                  <input name="id" type="hidden" value="" id="id">
                  <textarea name="content" class="form-control write" id="ccontent" rows="7"></textarea>
                  <div class="modal-footer">
                    <h5 class="contri" id="cmax">170</h5>
                    <button type="button" class="btn btn-success" disabled="disabled" id="cbtn" data-dismiss="modal">Contribute</button>
                  </div>
                </div>
              </div>
            </div>
          </div>   
    </div><!--/container-fluid-->   
    </section>


    <!-- Footer -->
    <!-- <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>3481 Melrose Place
                            <br>Beverly Hills, CA 90210</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><span class="sr-only">Facebook</span><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><span class="sr-only">Google Plus</span><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><span class="sr-only">Twitter</span><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><span class="sr-only">Linked In</span><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><span class="sr-only">Dribble</span><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>About Freelancer</h3>
                        <p>Freelance is a free to use, open source Bootstrap theme created by <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Up Pharma Down 2016
                    </div>
                </div>
            </div>
        </div>
    </footer> -->

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
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

<script type="text/javascript">
    $(document).ready(function(){

        $('form.updateinfo').on('submit',function(){
          var that = $(this),
            url = that.attr('action'); 
            type = that.attr('method'); 
            data = {};

            that.find('[name]').each(function(index,value){
             var that = $(this),
               name = that.attr('name'), 
               value = that.val(); console.log(name+" "+value);
             data[name] = value;
            });

            $.ajax({
             url: url,
             type: type,
             data: data,
             dataType: "json",
             success: function(response){
               document.getElementById("updateform").reset();
               console.log(response);
               if(response == "EMAIL is not valid!"){
                  alert(response);
               }else if(response == "EMAIL already exists!"){
                  alert(response);
               }else if(response == "PASSWORD given did not match old password"){
                  alert(response);
               }else{
                   alert("User Information Updated!");
                   $('#username').children('h1').text(response.name);
                   if(response.email==""){
                      response.email = "&nbsp";
                   }
                   if(response.address==""){
                      response.address = "&nbsp";
                   }
                   if(response.contact_no==""){
                      response.contact_no = "&nbsp";
                   }
                   $('#email').html("<span class='pull-left'><strong>Email</strong></span>"+response.email);
                   
                   $('#address').html("<span class='pull-left'><strong>Address</strong></span>"+response.address);

                   $('#contact_no').html("<span class='pull-left'><strong>Contact Number</strong></span>"+response.contact_no);
               }
               
             },
             error: function(){
                alert("Something Went Wrong");
             }
            });
          return false;
        });
        

    });
    </script>