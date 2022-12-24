<?php
    session_start();
    include 'database/konekcija.php';
    include 'components/navbar.php';

    if(isset($_SESSION["loggedIn"]))
    {
        if($_SESSION["loggedIn"] == 0)
        {
            $_SESSION["user"] = "";        
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    
<?php
     
     if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == 1)
     {
       echo "Skaut: ". $_SESSION["user"];   
       echo "<br><br><br>";
     }
     else
     {
      $_SESSION["loggedIn"] = 0;
      echo "";
     }
     $sql = "SELECT *  FROM utakmice ORDER BY DATUM DESC";
     $result = $conn->query($sql);
    
  
   if($result->num_rows>0)
   {
     while( $row = $result->fetch_assoc())
     {
       echo "<div class='prikaz'";
         echo "<div>";
         echo "<a class='naslovTeme' href='./pages/diskusija.php?id=". $row['id'] ." ' >".$row["domacin"]."-". $row["gost"]. "</a><br> -------- <br>" . $row["datum"]."<br>";
         echo "</div>";
       echo "</div>";
         $_SESSION['idzaproveru']=$row['id'];
     }
   }
    
     
?>
</body>
</html>