<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="1.css" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet" />
</head>

<body>
  <?php
  $servername = "localhost";
  $username = "id16369615_bhavesh";
  $password = "pmNYsnJbS2V72#um";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, "id16369615_ecommerce");

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  if (isset($_POST['signid'])) {
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pass = $_POST['pwd'];
    $phone = $_POST['phone'];
    $emailquery = "select * from register where email='$email'";
    $query = mysqli_query($conn, $emailquery);
    $emailcount = mysqli_num_rows($query);
    if ($emailcount > 0) {
 
    } else {
      $insertquery = "INSERT INTO `register` (`email`, `fname`, `lname`, `password`, `phone`) VALUES('" . $email . "','" . $fname . "','" . $lname . "','" . $pass . "','" . $phone . "');";
      $data = mysqli_query($conn, $insertquery);
    }
  } else if (isset($_GET['loginbtn'])) {
    // username and password sent from form
    $username1 = $_GET['email1'];
    $password1 = $_GET['pwd1'];

    $sql = "SELECT * FROM register WHERE email='$username1' and password='$password1'";
    $result = mysqli_query($conn, $sql);

    // Mysql_num_row is counting table row
    $count = mysqli_num_rows($result);
    //echo "<script>console.log($count);</script>";
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //print_r($result);
    // If result matched $username and $password, table row must be 1 row
    if ($count == 1) {
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['username1'] = $username1;
      $_SESSION['email']=$result[0]['email'];

      $_SESSION['name'] = $result[0]['fname'];
      header('Location: ../UserHome/index.php?session='.true);
    } else {

      echo "<script>alert('Incorrect email or username');</script>";
    }
  }

  ?>
  <div class="outer">
    <div class="outer1">
      <div id="myDIV">
        <div class="header">
          <h1>Sign In</h1>
          <span class="c">New User?</span><span class="cr"><a href="#" onclick="myFunction9()">Create an
              account</a></span>
        </div>
        <form class="form1" method="GET">
          <fieldset>
            <div>
              <label for="email">Email address</label>
              <input type="email" id="email1" name="email1" required />
            </div>
            <br />
            <div>
              <label for="password">Password</label>
              <input type="password" id="pwd1" name="pwd1" required />
              <input type="checkbox" onclick="myFunction10()" />Show
              Password<br /><br />
            </div>
            <br /><br />
            <button type="submit" class="signupbtn" name="loginbtn">Login</button>
            <a href="../index.php"><button type="button" class="cancelbtn">Cancel</button></a>
          </fieldset>
        </form>
      </div>
      <div id="myDIV1">
        <div class="header">
          <h1>Create a account</h1>
          <span class="c">Already have a account?</span><span class="cr"><a href="#" onclick="myFunction0()">Log
              in</a></span>
        </div>
        <form method="POST">
          <fieldset>
            <div class="grid-container">
              <div class="item1">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" placeholder="example@gmail.com"
                  oninput="myFunction();myFunction1()" /><span id="emailerror"></span><br /><br />
              </div>

              <div class="item2">
                <label for="fname">First name</label>
                <input type="text" id="fname" name="fname" oninput="myFunction2();myFunction1()" />
                <span id="fnerror"></span>
              </div>
              <div class="item3">
                <label for="lname">Last name</label>
                <input type="text" id="lname" name="lname" oninput="myFunction3();myFunction1()" /><span class="lner"
                  id="lnerror"></span><br /><br />
              </div>
              <div class="item4">
                <label for="pwd">Password</label>
                <input type="password" id="pwd" name="pwd" placeholder="Minimum 8 characters"
                  oninput="myFunction4();myFunction1()" /><input type="checkbox" onclick="myFunction7()" />Show
                Password<span id="paserror"></span><br /><br />
              </div>
              <div class="item5">
                <label for="phone">Contact Number</label>
                <input type="text" id="phone" name="phone" placeholder="(+91)"
                  oninput="myFunction5();myFunction1()" /><span id="numerror"></span><br /><br />
              </div>
            </div>

            <button type="submit" class="signupbtn" id="signid" disabled="true" name="signid" onsubmit="myFunction0()">
              Create Accout
            </button>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="./1.js"></script>
</body>

</html>