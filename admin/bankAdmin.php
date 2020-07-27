<?php
include_once 'header.php';
//login process
if($_SERVER["REQUEST_METHOD"]==="POST" && "login"===$_POST["action"] && !isset($_SESSION["login_user"]))
{    
$user_type=$_POST["user_type"];
$email="'".$_POST['email']."'";
$password= "'".md5($_POST['password'])."'";

        $login= login($email, $password,$user_type);
   if($login)
          
           $_SESSION["login_user"]=$_POST["email"];
    else
    { 
        $html="<small class='text-danger'>admin email or password is incorrect!</small>";
           
    }
}
// log out process
elseif($_SERVER["REQUEST_METHOD"]==="POST" && "logout"===$_POST["action"] && isset($_SESSION["login_user"]))  
       { 
             
             unset($_SESSION['login_user']);
            // session_destroy();
             header("location:bankAdmin.php"); 
            } 
   // account access process
 if(isset($_SESSION["login_user"]))

        {
        $sql="SELECT * FROM accounts";
        $link= databaseCon();
        $res= executeQuery($link, $sql);
        }

        




 
?>

<div class="container">
<?php if(!isset($_SESSION["login_user"])) {?>
    <br>
                    <img src="MyABL-LandingPage-Main.jpg" class="img-fluid" alt="Responsive image">
                    <div><br></div>
 <form action="bankAdmin.php" method="post"> 
     <input type="hidden" name="action" value="login">
     <input type="hidden" name="user_type" value="admins">
<div class="row">
    
                  <div class="form-group col-4"></div>
          <div class="form-group col-4">
              <input required type="email" class="form-control" placeholder="Admin Email" name="email">         
            </div>
         <div class="form-group col-4"></div>
         <div class="form-group col-4"></div>
         <div class="form-group col-4">
             <input required type="password" class="form-control" placeholder="Password"  name="password">
         </div>
         <div class="form-group col-4"></div>
         <div class="form-group col-4"></div>
         
         <div class="form-group col-1">
             <button type="submit" class="btn btn-primary ">Login</button>
         </div>
          <?php if(isset($html)) echo $html;?>
</div>
  </form>
<?php }?>

 <?php if(isset($_SESSION["login_user"])){?>                   
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Account #</th>
      <th scope="col">Type</th>
      <th scope="col">Balance</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      
    <?php while($row= mysqli_fetch_assoc($res)){?>
    <tr>
      <th scope="row"><?=$row["person_id"]?></th>
      <td><?=$row["name"]?></td>
      <td><?=$row["account_number"]?></td>
      <td><?=$row["account_type"]?></td>
      <td><?=$row["total_amount"]?></td>
      <td><button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">
    <a href="../admin/edit_profile.php?person_id=<?=$row['person_id'];?>">Edit </a>
   
</button></td>
    </tr>
    <?php }}?> 
  
  </tbody>
</table> 
    <form class="form-inline my-2 my-md-0" action="bankAdmin.php" method="post">
                   <input type="hidden" name="action" value="logout">
      <button type="submit" class="btn btn-primary" >logout</button>
               </form> 
  
 </div>
                    
                    
                   
 
          
                         
</div>


<?php include_once 'footer.php';