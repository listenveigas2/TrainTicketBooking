<?php
session_start();

include 'db_connection.php';
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Book Your Train Ticket</title>
        <link href="bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap (6).css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php include("nav.php") ?>
        <img src="lol.jpg" alt="Train" width="1600" height="600">
       
       +<h2 class="text-center">Search Train</h2>
       
        <form method="GET" action="search.php">
            <div>
                <table class="table">
                    <tr>
                        <td>Departure Station :</td>
                        <td>
                        
                            <select  id="txtFrom" class="form-control" name="txtFrom" required>
                                    <option value="No value">Choose Your option</option>
                                <option value="Mangalore">Mangalore</option>
                                <option value="Bangalore">Bangalore</option>
                                <option value="Chennai">Chennai</option>
                            </select>
                             <td>Arrival Station :</td>
                        <td>
                            <select  id="txtTo" class="form-control" name="txtTo" required>
                                    <option value="No value">Choose Your option</option>
                                <option value="Mangalore">Mangalore</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Bangalore">Bangalore</option>
                                <option value="Chennai">Chennai</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>Date of travel</td>
                        <td><input type="date" class="form-control" name="date_of_travel" id="date_of_travel"/></td>
                        <td>Number Of seats to be booked:</td>
                        <td><input type="number" class="form-control" name="seats_to_book" id="seats_to_book"/></td>
                    </tr>
                    <tr class="text-center"> 
                        <td class="text-center"><input type="Submit" class="btn btn-primary" id="btnSubmit" name="Search" value="search"/> </td>
                        <td class="text-center"><input type="reset" class="btn btn-danger" id="btnReset" name="Clear" /> </td>
                    </tr>
                </table>
            </div>
        </form>
    </body>
</html> 