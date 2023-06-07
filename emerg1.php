<?php
ob_start();
error_reporting(0);
include("connect.php");
if (isset($_POST['snd'])) {


    $up = $_FILES['pic']['name'];
    $count = rand('1000000', '9999999');
    $pic = $count . "" . substr($up, strrpos($up, "."));
    $lt = $_POST['lt'];
    $lg = $_POST['lg'];
    $tmp = 0;
    $gs = mysqli_query($dbcon, "SELECT lattitude, longitude, SQRT(POW(69.1 * (lattitude - $lt),2) +POW(69.1 * ($lg - longitude) * COS(lattitude / 57.3), 2)) AS distance FROM hosreg HAVING distance < 5 ORDER BY distance");
    // 
    if (mysqli_num_rows($gs) > 0) {

        while ($gr = mysqli_fetch_row($gs)) {
            $lat = $gr[0];
            $log = $gr[1];

            $hs =  mysqli_query($dbcon, "select * from hosreg where lattitude='$lat' and longitude='$log' and status='1'");
            if (mysqli_num_rows($hs) > 0) {
                $tmp = 1;
                while ($hr = mysqli_fetch_row($hs)) {
                    $hd = $hr[8];
                    $sel_aid = mysqli_query($dbcon, "select * from accident_id");
                    $raid = mysqli_fetch_row($sel_aid);
                    $acid = $raid[1];
                    date_default_timezone_set("Asia/Kolkata");
                    $tim = date("H:i:sa");
                    $ims =  mysqli_query($dbcon, "insert into image values('','$acid','$hd','$pic','$lt','$lg','0','" . date('Y-m-d') . "','$tim')");
                    move_uploaded_file($_FILES['pic']['tmp_name'],  getcwd() . "//pic//$pic");
                }
            }
        }
    }
    if ($tmp > 0) {
        $up = mysqli_query($dbcon, "update accident_id set num=num+1");
        if ($up > 0) {
            header("location:emerg1.php?aid=$acid");
        }
    } else {
        header("location:emerg1.php?error=1");
    }
}
if (isset($_GET['cid'])) {
    $aid = $_GET['aid'];
    $id = $_GET['id'];
    $cid = $_GET['cid'];
    $hid = $_GET['hid'];
    $up = mysqli_query($dbcon, "update image set status='4' where acc_id='$aid' and id!='$id'");
    if ($up > 0) {
        $upd = mysqli_query($dbcon, "update image set status='3' where acc_id='$aid' and id='$id'");
        if ($upd > 0) {
            $ins = mysqli_query($dbcon, "insert into accident_cid values('','$hid','$aid','$cid')");
            if ($ins > 0) {
                header("location:hoscommuni.php?aid=$aid");
            }
        }
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
                    <div class="col-lg-12 contact-agileits-w3layouts">



                        <?php
                        if (isset($_GET['error'])) {
                        ?>
                            <div class="alert alert-danger">No Approved Hospital found in this location.. <a href="emerg1.php" class="label label-danger pull-right">CLEAR</a></div>
                            <?php
                        }

                        if (isset($_GET['aid'])) {
                            $acid = $_GET['aid'];

                            $sel_data = mysqli_query($dbcon, "select * from image where acc_id='$acid'");
                            if (mysqli_num_rows($sel_data) > 0) {
                            ?>
                                <section class="blog_w3ls py-5" id="why">
                                    <div class="container py-xl-5 py-lg-3">

                                        <div class="row">
                                            <?php

                                            $sel = mysqli_query($dbcon, "select * from image where acc_id='$acid' limit 1");
                                            $r = mysqli_fetch_row($sel);
                                            $la = $r[4];
                                            $lo = $r[5];
                                            $sel = mysqli_query($dbcon, "SELECT id,nme,la,lo,addr,cont,uid, SQRT( POW(69.1 * (la - $la), 2) + POW(69.1 * ($lo - lo) * COS(la / 57.3), 2)) AS distance FROM amb where st='1' HAVING distance < 60 ORDER BY distance");
                                            $i = 1;
                                            if (mysqli_num_rows($sel) > 0) {

                                            ?>









                                                <h3>Nearest Ambulance</h3>
                                                <table class="table table-bordered ">
                                                    <tr>
                                                        <th>
                                                            <label style="color: gray">#</label>
                                                        </th>
                                                        <th>
                                                            <label style="color: gray"> NAME</label>
                                                        </th>
                                                        <th>Contact</th>

                                                    </tr>
                                                    <?php
                                                    while ($r = mysqli_fetch_row($sel)) {






                                                    ?>
                                                        <tr>
                                                            <th style="color: grey">
                                                                <?php echo $i ?>
                                                            </th>
                                                            <th style="color: grey">
                                                                <?php echo $r[1] ?>
                                                            </th>
                                                            <th style="color: grey">
                                                                <a href="tel:<?php echo $r[5] ?>"> <span class="fa fa-phone-square"></span> <?php echo $r[5] ?></a>
                                                            </th>


                                                        </tr>

                                                    <?php
                                                        $i++;
                                                    }
                                                    ?>

                                                </table>
                                            <?php


                                            } else {
                                                echo 'no data found';
                                            }
                                            ?>
                                            <h3>Nearest Hospital</h3>
                                            <?php
                                            $i = 0;
                                            while ($rs = mysqli_fetch_row($sel_data)) {
                                                $hid = $rs[2];




                                                $o =  mysqli_query($dbcon, "select * from optr where hid='$hid'");
                                                $or = mysqli_fetch_row($o);

                                                $ic =  mysqli_query($dbcon, "select * from add_icu where hosid='$hid'");
                                                $ir = mysqli_fetch_row($ic);



                                                $ds =  mysqli_query($dbcon, "select * from hosreg where uid='$hid'");
                                                $hrd = mysqli_fetch_row($ds);
                                                $i++;
                                            ?>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="card border-0 med-blog">
                                                        <div class="card-header p-0">
                                                            <img class="card-img-bottom" style="width: 100%;height: 220px" src="pic/<?php echo $hrd[13] ?>" alt="image">
                                                        </div>
                                                        <div class="card-body border border-top-0">
                                                            <div class="mb-3">
                                                                <h5 class="blog-title card-title m-0"><?php echo strtoupper($hrd[1]) ?></h5>
                                                                <div class="blog_w3icon">
                                                                    <span>
                                                                        <?php echo strtoupper($hrd[10]) ?> HOSPITAL</span>
                                                                </div>
                                                            </div>
                                                            <p>Contact:-<a href="tel:<?php echo $hrd[6] ?>"><?php echo $hrd[6] ?></a></p>
                                                            <p><?php echo $hrd[2] ?></p>

                                                            <table class="table table-bordered">
                                                                <tr>

                                                                    <td>Facility</td>
                                                                    <td>OPERATION_THEATURE STATUS </td>
                                                                    <td>ICU Status (AVAILABLE BEDS)</td>


                                                                </tr>
                                                                <tr>


                                                                    <td>Blood Bank:<?php
                                                                                    $b =  mysqli_query($dbcon, "select * from blood where hid='$hid'");
                                                                                    if (mysqli_num_rows($b) > 0) {
                                                                                        $br = mysqli_fetch_row($b);
                                                                                        if ($br[2] == "No") {
                                                                                    ?>
                                                                        <?php echo '<b style="color:red;"> : BUSY</b>';
                                                                        ?>
                                                                    <?php
                                                                                        } else {
                                                                    ?>
                                                                        <?php echo '<b style="color:green;"> : AVAILABLE</b>';
                                                                        ?>
                                                                <?php
                                                                                        }
                                                                                    }
                                                                ?>
                                                                <br />
                                                                Ventilator :
                                                                <?php
                                                                $v =  mysqli_query($dbcon, "select * from ventilator where hid='$hid'");
                                                                if (mysqli_num_rows($v) > 0) {
                                                                    $vr = mysqli_fetch_row($v);
                                                                    if ($vr[2] == "No") {
                                                                ?>
                                                                        <?php echo '<b style="color:red;"> : NOT AVAILABLE</b>';
                                                                        ?>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <?php echo '<b style="color:green;"> : AVAILABLE</b>';
                                                                        ?>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        $sel_t = mysqli_query($dbcon, "select * from  optr where hid='$hid'");
                                                                        //echo"$hid";
                                                                        if (mysqli_num_rows($sel_t) > 0) {
                                                                            while ($rt =  mysqli_fetch_row($sel_t)) {
                                                                                echo $rt[2];
                                                                                if ($rt[4] == "Yes") {
                                                                        ?>

                                                                                    <?php echo '<b style="color:red;"> : BUSY</b>';
                                                                                    ?>

                                                                                <?php
                                                                                } else {
                                                                                ?>
                                                                                    <?php echo '<b style="color:green;"> : AVAILABLE</b>';
                                                                                    ?>
                                                                        <?php
                                                                                }
                                                                                echo "<br />";
                                                                                //echo "$rt[3] <br/> $rt[4] </label><br/>";

                                                                            }
                                                                        }

                                                                        ?>

                                                                    </td>
                                                                    <td>

                                                                        <?php echo $ir[3];
                                                                        echo '&nbsp<b>:</b>'; ?><label style="color: blue"><?php echo ' &nbsp';
                                                                                                                                                echo $ir[7] ?></label></td>




                                                                </tr>
                                                            </table>

                                                            <?php
                                                            $a = "01234567899876543210";
                                                            $b = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                                                            $a1 = str_shuffle($a);
                                                            $b1 = str_shuffle($b);
                                                            $c = "$a1$b1";
                                                            $otp = substr(str_shuffle($c), 7, 4);
                                                            if ($rs[6] == '0') {
                                                            ?>
                                                                <span style="float: right">
                                                                    <a href="" style="display: block;width: 70px;text-align: center;text-decoration: none;background-color: steelblue;color: white;border-radius: 20px;">Waiting...</a>
                                                                </span>
                                                                <span style="float: left">
                                                                    <a href="emerg1.php?aid=<?php echo $_GET['aid'] ?>&id=<?php echo $rs[0] ?>&cid=<?php echo $otp ?>&hid=<?php echo $rs[2] ?>" class="btn btn-sm btn-success">Choose</a>
                                                                    <a style="display: none;" href="hoscommuni.php?aid=<?php echo $_GET['aid'] ?>&id=<?php echo $rs[0] ?>&cid=<?php echo $otp ?>" class="btn btn-sm btn-success">Choose</a>
                                                                </span>
                                                            <?php
                                                            } else if ($rs[6] == '1') {

                                                            ?>
                                                                <a href="" style="display: block;width: 70px;text-align: center;text-decoration: none;background-color: green;color: white;border-radius: 20px;">Approved!!!</a>

                                                            <?php
                                                            } else {

                                                            ?>
                                                                <a href="" style="display: block;width: 70px;text-align: center;text-decoration: none;background-color: red;color: white;border-radius: 20px;">Rejected!!!</a>

                                                            <?php
                                                            }
                                                            ?>





                                                        </div>
                                                    </div>
                                                </div>


                                            <?php



                                            }
                                            ?>
                                        </div>
                                    </div>
                                </section>
                            <?php
                            }
                        } else {
                            ?>
                            <form method="post" enctype="multipart/form-data">
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="color: gray">
                                            Upload Picture
                                        </th>
                                        <th>
                                            <input type="file" name="pic" class="form-control" accept="image/*" id="capture" capture="camera" required>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div id="map" style="width: 100%; height: 500px"></div>
                                            <script>
                                                // This example adds a search box to a map, using the Google Place Autocomplete
                                                // feature. People can enter geographical searches. The search box will return a
                                                // pick list containing a mix of places and predicted search terms.

                                                // This example requires the Places library. Include the libraries=places
                                                // parameter when you first load the API. For example:
                                                // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

                                                function initAutocomplete() {
                                                    var map = new google.maps.Map(document.getElementById('map'), {
                                                        center: {
                                                            lat: 9.1529656,
                                                            lng: 76.7355742
                                                        },
                                                        zoom: 18,
                                                        mapTypeId: 'roadmap'
                                                    });
                                                    google.maps.event.addListener(map, 'dblclick', function(e) {
                                                        //alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
                                                        document.getElementById("lat").value = e.latLng.lat();
                                                        document.getElementById("lng").value = e.latLng.lng();
                                                    });
                                                    // Create the search box and link it to the UI element.
                                                    var input = document.getElementById('pac-input');
                                                    var searchBox = new google.maps.places.SearchBox(input);
                                                    //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                                                    // Bias the SearchBox results towards current map's viewport.
                                                    map.addListener('bounds_changed', function() {
                                                        searchBox.setBounds(map.getBounds());
                                                    });

                                                    var markers = [];
                                                    // Listen for the event fired when the user selects a prediction and retrieve
                                                    // more details for that place.
                                                    searchBox.addListener('places_changed', function() {
                                                        var places = searchBox.getPlaces();

                                                        if (places.length == 0) {
                                                            return;
                                                        }

                                                        // Clear out the old markers.
                                                        markers.forEach(function(marker) {
                                                            marker.setMap(null);
                                                        });
                                                        markers = [];

                                                        // For each place, get the icon, name and location.
                                                        var bounds = new google.maps.LatLngBounds();
                                                        places.forEach(function(place) {
                                                            if (!place.geometry) {
                                                                console.log("Returned place contains no geometry");
                                                                return;
                                                            }
                                                            var icon = {
                                                                url: place.icon,
                                                                size: new google.maps.Size(71, 71),
                                                                origin: new google.maps.Point(0, 0),
                                                                anchor: new google.maps.Point(17, 34),
                                                                scaledSize: new google.maps.Size(25, 25)
                                                            };

                                                            // Create a marker for each place.
                                                            markers.push(new google.maps.Marker({
                                                                map: map,
                                                                icon: icon,
                                                                title: place.name,
                                                                position: place.geometry.location
                                                            }));

                                                            if (place.geometry.viewport) {
                                                                // Only geocodes have viewport.
                                                                bounds.union(place.geometry.viewport);
                                                            } else {
                                                                bounds.extend(place.geometry.location);
                                                            }
                                                        });
                                                        map.fitBounds(bounds);
                                                    });
                                                }
                                            </script>
                                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzXv05Tg7stti5DyuH1_FmXPWKFS9EkHE&libraries=places&callback=initAutocomplete" async defer></script>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th style="color: gray">
                                            Latitude
                                        </th>
                                        <th>
                                            <input type="text" name="lt" id="lat" class="form-control" required>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="color: gray">
                                            Longitude
                                        </th>
                                        <th>
                                            <input type="text" name="lg" id="lng" class="form-control" required>
                                        </th>
                                    </tr>

                                    <tr>
                                        <th colspan="2">
                                            <input type="submit" name="snd" class="btn btn-primary w-100 py-3" value="SEND">
                                        </th>
                                    </tr>
                                </table>
                                <br>

                                </table>


                            </form>
                        <?php
                        }
                        ?>

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