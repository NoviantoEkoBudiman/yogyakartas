<?php
session_start();
if($_SESSION){
  header("Location:index.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>PT. YOGYAKARTAS</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body>
    <?php
    if(isset($_POST['login'])){

      $link = mysqli_connect("127.0.0.1", "root", "", "yogyakartas");

      $username=$_POST['username'];
      $password=md5($_POST['password']);
      $sql="SELECT * FROM `petugas` WHERE `username` = '$username' AND `password` = '$password' ";
      $result=mysqli_query($link,$sql);
      
      // Associative array
      $row=mysqli_fetch_assoc($result);

      if($row['level']=="admin")
      {
        $_SESSION["username"]=$username;
        $_SESSION["kdpet"]=$row["kdpet"];
        $_SESSION["nmpet"]   =$row["nmpet"];
        $_SESSION["level"]   ="admin";
        header("Location:petugas/admin1122/inputpetugas.php");
      }

      elseif($row['level']=="produksi")
      {
        $_SESSION["username"]=$username;
        $_SESSION["username"]=$row["kdpet"];
        $_SESSION["nmpet"]   =$row["nmpet"];
        $_SESSION["level"]   ="produksi";
        header("Location:petugas/bag_produksi/index.php");
      }

      else
      {
        echo "Kombinasi user dan password salah";
      }
    }
    ?> 

    <div class="container">

      <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">Login</h2>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="ingat-saya"> Ingat Saya
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
      </form>

    </div> <!-- /container -->
  </body>
</html>