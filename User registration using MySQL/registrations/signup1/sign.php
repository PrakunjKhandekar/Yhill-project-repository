<?php

$succes=0;
$user=0;


if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="Select * from `registration` where username='$username'";

    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            // echo "User already exist";
            $user=1;
        }
        else{
            $sql="insert into `registration`(username,password) values('$username','$password')";
            $result=mysqli_query($con,$sql);

            if($result){
                // echo"Signup successful";
                $succes=1;
                header('location:login.php');
            }
            else{
                die(mysqli_error($con));
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integ
    rity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        .container{
            padding:10px;
            border:2px solid purple;
        }
    </style>
  </head>
  <body>

  <?php

    if($user){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> user already exist
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
  ?>

<?php

if($succes){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> you are successfully signed up
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>

    <h2 class="text-center">Sign up page</h2>
    <div class="container ">
    <form action="sign.php" method="post"> 
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Username" name="username">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Signup</button>
</form>
    </div>
  </body>
</html>