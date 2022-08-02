<?php require './components/functions.inc.php';
      require_once './components/database.inc.php';
   
      echo isset($_POST["submit"]);
      if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $pwd = $_POST["password"];
    
        loginUser($conn, $username, $pwd);
      }
      
      if(isset($_GET["error"]))

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>COMP353 Project</title>
    <link rel="stylesheet" href="index.css">
   <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <style>
          .dropdown:hover .dropdown-menu{
            display: block;
          }
    </style>
</head>

  <body>

  <?php include './components/nav.php'; ?>

          <div class="col-xs-1 text-center" style="margin-top= 10px;">
            <h1 class="h1">Welcome to The International Covid Application</h1>
            <h2 class="h2">Find The Latest Satistics about COVID</h2>
            <br/>
            <h2 class="h2">Just use the navigation bar to navigate.</h2>
            <br/>
            <h2 class="h2">Have fun using the website! :D</h2>
        </div>
      
  </body>

</html>