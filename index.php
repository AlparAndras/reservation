<?php
    session_start();

    if(!isset($_SESSION['email'])) {
      header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- WEST EUR charset : ISO-8859-1 -->
    <title>GRUND</title>
    <!-- <link rel="shortcut icon" href="img/favicon.png"  type='image/x-icon' /> -->
  	<!-- Load jQuery with Google CDN -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  	<!-- Bootstrap CSS -->
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css">
  	<!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  	<!-- Font awesome -->
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">

    <link rel="stylesheet" href="styles.css">
    <!-- <link rel="stylesheet" type="text/css" href="jquery.timepicker.css">
    <script type="text/javascript" src="jquery.timepicker.min.js"></script> -->
</head>
<body>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/hu_HU/sdk.js#xfbml=1&version=v2.8&appId=1499848717001396";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  </script>

      <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
          <div class="container">
              <div class="navbar-header page-scroll">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                      <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                  </button>
                  <a class="navbar-brand" href="#header"><img src="img/logo_small.png" alt='logo'/></a>
              </div>
              <div class="collapse navbar-collapse" id="navbar-collapse">
                  <ul class="nav navbar-nav">
                      <li class="hidden">
                          <a href="#page-top"></a>
                      </li>
                      <li class="page-scroll">
                          <a href="#portfolio">Start Booking Now!</a>
                      </li>
                      <li class="page-scroll">
                          <a href="#details">Details</a>
                      </li>
                      <li class="page-scroll">
                          <a href="#about">About</a>
                      </li>
                      <li class="page-scroll">
                          <a href="#contact">Contact</a>
                      </li>
                      <!-- <div class="or">-</div> -->
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span>
                            <strong><?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'];?></strong>
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="navbar-login">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <p class="text-center">
                                                <?php
                                                $userPic = __DIR__ . "/img/fbimg/".$_SESSION["uid"].".jpg";
                                                $userPicURL = str_replace($_SERVER["DOCUMENT_ROOT"], "", $userPic);
                                                $userpicExists = realpath( $userPic );
                                                if( $userpicExists ){
                                                    echo '<span style="display: block; overflow: hidden;"><img style="border: 5px solid #22160b; border-radius: 50px;" src="'.$userPicURL.'" width="100%" alt="" /></span>';
                                                }
                                                else{
                                                    echo '<span class="glyphicon glyphicon-user icon-size"></span>';
                                                }
                                                ?>
                                                <?php
                                                  if (isset($_SESSION['rem'])) {
                                                    echo "<div style='text-align: center;' id='insider_msg'>".$_SESSION['rem']."</div>";
                                                  }
                                                ?>
                                            </p>
                                        </div>
                                        <div class="col-lg-8">
                                            <p class="text-left"><strong><?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'];?></strong></p>
                                            <p class="text-left small"><?php echo $_SESSION['email'];?></p>

                                            <p class="text-left">
                                              <a href="#" class="btn btn-primary btn-block btn-sm disabled">Profile</a>
                                            </p>
                                            <p class="text-left">
                                              <a href="logout.php" class="btn btn-block btn-sm">Logout</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                              <!-- <li class="divider navbar-login-session"></li>
                              <li><a href="#">Account Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
                              <li class="divider"></li>
                              <li><a href="#">User stats <span class="glyphicon glyphicon-stats pull-right"></span></a></li>
                              <li class="divider"></li>
                              <li><a href="#">Messages <span class="badge pull-right"> 42 </span></a></li>
                              <li class="divider"></li>
                              <li><a href="#">Favourites Snippets <span class="glyphicon glyphicon-heart pull-right"></span></a></li>
                              <li class="divider"></li>
                              <li><a href="#">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li> -->
                        </ul>
                      </li>

                  </ul>
                  <!-- <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                  </ul> -->
              </div>
          </div>
      </nav>

    <header id = "header">
        <div class="header-content">
            <div class="header-content-inner">
              <!-- <div class="fb-video" data-href="https://www.facebook.com/theGRND/videos/1040817292676693/" data-width="500" data-show-text="false">
                <blockquote cite="https://www.facebook.com/theGRND/videos/1040817292676693/" class="fb-xfbml-parse-ignore">
                  <a href="https://www.facebook.com/theGRND/videos/1040817292676693/">GRUND Coffee Tour</a>
                  <p>Join us in this quick tour around the city as we&#039;re heading to GRUND for a nice cup of Coffee. We have a surprise for everyone! Stop by anytime and find out more about it! #FillUpYourCup #GRUND</p>
                  Közzétette: <a href="https://www.facebook.com/theGRND/">GRUND</a>
                  – 2016. június 11.
                </blockquote>
              </div> -->
                <!-- <h1 id="homeHeading">Your Favorite Source of Reserving Tables</h1>
                <hr>
                <p>Start your reservation now....</p>
                <a href="#portfolio" class="btn btn-primary btn-xl page-scroll">Find Out More</a> -->
            </div>
        </div>
    </header>

    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Booking section</h2>
                    <hr class="star-secondary">
                    <p><h4>You can make a reservation by selecting one of the pictures bellow, either for 2, 4 or 8 people. <br>
                      If you would like to book a table for more than 8 people, please contact us! </h4></p>
                    <hr class="star-secondary">
                    <p>Your details will be saved and reviewed by our customer service. You will recieve an email with the booking details. </p>
                    <p><h1>Booking is disabled for now!</h1></p>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 portfolio-item">
                    <a href="#reservation-modal" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/2.jpg" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/4.jpg" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/8.jpg" class="img-responsive" alt="">
                    </a>
                </div>
                <!-- <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/rest3.jpg" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/rest4.jpg" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/rest4.jpg" class="img-responsive" alt="">
                    </a>
                </div> -->
            </div>
        </div>
    </section>

    <!-- ********************************** DETAILS *************************************** -->

    <section id="details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>COFFEE | GRUND Menu </h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="details-item">
                    <a href="#" class="details-link" data-toggle="modal">
                      <!-- put this line back  for href : #detailmodal  -->
                        <div class="caption">
                            <div class="caption-content">
                                <!-- <i class="fa fa-search-plus fa-3x"></i> -->
                            </div>
                        </div>
                        <!-- <img src="img/rooftop.jpg" class="img-responsive" alt=""> -->
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="details-modal modal fade" id="detailmodal" tabindex="-1">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="dataTable" data-example-id="hoverable-table">
                    <div class="col-lg-12 col-lg-offset-0">
                        <div class="modal-body">
                          <div>

                            <!-- <img src="https://goo.gl/WcXu3U" alt="">
                            <img src="https://goo.gl/ZvQjOW" alt="">
                            <img src="https://goo.gl/3vtQej" alt="">
                            <img src="https://goo.gl/mhlX5q" alt=""> -->

                          </div>
                          <!-- <table class="table table-striped">
                              <h1>Details</h1>
                              <thead>
                                  <tr>
                                      <th>First Name</th>
                                      <th>Last Name</th>
                                      <th>Email</th>
                                      <th>Date</th>
                                      <th>Time</th>
                                      <th>Party Size</th>
                                  </tr>
                              </thead>
                              <tbody id="bookingDetailRows">
                              </tbody>
                          </table> -->
                          <hr class="star-primary">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ********************************** MODALS *************************************** -->

    <div class="details-modal modal fade" id="reservation-modal" tabindex="-1">
        <div class="modal-content">
          <!-- <img src="img/aircoffe.jpg" alt="Image"> -->
            <!-- <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div> -->
            <div class="container">
                <div class="dataTable" data-example-id="hoverable-table">
                    <div class="col-lg-12 col-lg-offset-0">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                              <hr class="star-primary">
                                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                                <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                                <form method = "post" action = "send_from_email.php" id = "inputFormForDetails" class="form-horizontal" novalidate>
                                  <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                      <input type="text" name="firstName" class="form-control" id = "firstName" placeholder="First Name" required data-validation-required-message="Please enter your First Name.">
                                    </div>
                                  </div>
                                  <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                      <input type="text" name="lastName" class="form-control" id = "lastName" placeholder="Last Name" required data-validation-required-message="Please enter your Last Name.">
                                    </div>
                                  </div>
                                  <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                      <input type="text" name="email" class="form-control" id = "email" placeholder="Email" required data-validation-required-message="Please enter your email address.">
                                    </div>
                                  </div>
                                  <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                      <input type="date" name="date" class="form-control" id = "date" required data-validation-required-message="Please enter the date for your booking.">
                                      <br>
                                    </div>
                                   <!-- <div class="col-sm-1">
                                     <input type="text" class="time ui-timepicker-input" id = "time">
                                   </div> -->
                                  </div>
                                  <!-- <div class="row control-group">
                                   <div class="form-group col-xs-12 floating-label-form-group controls">
                                          <input type="number" name="count" class="form-control" id = "count" placeholder="How many seats do you need?">
                                       </div>
                                   </div> -->
                                  <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                      <button id = "btnAddBooking" type="submit" name="submit" class="btnAddBooking btn btn-default">Submit</button>
                                    </div>
                                  </div>
                                  <audio id="soundUp" src="confirmed.mp3"></audio>
                                </form>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>In Portofolio section you can see the details of the place where you want to hang out, and also make a reservation</p>
                    <hr class="star-secondary">
                    <p><strong>GRUND as a bar, opened his doors in our small city, Csikszereda (Miercurea Ciuc) at December 2014,
                      because we wanted to gathered the people in one greater place, where they can spend some good time, participate in parties,
                      with well known artists, and events with various activities. These doors are open at any time,
                       and waiting to see some new people inside for a warm tea, coffee or any cold drink, but you can also get special cocktails
                      from our experienced bartenders.
                      <hr class="star-secondary">
                      OUR bar is trying to bring the industrial, cold, rigid type of look, combined with comfortable, friendly materials
                      and textures. Here, you can enjoy quality music from genres like chill jazz, jazz hip-hop for a good coffee,
                      liquid drum and bass, and all kinds of electronical music for a good party on the weekends.
                      </strong></p>
                </div>
                <div class="col-lg-4">
                    <p>You can also contact us and tell us what do you think about this website, by scrolling to the Contact section</p>
                    <hr class="star-secondary">
                    <p><strong>
                      WE tried to bring a new, revolutionary idea, creating the INSIDER membership, to connect and
                      gather all the good people, which fit best into our way of thinking to create a strong core,
                      which can be the base for a good party or event any time.
                      <hr class="star-secondary">
                      FURTHERMORE, we try to keep our style fresh, to keep our people entertained all the time. We are always ready to
                      come up with new ideas, like a party with secret location, INSIDER ONLY parties or just the regular friday nights with good friends.
                      <hr class="star-secondary">
                      BY the time, we make special events, like Beer-Pong Tournaments, Jazz Nights or regular concerts, supporting the local bands.
                    </strong></p>
                </div>
            </div>
        </div>
    </section>

    <div id="map"></div>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="primary">
                    <p>Ready to start your booking with us? That's great! Give us a call or send us an email if you have any questions and we will get back to you as soon as possible!</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x sr-contact"></i>
                    <hr class="star-secondary">
                    <p><strong>0266316514 / 0722584433 (rooftop)</strong></p>

                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <hr class="star-secondary">
                    <p><a href="mailto:grund@ridemore.ro">grund@ridemore.ro</a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- HANDLEBARS ------------------------->

    <script src = "handlebars-v4.0.5.js"></script>
    <script type="text/javascript" src = "tables.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="freelancer.min.js"></script>

    <!-- MAP INIT ------------------------->

    <script>
    var map;

    function initMap() {
      var restaurant = {lat: 46.358104, lng: 25.804842};
      map = new google.maps.Map(document.getElementById('map'), {
        zoom: 17,
        center: restaurant
      });
      var marker = new google.maps.Marker({
        position: restaurant,
        map: map
      });
    }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD92Ez5RWzpAYxWbcaNadq-lS_NEJvcA6U&callback=initMap"
    async defer></script>



</body>
