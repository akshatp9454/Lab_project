<?php
session_start();
if(!$_SESSION['admin']){
  header('location:login.php');
}
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "online_exam";
   
   $conn = mysqli_connect($servername, $username, $password, $dbname);
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error($conn));
   }
   
   $id = $_GET ['id'];
   $sid = $_GET ['sid'];
   $date = $_GET ['date'];
   $stime = $_GET ['stime'];
   $etime = $_GET ['etime'];
   $dur = $_GET ['dur'];
   $tmarks = $_GET ['tmarks'];
   $elink = $_GET ['elink'];

    
    
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
  width:120px;
  height:70px;
  background-color:orange;
  font-size:15px;
  border:black 2px solid;
  border-radius: 10px;
  
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
   <a href="admin_exam_view.php"><button><b>View Exams</b></button></a>
     <h1 style="font-size: 3em; font-weight: ]">Update Exam</h1>
     
   </div>

    

<form action="" method="post">
<p style="font-size: 1.6em;margin-bottom: 10px">Exam_ID:</p>
  <input  class="formField" type="number" name="id" value="<?php echo $id; ?>" readonly>
  <br>
<p style="font-size: 1.6em;margin-bottom: 10px">Subject_ID:</p>
  <input class="formField" type="text" name="sid" value="<?php echo $sid; ?>" required>
  <br>
<p style="font-size: 1.6em;margin-bottom: 10px">Date:</p>
  <input class="formField" type="date" name="date" value="<?php echo $date; ?>" required>
  <br>
<p style="font-size: 1.6em;margin-bottom: 10px">Start Time:</p>
  <input class="formField" type="time" name="stime" value="<?php echo $stime; ?>" required>
  <br>
<p style="font-size: 1.6em;margin-bottom: 10px">End Time:</p>
  <input class="formField" type="time" name="etime" value="<?php echo $etime; ?>" required>
  <br>
<p style="font-size: 1.6em;margin-bottom: 10px">Duration:</p>
  <input class="formField" type="time" name="dur" value="<?php echo $dur; ?>" required>
  <br>
<p style="font-size: 1.6em;margin-bottom: 10px">Total Marks</p>
  <input class="formField" type="number" name="tmarks" value="<?php echo $tmarks; ?>" required>
<br>
<p style="font-size: 1.6em;margin-bottom: 10px">Exam Link</p>
  <input class="formField" type="text" name="elink" value="<?php echo $elink; ?>" required>
<br>
  <input class="submit" type="submit" value="Update" name="submit">
</form>         
      

  </div>
</div>

  


</body>
</html>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $up_id = $_POST ['id'];
        $up_sid = $_POST ['sid'];
        $up_date = $_POST ['date'];
        $up_stime = $_POST ['stime'];
        $up_etime = $_POST ['etime'];
        $up_dur = $_POST ['dur'];
        $up_tmarks = $_POST ['tmarks'];
        $up_elink = $_POST ['elink'];

        $inttmarks = (int)$up_tmarks;
        $up_tmarks = $inttmarks;
        $intid = (int)$up_id;
        $up_id =$intid;

        
        $sql='UPDATE exam set Subject_ID='.$up_sid.',Date="'.$up_date.'",Start_Time="'.$up_stime.'",End_Time="'.$up_etime.'",Duration="'.$up_dur.'",Total_Marks='.$up_tmarks.',Exam_Link="'.$up_elink.'" WHERE Exam_ID = '.$up_id.'';
        $data=mysqli_query($conn,$sql);

        if($data){
            echo "<script>alert('Record Updated')</script>";
        }
        else{
            echo "<script>alert('Record could not be Updated')</script>";
        }
    }

?>
