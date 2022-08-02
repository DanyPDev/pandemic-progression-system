<?php require_once 'database.php';

$sql = 'SELECT *
from User
order by userID desc;
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
            <h1 class="h1">Users</h1>
        </div>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">userID</th>
      <th scope="col">Privilege</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Citizenship</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Date of Birth</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($researchers as $r) { ?>
        <tr>
            <th scope="row"> <?php echo htmlspecialchars($r['userID']); ?> </th>
            <td> <?php echo htmlspecialchars($r['privilegeName']); ?> </td>
            <td> <?php echo htmlspecialchars($r['firstName']); ?> </td>
            <td> <?php echo htmlspecialchars($r['lastName']); ?> </td>
            <td> <?php echo htmlspecialchars($r['citizenship']); ?> </td> 
            <td> <?php echo htmlspecialchars($r['phoneNumber']); ?> </td>
            <td> <?php echo htmlspecialchars($r['email']); ?> </td>
            <td> <?php echo htmlspecialchars($r['dob']); ?> </td>
            <td> <?php echo htmlspecialchars('edit'); ?> </td>
            <td> <?php echo htmlspecialchars('delete'); ?> </td>
        </tr>
    <?php } ?>
    
  </tbody>
</table>
  </body>

</html>