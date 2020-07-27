<?php
include_once "header.php";
$permission= "'".substr(basename(__FILE__),0,-3)."'";
$permission_exist= permission_exist($permission);

if(isset($_SESSION["logged_user"]) && !empty($_SESSION["logged_user"]) && isset($_GET["id"]))
{ 
     

    $id=$_GET["id"];
    $link= databaseCon();
    $sql="SELECT * FROM person WHERE id=$id";
    $person_info= executeQuery($link, $sql);
    $row_count= mysqli_num_rows($person_info);
    $account_exist=false;
    if($row_count>0)
    
    $account_exist=true;


}
else
  header("location:index.php");  
?>
<?php if(isset($account_exist)) 
    { 
    while($row= mysqli_fetch_assoc($person_info)){?>
<div class="form-group col-sm-3">
                        
                        <label for="name">Name:</label>
                        <input required type="text" class="form-control"  name="name" <?php if(isset($row)){?> value="<?=$row["full_name"];}?>">
                        <label for="cnic">Cnic no:</label>
                        <input required type="text" class="form-control"  name="cnic" <?php if(isset($row)){?> value="<?=$row["cnic"];}?>">
                        <label for="address">Address:</label>
                        <input required type="text" class="form-control"  name="address" <?php if(isset($row)){?> value="<?=$row["adress"];}?>">
                        
                    </div>       
<?php }}?>
<?php include_once 'footer.php';