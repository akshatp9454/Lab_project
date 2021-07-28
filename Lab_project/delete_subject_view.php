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
    $sql = 'DELETE FROM subject where Subject_ID='.$id.'';
    $data = mysqli_query($conn,$sql);

    if ($data)
    {   
        echo($sql);
        echo '<script>alert("Record Deleted successfully. ")</script>';
    }
    else
    {   
        echo($sql);
        echo '<script>alert("Record could not be Deleted successfully. ")</script>';
        echo "ERROR: Could not able to execute $sql. "
        .mysqli_error($conn);
    }
    header("Location: admin_subject_view.php");
    mysqli_close($conn);
?>