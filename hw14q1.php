<!DOCTYPE html>
<html>
    <head>
        <title>Question 1 </title>
    </head>
    <script src="jquery-3.1.1.min.js"></script>
    <script>
        function getTable()
        {
            try
            {
                asyncRequest = new XMLHttpRequest();  
                asyncRequest.onreadystatechange=stateChange;
                var url="displayProducts.php";
                asyncRequest.open('GET',url,true);
                asyncRequest.send(null);
            }
            catch (exception)
            {
                alert(exception);
            }
        }
        $(function(){
            $("#pid").change(function(){
            var id = document.forms[0].pid.value;
                $.ajax({
                url:"displayProducts.php?id="+id,
                async:true,
                success: function(result){
                    $("#container").html(result);
                }
                })            
            });
        })

        function stateChange() 
        {
            if(asyncRequest.readyState==4 && asyncRequest.status==200)
            {
                document.getElementById("container").innerHTML=asyncRequest.responseText;
            }
        }

        function tableOff()
        {
            document.getElementById("container").innerHTML="";
        }

        function init()
        {
            document.getElementById("choose").addEventListener("mouseover", getTable);
            document.getElementById("choose").addEventListener("mouseout", tableOff);
        }

        document.addEventListener("DOMContentLoaded", init);
    </script>
    <body>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
            <p id="choose"><u>Choose a Product</u></p> 
            <?php
                require_once("db.php");
                $sql = "select ProductID from Products";
                $result = $mydb->query($sql);
                echo "<select id='pid'> <option value='blank'> - </option>";
                while($row = mysqli_fetch_array($result))
                {
                    echo "<option value='" .$row["ProductID"]. "'>" .$row["ProductID"]. "</option>"; 
                }
                echo "</select>";
            ?>            
        </form>
        <div id="container"> </div>
    </body>
</html>