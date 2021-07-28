<?php 
  if ($_POST){
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "online_exam";
      $conn = mysqli_connect($host,$user,$pass,$db);
      $username = $_POST['uname'];
      $password = $_POST['psw'];
      $acc_type = $_POST['select'];
      if ($acc_type == "student"){
        $query = "SELECT * FROM student WHERE User_ID = '$username' and Password = '$password'";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result) == 1){
          session_start();
          $_SESSION['student'] = 'true';
          header('location:student.php');
        }
        else {echo 'Wrong User ID or Password!! Please Try Again.';}
      }
      else if ($acc_type == "teacher"){
        $query = "SELECT * FROM teacher WHERE User_ID = '$username' and Password = '$password'";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result) == 1){
          session_start();
          $_SESSION['teacher'] = 'true';
          header('location:teacher_view.php');
        }
        else {echo 'Wrong User ID or Password!! Please Try Again.';}
      }
      else{
        $query = "SELECT * FROM Administrator WHERE User_ID = '$username' and Password = '$password'";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result) == 1){
          session_start();
          $_SESSION['admin'] = 'true';
          header('location:admin_exam_view.php');
        }
        else {echo 'Wrong User ID or Password!! Please Try Again.';
        //echo "'$username,'$password'";
        }
      }
  }
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="form.css">
</head>
<form action="" method="post">
  <div class="imgcontainer">
    <img src="logo.png" height="150px" width="280px" class="avatar">
  </div>

  <div class="container">

    <div class="wrapper">
      <input type="radio" name="select" id="option-1" value="student" checked>
      <input type="radio" name="select" id="option-2" value="teacher">
      <input type="radio" name="select" id="option-3" value="admin">
      <label for="option-1" class="option option-1">
        <div class="dot"></div>
        <span>Student</span>
      </label>
      <label for="option-2" class="option option-2">
        <div class="dot"></div>
        <span>Teacher</span>
      </label>
      <label for="option-3" class="option option-3">
        <div class="dot"></div>
        <span>Admin</span>
      </label>
    </div>
    <br><br><br>
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter User ID" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  
</form>
<body>
</body>
</html>
