<?php
if(filter_input(INPUT_GET,'submit')!=null){
$username = filter_input(INPUT_GET, 'txtName');
$pswd = filter_input(INPUT_GET, 'txtpswd');
$email = filter_input(INPUT_GET, 'txtEmail');
$cpswd = filter_input(INPUT_GET, 'txtcpswd');
$address = filter_input(INPUT_GET, 'adressTextarea');
$mobile = filter_input(INPUT_GET, 'txtMobile');
if($pswd!=$cpswd){
    echo 'Password Mismatch';
}else{
$sql = "INSERT INTO userinfo VALUES('$username','$pswd','$email','$address')";
require("db_connection.php");
if(mysqli_query($conn,$sql)){
    echo"User name is $username and password is $pswd";
    header("refresh:5;url=index.php");
}else{
    echo 'Sql error !!'.mysqli_error($conn);
}
}
}else{
?>
<!DOCTYPE html>
<   html>
    <head>
        <meta charset="UTF-8">
        <title>Registration form</title>
        
        <link href="bootstrap.css" rel="stylesheet" type="text/css"/>
        <style>
            body, html {

            }   body {
                /* The image used */
                background-image: url("RegTrain.jpg");

                /* Full height */
                height: 100%;
                /* Center and scale the image nicely */
                background-position: left;
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style> 
    </head>
    <body>
        <?php include("nav.php") ?>
        <div class="container">
            <h2 class="text-center"> Register here
            </h2>
            <form >
                <table class="table">
                    <tr>
                        <td><b>   <mark>User Name :</mark></b> </td>
                        <td> <input type="text" name="txtName" id="txtName" class="form-control" required/> </td>
                    </tr>
                                       <tr>
                        <td><b><mark>Password :</mark></b></td>
                        <td><input type="password" name="txtpswd" id="txtpswd" class="form-control" required /> </td>
                    </tr>
                    <tr>
                        <td><b><mark>Confirm Password :</mark></b></td>
                        <td><input type="password" name="txtcpswd" id="txtcpswd" class="form-control" required/> </td>
                    </tr>
                     <tr>
                        <td><b>  <mark>User Email :</mark></b> </td>
                        <td> <input type="Email" name="txtEmail" id="txtEmail" class="form-control" /> </td>
                    </tr>

                    <tr>
                        <td><b><mark>User Mobile:</mark></b></td>
                        <td><input type="text" name="txtMobile" id="txtMobile" class="form-control" required/> </td>
                    </tr>
                    <tr>
                        <td> <b><mark>Address :</mark> </b></td>
                        <td> <textarea class="form-control" name="adressTextarea" id="adressTextarea"></textarea> </td>
                    </tr>
                    <tr class="text-center">
                        <td><input type="Submit" class="btn btn-primary" id="btnSubmit" name="submit" /> </td>
                        <td><input type="Reset" class="btn btn-dark" id="btnReset" name="reset" /> </td>
                    </tr>
                </table>
            </form>
<?php } ?>
        </div>
    </body>
</html>
