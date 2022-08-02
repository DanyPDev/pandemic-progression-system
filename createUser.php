<?php require_once 'database.php';

    if(isset($_POST['submit'])){
        $fName = $_POST['firstName'];
        $lName = $_POST['lastName'];
        $citizenship = $_POST['citizenship'];
        $dob = $_POST['dob'];
        $phone = $_POST['phoneNumber'];
        $email = $_POST['email'];
        $privilege = $_POST['privilegeName'];

        $sql = "INSERT INTO cuc353_1.User (privilegeName, firstName, lastName, citizenship, email, phoneNumber, dob) VALUES ('$privilege', '$fName', '$lName', '$citizenship', '$email', '$phone', '$dob')";

        if(mysqli_query($conn, $sql))
        {
          echo '<script>alert("User Added to Database")</script>'; //https://www.geeksforgeeks.org/how-to-pop-an-alert-message-box-using-php/
        }

        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>COMP353 Project</title>
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
    <?php include './componants/nav.php'; ?>
        
          <div class="col-xs-1 text-center" style="margin-top= 10px;">
            <h1 class="h1">Add a User</h1>
            </div>
            <form class="form-group" action="createUser.php" method="post">
                <label for="fname">First Name</label>
                <br><input id="fname" type="text" class="form-control" name="firstName" placeholder="First Name"/></br>

                <label for="lname">Last Name</label>
                <br><input id="lname" type="text" class="form-control" name="lastName" placeholder="Last Name"/></br>

                <label for="citizenship">Citizenship</label>
                <br><input id="citizenship" type="text" class="form-control" name="citizenship" placeholder="Citizenship"/></br>

                <label for="email">Email</label>
                <br><input id="email" type="text" class="form-control" name="email" placeholder="Email"/></br>

                <label for="phone">Phone Number</label>
                <br><input id="phone" type="text" class="form-control" name="phoneNumber" placeholder="Phone"/></br>

                <label for="privilege">Privilege</label>
                <br><input id="privilege" type="text" class="form-control" name="privilegeName" placeholder="Privilege"/></br>

                <label for="dob">Date of Birth</label>
                <br><input id="dob"type="text" class="form-control" name="dob" type="date" placeholder="Date of Birth"/></br>

                <br><button type="submit" class="btn btn-primary" name="submit">Submit User</button></br>
            </form>
  </body>

</html>