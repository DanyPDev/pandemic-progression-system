<?php require_once './components/database.inc.php';
session_start();
$sql = 'SELECT r.GA_Country ,r.reportDate, r.numVaccine, r.infectedNotVax + r.infectedVax as infected, r.deathVax
from Reports r
order by r.reportDate desc;
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

          <div class="col-xs-1 text-center" style="margin-top: 10px;">
            <h1 class="h1">Covid Latest Reports</h1>
        </div>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Country</th>
      <th scope="col">Report Date</th>
      <th scope="col">Vaccine Number</th>
      <th scope="col">Infected</th>
      <th scope="col">Vaccinated deaths</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($researchers as $r) { ?>
        <tr class="h2">
            <th scope="row"> <?php echo htmlspecialchars($r['GA_Country']); ?> </th>
            <td> <?php echo htmlspecialchars($r['reportDate']); ?> </td>
            <td> <?php echo htmlspecialchars($r['numVaccine']); ?> </td>
            <td> <?php echo htmlspecialchars($r['infected']); ?> </td>
            <td> <?php echo htmlspecialchars($r['deathVax']); ?> </td> 
        </tr>
    <?php } ?>
    
  </tbody>
</table>
  </body>

</html>
