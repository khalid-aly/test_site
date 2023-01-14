<?php
session_start();
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $stmt = $conn->prepare("SELECT email ,
     password FROM users WHERE email = '$email' AND
     password = '$password' ");
  $stmt->execute(array($email, $password));
  $count = $stmt->rowCount();
  if ($count > 0) {
    $_SESSION["email"] = $email;
    header("Location: index.php");
  } else {
    echo '<script>alert("You are not authenticated")</script>';
  }
}















/*
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email = $_POST['email'];
    $password = $_POST['password'];
   /* include("connect.php");
    $stmt=$conn->prepare("SELECT * FROM users");
    $stmt->execute();
    $data=$stmt->fetchAll();
  
  
    foreach($data as $users){
      echo('Email: '.$users['email'] . '<br>');
      echo('Password: '.$users['password'] . '<br>');

    }
    
    if(!empty($email) && !empty($password) && $email=="alykhalid737@gmail.com" && $password=="123456")
    { 
      if(isset($_SESSION["favcolor"]))
  {
    header("Location: index.php");
  }
  else{
    header('Location: login.php');
  } 

    }
   
    else{
      header('Location: login.php');
      //echo '<script>alert("Password or Email is Empty! ")</script>';
    }
}
*/

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>form</title>

  <style>
    body {
      color: white;
      background-color: rgb(5, 49, 85);
    }

    .form-control {

      width: 500px;
    }

    .label {
      font-size: 26px;
      color: white;

    }

    .texts {
      color: white;
      font-size: 32px;
    }
  </style>
</head>

<body>

  <div class="container">
    <br>
    <center><span class="texts">Welcome in your lovely site!</span></span></center>
    <br><br><br>
    <center>
      <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="POST">
        <div class="form-group">
          <label class="label" for="exampleInputEmail1">Email address: </label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label class="label" for="exampleInputPassword1">Password: </label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </center>
  </div>
</body>

</html>