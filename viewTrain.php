<?php
session_start();
include 'db_connection.php';
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:login.php");
    exit;
}
$username=$_SESSION['username'];
$sql="SELECT * FROM BOOKING WHERE user_name='$username'";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Past Bookings</title>
        <link href="bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap (13).css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include("nav.php") ?>
        <h1 class="text-center">Past Booking</h1>
        <div class="contaier">
            <table class="table">
                <tr class="text-center">
                    <th>User Name</th> 
                    <th>Departure Station</th>  
                    <th>Train Name</th>
                    <th>Train number</th>
                    <th>Arrival Station</th>  
                </tr>
                <?php
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr class="text-center">';
   echo '<td>' . $row['user_name'] . '</td>';
    echo '<td>' . $row['dep_station'] . '</td>';
    echo '<td>' . $row['train_name'] . '</td>';
    echo '<td>' . $row['train_num'] . '</td>';
    echo '<td>' . $row['arr_staion'] . '</td>';
    echo '</tr>';
}
    ?>
            </table>
        </div>
    </body>
</html>
