<?php
session_start();
include_once 'header.php';

function establish_user_session($user_name)
{
          
           $link= databaseCon();
           $sql="SELECT * FROM users  WHERE user_name=$user_name";
           $person_obj= executeQuery($link, $sql);
           
           $_SESSION["logged_user"]=mysqli_fetch_assoc($person_obj);   
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
          
          $user_name="'".$_POST["user_name"]."'";
          $password="'".md5($_POST["password"])."'";
          $is_login_success=logIn($user_name,$password);
          if($is_login_success)
          {
              
              establish_user_session($user_name);
              //echo '<a href="test.php">Pass session to another page</a>';
              header("location:account_detail.php");
             
               
          }
}
else 
{
    header("location:index.php");
}    
?>
