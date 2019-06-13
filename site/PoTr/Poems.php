<!DOCTYPE html>
<?php
include ("ConnDB.php");
?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>PoTr</title>
<link href="css/style.css" rel="stylesheet" >
<link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
</head>
<body>
    
<?php
session_start();

if(isset($_SESSION["user_name"])) 
{    if(isset($_POST['Add_Comment']))
    {      
        $sql = "INSERT INTO traducere (English,Language,ID_e)
        VALUES ('".$_POST["Comment"]."','".$_POST["Language"]."','".$_POST["ID"]."')";
            
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
                
            if (empty($_POST["Comment"])) 
            {
                error_log( "Comment field not completed!" );
                header("Location:MissingComment.php");
            }
              
            else if (empty($_POST["Language"])) 
            {
                error_log( "Language field not completed!" );
                header("Location:MissingLgg.php");
            }
                
            else if (empty($_POST["ID"])) 
            {
                error_log( "Cod field not completed!" );
                header("Location:MissingCod.php");
            }
            
            else 
            {
                $result = mysqli_query($con,$sql);
            }
        }
    }
}

else{
    header("Location:index.php");
}
    
    
if(isset($_POST['View']))
    {      
        $select = $_POST["Language2"];
        $selectID = $_POST["ID2"];
    }  
else $selectID=1000;
?>

<div id="wrapper"> 
    <div id="header"> 
        <div class="top_banner">
            <h1>Poem Translater</h1>
            <p>We make your poem known world wide.</p>
        </div>
        
        <div class="navigation">
            <ul>
                <li><a href="Poems.php">Poems</a></li>
                <li><a href="Login.php">Login</a></li>
                <li><a href="Logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    
    <div class="anunt">
        <h2>Add your own poem by clicking <a href="Addp.php">HERE !</a></h2>  
    </div>
    <br>
    <div class="Poems">
    <button id="button12">HELP!</button>
        <div id="text"></div>
    </div>
    
    <script>

    document.getElementById('button12').addEventListener('click', loadText);
    
    function loadText()
    {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'informations.txt', true);

        xhr.onload = function()
        {
            if(this.status == 200)
                document.getElementById('text').innerHTML = this.responseText;
        }
    
        xhr.send();
    }
    </script>
    
    <?php
    
    $sql="SELECT Titlu,Autor,Poem,ID,English,Spanish,French,Romanian FROM Poezii WHERE fake_ID<1 ORDER BY ID DESC";
    $query=mysqli_query($con,$sql)or die(mysqli_error($con));
    
    while($row=mysqli_fetch_array($query))
        if (($row) != NULL) 
            { ?>
            <div class="Poems">
                <?php 
                echo $row["Titlu"]. " (by ".$row["Autor"].")"."<br/><br>";
                echo "<br/>";
                $temp = $row["ID"];
                if($temp!=$selectID)
                    echo nl2br($row["Poem"]). "<br/>"."<br/>"."<br/>";
                else 
                {
                    
                    $sql2="SELECT English,Spanish,Romanian,French,fake_ID FROM Poezii WHERE fake_ID=$selectID";
                    $query2=mysqli_query($con,$sql2)or die(mysqli_error($con));
                    while($row2=mysqli_fetch_array($query2))
                            if (($row2) != NULL) 
                                echo nl2br($row2[$select])."<br>";
                }
                echo"<br><br>";
                ?>
                
                <div class="add_comment">
                    <label id="first">View this poem in another language :</label><br/>
                </div>
                    
                <form action="Poems.php" method="post">
                        <select multiple size="2" name="Language2">
                            <option value="Romanian">Romanian</option>
                            <option value="English">English</option>
                            <option value="French">French</option>
                            <option value="Spanish">Spanish</option>
                        </select>
                        <br><br>
                        
                        <label id="first">Enter poem's code (</label>
                        <?php
                        echo $row["ID"].")";
                        ?>
                        <textarea name="ID2" rows="1" cols="1" ></textarea>
                        
                        <button type="submit" name="View">View</button>
                        <br/><br/><br/>
                </form>
                
                <div class="anunt2">
                <h4>Add your own translation by clicking <a href="Translation.php">HERE !</a></h4>
                <h5>Remember the poem's code !!!</h5>
                
                <br/><br/><br/>
                </div>
                
                <div class="preluare">
                    <label id="first">  Comments :</label><br/>
                </div>
                
                <div class="sectiune_comentarii">
                    <?php
                    $sql1="SELECT English ,Language FROM traducere where traducere.ID_e = $temp ORDER BY ID_num DESC";
                    $query1=mysqli_query($con,$sql1)or die(mysqli_error($con));
                    while($row1=mysqli_fetch_array($query1))
                        {
                            if ( ($row1) != NULL)
                                ?>
                                <div class="stil_comentarii">
                                <?php
                                echo"---------------";echo $row1["Language"] ;echo"-------------<br/><br/>";
                                echo nl2br($row1["English"]). "<br/>"."<br/>"."<br/>"; 
                                ?>
                                </div>
                                <?php } ?>
                </div>
                    
                <div class="add_comment">
                    <label id="first">Say your opinion here :</label><br/>
                </div>
                    
                <form action="Poems.php" method="post">
                    <textarea name="Comment" rows="3" cols="50"></textarea>
                    <label id="first">Language</label><br/>
                        
                    <select multiple size="2" name="Language">
                        <option value="Romanian">Romanian</option>
                        <option value="English">English</option>
                        <option value="French">French</option>
                        <option value="Spanish">Spanish</option>
                        </select>
                        <br><br>
                        
                    <label id="first">Enter poem's code (</label>
                        <?php
                        echo $row["ID"].")";
                        ?>
                        <textarea name="ID" rows="1" cols="1" ></textarea>
                        
                    <button type="submit" name="Add_Comment">Add Comment</button>
                        <br/><br/><br/>
                </form>
            </div>
    <?php } ?>
      
 
    <div 
        
        id="footer">Copyright &copy; Balan Andrei-Bogdan <br>
    
    </div>
</div>
</body>
</html>