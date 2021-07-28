
<?php
session_start();
if(!$_SESSION['admin']){
  header('location:login.php');
}
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error($conn));
   }
   
   $sql = 'SELECT User_ID,Email,Name,Subject_ID,Phone FROM teacher';
   mysqli_select_db($conn , 'online_exam');
   $retval = mysqli_query($conn , $sql);
   
   if(! $retval ) {
      die('Could not get data: ' . mysqli_error($conn));
   }
     
   mysqli_close($conn);
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
  min-height:600px;
  border:black 2px solid;
  border-radius: 10px;
}

.formField{
  border: solid 2px #E5762A;
  height: 40px;
  width: 200px;
  border-radius: 7px;
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

table {
  font-family: arial, sans-serif;
  border:2px solid black;
  width: 80%;
  Background-color:gray ;
  margin-left:auto;
  margin-right:auto;
  margin-top: 30px;
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

table td{
  border:black 2px solid;
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
   <li><a href="admin_student_update.php"><button><b>Add Student</b></button></a><li>
   <li><a href="admin_student_view.php"><button><b>View Students</b></button></a><li>
   <li><a href="admin_teacher_update.php"><button><b>Add Teachers</b></button></a><li>
   <li><a href="admin_teacher_view.php"><button  style="background-color:white;color:orange;"><b>View Teachers</b></button></a><li>
   <li><a href="admin_subject_update.php"><button><b>Add Subjects</b></button></a><li>
   <li><a href="admin_subject_view.php"><button><b>View Subjects</b></button></a><li>
   <li><a href="admin_exam_update.php"><button><b>Add Exam</b></button></a><li>
   <li><a href="admin_exam_view.php"><button><b>View Exams</b></button></a><li>
   </ul>
   <br><br>
     <h1 style="font-size: 3em; font-weight: ]">Teacher List</h1>
   </div>

    
<table> 
       <tr>
        <th>User_ID</th>
        <th>Email</th>
        <th>Name</th>
        <th>Subject_ID</th>
        <th>Phone</th>
        <th colspan="2" align="center">Operations</th>
       </tr>
<?php
while($row = mysqli_fetch_assoc($retval)) {
echo "<tr><td>" . $row['User_ID']. "</td> <td>" . $row['Email']. " </td> <td>" . $row['Name']. " </td> <td>" . $row['Subject_ID']. " </td> <td>" . $row['Phone']. "</td><td><a href='delete_teacher_view.php?id=".$row['User_ID']."'>Delete</td> <td><a href='update_teacher_view.php?id=".$row['User_ID']."&email=".$row['Email']."&name=".$row['Name']."&sid=".$row['Subject_ID']."&phone=".$row['Phone']."'>Update</td></tr>";
}
?>
<table>  
      

  </div>
</div>

  


</body>
</html>
