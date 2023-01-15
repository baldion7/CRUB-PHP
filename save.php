<?php
include('db.php');
if(isset($_POST['save_tarea'])){
 $title=$_POST['tar'];
 $descripcion=$_POST['des'];
 $query="INSERT INTO `task`(`tarea`,`descripcion`) VALUES ('$title','$descripcion')";
 $result=mysqli_query($conn,$query);
 if(!$result){
    die("Query Failed");
 }
 $_SESSION['message']='se guardo la tarea';
 $_SESSION['message_type']='success';
header("Location: index.php");
}
?>