<?php
include("connect.php");
if (isset($_GET['aid'])) {
    $sel = mysqli_query($dbcon, "select * from accident_cid where accident_id='" . $_GET['aid'] . "'");
    $r = mysqli_fetch_row($sel);
    $cid = $r[3];
}
if (isset($_POST['sub'])) {

    $msg = addslashes(nl2br($_POST['msg']));
    $ins_msg = mysqli_query($dbcon, "insert into user_communi VALUES('','$cid','$msg','user')");
    if ($ins_msg > 0) {
        header("location:hoscommuni.php?aid=" . $_GET['aid']);
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
    <!-- Navbar End  -->

    <?php
    header("Refresh:7;");
    ?>


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Post Emergency</h1>
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
            <div class="row" id="client">
                <div class="row pt-md-0">
                    <div class="col-lg-7 contact-agileits-w3layouts">



                        <div class="">
                            <form method="post">
                                <br><br><br>
                                <table class="table table-bordered">
                                    <tr>
                                        <td>
                                            <b>START CHAT HERE</b>
                                            <textarea name="msg" rows="5" class="form-control" required></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="submit" name="sub" value="SEND MESSAGE" class="btn btn-sm btn-primary pull-right">
                                        </td>
                                    </tr>
                                </table>
                                <script>
                                    function update() {
                                        $.get("loadchat1.php?cid=<?php echo $cid ?>", function(data) {
                                            $("#mssg").html(data);
                                        });
                                        window.setTimeout("update();", 100);
                                    }
                                </script>
                                <div id="mssg">
                                    <?php
                                    $sel_msg = mysqli_query($dbcon, "select * from user_communi where cid='$cid' order by id desc");
                                    if (mysqli_num_rows($sel_msg) > 0) {
                                        while ($rms = mysqli_fetch_row($sel_msg)) {
                                            if ($rms[3] == "user") {
                                                $al = "left";
                                            } else {
                                                $al = "right";
                                            }
                                    ?>
                                            <div style="padding: 5px; width: 80%; border: 1px solid white; box-shadow: 0px 0px 2px black; float: <?php echo $al ?>; margin-top: 5px;">
                                                <?php echo $rms[2] ?>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="col-lg-5 regstr-r-w3-agileits mt-lg-0 mt-5">

                        <img style="width: 100%; height: 500px" src="gif/e31b752875679b64fce009922f9f0dda.gif">


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