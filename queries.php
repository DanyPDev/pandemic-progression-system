<?php require_once './components/database.inc.php';
session_start();

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
                    $sql = "Select u.privilegeName, u.userName, u.firstName, u.lastName, u.citizenship, u.email, u.phoneNumber
                    From User u
                    Order by u.privilegeName ASC, u.citizenship ASC;";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<table class="table"><tr><th scope="col">Role</th><th scope="col">Username</th><th scope="col">Name</th><th scope="col">Citizenship</th><th scope="col">Email</th><th scope="col">Phone</th></tr>';
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["privilegeName"] ."</td><td>". $row["userName"]. "</td><td>" . $row["firstName"]. " " . $row["lastName"]. "</td><td>" . $row["citizenship"]. "</td><td>" . $row["email"]. "</td><td> " . $row["phoneNumber"]."</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }
                    $conn->close();

                    break;
                case 11:
                    $sql = "Select distinct a.author, t.majorTopic, t.minorTopic, a.datePublication, IF(a.author in (Select organizationName From Organization where a.author = organizationName), o.orgCountry, u.citizenship) as citizenship									
                    From Article a, Organization o, User u, Topic t
                    Where (a.author = o.organizationName XOR a.author = concat(u.firstName, ' ', u.lastName)) AND a.articleID = t.articleID AND a.articleID NOT IN (Select articleID from adminPrivilege where action = 'delete')
                    Order by citizenship ASC, a.author ASC, a.datePublication ASC;";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<table class="table"><tr><th scope="col">Author</th><th scope="col">Major</th><th scope="col">Minor</th><th scope="col">Date</th><th scope="col">citizenship</th></tr>';
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
                    $sql = "Select distinct a.author, t.majorTopic, t.minorTopic, a.datePublication, IF(a.author in (Select organizationName From Organization where a.author = organizationName), o.orgCountry, u.citizenship) as citizenship											
                    From Article a, Organization o, User u, Topic t
                    Where (a.author = o.organizationName XOR a.author = concat(u.firstName, ' ', u.lastName)) AND a.articleID = t.articleID AND a.articleID IN (Select articleID from adminPrivilege where action = 'delete')
                    Order by citizenship ASC, a.author ASC, a.datePublication ASC;";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<table class="table"><tr><th scope="col">Author</th><th scope="col">Major</th><th scope="col">Minor</th><th scope="col">Date</th><th scope="col">Citizenship</th></tr>';
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
                        echo '<table class="table"><tr><th scope="col">Role</th><th scope="col">Username</th><th scope="col">Name</th><th scope="col">Citizenship</th><th scope="col">Email</th><th scope="col">Phone</th><th scope="col">Suspension Date</th></tr>';
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["privilegeName"]. "</td><td>". $row["u.userName"]. "</td><td>" . $row["firstName"]. " " . $row["lastName"]. "</td><td>" . $row["citizenship"]. "</td><td>" . $row["email"]. "</td><td>" . $row["phoneNumber"]. "</td><td> ". $row["date"] ."</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    break;  
                case 15:
                    $sql = "select a.author as authorName, COUNT(distinct a.articleID) as numOfPublications, IF(a.author in (Select organizationName From Organization where a.author = organizationName), o.orgCountry, u.citizenship) as citizenship
                    from Article a, User u, Organization o
                    Where (a.author = o.organizationName XOR a.author = concat(u.firstName, ' ', u.lastName))
                    group by a.author
                    order by numOfPublications desc;";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<table class="table"><tr><th scope="col">Author</th><th scope="col">Number of Publications</th><th scope="col">Citizenship</th></tr>';
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
                    $sql = "select r.regionName as regionName, c.countryName, COUNT(distinct a.author) as numOfAuthors, COUNT(distinct a.articleID) as numOfPublications
                    from Region r, Country c, regionOf ro, user_lookUp ul, Article a, User u, Organization o
                    where r.regionName = ro.regionName and c.countryName = ro.countryName and ul.userID = u.userID and (ul.countryName = c.countryName XOR o.orgCountry = c.countryName) and a.author = o.organizationName XOR (a.author = (u.firstName + ' ' + u.lastName))
                    group by c.countryName
                    order by r.regionName asc, numOfPublications desc;";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<table class="table"><tr><th scope="col">Region</th><th scope="col">Country</th><th scope="col">Number of Authors</th><th scope="col">Number of Publications</th></tr>';
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
                    $sql = "select r.regionName, c.countryName, SUM(p.population), SUM(v.numVaccine), SUM(p.covidDeaths), SUM(v.deathVaccine)
                    from Region r, Country c, ProStaTer p, regionOf ro, countryContains cc, Vaccine v
                    where r.regionName = ro.regionName AND c.countryName = ro.countryName AND c.countryName = cc.countryName AND cc.prostaterName = p.prostaterName AND p.prostaterName = v.prostaterName
                    group by c.countryName
                    order by SUM(p.covidDeaths) ASC;";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<table class="table"><tr><th scope="col">Region</th><th scope="col">Country</th><th scope="col">Population</th><th scope="col">#Vaccinated</th><th scope="col">#Covid Deaths</th><th scope="col">#Dead with Vaccine</th></tr>';
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["regionName"]. "</td><td>" . $row["countryName"]. "</td><td>" . $row["population"]. "</td><td>" . $row["numVaccine"]. "</td><td>" . $row["covidDeaths"]. "</td><td> " . $row["deathVaccine"]."</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    break;  
                case 19:
                    $sql = "select r.reportDate, SUM(p.population) as population, r.numVaccine, r.infectedNotVax + r.infectedVax as infected, r.deathVax
                    from Reports r, Country c, ProStaTer p, countryContains cc
                    where c.countryName = 'Canada' and c.countryName = r.GA_country AND c.countryName = cc.countryName AND p.prostaterName = cc.prostaterName
                    Group by r.reportDate
                    order by r.reportDate desc;";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<table class="table"><tr><th scope="col">Report Date</th><th scope="col">Population</th><th scope="col">#Vaccinated</th><th scope="col">#Infected</th><th scope="col">#Dead Vaccine</th></tr>';
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
                    $sql = "Select a.author as authorName, IF(a.author in (Select organizationName From Organization where a.author = organizationName), o.orgCountry, u.citizenship) as citizenship, Count(distinct s.userID) as nbUsers
                    from Article a, User u, Organization o, register s
                    Where (a.author = o.organizationName XOR a.author = concat(u.firstName, ' ', u.lastName)) AND a.author = s.author
                    Group by s.author
                    Having Count(distinct s.userID) = (SELECT MAX(c) FROM (SELECT Count(distinct s2.userID) AS c FROM register s2
                                GROUP BY s2.author) as T);";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<table class="table"><tr><th scope="col">Author</th><th scope="col">Citizenship</th><th scope="col">#Subs</th></tr>';
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