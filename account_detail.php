<?php
include_once "header.php"; 

if(isset($_SESSION["logged_user"]) && !empty($_SESSION["logged_user"]))
{ 
     

    $id=$_SESSION["logged_user"]["person_id"];
    $link= databaseCon();
    $sql="SELECT * FROM accounts WHERE person_id=$id";
    $account_result= executeQuery($link, $sql);
    $row_count= mysqli_num_rows($account_result);
    $account_exist=false;
    if($row_count>0)
    
    $account_exist=true;


}
else
  header("location:index.php");  
?>
<?php if(isset($account_exist)) 
    { 
    while($row= mysqli_fetch_assoc($account_result)){?>
<div class="row">
                      <div class="form-group col-2">
                <h6>Name:<?=$row["name"]?></h6>          
            </div>
                  <div class="form-group col-2">
                <h6>Account#:<?=$row["account_number"]?></h6>          
            </div>
          <div class="form-group col-2">
                <h6>Type:<?=$row["account_type"]?></h6>          
            </div>
         <div class="form-group col-2">
                <h6>Balance:<?=$row["total_amount"]?></h6>          
          </div>
    <div class="form-group col-2">
           <!-- Button trigger modal --> 
<button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">
    <a href="person_info.php?id=<?=$row['person_id'];?>">Info</a>
   
</button>
                 
  </div>
   <div class="form-group col-2">
           <!-- Button trigger modal --> 
<button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">
    <a href="amount_transaction.php?account_number=<?=$row['account_number'];?>">Cashin_out</a>
   
</button>
                 
  </div> 
    
</div>
    <?php 
    
    } 
    
}?>
   

    
    
   
<?php  include_once "footer.php";
