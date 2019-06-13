<!DOCTYPE html>
<?php
include ("ConnDB.php");
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>PoTr</title>
<link href="css/style.css" rel="stylesheet" >
</head>
<body>

<?php

    if(isset($_POST['Add_Translation']))
    {   $select=$_POST["Language"];
            
       $sql = "INSERT INTO poezii ($select, fake_ID)
        VALUES ('".$_POST["Translation"]."','".$_POST["ID"]."')";
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            if (empty($_POST["Language"])) 
            {
                error_log( "Language field not completed!" );
                header("Location:MissingLanguage.php");
            } 
        
            else if (empty($_POST["Translation"])) 
            {
                error_log( "Poem field not completed!" );
                header("Location:MissingPoem.php");
            }
            
            else if (empty($_POST["ID"])) 
            {
                error_log( "Poem field not completed!" );
                header("Location:MissingPoem.php");
            } 
        
            else 
            {
                $result = mysqli_query($con,$sql);
                header("Location:Poems.php");
            }
        }
    }            
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
    
    <div class="addPoem">
        <h1>* Add your own translation *</h1>
        <div class="add">
            <form action="Translation.php" method="post"> 
           
            <label id="first">Language</label><br/>
            <select multiple size="2" name="Language">
		<option value="English">English</option>
		<option value="French">French</option>
		<option value="Romanian">Romanian</option>
		<option value="Spanish">Spanish</option>
            </select><br>
            
            <label id="first">Translation</label><br/>
            <textarea name="Translation" rows="4" cols="50"></textarea>
            
            <label id="first">Poem's code</label>
            <textarea name="ID" rows="1" cols="1" ></textarea>
            
            
            <button type="submit" name="Add_Translation">Add Translation</button>
      
            </form>
        </div>
    </div>
<div id="footer">Copyright &copy; Balan Andrei-Bogdan <br></div>
</div>
</body>
</html>
