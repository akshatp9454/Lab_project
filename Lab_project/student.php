
<?php
  session_start();
  if(!$_SESSION['student']){
    header('location:login.php');
  }
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error($conn));
   }
   
   $sql = 'SELECT * FROM exam';
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
     <h1 style="font-size: 3em; font-weight: ]">Exam Schedule:</h1>
   </div>

    
<table> 
       <tr>
        <th>Exam_ID</th>
        <th>Subject_ID</th>
        <th>Date</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Duration</th>
        <th>Total Marks</th>
        <th>Exam Link</th>
       </tr>
<?php
while($row = mysqli_fetch_assoc($retval)) {
echo "<tr><td>" . $row['Exam_ID']. "</td> <td>" . $row['Subject_ID']. " </td> <td>" . $row['Date']. " </td> <td>" . $row['Start_Time']. " </td> <td>" . $row['End_Time']. " </td> <td>" . $row['Duration']. " </td> <td>" . $row['Total_Marks']. " </td> <td><a href=".$row['Exam_Link'].">" . $row['Exam_Link']."</a></td></tr>";
}
?>
<table>  
      

  </div>
</div>

  


</body>
</html>
