<?php
include("connect.php");
if(isset($_GET['hr']))
{
    $hd=$_GET['hr'];
    $n=mysqli_query($dbcon,"select * from hosreg where uid='$hd'");
    if(mysqli_num_rows($n)>0)
    {
        $nr=mysqli_fetch_row($n);
    }
    
    
    
    
    
    
    
    $nb=mysqli_query($dbcon,"select * from blood where hid='$hd'");
    if(mysqli_num_rows($nb)>0)
    {
        $nbl=mysqli_fetch_row($nb);
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
            <h1 class="display-3 text-white mb-3 animated slideInDown">Hospital Search</h1>
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
                
                
                <section class="about py-5">
		<div class="container py-xl-5 py-lg-3">
			<div class="title-section mb-md-5 mb-4">
				<h6 class="w3ls-title-sub">Welcome to</h6>
				<h3 class="w3ls-title text-uppercase text-bl font-weight-bold"><?php echo $nr[1] ?></h3>
			</div>
			<div class="row">
				<div class="col-lg-6 agileits_works-grid">
					<div class="wthree-bottom">
						<h6 class="subheading-w3ls text-uppercase text-bl mb-4">About US</h6>
                                                <p>
                                                    <?php
                                                $na=mysqli_query($dbcon,"select * from about_us where hid='$hd'order by id desc");
                                                if(mysqli_num_rows($na)>0)
                                                {
                                                  $nrn=mysqli_fetch_row($na);
                                                  ?>
                                                  
                                                        <?php echo $nrn[2] ?>
                                                    
                                                <?php
                                                }
                                                
                                                
                                                ?>
                                                </p>
					</div>
				</div>
				<div class="col-lg-6 agileits_works-grid1 mt-lg-0 mt-sm-5 mt-4">
                                    <img style="width: 100%;height: 250px" src="pic/<?php echo $nr[13] ?>" alt="" class="img-fluid" />
				</div>
			</div>
		</div>
            <div class="container py-xl-5 py-lg-3">
                
                
                
					<form method="post">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th colspan="2" style="color: steelblue; font-size: 20px ">
                                                    DETAILS
                                                </th>
                                            </tr>
                                            <tr>
                                                <th style="color: steelblue;font-size: 15px">
                                                    NAME
                                                </th>
                                                
                                                <th>
                                                    <?php echo $nr[1] ?>
                                                </th>
                                            </tr>
                                            
                                            <tr>
                                                <th style="color: steelblue;font-size: 15px">
                                                    ADDRESS
                                                </th>
                                                
                                                <th>
                                                    <?php echo $nr[2] ?>
                                                </th>
                                            </tr>
                                            
                                            <tr>
                                                <th style="color: steelblue;font-size: 15px">
                                                    CONTACT NO
                                                </th>
                                                
                                                <th>
                                                    <?php echo $nr[6] ?>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th style="color: steelblue;font-size: 15px">
                                                    E-MAIL
                                                </th>
                                                
                                                <th>
                                                    <?php echo $nr[5] ?>
                                                </th>
                                            </tr>
                                        </table>
                                            
                                            
                                            
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th colspan="2" style="color: steelblue; font-size: 20px ">
                                                        DEPARTMENTS
                                                    </th>
                                                </tr>
                                                <?php
                                                
                                                $nd=mysqli_query($dbcon,"select * from add_dep where hosid='$hd'");
                                                    if(mysqli_num_rows($nd)>0)
                                                             {
                                                              while($nrd=mysqli_fetch_row($nd))
                                                              {
                                                
                                                ?>
                                                <tr>
                                                    <th>
                                                        <?php echo $nrd[2] ?>
                                                    </th>
                                                </tr>
                                                <?php
                                                              }
                                                             }
                                                             ?>
                                            </table>
                                            
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th colspan="3" style="color: steelblue; font-size: 20px ">
                                                        DOCTORS
                                                    </th>
                                                    
                                                </tr>
                                                <tr>
                                                    <th style="color: steelblue; font-size: 15px ">
                                                        NAME                                                    </th>
                                                    <th style="color: steelblue; font-size: 15px ">
                                                        DEPARTMENT
                                                    </th>
                                                    <th>
                                                        
                                                    </th>
                                                </tr>
                                                <?php
                                                $ndo=mysqli_query($dbcon,"select * from add_doc where hid='$hd'");
                                                    if(mysqli_num_rows($ndo)>0)
                                                    {
                                                     
                                                    while($ndc=mysqli_fetch_row($ndo))
                                                    {
                                                
                                                ?>
                                                <tr>
                                                    <th>
                                                        <?php echo $ndc[3] ?>
                                                    </th>
                                                    <th>
                                                        <?php echo $ndc[2] ?>
                                                    </th>
                                                    <th>
                                                        <img src="pic/<?php echo $ndc[18] ?>"style="width:100px;height: 100px">
                                                    </th>
                                                </tr>
                                                
                                                <?php
                                                    }
                                                    }
                                                    ?>
                                            </table>
                                            
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th colspan="2" style="color: steelblue; font-size: 20px ">
                                                        FACILITIES
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th style="color: steelblue;font-size: 15px">
                                                        Blood Bank
                                                    </th>
                                                    <th>
                                                        <?php echo $nbl[2] ?>
                                                    </th>
                                                </tr>
                                                
                                                <tr>
                                                    <th style="color: steelblue;font-size: 15px">
                                                        Ventilator
                                                    </th>
                                                    <th>
                                                    <?php
                                                    $nv=mysqli_query($dbcon,"select * from ventilator where hid='$hd'");
                                                    if(mysqli_num_rows($nv)>0)
                                                     {
                                                          $nbv=mysqli_fetch_row($nv);
                                                          ?>
                                                          
                                                        <?php echo $nbv[2] ?>
                                                   
                                                    <?php
                                                         }
                                                    
                                                    
                                                    ?>
                                                    </th> 
                                                </tr>
                                            </table>
                                    </form>
                                
                               
            </div>
	</section>
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
                        Designed By <a class="border-bottom" href="#">MEDI-CARE</a>
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
</body>

</html>