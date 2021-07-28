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
   $intid = (int)$id;
    $sql = 'DELETE FROM exam where Exam_ID='.$intid.'';
    $data = mysqli_query($conn,$sql);

    if ($data)
    {   
        echo ($sql);
        echo '<script>alert("Record Deleted successfully. ")</script>';
    }
    else
    {   
        echo '<script>alert("Record could not be Deleted successfully. ")</script>';
        
    }
    header("Location: admin_exam_view.php");
    mysqli_close($conn);
?>