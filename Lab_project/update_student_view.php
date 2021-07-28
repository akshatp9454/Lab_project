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
   $email = $_GET ['email'];
   $name = $_GET ['name'];
   $phone = $_GET ['phone'];

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
   <a href="admin_student_view.php"><button><b>View Student Table</b></button></a>
     <h1 style="font-size: 3em; font-weight: ]">Update Student Table</h1>
     
   </div>

    

<form action="" method="post">
<p style="font-size: 1.6em;margin-bottom: 10px">User_ID:</p>
  <input  class="formField" type="number" name="id" value="<?php echo $id; ?>" readonly>
  <br>
  <p style="font-size: 1.6em;margin-bottom: 10px">Password:</p>
  <input class="formField" type="password" name="password">
  <br>
<p style="font-size: 1.6em;margin-bottom: 10px">Email:</p>
  <input class="formField" type="email" name="email" value="<?php echo $email; ?>" required>
  <br>
<p style="font-size: 1.6em;margin-bottom: 10px">Name:</p>
  <input class="formField" type="text" name="name" value="<?php echo $name; ?>" required>
  <br>
<p style="font-size: 1.6em;margin-bottom: 10px">Phone:</p>
  <input class="formField" type="text" name="phone" value="<?php echo $phone; ?>" required>
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
        $up_pass = $_POST ['password'];
        $up_email = $_POST ['email'];
        $up_name = $_POST ['name'];
        $up_phone = $_POST['phone'];
        $intid=(int)$up_id;
        $up_id=$intid;
        //echo($up_pass);
        //echo(gettype($up_id));
        if (empty($up_pass)){
            $sql='UPDATE student set Email="'.$up_email.'",Name="'.$up_name.'",Phone="'.$up_phone.'" WHERE User_ID = '.$up_id.'';
        }else{
          $sql='UPDATE student set Password="'.$up_pass.'",Email="'.$up_email.'",Name="'.$up_name.'",Phone="'.$up_phone.'" WHERE User_ID = '.$up_id.'';
        }
            $data=mysqli_query($conn,$sql);

        if($data){
            echo "<script>alert('Record Updated')</script>";
            //echo ($sql);
        }
        else{
            echo "ERROR: Could not able to execute $sql. "
            .mysqli_error($conn);
        }
    }

?>
