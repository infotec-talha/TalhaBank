<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once 'functions.php';
?>
<html lang="en">
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
  
        <title>Bank</title>
        <style>
           

            .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                height:60px;
                color: white;
                text-align: center;
            }

        </style>
    </head>
    <body>
              
                <nav class="navbar navbar-expand navbar-dark bg-primary">
       
             <a class="navbar-brand" href="#">talhaBank</a>
      <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
<!--            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>-->
          </li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <?php if(!isset($_SESSION['logged_user'])) {?>
<!--          <p>hello login</p>-->
          <form class="form-inline my-2 my-md-0" action="login.php" method="post">
             <input type="hidden" name="action" value="log_in">
             <input type="hidden" name="user_type" value="users">
          <li class="nav-item input-group input-group-sm">
          <button type="submit" class="btn-outline-primary  form-control">login</button>
          </li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item input-group input-group-sm"> 
          <input required type="text" class="form-control" aria-label="Small"  placeholder="User Name" name="user_name">
          </li>
          <li class="nav-item input-group input-group-sm"> 
          <input required type="password" class="form-control input-group-sm"  placeholder="Password" name="password">
          </li>
               
      </form>
          </ul>
             
          <?php }?> 
          <?php if(isset($_SESSION['logged_user'])) {?>

           
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
            <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          <li class="nav-item"><a class="nav-link" href="#"></a></li>
          
          <li class="nav-item dropdown">
  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <form class="form-inline my-2 my-md-0" action="logout.php" method="post">
                   <input type="hidden" name="action" value="logout">
      <button type="submit" class="dropdown-item btn-link" >logout</button>
               </form>
    
    
    
  </div>
                   
</li>
             </ul>
          <?php }?>

             

                </nav>

     

