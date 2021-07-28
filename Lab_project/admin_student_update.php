
<?php
session_start();
if(!$_SESSION['admin']){
  header('location:login.php');
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_exam";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $password = $_POST['password'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $subject1 = $_POST['subject1'];
    $subject2 = $_POST['subject2'];
    $subject3 = $_POST['subject3'];
    $subject4 = $_POST['subject4'];
    $subject5 = $_POST['subject5'];
    $subject6 = $_POST['subject6'];
    
    $sql = "insert into student(Password,Email,Name,Phone) values('".$password."','".$email."','".$name."','".$phone."');";
    $sql .= "insert into student_subject(User_ID,Subject_ID) values((select User_ID from student where email='$email'),".$subject1.");";
    $sql .= "insert into student_subject(User_ID,Subject_ID) values((select User_ID from student where email='$email'),".$subject2.");";
    $sql .= "insert into student_subject(User_ID,Subject_ID) values((select User_ID from student where email='$email'),".$subject3.");";
    $sql .= "insert into student_subject(User_ID,Subject_ID) values((select User_ID from student where email='$email'),".$subject4.");";
    $sql .= "insert into student_subject(User_ID,Subject_ID) values((select User_ID from student where email='$email'),".$subject5.");";
    $sql .= "insert into student_subject(User_ID,Subject_ID) values((select User_ID from student where email='$email'),".$subject6.");";


if (mysqli_multi_query($conn, $sql))
{
    echo "Records inserted successfully.";
}
else
{
    echo "ERROR: Could not able to execute $sql. "
        .mysqli_error($conn);
}
}



$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Management System</title>
<style>

.dropdown {
  //position: relative;
  float:right:
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color:#DC2629;
  min-width: 160px;
  //box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  //z-index: 1;
  right:0;
  top:90px;
  //float:right;
  margin-right:20px;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  border: 2px solid black;
  
}

.dropdown-content a:hover {background-color: #EAAB23;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: ;}


.topBar{
  text-align: center;
  width:100%;
  background-color: white;
  padding: 0;
}
body{
  font-family: Arial, Helvetica, sans-serif;
  background: linear-gradient(to top left, #e9ac23 0%, #dc2629 100%);
  background-size: 100% 100%;
  background-repeat: no-repeat;
  padding: 0;
  margin: 0;
}

.innerBox{
  background-color: white;
  text-align: center;
  padding-top: 80px;
  margin: 10px 200px;
  padding-bottom: 80px;
  min-height: 1000px;
  border:black 2px solid;
  border-radius: 10px;

}

.formField{
  border: solid 2px #E5762A;
  height: 40px;
  width: 200px;
  border-radius: 7px;
  text-align: center;
}

.submit{
  background-color: #E5762A;
  width: 320px;
  height: 70px;
  text-align: center;
  font-size: 2em;
  font-weight: bold;
  color: white;
  border-radius: 10px;
  margin-top: 40px;
}

button{
  width:80px;
  height:50px;
  background-color:orange;
  font-size:15px;
  border:black 2px solid;
  border-radius: 10px;
}

li{
    list-style:none;
    float:left;
    margin:5px;
}

ul{
    margin-left:20px;
}
</style>
</head>

<body>
<div class="topBar">
  <img width="290px" height="auto" src=logo.png>
  <span class="dropdown"><img src="user.png" width="50px" height="50px" style="float: right;margin-top: 25px; margin-right: 70px;padding:10px;" class="dropbtn">
  <div class="dropdown-content">
    <a style="border-top: none;" href="logout.php">Sign Out</a>
  </div>
  </span>
</div>


<div class="main">
  <div class="innerBox">
   <div style="text-align: center; width: 100%">
   <ul>
   <li><a href="admin_student_update.php"><button  style="background-color:white;color:orange;"><b>Add Student</b></button></a><li>
   <li><a href="admin_student_view.php"><button><b>View Students</b></button></a><li>
   <li><a href="admin_teacher_update.php"><button><b>Add Teachers</b></button></a><li>
   <li><a href="admin_teacher_view.php"><button><b>View Teachers</b></button></a><li>
   <li><a href="admin_subject_update.php"><button><b>Add Subjects</b></button></a><li>
   <li><a href="admin_subject_view.php"><button><b>View Subjects</b></button></a><li>
   <li><a href="admin_exam_update.php"><button><b>Add Exam</b></button></a><li>
   <li><a href="admin_exam_view.php"><button><b>View Exams</b></button></a><li>
   </ul>
   <br><br>
     <h1 style="font-size: 3em; font-weight: ]">Add Student</h1>
     
   </div>

    

<form action="" method="post">
<p style="font-size: 1.6em;margin-bottom: 10px">Name:</p>
  <input class="formField" type="text" name="name" value="<?php echo $name; ?>" required>
  <br>
<p style="font-size: 1.6em;margin-bottom: 10px">Password:</p>
  <input class="formField" type="password" name="password" value="<?php echo $password; ?>" required>
  <br>
<p style="font-size: 1.6em;margin-bottom: 10px">Email:</p>
  <input class="formField" type="email" name="email" value="<?php echo $email; ?>" required>
  <br>
<p style="font-size: 1.6em;margin-bottom: 10px">Phone:</p>
  <input class="formField" type="text" name="phone" value="<?php echo $phone; ?>" required>
  <br>
<p style="font-size: 1.6em;margin-bottom: 10px">Subject 1:</p>
<input class="formField" type="text" name="subject1" value="<?php echo $subject1; ?>" required>
<br>
<p style="font-size: 1.6em;margin-bottom: 10px">Subject 2:</p>
<input class="formField" type="text" name="subject2" value="<?php echo $subject2; ?>" required>
<br>
<p style="font-size: 1.6em;margin-bottom: 10px">Subject 3:</p>
<input class="formField" type="text" name="subject3" value="<?php echo $subject3; ?>" required>
<br>
<p style="font-size: 1.6em;margin-bottom: 10px">Subject 4:</p>
<input class="formField" type="text" name="subject4" value="<?php echo $subject4; ?>" required>
<br>
<p style="font-size: 1.6em;margin-bottom: 10px">Subject 5:</p>
<input class="formField" type="text" name="subject5" value="<?php echo $subject5; ?>" required>
<br>
<p style="font-size: 1.6em;margin-bottom: 10px">Subject 6:</p>
<input class="formField" type="text" name="subject6" value="<?php echo $subject6; ?>" required>
<br>
<br>
  <input class="submit" type="submit" value="Update">
</form>         
      

  </div>
</div>

  


</body>
</html>
