<!DOCTYPE html>
<html>
    <head>
        <title>Question 1 </title>
    </head>
    <body>
        <p>All Products</p>
        <?php
            require_once("db.php");
            $sql = "select ProductID from Products";
            $result = $mydb->query($sql);
            echo "<p>Choose a Product</p> <select> <option value='blank'> - </option>";
            while($row = mysqli_fetch_array($result))
            {
                echo "<option value='" .$row["ProductID"]. "'>" .$row["ProductID"]. "</option>"; 
            }
            echo "</select>";
        ?>
    </body>
</html>