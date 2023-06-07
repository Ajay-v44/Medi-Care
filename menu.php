<div class="container-fluid bg-light p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>Pathanamthitta,Kerala</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Mon - Fri : 09.00 AM - 09.00 PM</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+91 73067 86317</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-0" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h1 class="m-0 text-primary"><i class="far fa-hospital me-3"></i><?php echo $title ?></h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <div class="nav-item dropdown">
                    <a href="temp/#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Hospital</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                        <a href="hosreg.php" class="dropdown-item">Register Hospital</a>
                        <a href="hos.php" class="dropdown-item">Search Hospital</a>
                        
                    </div>
                </div>
                <a href="emerg1.php" class="nav-item nav-link">Emergency</a>
                
                <div class="nav-item dropdown">
                    <a href="temp/#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Ambulance</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                        <a href="am_reg.php" class="dropdown-item">Register Ambulance</a>
                        <a href="search_am.php" class="dropdown-item">Search Ambulance</a>
                        
                    </div>
                </div>
               
                <a href="cont.php" class="nav-item nav-link">Post Feedback</a>
            </div>
            <a href="login.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Login<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>