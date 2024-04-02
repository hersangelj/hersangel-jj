<?php
$Email = $password= "";
$EmailErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["Email"])) {
        $EmailErr = "Email is Required";
    } else {
        $Email = $_POST["Email"];
    }

    if (empty($_POST["password"])) {
        $passwordErr = "password is Required";
    } else {
        $password = $_POST["password"];
    }

    if ($Email && $password) {
        include("connections.php");

        $check_Email = mysqli_query($connections, "SELECT * FROM login_tbl WHERE Email='$Email'");
        $check_Email_row = mysqli_num_rows($check_Email);

        if ($check_Email_row > 0) {
            while ($row = mysqli_fetch_assoc($check_Email)) {
                $db_password = $row["password"];
                $db_Account_type = $row["Account_type"];
                if ($password == $db_password) {
                if ($db_Account_type == "1") {
                    echo "<script>window.location.href='admin.php';</script>";
                } else {
                    echo "<script>window.location.href='user.php';</script>";
                }
            } else {
                $passwordErr = "Incorrect password";
            }
            }
         }
        
        else {
            $EmailErr = "Email is not registered";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login & Registration Form | Codehal</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

  <div class="wrapper">
    <div class="form-wrapper sign-in">
      <form action="">
        <h2>Login</h2>
        <div class="input-group">
          <input type="text" required>
          <label for="">Email</label>
        </div>
        <div class="input-group">
          <input type="Password" required>
          <label for="">Password</label>
        </div>
        <div class="remember">
          <label><input type="checkbox"> Remember me</label>
        </div>
        <button type="submit">Login</button>
      </form>
    </div>


  <script src="script.js"></script>
</body>

</html>