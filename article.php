<?php require_once './components/database.php';
session_start();
    if(isset($_POST['submit'])){

      if(!empty($_POST['author']) && !empty($_POST['majorTopic']) && !empty($_POST['minorTopic']) && !empty($_POST['summary']) && !empty($_POST['article']))
      {
        $author = $_POST['author'];
        $major = $_POST['majorTopic'];
        $minor = $_POST['minorTopic'];
        $summary = $_POST['summary'];
        $article = $_POST['article'];
        $date = date("Y-m-d");
        
        $sql="INSERT INTO Article (author, datePublication, majorTopic, minorTopic, summary, article) VALUES ('$author', '$date', '$major', '$minor', '$summary', '$article')";

        if(mysqli_query($conn, $sql))
        {
          echo '<script>alert("Article Submitted")</script>'; //https://www.geeksforgeeks.org/how-to-pop-an-alert-message-box-using-php/
        }

        mysqli_close($conn);
      }
      else{
        echo "You must fill all the fields.";
      }
        
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
            <form class="form-group" action="article.php" method="post">
                <label for="author">Author</label>
                <br><input id="author" type="text" class="form-control" name="author" placeholder="Author"/></br>

                <label for="majorTopic">Major Topic</label>
                <br><input id="majorTopic" type="text" class="form-control" name="majorTopic" placeholder="Major Topic"/></br>

                <label for="minorTopic">Minor Topic</label>
                <br><input id="minorTopic" type="text" class="form-control" name="minorTopic" placeholder="Minor Topic"/></br>

                <label for="summary">Summary</label>
                <br><input id="summary" type="text" class="form-control" name="summary" placeholder="Summary"/></br>

                <label for="article">Article</label>
                <br><textarea id="article" type="text" class="form-control" name="article" placeholder="Article"></textarea></br>

                <br><button type="submit" class="btn btn-primary" name="submit">Submit User</button></br>
            </form>
  </body>

</html>
