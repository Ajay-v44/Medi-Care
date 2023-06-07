<?php
include './connect.php';
$q=$_GET['q'];
?>
<?php
                                    $hsl=  mysqli_query($dbcon,"select * from hosreg where status='1' and name like '%$q%'");
                                    if(mysqli_num_rows($hsl)>0)
                                    {
                                        while ($hrs=mysqli_fetch_row($hsl))
                                        {
                                            ?>
				<div class="col-lg-4 col-md-6">
					<div class="card border-0 med-blog">
						<div class="card-header p-0">
                                                    <img class="card-img-bottom" style="width: 100%;height: 220px" src="pic/<?php echo $hrs[13] ?>" alt="image">
						</div>
						<div class="card-body border border-top-0">
							<div class="mb-3">
								<h5 class="blog-title card-title m-0"><?php echo strtoupper($hrs[1]) ?></h5>
								<div class="blog_w3icon">
									<span>
										<?php echo strtoupper($hrs[10]) ?> HOSPITAL</span>
								</div>
                                                        </div>
                                                        <p>Contact:-<a href="tel:<?php echo $hrs[6] ?>"><?php echo $hrs[6] ?></a></p>
							<p><?php echo $hrs[2] ?></p>
							<a href="searchhosmore.php?hr=<?php echo $hrs[8] ?>" class="btn btn-primary w-100 py-3">Read more</a>
						</div>
					</div>
				</div>
                                
				<?php
                                        }
                                    }
                                    ?>                           