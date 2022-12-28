<?php
include 'db_connection.php';
if(filter_input(INPUT_GET,'Login')!=null){
$username=filter_input(INPUT_GET,'txt_Name');
$pswd=filter_input(INPUT_GET,'password');
$sql="SELECT * FROM userinfo WHERE user_name='$username' AND user_pswd='$pswd'";
$result=mysqli_query($conn,$sql);
$num= mysqli_num_rows($result);
      if($num==1){     
            //echo 'please Register lol first ';
            session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("refresh:0;url=index.php");     
      }else{
          echo '<link href="bootstrap (5).css" rel="stylesheet" type="text/css"/>';
            echo '<h1>please Register first </h1>';
            header("refresh:5;url=Reg.php");
    }   
}else{
    ?>
<!doctyepe>
<html>
    <head>
        <title> Login Page</title>
        
        
         <link href="bootstrap.css" rel="stylesheet" type="text/css"/>
     <style>
            body, html {

            }   body {
                /* The image used */
                background-image: url("Logintrain.jpg");

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
        <h1 class="text-center">Login Here</h1>
        <form>
        <div>
            <table class="table">
            <tr class="text-center">
                <td><b><mark>USERNAME:</mark></b></td>
                <td><input type="text" class="form-control-lg" name="txt_Name" id="txtName" /></td>
            </tr>
            <tr class="text-center">
                <td><b><mark>PASSWORD:</mark></b></td>
                <td><input type="password" class="form-control-lg" name="password" id="pswd" /></td>
            </tr>
            <tr class="text-center">
                        <td><input type="Submit" class="btn btn-primary" id="btnSubmit" name="Login" /> </td>
                        <td><input type="reset" class="btn btn-dark" id="btnReset" name="Clear" /> </td>
                    </tr>
            </table>
        </div>
        </form>
<?php  } ?>
    </body>
</html>



