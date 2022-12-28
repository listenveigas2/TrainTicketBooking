<?php
session_start();
include 'db_connection.php';
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:login.php");
    exit;
}

$username=$_SESSION['username'];
$trainid= filter_input(INPUT_GET,'id');
include 'db_connection.php';
$sql="SELECT dep_station,train_name,arr_staion FROM traintimings WHERE train_num=$trainid";
$result= mysqli_query($conn, $sql);

$row= mysqli_fetch_assoc($result);
$deps=$row['dep_station'];
$trainname=$row['train_name'];
$arrs=$row['arr_staion'];

$sql="INSERT INTO booking VALUES('$username','$deps','$trainname','$trainid','$arrs')";
include 'db_connection.php';
if(mysqli_query($conn,$sql)){
    echo '<link href="bootstapphp.css" rel="stylesheet" type="text/css"/>';
    echo '<h1>Ticket booked successfuly !!</h1>';
 header("refresh:5;url=index.php");
}else{
    echo 'sql error'.mysqli_error($conn);
}
