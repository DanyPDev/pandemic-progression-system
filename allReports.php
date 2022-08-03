<?php require_once './components/database.inc.php';
      require_once './components/functions.inc.php';
session_start();

if(isset($_POST['delete'])){

  $id_to_delete = mysqli_real_escape_string($conn, $_POST['userID']);
  
  $sql = "DELETE FROM Reports WHERE userID = $id_to_delete;";

  if(mysqli_query($conn, $sql)){
    header('location: allUsers.php?userDelete=true');
    echo '<script>alert("User Deleted from Database")</script>'; //https://www.geeksforgeeks.org/how-to-pop-an-alert-message-box-using-php/
  } else {
    echo 'query error: ' . mysqli_error($conn);
  }
}

$sql = 'SELECT *
from Reports
order by reportDate desc;
';

$result = mysqli_query($conn, $sql);

$researchers = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

// print_r($researchers);

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
            <h1 class="h1">Reports</h1>
        </div>
        <table class="table">
  <thead>
    <tr class="h1" style="font-size: 20px;">
      
      <th scope="col">Country</th>
      <th scope="col">Number of Vaccinated</th>
      <th scope="col">Infected Total</th>
      <th scope="col">Infected Vaccinated</th>
      <th scope="col">Deaths Vaccinated</th>
      <th scope="col">Deaths Not Vaccinated</th>
      <th scope="col">Infected Not Vaccinated</th>
      <th scope="col">Report Date</th>
      <th scope="col">Number of Vaccines</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($researchers as $r) { ?>
        <tr class="h1" style="font-size: 15px;">
            <th scope="row"> <?php echo htmlspecialchars($r['GA_country']); ?> </th>
            <td> <?php echo htmlspecialchars($r['numVaccine']); ?> </td>
            <td> <?php echo htmlspecialchars($r['infectedVax']); ?> </td>
            <td> <?php echo htmlspecialchars($r['deathVax']); ?> </td>
            <td> <?php echo htmlspecialchars($r['deathNoVax']); ?> </td> 
            <td> <?php echo htmlspecialchars($r['infectedNotVax']); ?> </td>
            <td> <?php echo htmlspecialchars($r['reportDate']); ?> </td>
            <td> <?php echo htmlspecialchars($r['numVaccine']); ?> </td>
           <?php
            if(isset($_SESSION['privilegeName']) && $_SESSION['privilegeName'] == "Administrator"){
              echo '<td> <form action="allUsers.php" method="POST">
              <input type="hidden" name="userID" value="'.$r["userID"].'">
              <input type="submit" class="btn btn-lg btn-danger" value="Edit" name="edit"></form> </td>';
            }
            else
            {
              echo  '<td> <button type="button" class="btn btn-lg btn-danger" disabled>Edit</button> </td>';
            }
           if(isset($_SESSION['privilegeName']) && $_SESSION['privilegeName'] == "Administrator"){
            echo '<td> <form action="allUsers.php" method="POST">
            <input type="hidden" name="userID" value="'.$r["userID"].'">
            <input type="submit" class="btn btn-lg btn-danger" value="Delete" name="delete"></form> </td>';
          }
          else
          {
            echo  '<td> <button type="button" class="btn btn-lg btn-danger" disabled>Delete</button> </td>';
          }
            ?>
        </tr>
    <?php } ?>
    
  </tbody>
</table>
  </body>

</html>