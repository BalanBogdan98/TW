<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>PoTr</title>
<link href="css/style.css" rel="stylesheet" >
</head>
<body>

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
        <h1>* Login *</h1>
        <div class="add">
            <form name="form" action="Login.php" method="post"> 
            
            <label id="first"> Username</label><br/>
            <input type="text" name="username"><br/>
      
            <label id="second">Password</label><br/>
            <input type="password" name="password"><br/>
      
            <button type="submit" name="Login">Login</button>
      
            </form>
        </div>
    </div>
<div id="footer">Copyright &copy; Balan Andrei-Bogdan <br></div>
</div>
</body>
</html>
