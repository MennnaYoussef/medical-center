<?php
session_start();
include 'includes/header.php';
include 'includes/pdo.php';
$stmt=$db->prepare("SELECT * from reviews where selected=:selected");
$stmt->execute(array('selected'=>'1'));
$reviews=$stmt->fetchALL(PDO::FETCH_ASSOC);
if(isset($_SESSION['success'])){
echo '<script>alert("Thank you. We recieved your message")</script>';
  unset($_SESSION['success']);
}
?>
<!-- Database -->

 <!-- Code -->
 <?php

  ?>
     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="#" class="navbar-brand">Medical center</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="#top" class="smoothScroll">Home</a></li>
                         <li><a href="#about" class="smoothScroll">About</a></li>
                         <li><a href="#team" class="smoothScroll">Our Doctors</a></li>
                        <li><a href="#" class="nav-link  dropdown-toggle" data-toggle="dropdown">Clinics  <span class="caret"></span></a>
                             <ul class="dropdown-menu">
                               <?php foreach ($rows as $row): ?>
                                    <li><a class="dropdown-item" href="clinic.php?clinic=<?php echo $row['id']; ?>"> <?php echo $row['name']; ?></a></li>
                                  <?php endforeach; ?>
                                    <!-- <li><a class="dropdown-item" href="#"> Submenu item 2 </a></li> -->
                            </ul>
                        </li>
                         <li><a href="#testimonial" class="smoothScroll">Reviews</a></li>
                         <li><a href="#contact" class="smoothScroll">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="login_form.php"> <span class="fas fa-sign-in-alt fa-lg"></span>Log in</a></li>
                    </ul>
               </div>

          </div>
     </section>


     <!-- HOME -->
     <section id="home">
          <div class="row">

                    <div class="owl-carousel owl-theme home-slider">
                         <div class="item item-first">
                              <div class="caption">
                                   <div class="container">
                                        <div class="col-md-6 col-sm-12">
                                             <h1>Distance Medical Reservation</h1>
                                             <h3>Our online Medical are designed to help you to reserve fast appointment with our doctors.</h3>
                                             <a href="#feature" class="section-btn btn btn-default smoothScroll">Discover more</a>
                                        </div>
                                   </div>
                              </div>
                         </div>

                         <div class="item item-second">
                              <div class="caption">
                                   <div class="container">
                                        <div class="col-md-6 col-sm-12">
                                             <h1>Start your journey with our doctors</h1>
                                            <h3>Our online Medical are designed to help you to reserve fast appointment with our doctors.</h3>
                                             <a href="#courses" class="section-btn btn btn-default smoothScroll">Reservation</a>
                                        </div>
                                   </div>
                              </div>
                         </div>

                         <div class="item item-third">
                              <div class="caption">
                                   <div class="container">
                                        <div class="col-md-6 col-sm-12">
                                             <h1>Advanced laboratories and many clinics</h1>
                                      <h3>Our online Medical are designed to help you to reserve fast appointment with our doctors.</h3>

                                             <a href="#contact" class="section-btn btn btn-default smoothScroll">Let's chat</a>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
          </div>
     </section>


     <!-- FEATURE -->
     <section id="feature">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-4">
                         <div class="feature-thumb">
                              <span>01</span>
                              <h3>Professional Doctors</h3>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna.</p>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                         <div class="feature-thumb">
                              <span>02</span>
                              <h3>Advanced Laboratories</h3>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna.</p>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                         <div class="feature-thumb">
                              <span>03</span>
                              <h3>Certified Medical Center</h3>
                              <p>templatemo provides a wide variety of free Bootstrap Templates for you. Please tell your friends about us. Thank you.</p>
                         </div>
                    </div>

               </div>
          </div>
     </section>


     <!-- ABOUT -->
     <section id="about">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-12">
                         <div class="about-info">
                              <h2>Start your journey to a better life with online practical doctors</h2>

                              <figure>
                                   <span><i class="fa fa-users"></i></span>
                                   <figcaption>
                                        <h3>Professional Doctors</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
                                   </figcaption>
                              </figure>

                              <figure>
                                   <span><i class="fa fa-certificate"></i></span>
                                   <figcaption>
                                        <h3>International Certifications</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
                                   </figcaption>
                              </figure>

                              <figure>
                                   <span><i class="fa fa-bar-chart-o"></i></span>
                                   <figcaption>
                                        <h3>Advanced laboratories</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
                                   </figcaption>
                              </figure>
                         </div>
                    </div>

                    <div class="col-md-offset-1 col-md-4 col-sm-12">
                         <div class="entry-form">
                              <form action="signup_form.php" method="post">
                                   <h2>Signup today</h2>
                                   <input type="text" name="name" class="form-control" placeholder="Full name" required="">
                                   <input type="text" name="age" class="form-control" placeholder="Your age" required="">
                                   <input type="tel" name="mobile" class="form-control" placeholder="Your phone number" required="">
                                   <input type="hidden" name="index" value="1">
                                   <button type="submit" name="submit" class="submit-btn form-control" id="form-submit">Get started</button>
                              </form>
                         </div>
                    </div>

               </div>
          </div>
     </section>


     <!-- TEAM -->
     <section id="team">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2>Doctors<small>Meet Professional Doctors</small></h2>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                         <div class="team-thumb">
                              <div class="team-image">
                                   <img src="images/doctor4.jpg" class="img-responsive" alt="">
                              </div>
                              <div class="team-info">
                                   <h3>Mark Wilson</h3>
