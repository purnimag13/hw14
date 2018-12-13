<!DOCTYPE html>
<html>
    <head>
        <title>Display Products</title>
    </head>
    <body>
        <?php
            require_once("db.php");
            $id = 0;

            if(isset($_GET['id']) && $_GET['id'] != 'blank' && $_GET['id'] != '-')
            {
                $id = $_GET['id'];

                $sql = "select ProductName, ProductID, UnitPrice from Products where ProductID=".$id;
                $result = $mydb->query($sql);
                echo "<table border=1>
                    <tr>
                        <th>Product Name</th>
                        <th>Product ID</th>
                        <th>Unit Price</th>
                    </tr>";
                $row = mysqli_fetch_array($result);              
                echo "<tr>
                    <td>" .$row["ProductName"]. "</td>
                    <td>" .$row["ProductID"]. "</td>
                    <td>" .$row["UnitPrice"]. "</td>
                </tr>"; 
                echo "</table>";
            } 
            else{

                $sql = "select ProductName, ProductID, UnitPrice from Products";
                $result = $mydb->query($sql);

                echo "<table border=1>
                    <tr>
                        <th>Product Name</th>
                        <th>Product ID</th>
                        <th>Unit Price</th>
                    </tr>";
                while($row = mysqli_fetch_array($result))
                {
                    echo 
                    "<tr>
                        <td>" .$row["ProductName"]. "</td>
                        <td>" .$row["ProductID"]. "</td>
                        <td>" .$row["UnitPrice"]. "</td>
                    </tr>"; 
                }
                echo "</table>";
            }           
        ?>
    </body>
</html>