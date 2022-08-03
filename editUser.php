<?php require_once './components/database.inc.php';
      require_once './components/functions.inc.php';
      session_start();

    

       

    if(isset($_POST["submit"])){

        $fName = $_POST["firstName"];
        $lName = $_POST["lastName"];
        $citizenship = $_POST["citizenship"];
        $dob = $_POST["dob"];
        $phone = $_POST["phoneNumber"];
        $email = $_POST["email"];
        $privilege = $_POST["privilegeName"];
        $password = $_POST["password"];

        $sql="UPDATE cuc353_1.User SET privilegeName='$privilege', firstName='$fName', lastName='$lName', citizenship='$citizenship', email='$email', phonenumber='$phone', dob='$dob') WHERE userID='$userID'";

        if(mysqli_query($conn, $sql))
        {
          echo '<script>alert("Edit Submitted")</script>'; //https://www.geeksforgeeks.org/how-to-pop-an-alert-message-box-using-php/
          header('location: allUsers.php');
        }

        mysqli_close($conn);
        
      

    
        // $stmt = mysqli_stmt_init($conn);
        // if(!mysqli_stmt_prepare($stmt, $sql)) {
        //    header("location: index.php");
        // } 
        // mysqli_stmt_bind_param($stmt, "ss",$s,$s);
        // mysqli_stmt_execute($stmt);
        // $resultDsata = mysqli_stmt_get_result($stmt);

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
                $sql = mysqli_query($conn, "SELECT * FROM User WHERE userID='$userID'"); 
                $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
                foreach($sql as $r) { ?>
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