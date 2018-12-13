<!doctype html>
<html>
<head>
  <title> Php Ajax</title>
</head>
<body>
  <?php
    $id = 0;
    if(isset($_GET['id'])) $id=$_GET['id'];

    require_once("db.php");

    $sql="SELECT CompanyName FROM suppliers WHERE CompanyName LIKE '$id%'";
    $result = $mydb->query($sql);

    foreach($result as $row)
    {
        if($row){
            echo $row["CompanyName"];
            echo "<br/>";
          } else {
            echo "Your company name cannot be found.";
          }   
    }

    // if($row=mysqli_fetch_array($result)){
    //   echo "Your company name is ".$row["CompanyName"];
    // } else {
    //   echo "Your company name cannot be found.";
    // }

  ?>
</body>
</html>
