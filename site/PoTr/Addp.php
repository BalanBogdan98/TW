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
session_start();

if(isset($_SESSION["user_name"]))
{    if(isset($_POST['Add_Poem']))
    {   
        $sql = "INSERT INTO poezii (Titlu, Autor, Categorie, Limba, Poem)
        VALUES ('".$_POST["Title"]."','".$_POST["Author"]."','".$_POST["Category"]."','".$_POST["Language"]."','".$_POST["Poem"]."')";
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            if (empty($_POST["Title"])) 
            {
                error_log( "Title field not completed!" );
                header("Location:MissingTitle.php");
            }
        
            else if (empty($_POST["Author"])) 
            {
                error_log( "Author field not completed!" );
                header("Location:MissingAuthor.php");
            }
        
            else if (empty($_POST["Category"])) 
            {
                error_log( "Category field not completed!" );
                header("Location:MissingCategory.php");
            }
        
            else if (empty($_POST["Language"])) 
            {
                error_log( "Language field not completed!" );
                header("Location:MissingLanguage.php");
            } 
        
            else if (empty($_POST["Poem"])) 
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
        <h1>* Add your own poem *</h1>
        <div class="add">
            <form action="Addp.php" method="post"> 
            
            <label id="first"> Title</label><br/>
            <input type="text" name="Title"><br/>
      
            <label id="first">Author</label><br/>
            <input type="text" name="Author"><br/>
      
            <label id="first">Category</label><br/>
            <select multiple size="3" name="Category">
		<option value="SF">SF</option>
		<option value="Love">Love</option>
		<option value="Abstract">Abstract</option>
		<option value="Sad">Sad</option>
                <option value="Life">Life</option>
            </select><br>
      
            <label id="first">Language</label><br/>
            <select multiple size="2" name="Language">
		<option value="English">English</option>
		<option value="French">French</option>
		<option value="Romanian">Romanian</option>
		<option value="Spanish">Spanish</option>
            </select><br>
            
            <label id="first">Poem</label><br/>
            <textarea name="Poem" rows="4" cols="50"></textarea>
            
            <button type="submit" name="Add_Poem">Add Poem</button>
      
            </form>
        </div>
    </div>
<div id="footer">Copyright &copy; Balan Andrei-Bogdan <br></div>
</div>
</body>
</html>
