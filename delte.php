<?php 
include("db.php");

if (isset($_GET['id'])){
    $id=$_GET['id'];
    $query="DELETE FROM `task` WHERE id=$id";
    $result=mysqli_query($conn,$query);
    if(!$result){
        die("Query Faild");
    }
    $_SESSION['message']='se elemino la tarea';
    $_SESSION['message_type']='danger';
   header("Location: index.php");
}
?>