<!--                                   <span>I love Teaching</span>-->
                              </div>
                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                         <div class="team-thumb">
                              <div class="team-image">
                                   <img src="images/doctor1.jpg" class="img-responsive" alt="">
                              </div>
                              <div class="team-info">
                                   <h3>Catherine</h3>
<!--                                   <span>Education is the key!</span>-->
                              </div>
                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-google"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                         <div class="team-thumb">
                              <div class="team-image">
                                   <img src="images/doctor6.jpg" class="img-responsive" alt="">
                              </div>
                              <div class="team-info">
                                   <h3>Jessie Ca</h3>
<!--                                   <span>I like Online Courses</span>-->
                              </div>
                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-envelope-o"></a></li>
                                   <li><a href="#" class="fa fa-linkedin"></a></li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                         <div class="team-thumb">
                              <div class="team-image">
                                   <img src="images/doctor3.jpg" class="img-responsive" alt="">
                              </div>
                              <div class="team-info">
                                   <h3>Maria Berti</h3>
<!--                                   <span>Learning is fun</span>-->
                              </div>
                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-google"></a></li>
                                   <li><a href="#" class="fa fa-behance"></a></li>
                              </ul>
                         </div>
                    </div>

               </div>
          </div>
     </section>

     <!-- TESTIMONIAL -->
     <section id="testimonial">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2>Patient Reviews <small>from around the world</small></h2>
                         </div>

                         <div class="owl-carousel owl-theme owl-client">
                           <?php foreach ($reviews as $review): ?>

                              <div class="col-md-4 col-sm-4">
                                   <div class="item">
                                        <div class="tst-image">
                                             <!-- <img src="images/tst-image1.jpg" class="img-responsive" alt=""> -->
                                        </div>
                                        <div class="tst-author">
                                             <h4><?php echo $review['name']; ?></h4>
                                             <span><?php echo $review['title'] ?></span>
                                        </div>
                                        <p><?php echo $review['message'];?></p>
                                        <div class="tst-rating">
                                          <?php for ($i=0;$i<$review['rate'];$i++): ?>
                                             <i class="fa fa-star"></i>
                                           <?php endfor; ?>
                                        </div>
                                   </div>
                              </div>
                            <?php endforeach; ?>

                              <!-- <div class="col-md-4 col-sm-4">
                                   <div class="item">
                                        <div class="tst-image">

                                        </div>
                                        <div class="tst-author">
                                             <h4>Camila</h4>
                                             <span>Marketing Manager</span>
                                        </div>
                                        <p>Trying something new is exciting! Thanks for the amazing law course and the great teacher who was able to make it interesting.</p>
                                        <div class="tst-rating">
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                        </div>
                                   </div>
                              </div>

                              <div class="col-md-4 col-sm-4">
                                   <div class="item">
                                        <div class="tst-image">

                                        </div>
                                        <div class="tst-author">
                                             <h4>Barbie</h4>
                                             <span>Art Director</span>
                                        </div>
                                        <p>Donec erat libero, blandit vitae arcu eu, lacinia placerat justo. Sed sollicitudin quis felis vitae hendrerit.</p>
                                        <div class="tst-rating">
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                        </div>
                                   </div>
                              </div>

                              <div class="col-md-4 col-sm-4">
                                   <div class="item">
                                        <div class="tst-image">

                                        </div>
                                        <div class="tst-author">
                                             <h4>Andrio</h4>
                                             <span>Web Developer</span>
                                        </div>
                                        <p>Nam eget mi eu ante faucibus viverra nec sed magna. Vivamus viverra sapien ex, elementum varius ex sagittis vel.</p>
                                        <div class="tst-rating">
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                        </div>
                                   </div>
                              </div> -->

                         </div>

               </div>
          </div>
     </section>


     <!-- CONTACT -->
     <section id="contact">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-12">
                         <form id="contact-form" role="form" action="contact.php" method="post">

                              <div class="section-title">

                                   <h2>Contact us <small>Review us. Leave a message!</small></h2>
                              </div>

                              <div class="col-md-12 col-sm-12">
                                   <input type="text" class="form-control" placeholder="Enter full name" name="name" required="">

                                   <input type="text" class="form-control" placeholder="Enter title" name="title" required="">

                                   <textarea class="form-control" rows="6" placeholder="Tell us about your message" name="message" required=""></textarea>

                                   <select type="select" class="form-control" name="rate">
                                     <option value="" disabled selected hidden>Rate us !</option>
                                     <option value="1">1</option>
                                     <option value="2">2</option>
                                     <option value="3">3</option>
                                     <option value="4">4</option>
                                     <option value="5">5</option>
                                   </select>
                              </div>

                              <div class="col-md-4 col-sm-12">
                                   <input type="submit" class="form-control" name="send" value="Send Message">
                              </div>

                         </form>
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="contact-image">
                         </div>
                    </div>

               </div>
          </div>
     </section>
     <?php
     include 'includes/footer.php';
     ?>
