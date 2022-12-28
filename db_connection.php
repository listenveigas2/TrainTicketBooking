<?php
$conn = mysqli_connect("localhost","root", "","onlinetrain");
if (!$conn) {
    die("unable to connect to the database" . mysqli_connect_error());
}
