<?php require_once 'database.php';

//https://www.youtube.com/watch?v=jxe2V50aIKE&ab_channel=PeterFisher
$userID = '';
if(!empty($_GET['userID']))
{
    $userID = $_GET['userID'];
}
else
{
    throw new Exception('ID is blank');
}

$sql = "DELETE FROM cuc353_1.User WHERE userID = '$userID'";
$result = mysqli_query($conn, $sql);

$researchers = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

header("Location: /allUsers.php");
die;

?>