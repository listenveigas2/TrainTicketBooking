<?php
session_start();
include 'db_connection.php';
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location:login.php");
    exit;
}
?>
<?php
require("db_connection.php");
$dep = filter_input(INPUT_GET, "txtFrom");
$arr = filter_input(INPUT_GET, "txtTo");
if($dep==$arr){
    echo ' <link href="bootstrap (9).css" rel="stylesheet" type="text/css"/>';
         echo 'No records found';
}
else{
$seat = filter_input(INPUT_GET, "seats_to_book");
$sql = "SELECT * FROM traintimings   WHERE dep_station='$dep' AND arr_staion='$arr'";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Search your train</title>
        <link href="bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap (9).css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="contaier">
            <Form>
                <table class="table">
                    <tr class="text-center">
                        <th>Departure Station</th>
                        <th>Departure Time</th>
                        <th>Train Name</th>
                        <th>Train Number</th>
                        <th>Arrival Station</th>
                        <th>Arrival Timing</th>
                        <th>Price</th>

                    </tr>
<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr class="text-center">';
    echo '<td>' . $row['dep_station'] . '</td>';
    echo '<td>' . $row['dep_time'] . '</td>';
    echo '<td>' . $row['train_name'] . '</td>';
    echo '<td>' . $row['train_num'] . '</td>';
    echo '<td>' . $row['arr_staion'] . '</td>';
    echo '<td>' . $row['arr_time'] . '</td>';
    echo '<td>' . $row['price'] . '</td>';
    echo '</tr>';
    echo "<td class='text-center'> <a onclick='return confirm(\"Are you Sure to book the ticket of " . $row['train_name'] . " ?\");' href='book.php?id=" . $row['train_num'] . "' class='btn btn-warning'>BOOK A TICKET</a> </td>";
    echo "</tr>";
}
?>
                </table>
            </form>
<?php } ?>
        </div>
    </body>
</html>
