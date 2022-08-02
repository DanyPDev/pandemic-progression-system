<?php require_once './components/database.inc.php';
$input = "";
if(isset($_POST['View'])){ //check if form was submitted
    $input = $_POST['queries']; //get input text
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
            <h1 class="h1">Queries 10 to 20</h1>
        </div>
        <form action="#" method="post">
            Please note that queries 14 and 18 are on a separate page.
            <div>
                <label for="query">Choose a query to execute:</label>
                <select name="queries" id="queries">
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                </select>
            </div>
            <input type="submit" name="View" value="View">
        </form>  
        <?php
            switch($input){
                case 10:
                    $sql = "Select u.privilegeName,/* u.userName,*/ u.firstName, u.lastName, u.citizenship, u.email, u.phoneNumber
                            From User u
                            Order by u.privilegeName ASC, u.citizenship ASC;";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<table><tr><th>Role</th><th>Name</th><th>Citizenship</th><th>Email</th><th>Phone</th></tr>";
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["privilegeName"]. /*" - Username: " . $row["u.userName"]. " */"</td><td>" . $row["firstName"]. " " . $row["lastName"]. "</td><td>" . $row["citizenship"]. "</td><td>" . $row["email"]. "</td><td> " . $row["phoneNumber"]."</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }
                    $conn->close();

                    break;
                case 11:
                    $sql = "Select distinct a.author, a.majorTopic, a.minorTopic, a.datePublication, CASE
                    WHEN a.author in (Select organizationName From Organization) then o.orgCountry
                    WHEN a.author in (Select firstName + ' ' + lastName as name from User) then u.citizenship
End as citizenship											
From Article a, Organization o, User u
Where (a.author = o.organizationName XOR (a.author = (u.firstName + ' ' + u.lastName) AND u.userID = a.userID))
Order by citizenship ASC, a.author ASC, a.datePublication ASC;";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<table><tr><th>Author</th><th>Major</th><th>Minor</th><th>Date</th><th>citizenship</th></tr>";
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["author"]. "</td><td>" . $row["majorTopic"]. "</td><td>" . $row["minorTopic"]. "</td><td>" . $row["datePublication"]. "</td><td>" . $row["citizenship"]. "</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    break;
                case 12:
                    $sql = "Select ra.author, ra.major, ra.minor, ra.date, CASE
                    WHEN ra.author in (Select organizationName From organization) then o.orgCountry
                    WHEN ra.author in (Select firstName + ' ' + lastName as name from Users) then u.citizenship
End as citizenship											
From removedArticles ra, organization o, Users u
Where (ra.author = o.organizationName XOR ra.author = (u.firstName + ' ' + u.lastName))
Order by citizenship ASC, ra.author ASC, ra.date ASC;";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<table><tr><th>Author</th><th>Major</th><th>Minor</th><th>Date</th><th>citizenship</th></tr>";
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["author"]. "</td><td>" . $row["majorTopic"]. "</td><td>" . $row["minorTopic"]. "</td><td>" . $row["datePublication"]. "</td><td>" . $row["citizenship"]. "</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    break;
                case 13:
                    $sql = "Select u.privilegeName, u.userName, u.firstName, u.lastName, u.citizenship, u.email, u.phone, sus.suspensionDate
                            From User u, suspensedUser sus
                            Where u.userName = sus.userName
                            Order by sus.suspensionDate ASC;";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<table><tr><th>Role</th><th>Username</th><th>Name</th><th>Citizenship</th><th>Email</th><th>Phone</th><th>Suspension Date</th></tr>";
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["privilegeName"]. "</td><td>". $row["u.userName"]. "</td><td>" . $row["firstName"]. " " . $row["lastName"]. "</td><td>" . $row["citizenship"]. "</td><td>" . $row["email"]. "</td><td>" . $row["phoneNumber"]. "</td><td> ". $row["suspensionDate"] ."</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    break;  
                case 15:
                    $sql = "Select a.author as authorName, COUNT(distinct a.article) as numOfPublications, CASE
                    WHEN a.author in (Select organizationName From Organization) then o.orgCountry
                    WHEN a.author in (Select firstName + ' ' + lastName as name from User) then u.citizenship
End as citizenship
from Article a, User u, Organization o
Where (a.author = o.organizationName XOR (a.author = (u.firstName + ' ' + u.lastName) AND u.userID = a.userID))
group by a.author
order by numOfPublications desc";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<table><tr><th>Name</th><th>Number of Publications</th><th>Citizenship</th></tr>";
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["authorName"]. "</td><td>" . $row["numOfPublications"]. "</td><td>" . $row["citizenship"]."</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    break;
                case 16:
                    $sql = "select r.regionName as regionName, c.countryName, COUNT(distinct a.author) as numOfAuthors, COUNT(distinct a.article) as numOfPublications
                    from Region r, Country c, regionOf ro, user_lookUp ul, Article a, User u
                    where r.regionName = ro.regionName and c.countryName = ro.countryName and ul.userID = u.userID and ul.countryName = c.countryName and u.userID = a.userID
                    group by c.countryName
                    order by r.regionName asc, numOfPublications desc;";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<table><tr><th>Region</th><th>Country</th><th>Number of Authors</th><th>Number of Publications</th></tr>";
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["regionName"]. "</td><td>" . $row["countryName"]. "</td><td>" . $row["numOfAuthors"]. "</td><td>" . $row["numOfPublications"]. "</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    break;  
                case 17:
                    $sql = "select r.regionName, c.countryName,c.population, SUM(v.numVaccine) as numVaccine, SUM(c.covidDeaths) as covidDeaths, SUM(v.deathVaccine) as deathVaccine, v.reportDate
                    from Region r, Country c, Vaccine v, regionOf ro
                    where r.regionName = ro.regionName AND c.countryName = ro.countryName AND c.countryName = v.countryName AND v.reportDate >= ALL (Select v2.reportDate from Vaccine v2 where v2.countryName = c.countryName AND v.vaccineName = v2.vaccineName)
                    group by c.countryName
                    order by SUM(c.covidDeaths) ASC;
                    ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<table><tr><th>Region</th><th>Country</th><th>Population</th><th>#Vaccinated</th><th>#Covid Deaths</th><th>#Dead with Vaccine</th><th>Report Date</th></tr>";
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["regionName"]. "</td><td>" . $row["countryName"]. "</td><td>" . $row["population"]. "</td><td>" . $row["numVaccine"]. "</td><td>" . $row["covidDeaths"]. "</td><td> " . $row["deathVaccine"]. "</td><td> " . $row["reportDate"]."</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    break;  
                case 19:
                    $sql = "select r.reportDate, c.population, r.numVaccine, r.infectedNotVax + r.infectedVax as infected, r.deathVax
                    from Reports r, Country c
                    where c.countryName = 'Canada' and c.countryName = r.countryName
                    order by r.reportDate desc;";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<table><tr><th>Report Date</th><th>Population</th><th>#Vaccinated</th><th>#Infected</th><th>#Infected</th><th>#Dead Vaccine</th></tr>";
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["reportDate"]. "</td><td>" . $row["population"]. "</td><td>" . $row["numVaccine"]. "</td><td>" . $row["infected"]. "</td><td>" . $row["deathVax"]. "</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    break;
                case 20:
                    $sql = "Select a.author as authorName, CASE
                    WHEN a.author in (Select organizationName From Organization) then o.orgCountry
                    WHEN a.author in (Select firstName + ' ' + lastName as name from User) then u.citizenship
End as citizenship, s.nbUsers
from Article a, User u, Organization o, subscribed s
Where (a.author = o.organizationName XOR (a.author = (u.firstName + ' ' + u.lastName) AND u.userID = a.userID)) AND a.author = s.author
Group by s.author
Having s.nbUsers = (SELECT MAX(c) FROM (SELECT s.nbUsers AS c FROM subscribed s2
GROUP BY s2.author) as T);";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<table><tr><th>Author</th><th>Citizenship</th><th>#Subs</th></tr>";
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["authorName"]. "</td><td>" . $row["citizenship"]."</td><td>" . $row["nbUsers"]."</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    break;                          
            }
        ?>
  </body>
</html>