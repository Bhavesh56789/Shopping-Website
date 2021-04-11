<!DOCTYPE html>
<?php
session_start();
?>
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
  
  if (isset($_GET['changebtn'])) {
    $user = $_SESSION['username1'];
    $currpass = $_GET['currpass'];
    $newpass = $_GET['newpass'];
    $sql = "SELECT * FROM register WHERE email='$user'";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $currpassuser = ($result[0][password]);
    if ($currpassuser == $currpass) {
      $sql1 = "UPDATE register SET `password`='" . $newpass . "' WHERE email='$user'";
      $result1 = mysqli_query($conn, $sql1);
      echo "<script>alert('Correct current password');</script>";
      header('Location: ../UserHome/index.php?session='.true);
    } else {
      echo "<script>alert('Incorrect current password');</script>";
    }
  }

  ?>
  <div class="outer">
    <div class="outer1">
      <div id="myDIV">
        <div class="header">
          <h1>Change Password</h1>

        </div>
        <form class="form1" method="GET">
          <fieldset>
            <div>
              <label for="currpass">Current Password</label>
              <input type="password" id="currpassword" name="currpass" oninput="myFunction()" required />
              <span id="cpaserror"></span>
            </div>
            <br />
            <div>
              <label for="pwd">New Password</label>
              <input type="password" id="pwd" name="newpass" placeholder="Minimum 8 characters"
                oninput="myFunction4();myFunction1()" /><input type="checkbox" onclick="myFunction7()" />Show
              Password<span id="paserror"></span><br /><br />
            </div>
            <br /><br />
            <button type="submit" class="signupbtn" id="signid" disabled="true" name="changebtn"
              onsubmit="myFunction0()">
              Change
            </button>
            <a href="<?php echo '../UserHome/index.php?session='.true; ?>"><button type="button" class="cancelbtn">Cancel</button></a>
          </fieldset>
        </form>
      </div>

    </div>
  </div>
  <script type="text/javascript" src="./change.js"></script>
</body>

</html>