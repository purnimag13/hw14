<!DOCTYPE html>
<html>
    <head>
        <title>Display Products</title>
    </head>
    <body>
        <?php
            require_once("db.php");
            $sql = "select ProductName, ProductID, UnitPrice from Products group by ProductID";
            $result = $mydb->query($sql);
            echo 
            "<table>
                <tr>
                    <th>Product Name</th>
                    <th>Product ID</th>
                    <th>Unit Price</th>
                </tr>";
            while($row = mysqli_fetch_array($result))
            {
                echo "<option value='" .$row["ProductID"]. "'>" .$row["ProductID"]. "</option>"; 
            }
            echo "</select>";
        ?>
    </body>
</html>