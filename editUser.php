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
        $result = mysqli_query($conn, $sql);

        mysqli_close($conn);
        
        if(mysqli_query($conn, $sql))
        {
      
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
            <h1 class="h1">Edit User</h1>
            <?php 
                $userID = $_SESSION['userEdit'];
                echo $userID;
                $sql = mysqli_query($conn, "SELECT * FROM User WHERE userID='$userID'"); 
                $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
                cmysqli_free_result($sql);
                mysqli_close($conn);
        
                foreach($result as $r) { ?>
                <form class="d-flex flex-column w-25" action="editUser.php" method="post" width="200px">
                    <input class="m-3" type="text" name="firstName" value="<?php $r['firstName']; echo $r['firstName']?>" required>
                    <input class="m-3" type="text" name="lastName" value="<?php $r['lastName']; echo $r['lastName']?>" required>
                    <input class="m-3" type="text" name="citizenship" value="<?php $r['citizenship']; echo $r['citizenship']?>" required>
                    <input class="m-3" type="text" name="email" value="<?php $r['email']; echo $r['email']?>" required>
                    <input class="m-3" type="text" name="phoneNumber" value="<?php $r['phoneNumber']; echo $r['phoneNumber']?>" required>
                    <input class="m-3" type="text" name="privilegeName" value="<?php $r['privilegeName']; echo $r['privilegeName']?>" required>
                    <input class="m-3" type="date" name="dob" value="<?php $r['dob']; echo $r['dob']?>">
                    <input class="btn btn-outline-success px-5" value="Update" name="submit" type="submit">
                    </form>
            <?php } ?>

        </div>
  </body>

</html>