<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" />
  <link rel="stylesheet" href="./cart.css">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="shortcut icon" type="image/jpg" href="../ep-monogram-logo-emblem-style-isolated-black-background-173922122.jpg" style=" width: 100px;">

  <title>Shopping Cart|EPORT</title>

</head>

<body>
  <?php
  $servername = "localhost";
  $username = "id16369615_bhavesh";
  $password = "pmNYsnJbS2V72#um";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, "id16369615_ecommerce");
  if (isset($_POST['search'])) {
    $searchdata = $_POST['datasearch'];
    $search = "SELECT * FROM product where brand like '%$searchdata%'";
    $searchquery = mysqli_query($conn, $search);
    $row = mysqli_fetch_array($searchquery);
    $brand = $row['brand'];
    $session = $_GET['session'];
    if ($session) {
      header("location: ../product.php?user='$brand'&session=" . true);
    } else {
      header("location: ../product.php?user='$brand'&session=" . false);
    }
    
  }
  if (isset($_POST['del'])) {
    $email = $_SESSION['username1'];
    $cart = "DELETE FROM cart WHERE email='$email'";
    $cartdel = mysqli_query($conn, $cart);
    $user = "DELETE FROM register WHERE email='$email'";
    $userdel = mysqli_query($conn, $user);
    header('Location:../index.php');
  }
  ?>
  <nav class="navbar navbar-expand-lg navbar-light nav1 ">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php
    $session = $_GET['session'];
    if ($session) {
      echo "<a class=\"navbar-brand\" href=\"../UserHome/index.php?session=".true."\">EPORT<i class=\"fas fa-shopping-bag log\"></i></a>";
    } else {
      echo "<a class=\"navbar-brand\" href=\"../index.php\">EPORT<i class=\"fas fa-shopping-bag log\"></i></a>";
    }
    ?>


    <form class="form-inline mr-lg-5" method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="datasearch">
      <button class="btn btn-outline-success bg-light " type="submit" name="search">Search</button>
    </form>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav ml-lg-5 ">
        <li class="nav-item">
          <?php
          $session = $_GET['session'];
          if ($session) {
              session_start();
            $name = $_SESSION['name'];
            echo "<div class=\"dropdown\">
            <button class=\"btn btn-primary dropdown-toggle\" type=\"button\" id=\"dropdownMenuButton\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
              $name
            </button>
            <div class=\"dropdown-menu bg-black\" aria-labelledby=\"dropdownMenuButton\">
              <a class=\"dropdown-item href\" href='../changepassword/1.php' style='color:black !important; font weight:bolder !important;'>Change password</a>
              <a class=\"dropdown-item href \" href=\" \" style=\"color:black !important; 
              font-weight:bolder !important;\">
                <form method=POST><button name=\"del\" class=\"del\" type=submit>Delete Account</button></form>
              </a>
              <a class=\"dropdown-item\" href=\"../index.php\" name='logout' style='color:black !important; font weight:bolder !important;'>Logout
              </a>
            </div>
          </div>";
          } else {
            echo '<a class="nav-link" href="../Login/1.php">Login </a>';
            
          }
          ?>

        </li>

      </ul>

    </div>
  </nav>

  <nav class="navbar navbar-expand-lg navbar-danger bg-white">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-lg-5 ">
        <li class="nav-item">
          <!-- <a class="nav-link" href="
                <?php
                //  session_destroy();
                //  echo '../Home/index.php';
                ?>" name='logout'>
            <?php //echo $_SESSION['name'];
            ?></a> -->
          <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Electronics
            </button>
            <div class="dropdown-menu dropdown-multicol2" aria-labelledby="dropdownMenuButton">
              <div class="dropdown-col">

                <b class='dropdown-item categ h1'><a class='h1' href="<?php $session = $_GET['session'];
                                                                      if ($session) {
                                                                        echo "../product.php?user='Mobile'&session=" . true;
                                                                      } else {
                                                                        echo "../product.php?user='Mobile'&session=" . false;
                                                                      } ?>">Mobiles</a></b>
                <a class='dropdown-item categ h2' href="<?php $session = $_GET['session'];
                                                        if ($session) {
                                                          echo "../product.php?user='Redmi'&session=" . true;
                                                        } else {
                                                          echo "../product.php?user='Redmi'&session=" . false;
                                                        } ?>">Mi</a>
                <a class='dropdown-item categ h2' href="<?php $session = $_GET['session'];
                                                        if ($session) {
                                                          echo "../product.php?user='Samsung'&session=" . true;
                                                        } else {
                                                          echo "../product.php?user='Samsung'&session=" . false;
                                                        } ?>">Samsung</a>
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
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
    <?php
    $servername = "localhost";
  $username = "id16369615_bhavesh";
  $password = "pmNYsnJbS2V72#um";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, "id16369615_ecommerce");

    $session = $_GET['session'];
    


    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    } else {
      if (!$session) {
        echo '<div class="outer"><div class="col-1 pt-2"><b>My Cart</b></div><div class="offset-1 cim1"><img src="./img/d438a32e-765a-4d8b-b4a6-520b560971e8.png" class="cim offset-3"><br><div class="col-4 offset-3 cim2">Login to see your cart</div><br><div class="lgn">
        <a class="offset-4 col-1" href="../Login/1.php"><button class="btn btn-outline-success bg-light " >Login</button> </a>
        </div></div>';
      } else {
        $total = 0;
        $email = $_SESSION['username1'];
        $result = "Select * From cart where email='$email'";
        $query = mysqli_query($conn, $result);
        $prodcount = mysqli_num_rows($query);
        if ($prodcount > 0) {
          echo '<div class="row">
        <div class="offset-1 col-7 bg-white">
          <div class="col-12 pt-2 ca"><b>My Cart(' . $prodcount . ')</b><hr></div>';
          while ($row1 = mysqli_fetch_array($query)) {
            $id = $row1['product_id'];
            $result1 = "Select * From product where id='$id'";
            $query1 = mysqli_query($conn, $result1);
            $row = mysqli_fetch_array($query1);
            $suppid = $row['supplier_id'];

            $result2 = "Select * From supplier where supplier_id='$suppid'";
            $query2 = mysqli_query($conn, $result2);
            $supp = mysqli_fetch_array($query2);
            $prodcount = mysqli_num_rows($query);
            $total = $total + $row['price'];
            $id = $row['id'];
            echo
              "
                <div class=\"row\">
                  <div class=\"col-2 ml-4\">
                    <img src=\"data:image;base64," . base64_encode($row['image']) . " \" alt=\"Image\" style=\"width:60px; height:120px;\" >
                  </div>
                  <div class=\"col-8 mt-1 ml-4\">
                    <span class=\"pt-2 nm\">" . $row['name'] . " </span><br>
                    <span class=\"text-muted\">Seller:" . $supp['supplier_name'] . "</span><br>
                    <b class=\"pt-2\">₹" . $row['price'] . "</b><br>
                    <form method=POST action=cart.php?session=" . true . " ><a><button class=\"btn btn-outline-success bg-light adc\" name=$id type=submit >Remove</button></a></form>
                  </div>
                </div><hr>";
            if (isset($_POST[$id])) {
              $cprod = "DELETE FROM cart WHERE email='$email' and product_id='$id'";
              $cproddel = mysqli_query($conn, $cprod);
              echo "<meta http-equiv=\"refresh\" content=\"0\">";
              //Header('Location: ' . $_SERVER['PHP_SELF']);
              //echo "<script>console.log($email);</script>";
              // add($email, $id);
            }
          }
          echo '</div>
        <div class="col-3 bg-white sum ml-4">
        <div class="col-12 pt-2 text-muted"><b>Price Details</b><hr></div>
        <div class="col-9 pt-2">Price(' . $prodcount . ')<b class="offset-9 pt-2">₹' . $total . '</b></div>
        <div class="col-12 pt-2">Delivery Charges<b class="offset-3 pl-1 dc">FREE</b></div>
        <hr>
        <div class="col-12 pr-2 ">Total Amount<b class="offset-3 pl-3">₹' . $total . '</b></div>
        </div>
      </div>';
        } else {
          echo '<div class="outer"><div class="col-1 pt-2"><b>My Cart</b></div><div class="offset-1 cim1"><img src="./img/d438a32e-765a-4d8b-b4a6-520b560971e8.png" class="cim offset-3"><br><div class="col-3 offset-3 cim3">Your Cart is empty!</div><br><div class="lgn1">
        <a class="offset-4 col-1" href="../UserHome/index.php?session='.true.'"><button class="btn btn-outline-success bg-light " >Shop Now</button> </a>
        </div></div>';
        }
      }
    }
    ?>

  </div>







  <!-- Optional JavaScript -->

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script type="text/javascript" src="./cart.js"></script>


  <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>
</html>