<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exam Assignment</title>
    <link rel="shortcut icon" href="img/favicon.png"  type='image/x-icon' />
    <!-- Load jQuery with Google CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css">
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles.css">

    <link rel="stylesheet" type="text/css" href="jquery.timepicker.css">
    <script type="text/javascript" src="jquery.timepicker.min.js"></script>

</head>
  <body>
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#header-cp">Urban</a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#addTable">Manage Tables</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#myBookings">Manage Bookings</a>
                    </li>
                    <li class="page-scroll">
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header>
        <div id = "header-cp" class="header-content-control-panel">
            <div class="header-content-inner">
                <h1 id="homeHeading">Your Favorite Source of Booking Tables</h1>
                <hr>
                <p>Start your booking now....</p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>
            </div>
        </div>
    </header>

    <section id="myBookings">
      <div class="myBookingsTable" data-example-id="hoverable-table" class="dataTable">
          <table class="table table-striped">
              <h1>Reservation <strong>details:</strong></h1>
              <thead>
                  <tr>
                      <th>Reservation ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Number of Persons</th>
                  </tr>
              </thead>
              <tbody id="bookingRows">

              </tbody>
          </table>
      </div>
    </section>

    <section id = "addTable">
        <h1>Tables</h1>
        <div id="userInputs" class="row">
          <form id = "inputForm" method="post">
            <div class="tableRow">
              <input id="numberOfTable" name = "number" type="number" class="form-control" placeholder="The Number of Table">
              <input id="seatNr" name = "seatnr" type="number" class="form-control" placeholder="Seats Available">
              <input id="availableTables" name = "available" type="text" class="form-control" placeholder="Is it available">
              <input id="count" name = "count" type="number" class="form-control" placeholder="Tables available">
              <button id="btnAddTable" class="btn btn-success">Add Table</button>
            </div>
          </form>
        </div>

        <div class="bs-example" data-example-id="hoverable-table" class="dataTable">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Table ID</th>
                        <th>Number Of Table</th>
                        <th>Seat Nr</th>
                        <th>Available Tables</th>
                        <th>Count</th>
                    </tr>
                </thead>
                <tbody id="tableRows">
                </tbody>
            </table>
        </div>
    </section>

    <script type="text/javascript" src = "tables.js"></script>

    <!-- Scri[ts for smooth scrolling] -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="freelancer.min.js"></script>
  </body>
</html>
