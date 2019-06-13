<?php
session_start();
$user = '111';
$pass = '222';
$message="";
if((!(empty($_POST["username"])))||(!(empty($_POST["password"])))){
    if(($_POST["username"]==$user)&&($_POST["password"]==$pass)){
        $_SESSION["user_name"] = $_POST["username"];
        header("Location:Poems.php");
    } else 
    {
         header("Location:IncorectField.php");
    }
}else{
    header("location:index.php");
}
?>