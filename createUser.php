<?php require_once 'database.php';

    if(isset($_POST['submit'])){
        $fName = $_POST['firstName'];
        $lName = $_POST['lastName'];
        $citizenship = $_POST['citizenship'];
        $dob = $_POST['dob'];
        $phone = $_POST['phoneNumber'];
        $email = $_POST['email'];
        $privilege = $_POST['privilegeName'];
        $password = $_POST['password'];
        $sql = "INSERT INTO cuc353_1.User(privilegeName, firstName, lastName, citizenship, email, phoneNumber, dob, password) VALUES ('$privilege', '$fName', '$lName', '$citizenship', '$email', '$phone', '$dob', '$password')";

        if(mysqli_query($conn, $sql))
        {
            echo "Form submitted.";
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
          form > input{
            margin: 10px !important;
          }
         
    </style>
    
</head>

  <body>
        <?php include './components/nav.php'; ?>
          
          <div class="d-flex align-items-center flex-column col-xs-1 text-center" style="margin-top= 10px;">
            <h1 class="h1">Sign Up</h1>
        
            <form class="d-flex flex-column w-25" action="createUser.php" method="post" width="200px">
                <input class="m-3" type="text" name="firstName" placeholder="First Name" required>
                <input class="m-3" type="text" name="lastName" placeholder="Last Name" required>
                <input class="m-3" type="password" name="password" placeholder="Password" required>
                <input class="m-3" type="text" name="citizenship" placeholder="Citizenship" required>
                <input class="m-3" type="text" name="email" placeholder="Email" required>
                <input class="m-3" type="text" name="phoneNumber" placeholder="Phone" required>
                <input class="m-3" type="text" name="privilegeName" placeholder="Privilege" required>
                <input class="m-3" type="text" name="dob" placeholder="Date of Birth">
                <button class="btn btn-outline-success px-5" type="submit">Sign Up</button>
            </form>
        </div>
  </body>

</html>