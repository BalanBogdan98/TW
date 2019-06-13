<html>
    <head>
        <meta charset="UTF-8">
        <title>Poems</title>
    </head>
    <body>
       <?php
        
       $con=mysqli_connect('localhost','root','','Poezii') or die("Failed to connect: ".mysqli_error($con));
       
        /*$sql="SELECT Autor FROM Poezii ";
        $query=mysqli_query($con,$sql)or die(mysqli_error($con));
        $row=mysqli_fetch_array($query);
        echo "Poem: ".nl2br($row["Autor"]). "<br/>";*/
        
        ?>
    </body>
</html>
