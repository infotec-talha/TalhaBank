<?php
include_once "header.php";

if(isset($_SESSION["logged_user"]) && !empty($_SESSION["logged_user"]) && isset($_GET["account_number"]))
{
 $account_number=$_GET["account_number"];
 $link= databaseCon();
 $sql="SELECT * FROM accounts WHERE account_number=$account_number";
 $person_accounts= executeQuery($link, $sql);
}
elseif($_SERVER["REQUEST_METHOD"]=="POST" && isset($_SESSION["logged_user"]))
{
    $first=$_POST["first"];
    $second=$_POST["second"];
    $group1=$_POST["group1"];
    $account_number=$_POST["account_number"];
    if($_POST["group1"]=="add")
    {
        $add_result=add($first,$second);
        $link= databaseCon();
        $sql="update accounts set total_amount=$add_result where account_number=$account_number";
        executeQuery($link, $sql);
        $sql="SELECT * FROM accounts WHERE account_number=$account_number";
        $person_accounts= executeQuery($link, $sql);
        $html='<small class="text-success">your account balance is increase!</small>';
    }
    else
        {
        $sub_result=sub($first,$second);
        $link= databaseCon();
        $sql="update accounts set total_amount=$sub_result where account_number=$account_number";
        executeQuery($link, $sql);
        $sql="SELECT * FROM accounts WHERE account_number=$account_number";
        $person_accounts= executeQuery($link, $sql);
        $html='<small class="text-danger">your account balance is decrease!</small>';
        }
}
else
  { 
    header("location:index.php");
  }

?>
 <?php if(isset($account_number)){?>
 <?php while($row= mysqli_fetch_assoc($person_accounts)){?>
<div class="container">
    <h4>Cash in out:</h4>
<form action="amount_transaction.php" method="post">
    
    
    
<div class="row">
    
                  <div class="form-group col-4"></div>
          <div class="form-group col-4">
               <label for="name">Name:</label>
              <input required type="text" class="form-control"  value="<?=$row["name"];?>">         
            </div>
         <div class="form-group col-4"></div>
         <div class="form-group col-4"></div>
         <div class="form-group col-4">
             <label for="name">Account_type:</label>
             <input required type="text" class="form-control"   value="<?=$row["account_type"];?>">
             <input type="hidden" name="account_number" value="<?=$row["account_number"];?>">
         </div>
         <div class="form-group col-4"></div>
         <div class="form-group col-4"></div>
         <div class="form-group col-4">
             <label for="name">Balance:</label>
             <input required type="number" class="form-control" name="first"   value="<?=$row["total_amount"];?>">
         </div>
         <div class="form-group col-4"></div>
         <div class="form-group col-4"></div>
         <div class="form-group col-4">
             <input required type="number" class="form-control" name="second" min="500">
         </div>
         <div class="form-group col-4"></div>
         <div class="form-group col-4"></div>
         <div class="form-group col-1">
             <label for="name">Add:</label>
             <input type="radio" class="form-control" name="group1"  value="add">
             
         </div>
         <div class="form-group col-1">
             <label for="name">Sub:</label>
             <input type="radio" class="form-control" name="group1"  value="sub">
         </div>
         
         <div class="form-group col-6"></div>
         <div class="form-group col-4"></div>
         <div class="form-group col-1">
             <button type="submit" class="btn btn-primary ">Save</button>
         </div>
          <?php if(isset($html)) echo $html;?>
</div>
    </div>
</form>
    <?php }}?> 
  
 


<?php include_once 'footer.php';