<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>To Do List</title>
  </head>
  <body>
    <div class="heading">
  <h1>Make Your To Do List Here</h1>
</div>
  <form action="list.php" method="post">
    <div class="list">
        <input type="text" name="list" placeholder="Enter Your Text Here">
        <button type="submit" name="submit">Save</button>
    </div>
    <div class="area">
    <div class="content">
       <li>Slno</li>
       <li>Item</li>
       <li>Date</li>
       <li><a href="delete.php?delete=all">Clear all</a></li>
    </div>
        <?php
          include "config.php";
          $query = mysqli_query($con,"SELECT * FROM `list` ORDER BY slno DESC");   
          while($list = mysqli_fetch_assoc($query)){
           ?>
             <div class="stored">
              <li><?php echo $list['slno'] ?></li>
               <li><?php echo $list['item'] ?></li>
               <li><?php echo $list['date'] ?></li>
               <li><a href="delete.php?slno=<?php echo $list['slno'] ?>" name="delete">Delete</a></li>
               
             </div>
             <script>
       window.addEventListener('scroll', this.handleScroll, true);
       </script>
         <?php
         }
          if(isset($_POST['submit'])){
            $item = $_POST['list'];
            if($item == ""){
              echo "Please enter some text ";
            }else{
              $sql = mysqli_query($con, "INSERT INTO `list` (`item`,`date`) VALUES ('$item',current_timestamp());"); 
              header("Location: list.php");
            }
          }
          ?>
    </div>
        
      </form>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
    
    <script>
       if(window.history.replaceState){
         window.history.replaceState(null,null, window.location.href);
       }
    </script>
  </body>
</html>