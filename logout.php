<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_SESSION['logged_user']))
{
               
           unset($_SESSION['logged_user']);
           session_destroy();
           print_r($_SESSION);
           header("location:index.php");

}
else
{
    header("location:index.php");
}
?>