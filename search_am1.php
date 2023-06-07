<?php
include("connect.php");

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
            <h1 class="display-3 text-white mb-3 animated slideInDown">Ambulance Search</h1>
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
            <div class="row"id="client">
                
                
                <div class="row pt-md-0">
                            <div class="col-lg-7 contact-agileits-w3layouts">
                                
                                <form method="post" enctype="multipart/form-data">
                                            <center>
                                            
                                                 <?php

if(isset($_GET['aid']))
{
     $aid=$_GET['aid'];
     $sel=mysqli_query($dbcon,"select * from image where acc_id='$aid' limit 1");
    $r=mysqli_fetch_row($sel);
    $la=$r[4];
    $lo=$r[5];
    $sel=mysqli_query($dbcon,"SELECT id,nme,la,lo,addr,cont,uid, SQRT( POW(69.1 * (la - $la), 2) + POW(69.1 * ($lo - lo) * COS(la / 57.3), 2)) AS distance FROM amb where st='1' HAVING distance < 60 ORDER BY distance");
    $i=0;
    if(mysqli_num_rows($sel)>0)
{
   

    while($r=mysqli_fetch_row($sel))
    {
         
        
        
        
        
       
        ?>
                                        
                                      
                                    
                                        
                                           
                                        
                                   
                                    
                                   
                                    <table class="table table-bordered ">
                                        <tr>
                                            <th>
                                                <label style="color: gray"> NAME</label>
                                            </th>
                                            <th>Contact</th>
                                            <th>*</th>
                                        </tr>
                                       
                                        <tr>
                                            <th style="color: grey" >
                                                <?php echo $r[1]?>
                                            </th>
                                            <th style="color: grey" >
                                                <?php echo $r[5]?>
                                            </th>
                                            
                                            <th>
                                                <a href="search_am1.php?mid=<?php echo $r[0] ?>&t=1&aid=<?php echo $_GET['aid'] ?>" style="text-decoration: none;display: block;width: 65px;background-color: lightgray;border-radius: 5px;padding: 5px;">View</a>
                                            </th>
                                        </tr>
                                        
                                        
                                        
                                    </table>
                                    <?php
$i++;
    }
    }
    
 else {
       echo 'no data found';
    }
    
}

?>
                                            </center>
                                            
                                            <?php
                                            if (isset($_GET['success']))
                                            {
                                                if($_GET['success']=="1")
                                                {
                                                    echo"Your registration successfully completed";
                                                }
                                                if($_GET['success']=="2")
                                                {
                                                    echo "Error found!Try again! ";
                                                }
                                            }
                                            
                                            ?>
                                            
					    </form>
                            
                                
                                
                            </div>
                            
                            <div class="col-lg-5 regstr-r-w3-agileits mt-lg-0 mt-5">
                            
                            
                            
                                    
                                    <center>
                                    <?php
                                        if(isset($_GET['t']))
                                        {
                                          if($_GET['t']==1)
                                          {
                                              $sel_m1=mysqli_query($dbcon,"select * from amb where id=".$_GET['mid']);
                                              $r_m1=  mysqli_fetch_row($sel_m1);                                              
                                              ?>
                           
                           
                           
                           <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">


            <div class="card hovercard">
                <div class="cardheader">

                </div>
                <div class="avatar">
                    <img alt="" src="img1/<?php echo $r_m1[7] ?>">
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" href=""><?php echo $r_m1[1] ?></a>
                    </div>
                    
                    <div class="desc">Address:<?php echo $r_m1[2] ?></div>
                    <div class="desc">Email:<?php echo $r_m1[3] ?></div>
                    <div class="desc">Contact:<a href="tel:<?php echo $r_m1[4] ?>"><?php echo $r_m1[4] ?></a></div>
                    
                </div>
                <div class="bottom">
                 
                    
                </div>
            </div>

        </div>

	</div>
            </div>
             <?php
                                          }
                                        }
                                          ?>
            
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