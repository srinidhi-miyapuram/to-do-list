<?php
  include "config.php";
  if(isset($_GET['slno'])){
      $del = mysqli_real_escape_string($con, $_GET['slno']);
      $sql = mysqli_query($con, "DELETE FROM list WHERE slno = '$del'");
      if($sql){
          header("Location: list.php");
      }else{
          header("Location: list.php");
      }
  }elseif(isset($_GET['delete'])){
      $sql2 = mysqli_query($con, "DELETE FROM list");
      if($sql2){
          header("Location: list.php");
      }else{
          header("Location: list.php");
      }
  }else{
      header("Location: list.php");
  }
?>