<?php
session_start();
include_once('functions.php');
$userdata = new DB_con();

if(isset($_POST['login'])){
  $uname = $_POST['username'];
  $password = $_POST['password'];

  $result = $userdata->signin($uname,$password);
  $num = mysqli_fetch_array($result);

  if($num > 0){
    $_SESSION['id'] = $num['id'];
    $_SESSION['fname'] = $num['fullname'];
    echo "<script>alert('Login Successful!');</script>";
    echo "<script>window.location.href='welcome.php'</script>";
  }else{
    echo "<script>alert('Something went wrong ! Please try again.');</script>";
    echo "<script>window.location.href='index.php'</script>";
    
  }


}
if(isset($_POST['signin'])){ #การใช้งานปุ่มดด้วยใช้ if
  echo "<script>window.location.href='signin.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
<form method="post"> <!-- method="post" ใช้ในการกำหนดวิธีการส่งข้อมูลจากแบบฟอร์ม HTML ไปยังเซิร์ฟเวอร์ เมื่อผู้ใช้กดปุ่ม submit ในแบบฟอร์มนั้น ๆ -->
    <h1 class="mt-5">Login Page</h1>
    <hr>
  <div class="mb-3">
    <label for="username" class="form-label">User Name</label>
    <input type="text" class="form-control" id="username"  name="username">
    <span id="usernameavailable"></span>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password"  name="password">
  </div>
  <button type="submit" name="login"  class="btn btn-success">Login</button>
  <button type="" name="signin"  class="btn btn-primary">Register</button></form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>