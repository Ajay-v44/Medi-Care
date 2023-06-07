
<?php
include("connect.php");
if(isset($_POST['sub1']))
{
    $us=$_POST['us'];
    $ps=$_POST['ps'];
    $s=mysqli_query($dbcon,"select * from user_login where uid='$us'and pwd='$ps' and status=1");
    if(mysqli_num_rows($s)>0)
    {
        session_start();
        
        $r=mysqli_fetch_row($s);
        if($r[3]=="admin")
        {
            
            $_SESSION['adm']=$us;
            header("location:admin/admin.php");
        }
        if($r[3]=="hospital")
        {
          $_SESSION['hos']=$us;
          header("location:hospital/hospital.php");
        }
        
        if($r[3]=="staff")
        {
          $_SESSION['stf']=$us;
          header("location:staff/staffhome.php");
        }
        if($r[3]=="control")
        {
          $_SESSION['con']=$us;
          header("location:control/conhome.php");
        }
        if($r[3]=="tp")
        {
          $_SESSION['tp']=$us;
          header("location:police/check.php");
        }
        if($r[3]=="amb")
        {
          $_SESSION['uid']=$us;
          header("location:amb/amb_home.php");
        }
        if($r[3]=="ins")
        {
          $_SESSION['uid']=$us;
          header("location:inc_home.php");
        }
        
    }
 else {
        header("location:login.php?lo=2");    
    }
    
}

if(isset($_POST['submit']))
{
   
    $t1=$_POST['t1'];
    $t2=$_POST['t2'];
    $t3=$_POST['t3'];
    $t4=$_POST['t4'];
    $t5=date("Y/m/d");
    if(empty($t1||$t2||$t3||$t4))
    {
        echo"<script>alert('Please fill out the fields')</script>";
    }
    else{
        
    $q=mysqli_query($dbcon,"insert into feedback values('','$t1','$t2','$t3','$t4','$t5','0')");
    
        }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="temp/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="temp/lib/animate/animate.min.css" rel="stylesheet">
    <link href="temp/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="temp/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="temp/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="temp/css/style.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <?php
    
    include 'menu.php';
    
    ?>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Write Your Feedback</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#"><?php echo $title ?></a></li>
                    
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
        
        <div class="row pt-md-0">
				<div class="col-lg-8">
					
                                    
                                    <form method="post" enctype="multipart/form-data">
						<div class="form-row">
								<div class="col-md-12 mb-3">
										<label for="validationCustom01">Name</label>

                                                                                <input type="text"name="t1"  class="form-control"  placeholder="" required="" onkeypress="return onlyAlphabets(event,this);"
                                                        oninvalid="InvalidMsg6(this);" 
                                                        oninput="InvalidMsg6(this);"  minlength="4">
								</div>
								
							</div>
                                    
                                    
                                    
							
                                   
								<div class="form-group col-md-12">
										<label for="exampleInputPassword1 mb-2">Contact</label>
                                                                              <span>  <input type="text"name="t2" required="" minlength="10" maxlength="10" class="form-control" name="t5"  onkeyup="chkc(this.value)"  onkeypress="return isNumber(event)" /><span id="o3"></span></span>
								</div>
								<div class="form-group col-md-12">
										<label for="exampleInputPassword2 mb-2">Email</label>
                                                                                <input type="email"name="t3" required="" class="form-control" name="t6"  oninvalid="InvalidMsg4(this);" 
           oninput="InvalidMsg4(this);" >
									</div>
								
							
                                    <div class="form-row">
								<div class="col-md-12 mb-3">
										<label for="validationCustom01">Message</label>

                                                                                <textarea name="t4" class="form-control"required="" minlength="10" ></textarea>
								</div>
								
							</div>
                                    
                                    <input type="submit" name="submit" value="SEND NOW "class="btn btn-primary w-100 py-3">
															
						</form>
                        <?php
                        if(isset($_POST['submit']))
                        {
                            echo '<script> swal("MEDI-CARE", "Thankyou for your valuable words !", "info");</script>';
                        }
                        ?>
                                    
				</div>
                            <div class="col-lg-4 regstr-r-w3-agileits mt-lg-0 mt-5">
                                
                                
                                
                                <img style="width: 100%;height: 400px" src="gif/ab3f5b02e9c1da5bc96cad2c0eafbe63_1.gif">
            
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzXv05Tg7stti5DyuH1_FmXPWKFS9EkHE&libraries=places&callback=initAutocomplete"
         async defer></script>
        
           
                            </div>
			</div>
        
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
       
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="temp/#">MEDI-CARE</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="#">Team MEDI-CARE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="temp/#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="temp/lib/wow/wow.min.js"></script>
    <script src="temp/lib/easing/easing.min.js"></script>
    <script src="temp/lib/waypoints/waypoints.min.js"></script>
    <script src="temp/lib/counterup/counterup.min.js"></script>
    <script src="temp/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="temp/lib/tempusdominus/js/moment.min.js"></script>
    <script src="temp/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="temp/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="temp/js/main.js"></script>
    <script src="csinvalid.js"></script>
</body>

</html>
