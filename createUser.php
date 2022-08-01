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
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php">COVID SYSTEM</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarScroll">
                <div>
                  <form class="d-flex">
                    <input class="form-control me-2" type="username" name="username" placeholder="Username" aria-label="Search">
                    <input class="form-control me-2" type="password" name="password" placeholder="Password" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Login</button>
                  </form>
                </div>
                <div class="collapse navbar-collapse d-flex flex-row-reverse" id="navbarScroll" style="gap: 10px;">
                <ul class="navbar-nav navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item dropdown pr-10">
                    <a id="dropdown" class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" aria-expanded="false">
                      Menu
                    </a>
                    <ul id="dropdownChild" class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                      <li><a class="dropdown-item" href="covidReports.php">Covid Statistics</a></li>
                      <li><a class="dropdown-item" href="createUser.php">Create User</a></li>
                      <li><a class="dropdown-item" href="allUsers.php">Display Users</a></li>
                    </ul>
                  </li>  
                  <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
                  <button type="button nav-item" class="btn btn-outline-danger px-5">Report A Bug</button>
                  </a>
                  
                </ul>
                
              </div>
            </div>
            </nav>
          <script type="text/javascript">
            const element = document.getElementById("dropdown");
            const child = document.getElementById("dropdownChild");
            console.log(element);
            let handleMouseEnter = () => {element.classList.add("show"); child.click();};
            let handleMouseLeave = () => {element.classList.remove("show"); child.click();};
            element.addEventListener("mouseenter", handleMouseEnter);
            element.addEventListener("mouseleave", handleMouseLeave);
          </script>
          <div class="col-xs-1 text-center" style="margin-top= 10px;">
            <h1 class="h1">Add a User</h1>
            </div>
            <form action="createUser.php" method="post">
                <br><input type="text" name="firstName" placeholder="First Name"/></br>
                <br><input type="text" name="lastName" placeholder="Last Name"/></br>
                <br><input type="text" name="citizenship" placeholder="Citizenship"/></br>
                <br><input type="text" name="email" placeholder="Email"/></br>
                <br><input type="text" name="phoneNumber" placeholder="Phone"/></br>
                <br><input type="text" name="privilegeName" placeholder="Privilege"/></br>
                <br><input type="text" name="dob" placeholder="Date of Birth"/></br>
                <br><button type="submit" name="submit">Submit User</button></br>
            </form>
  </body>

</html>