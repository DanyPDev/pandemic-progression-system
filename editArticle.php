<?php require_once './components/database.inc.php';
      require_once './components/functions.inc.php';
      session_start();

    
      if(isset($_POST["submit"])){

        $userID = $_SESSION['userEdit'];
        echo $userID;
        $fName2 = $_POST["firstName"];
        $lName2 = $_POST["lastName"];
        $citizenship2 = $_POST["citizenship"];
        $dob2 = $_POST["dob"];
        $phone2 = $_POST["phoneNumber"];
        $email2 = $_POST["email"];
        $privilege2 = $_POST["privilegeName"];
        $password2 = $_POST["password"];

        $sql="UPDATE cuc353_1.User SET privilegeName='$privilege2', firstName='$fName2', lastName='$lName2', citizenship='$citizenship2', email='$email2', phoneNumber='$phone2', dob='$dob2' WHERE userID='$userID'";
        
        if(mysqli_query($conn, $sql))
        {
          echo '<script>alert("Edit Submitted")</script>'; //https://www.geeksforgeeks.org/how-to-pop-an-alert-message-box-using-php/
          header('location: allUsers.php');
        }
        else{
          echo '<script>alert("Not Submitted")</script>';
        }
        mysqli_close($conn);
    } 
       

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
          
          <div class="d-flex align-items-center flex-column col-xs-1 text-center" style="margin-top: 10px;">
            <h1 class="h1">Edit Article</h1>
            <?php 
                $articleID = $_SESSION['articleIDEdit'];
                $sql = mysqli_query($conn, "SELECT * FROM Article WHERE articleID='$articleID'"); 
                $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
                foreach($result as $r) { ?>
                <form class="d-flex flex-column w-25" method="post" width="200px">
                    <input class="m-3" type="text" name="author" value="<?php $r['author']; echo $r['author']?>" required>
                    <input class="m-3" type="text" name="lastName" value="<?php $r['datePublication']; echo $r['datePublication']?>" required>
                    <input class="m-3" type="text" name="citizenship" value="<?php $r['article']; echo $r['article']?>" required>
                    <input class="btn btn-outline-success px-5" value="Update" name="submit" type="submit">
                    </form>
            <?php } ?>

        </div>
  </body>

</html>