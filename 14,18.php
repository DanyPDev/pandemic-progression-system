<?php require_once './components/database.inc.php';
session_start();
$input1 = "";
$date1 = "";
$time1 = "";
$date2 = "";
$time2 = "";
if(isset($_POST['View14'])){ //check if form was submitted
    $input1 = $_POST['author']; //get input text
}
if(isset($_POST['View18'])){ //check if form was submitted
    $date1 = $_POST['times'][0];
    $time1 = $_POST['times'][1];
    $date2 = $_POST['times'][2];
    $time2 = $_POST['times'][3]; //get input text
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
        <div class="col-xs-1 text-center" style="margin-top= 10px;">
            <h1 class="h1">Queries 14 and 18</h1>
        </div>
        <table class="table">
            <tr>
                <td>
                    <form action="#" method="post">
                        <div>
                            <label>Query 14: </label></br><label>Author:</label><input type="text" size="20" name="author"/>
                        </div>
                        <input type="submit" name="View14" value="View">
                    </form> 
                </td> 
                <td>
                    <?php
                    if($input1 != ""){
                        //echo $input;
                        $sql = "Call giveArticlesOf("."'".$input1."'".");";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo '<table class="table"><tr><th scope="col">Publication Date</th><th scope="col">Major Topic</th><th scope="col">Minor Topic</th><th scope="col">Summary</th><th scope="col">Article</th></tr>';
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>".$row["datePublication"] ."</td><td>". $row["majorTopic"]. "</td><td>" . $row["minorTopic"]. "</td><td>" . $row["summary"]. "</td><td> " . $row["article"]."</td></tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                    }
                    ?>
                </td>    
            </tr>
            <tr>
                <td>
                    <form action="#" method="post">
                        <div>
                            <label>Query 18: </label></br><label>Before and After</label></br><label> (YYYY-MM-DD and HH:MM:SS) formats</label><br><input type="text" size="10" name="times[]"/><input type="text" size="10" name="times[]"/>AND<input type="text" size="10" name="times[]"/><input type="text" size="10" name="times[]"/>
                        </div>
                        <input type="submit" name="View18" value="View">
                    </form> 
                </td> 
                <td>
                    <?php
                    if($date1 != "" && $time1 != "" && $date2 != "" & $time2 != ""){                 
                        $sql = "Call giveSentEmails("."'".$date1."',"."'".$time1."',"."'".$date2."',"."'".$time2."'".");";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo '<table class="table"><tr><th scope="col">Date Sent</th><th scope="col">Time Sent</th><th scope="col">Email</th><th scope="col">Subject</th><th scope="col">Body</th></tr>';
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>".$row["dateSent"] ."</td><td>". $row["timeSent"]. "</td><td>" . $row["email"]. "</td><td>" . $row["subject"]. "</td><td> " . $row["body"]."</td></tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                    }
                    ?>
                </td>
            </tr>   
        </table>
  </body>
</html>