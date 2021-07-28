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
   $intid = (string)$id;
    $sql = 'DELETE FROM teacher where User_ID='.$id.'';
    $data = mysqli_query($conn,$sql);

    if ($data)
    {   
        echo '<script>alert("Record Deleted successfully. ")</script>';
    }
    else
    {   
        echo '<script>alert("Record could not be Deleted successfully. ")</script>';
        echo "ERROR: Could not able to execute $sql. "
        .mysqli_error($conn);
    }
    header("Location: admin_teacher_view.php");
    mysqli_close($conn);
?>