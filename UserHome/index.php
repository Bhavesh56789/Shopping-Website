<!doctype html>

<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
    integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
    crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
    integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
    crossorigin="anonymous" />
  <link rel="stylesheet" href="./mob.css">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


  <script src='https://kit.fontawesome.com/a076d05399.js'></script>

  <link rel="shortcut icon" type="image/jpg"
    href="../ep-monogram-logo-emblem-style-isolated-black-background-173922122.jpg" style=" width: 100px;">
  <title>Online Shopping Site for Mobiles & Electronics</title>
</head>

<body>
  <?php
  session_start();
  $servername = "localhost";
  $username = "id16369615_bhavesh";
  $password = "pmNYsnJbS2V72#um";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, "id16369615_ecommerce");
  if (isset($_POST['del'])) {
    $email = $_SESSION['username1'];
    $cart = "DELETE FROM cart WHERE email='$email'";
    $cartdel = mysqli_query($conn, $cart);
    $user = "DELETE FROM register WHERE email='$email'";
    $userdel = mysqli_query($conn, $user);
    header('Location:../index.php');
  }
  if (isset($_POST['search'])) {
    $searchdata = $_POST['datasearch'];
    $search = "SELECT * FROM product where brand like '%$searchdata%'";
    $searchquery = mysqli_query($conn, $search);
    $row = mysqli_fetch_all($searchquery, MYSQLI_ASSOC);
    if ($row[0]['category_name'] == '') {
      $search1 = "SELECT * FROM product where category_name like '%$searchdata%'";
      $searchquery1 = mysqli_query($conn, $search1);
      $row12 = mysqli_fetch_all($searchquery1, MYSQLI_ASSOC);
      //echo print_r($row12[1]['category_name']);
      $brand = $row12[0]['category_name'];
      $session = $_GET['session'];
      if ($session) {
        header("location: ../product.php?user='$brand'&session=" . true);
      } else {
        header("location: ../product.php?user='$brand'&session=" . false);
      }
    } else {
      echo 'hi' . print_r($row[0]['brand']);
      $session = $_GET['session'];
      $brand = $row[0]['brand'];
      if ($session) {
        header("location: ../product.php?user='$brand'&session=" . true);
      } else {
        header("location: ../product.php?user='$brand'&session=" . false);
      }
    }
  }
  ?>
  <nav class="navbar navbar-expand-lg navbar-light nav1">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">EPORT<i class="fas fa-shopping-bag log"></i></a>

    <form class="form-inline mr-lg-5" method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="datasearch">
      <button class="btn btn-outline-success bg-light " type="submit" name="search">Search</button>
    </form>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-lg-5 ">
        <li class="nav-item">
          
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION['name']; ?>
            </button>
            <div class="dropdown-menu bg-black" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item href" href="<?php echo '../changepassword/1.php'; ?>"
                style='color:black !important; font-weight:bolder !important;'>Change password</a>
              <a class="dropdown-item href" href="" style="color:black !important; 
              font-weight:bolder !important;">
                <form method=POST><button name="del" class="del" type=submit>Delete Account</button></form>
              </a>
              <a class="dropdown-item" href="../index.php" name='logout'
                style='color:black !important; font-weight:bolder !important;'>Logout
              </a>

            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php $session = $_GET['session'];
                                    if ($session) {
                                      echo "../cart/cart.php?session=" . true;
                                    } else {
                                      echo "../cart/cart.php?session=" . false;
                                    }
                                    ?>"><?php $session = $_GET['session'];
                                        if ($session) {
                                          $email = $_SESSION['username1'];
                                          $cartno = "Select * From cart where email='$email'";
                                          $querycart = mysqli_query($conn, $cartno);
                                          $prodcount = mysqli_num_rows($querycart);
                                          echo "<i class='fas fa-shopping-cart' style='font-size:18px;color:white;padding-top:2px'></i>";
                                          if ($prodcount > 0) {
                                            echo "<span class=\"cno\">" . $prodcount . "</span>";
                                          }
                                        } else {
                                            echo "<i class='fas fa-shopping-cart' style='font-size:18px;color:white;padding-top:2px'></i></span>";
                                          
                                        }  ?>Cart</a>
        </li>
      </ul>

    </div>
  </nav>

  <nav class="navbar navbar-expand-lg navbar-danger bg-white">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-lg-5 ">
        <li class="nav-item">
          
          <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Electronics
            </button>
            <div class="dropdown-menu dropdown-multicol2" aria-labelledby="dropdownMenuButton">
              <div class="dropdown-col">

                <b class='dropdown-item categ h1'><a class="h1"
                    href="<?php echo "../product.php?user='Mobile'&session=" . true;  ?>">Mobiles</a></b>
                <a class='dropdown-item categ h2'
                  href="<?php echo "../product.php?user='Redmi'&session=" . true;  ?>">Mi</a>
                <a class='dropdown-item categ h2'
                  href="<?php echo "../product.php?user='Samsung'&session=" . true;  ?>">Samsung</a>
                <a class='dropdown-item categ h2'>Oppo</a>
                <a class='dropdown-item categ h2'>Vivo</a>
                <a class='dropdown-item categ h2'>Apple</a>
                <a class='dropdown-item categ h2'>Realme</a>
                <a class='dropdown-item categ h2'>Infinix</a>
                <a class='dropdown-item categ h2'>Honor</a>
                <a class='dropdown-item categ h2'>Asus</a>
                <a class='dropdown-item categ h2'>Motorola</a>
                <a class='dropdown-item categ h2'>Lenovo</a>
                <a class='dropdown-item categ h2'>Micromax</a>
              </div>
              <div class="dropdown-col">
                <b><a class='dropdown-item h1'>Mobile Accessories</a></b>
                <a class='dropdown-item h2'>Mobile cases</a>
                <a class='dropdown-item h2'>Headphones & Headsets</a>
                <a class='dropdown-item h2'>Power banks</a>
                <a class='dropdown-item h2'>Screengaurds</a>
                <a class='dropdown-item h2'>Memory Cards</a>
                <a class='dropdown-item h2'>Cables</a>
                <a class='dropdown-item h2'>Chargers</a>
                <a class='dropdown-item h2'>Mobile Holders</a>
                <b><a class='dropdown-item h1'>Smart Wearables</a></b>
                <a class='dropdown-item h2'>Smart Watches</a>
                <a class='dropdown-item h2'>Smart Glasses(VR)</a>
                <a class='dropdown-item h2'>Smart Bands</a>
              </div>
              <div class="dropdown-col">
                <b><a class='dropdown-item h1'>Laptops</a></b>
                <a class='dropdown-item h1'>Gaming Laptops</a>
                <b><a class='dropdown-item h1'>Desktop PCs</a></b>
                <b><a class='dropdown-item h1'>Gaming & Accessories</a></b>
                <b><a class='dropdown-item h1'>Computer Accessories</a></b>
                <a class='dropdown-item h2'>External Hardisk</a>
                <a class='dropdown-item h2'>Pendrives</a>
                <a class='dropdown-item h2'>Laptop Skins</a>
                <b><a class='dropdown-item h1'>Computer Peripherals</a></b>
                <a class='dropdown-item h2'>Printers &Ink Cartridges</a>
                <a class='dropdown-item h2'>Monitors</a>
                <a class='dropdown-item h2'>Keyboards</a>
                <a class='dropdown-item h2'>Mouse</a>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              TVs & Appliances
            </button>
            <div class="dropdown-menu dropdown-multicol2 multicol2" aria-labelledby="dropdownMenuButton">
              <div class="dropdown-col">

                <b><a class='dropdown-item categ h1'>Televisions</a></b>
                <b><a class='dropdown-item categ h1'>Smart & Ultra HD</a></b>
                <b><a class='dropdown-item categ h1'>Top Brands</a></b>

                <a class='dropdown-item categ h2'>Samsung</a>
                <a class='dropdown-item categ h2'>Vu</a>
                <a class='dropdown-item categ h2'>Nokia</a>
                <a class='dropdown-item categ h2'>Apple</a>

                <a class='dropdown-item categ h2'>LG</a>
                <b><a class='dropdown-item categ h1'>Shop by Screen Size</a></b>
                <a class='dropdown-item categ h2'>24 & below</a>
                <a class='dropdown-item categ h2'>28-32</a>
                <a class='dropdown-item categ h2'>39-43</a>


              </div>
              <div class="dropdown-col">
                <b><a class='dropdown-item categ h1'>Washing Machines</a></b>
                <a class='dropdown-item categ h2'>Fully Automatic Front Load</a>
                <a class='dropdown-item categ h2'>Semi Automatic Top Load</a>
                <a class='dropdown-item categ h2'>Fully Automatic Top Load</a>
                <b><a class='dropdown-item categ h1'>Air Conditioners</a></b>
                <a class='dropdown-item categ h2'>Inverter Acs</a>
                <a class='dropdown-item categ h2'>Split ACs</a>
                <a class='dropdown-item categ h2'>Window ACs</a>

                <b><a class='dropdown-item categ h1'>Refrigertors</a></b>
                <a class='dropdown-item categ h2'>Single Door</a>
                <a class='dropdown-item categ h2'>Double Door</a>

                <a class='dropdown-item categ h2'>Convertible</a>
              </div>
              <div class="dropdown-col">
                <b><a class='dropdown-item categ h1'>Small Home Appliances</a></b>
                <a class='dropdown-item categ h2'>Iron</a>
                <a class='dropdown-item categ h2'>Water Purifers</a>
                <a class='dropdown-item categ h2'>Fans</a>
                <a class='dropdown-item categ h2'>Air coolers</a>
                <a class='dropdown-item categ h2'>Inverters</a>
                <a class='dropdown-item categ h2'>Vaccum Cleaners</a>
                <a class='dropdown-item categ h2'>Sewing Machines</a>
                <a class='dropdown-item categ h2'>Voltage Stabilizers</a>
                <a class='dropdown-item categ h2'>Geysers</a>
                <a class='dropdown-item categ h2'>Immersion Rods</a>
                <a class='dropdown-item categ h2'>Coffee Maker</a>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>

  </nav>

  <div class="container1">

    <div class='row'>

      <a href="#">
        <img class="p1" src="../img/Copy (1) of Luxury Watches animated 300x250-Max-Quality.jpg" /></a>
    </div>
    <div class="row p2">
      <div class="c col-12">
        Deals of the Day
        <i class="fas fa-clock clock"></i><span id="demo"></span>

        <a><i class="fas fa-chevron-right right"></i></a>
      </div>

      <hr />
      <div class="grid-item col-3">
        <a href="#">
          <img class="b" src="../img/headphones.jfif" /><br />Headphones<br /><span class="offer">Upto 50%
            off</span><br />JBL, Sony & more</a>
      </div>
      <div class="grid-item col-3">
        <a href="#">
          <img class="b" src="../img/speakers.jfif" /><br />Speakers<br /><span class="offer">Upto 50% off</span>
          <br />JBL, Sony & more</a>
      </div>
      <div class="grid-item col-3">
        <a href="#">
          <img class="b" src="../img/shoes.jfif" /><br />Shoes<br /><span class="offer">Upto 50% off</span><br />Shoes,
          Sandals & more</a>
      </div>
      <div class="grid-item col-3">
        <a href="#">
          <img class="b" src="../img/mobile accessories.jfif" /><br />Mobile Accessories<br /><span class="offer">Upto
            10% off</span><br />Grab it!</a>
      </div>

    </div>
    <div class="row p3">
      <div class="grid-item2 col-4">
        <a href="#">
          <img class="e" src="../img/Sale-Winter-Ready-to-Wear-E-commerce-Design-Template.jpg" /></a>
      </div>
      <div class="grid-item2 col-4">
        <a href="#">
          <img class="e" src="../img/Asus-Gaming-Router-AC65P-–-Banner-Template.jpg" /></a>
      </div>
      <div class="grid-item2 col-4">
        <a href="#">
          <img class="e" src="../img/Shoe-Fashion-Ad-Template.jpg" /></a>
      </div>
    </div>
    <div class="row p4">
      <div class="c col-12">
        Top Selections<a href="#"><i class="fas fa-chevron-right right"></i></a>
      </div>
      <hr />

      <div class="grid-item col-3">
        <a href="#">
          <img class="b" src="../img/trimmers.jfif" /><br />Trimmers<br /><span class="offer">From ₹999</span><br />Grab,
          it!</a>
      </div>
      <div class="grid-item col-3">
        <a href="#">
          <img class="b" src="../img/tshirt.jfif" /><br />Tshirts<br /><span class="offer">From ₹299</span>
          <br />Hurry up!</a>
      </div>
      <div class="grid-item col-3">
        <a href="#">
          <img class="b" src="../img/Handbag.jfif" /><br />Handbags<br /><span class="offer">From
            ₹599</span><br />Special Offer</a>
      </div>
      <div class="grid-item col-3">
        <a href="#">
          <img class="b" src="../img/band.jfif" /><br />Smartbands<br /><span class="offer">Upto 10% off</span><br />Grab
          it!</a>
      </div>
    </div>
    <div class="row">
      <a href="#">
        <img class="p1" src="../img/Copy of Sharp Appliances Black Friday Animated 300x250-High-Quality.jpg" /></a>
    </div>
  </div>
  <div class="footer row">

    <div class="grid-item3 col-3">
      About<br /><a href="#">Contact Us</a><br /><a href="#">About Us</a><br /><a href="#">Careers</a><br /><a
        href="#">Press</a>
    </div>
    <div class="grid-item3 col-3">
      Help<br /><a href="#">Payment</a><br /><a href="#">Shipping</a><br /><a href="#">Cancellation & Return</a><br /><a
        href="#">FAQ</a>
    </div>
    <div class="grid-item3 col-3">
      Policy<br /><a href="#">Return Policy</a><br /><a href="#">Terms Of Use</a><br /><a href="#">Security</a><br /><a
        href="#">Privacy</a>
    </div>
    <div class="grid-item3 col-3">
      Social<br /><a href="#">Instagram</a><br /><a href="#">Facebook</a><br /><a href="#">Youtube</a>
    </div>
    <div class="grid-item3 col-3"></div>
  </div>







  <!-- Optional JavaScript -->

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
  </script>

  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
  </script>
  <script type="text/javascript" src="./mob.js"></script>


  <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


  <script>
  // Set the date we're counting down to
  var countDownDate = new Date("Nov 20, 2020 15:37:25").getTime();

  // Update the count down every 1 second
  var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds

    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = hours + " : " +
      minutes + " : " + seconds + " Left ";

    // If the count down is over, write some text 
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("demo").innerHTML = "EXPIRED";
    }
  }, 1000);
  </script>
</body>

</html>