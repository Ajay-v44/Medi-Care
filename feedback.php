<?php
include("connect.php");
if(isset($_POST['fdk']))
{
    $un=$_POST['un'];
     $uid=$_POST['ud'];
    $hn=$_POST['hs'];
    $fd=$_POST['fd'];
    $ptyp=$_POST['ptyp'];
    
    $fin=mysqli_query($dbcon,"insert into feedback values('','$hn','$un','$fd','$ptyp')");
    if($fin>0)
    {
        header("location:feedback.php?sc=1");
    }
    
 else {
      header("location:feedback.php?sc=2");  
    }
}

if(isset($_POST['cmp']))
{
  $usn=$_POST['usn'];
 $usid=$_POST['usid'];
    $hsd=$_POST['hsd'];
    $wc=$_POST['wc']; 
    
    $cdn=  mysqli_query($dbcon,"select * from ptreg");
    if(mysqli_num_rows($cdn)>0)
    {
        $cnr=mysqli_fetch_row($cdn);
        $cd=$cnr[10];
    }
    if($usid==$cd)
    {
    $cin=mysqli_query($dbcon,"insert into feedback values('','$hsd','$usn','$wc','0')");
    if($cin>0)
    {
      header("location:feedback.php?dc=1");  
    }
    }
    else {
      header("location:feedback.php?dc=2");  
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
            <div class="row"id="client">
                
                
                <div class="row pt-md-0">
				<div class="col-lg-6 contact-agileits-w3layouts">
					
                                    
                                  <form method="post">
                                            <script>
                                            function loadudata(x)
                                            {
                                                var xmlhttp = new XMLHttpRequest();
                                                xmlhttp.onreadystatechange = function() {
                                                    if (this.readyState == 4 && this.status == 200) {
                                                        var data = this.responseText;
                                                        if(data=="0")
                                                        {
                                                            $("#fdk").hide();
                                                            $("#fdk1").show();
                                                        }
                                                        else
                                                        {
                                                            $("#fdk1").hide();
                                                            $("#fdk").show();
                                                            var data1=data.split(",");
                                                            document.getElementById("nm").value=data1[0];
                                                            document.getElementById("hs").value=data1[1];
                                                        }
                                                    }
                                                };
                                                xmlhttp.open("GET", "loadpdata.php?q=" + x, true);
                                                xmlhttp.send();
                                            }
                                            </script>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th colspan="2" style="color: steelblue;font-size: 20px">
                                                      Post Feedback 
                                                    
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th style="color: gray">
                                               Communication ID
                                                    </th>
                                                    <th>
                                                        <input type="text" name="ud" onblur="loadudata(this.value)" class="form-control">
                                                    </th>
                                                </tr>
                                                
                                                <tr>
                                                    <th style="color: gray">
                                               Name
                                                    </th>
                                                    <th>
                                                        <input type="text" name="un" id="nm" class="form-control">
                                                    </th>
                                                </tr>                                               
                                                <tr>
                                                    <th style="color: gray">
                                                        Hospital ID
                                                    </th>
                                                    <th>
                                                        <input type="text" name="hs" id="hs" class="form-control">
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td>Post Type</td>
                                                    <td>
                                                        <select name="ptyp" class="form-control">
                                                            <option value="1">Feedback</option>
                                                            <option value="0">Complaints</option>
                                                        </select>
                                                    </td>
                                                </tr> 
                                                <tr>
                                                    <th style="color: gray">
                                                        Write feedback
                                                    </th>
                                                    <th>
                                                        <textarea name="fd" class="form-control"></textarea>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">
                                                        <input type="submit" name="fdk" id="fdk" value="POST NOW" class="btn btn-sm btn-primary">
                                                <div class="btn btn-danger" id="fdk1" style="display: none; padding: 10px">Invalid ID</div>
                                                    </th>
                                                </tr>                                           
                                                                                             
                                                
                                            </table>
                                            <?php
                                            if(isset($_GET['sc']))
                                            {
                                                $suc=$_GET['sc'];
                                                if($suc=="1")
                                                {
                                                    echo "Posted successfully";
                                                }
                                                if($suc=="2")
                                                {
                                                    echo "Error found ! try again";
                                                }
                                            }
                                            
                                            
                                            ?>
                                            <br>
                                            
                                            
                                            
                                        </form> 
                                    
				</div>
                            <div class="col-lg-6 regstr-r-w3-agileits mt-lg-0 mt-5">
                                
                                <img style="width: 100%; height: 500px" src="gif/ab3f5b02e9c1da5bc96cad2c0eafbe63.gif">  
                                
                                
                            </div>
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