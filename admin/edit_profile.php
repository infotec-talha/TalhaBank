<?php
include_once 'header.php';
$address_updated=false;
$person_id=0;
$address="";
if($_SERVER["REQUEST_METHOD"]=="GET")
{
    if(isset($_GET["person_id"]))
    {    
    $person_id=$_GET["person_id"];
    $link= databaseCon();
    $sql="SELECT * FROM person WHERE id=$person_id";
    $result= executeQuery($link, $sql);
    $row= mysqli_fetch_assoc($result);
    }
}
elseif($_SERVER["REQUEST_METHOD"]=="POST")
{   
    $id=$_POST["action"];
    $address="'".$_POST["address"]."'";
    $link= databaseCon();
    $sql="UPDATE person SET adress=$address WHERE id=$id";
    $address_updated= executeQuery($link, $sql);
    
        
} 

?>
<div class="container">
    <form action="edit_account.php" method="POST">
        <input type="hidden" name="action" value="<?=$person_id?>"> 
        
                    <h1>Edit adress:</h1>
                    <div class="form-group col-sm-3">
                        <?php if(!$address_updated)   {?>
                        <label for="name">Name:</label>
                        <input required type="text" class="form-control"  name="name" <?php if(isset($row)){?> value="<?=$row["full_name"];}?>">
                        <label for="cnic">Cnic no:</label>
                        <input required type="text" class="form-control"  name="cnic" <?php if(isset($row)){?> value="<?=$row["cnic"];}?>">
                        <label for="address">Address:</label>
                        <input required type="text" class="form-control"  name="address" <?php if(isset($row)){?> value="<?=$row["adress"];}?>">
                        <?php }else{?>
                        
                         <input required type="text" class="form-control"  name="adress"  value="<?=$address;?>">
                       <?php }?>
                    </div>       
                 

                    <div class="form-group col-sm-3">      
                        <button type="submit" class="btn btn-dark ">Save</button>
                    </div>
                    <?php if($address_updated)   {?>
                     <div class="form-group col-sm-3">      
                         <small class="text-success">successfully updated adress</small>
                     </div>
                    <?php $address_updated=false; }?>
      </form>
    
    
</div>
<?php include_once 'footer.php';

