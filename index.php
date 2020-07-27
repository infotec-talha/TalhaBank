<?php
include_once 'header.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $action=$_POST["action"];
    if($action=="sign_up")
    { 
        $full_name="'".$_POST["full_name"]."'";
        $person_adress="''";
        $person_cnic="'".$_POST["cnic"]."'";
        $account_type="'".$_POST["account_type"]."'";
        $amount="'".$_POST["total_amount"]."'";
        $pincode="'".$_POST["pincode"]."'";
        $html=signUp($full_name,$person_adress,$person_cnic,$account_type,$amount,$pincode);
     }
elseif($action=="bank_access_online")
{   
    $user_name="'".$_POST["user_name"]."'";
    $password="'".md5($_POST["password"])."'";
    $person_cnic="'".$_POST["cnic"]."'";
    $account_number="'".$_POST["account_number"]."'";
    $pincode="'".$_POST["pincode"]."'";
    $email="'".$_POST["email"]."'";
    $bank_access= bank_access_online($person_cnic, $account_number, $pincode);
    if($bank_access=="your cnic number is incorrect!")
    {  
        $html="<small class='text-danger'>your cnic number is incorrect!</small>";
    }   
    elseif($bank_access=="your account number is incorrect!") 
    {
        $html="<small class='text-danger'>your account number or pin is incorrect!</small;>";
    }   
    else
        {
            $user_exist=check_user_name($user_name);
            if($user_exist)
            { 
                $link= databaseCon();
                $sql="SELECT id FROM person WHERE cnic=$person_cnic";
                $check_id= executeQuery($link, $sql);
                $id= mysqli_fetch_assoc($check_id);
                $iD=$id["id"];
                $sql="SELECT email FROM users WHERE email=$email";
                $email_exist=executeQuery($link, $sql);
                $email_field=mysqli_num_rows($email_exist);
                
                if($email_field>0)
                {  
                    $html="<small class='text-danger'>email already exist!</small;>";
                }    
                else{
                $sql="INSERT INTO users(user_name,password,email,person_id) VALUES($user_name,$password,$email,$iD)";
                $user= executeQuery($link, $sql);
                if($user){
                    $to = trim($email,"'");
                    $subject = "My subject";
                    $txt = "your bank account is linked with your email!";
                    $headers = "From:naureenimran456@gmail.com";
                   if(mail($to,$subject,$txt,$headers))
               {
                 $success="<small class='text-success'>successfully created online access!</small>";
               }
                else
              {
                $success="<small class='text-danger'>Email sending failed...!</small>";
              } 
             }
            }    
           }
               else 
              {
                $html="<small class='text-danger'>username already exist!</small>";
              }    
             }
            }           
             }
              elseif(is_logged_in())
             {
               header("location:account_detail.php");
             }
?>

<div class="container">
<?php if(isset($div)) echo $div;?>
    <br>
                    <img src="MyABL-LandingPage-Main.jpg" class="img-fluid" alt="Responsive image">
                    <div><br></div>
                    
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Open bank account
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="index.php" method="post">
          <input type="hidden" name="action" value="sign_up">
            <h1>Open your bank account:</h1>
                         
       <div class="form-group col-sm-6">
       <input required type="text" class="form-control" placeholder="Full Name" name="full_name">
           </div>
            <div class="form-group col-sm-6">
                 <input required type="number" class="form-control" placeholder="Personal Cnic" name="cnic">
                    </div>
                    <div class="form-group col-sm-6">
                        <input required type="number" class="form-control" placeholder="Pin Code" name="pincode">
                    </div>
                    
                    <div class="form-group col-sm-6">
                        
                        <select class="form-control" name="account_type">
                        <option selected>Choose Account Type</option>    
                        <option>Current</option>
                        <option>Saving</option> 
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <input required type="number" class="form-control" placeholder="Opening Amount" name="total_amount" min="500">
                    </div>
                    <div class="form-group col-sm-6">      
                        <button type="submit" class="btn btn-dark ">Signup</button>
                    </div>
                     <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
                    
          </form>
          
      </div>
     
        
    </div>
  </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Online access bank
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="index.php" method="post">
                   <input type="hidden" name="action" value="bank_access_online">
                    <h1>Online access bank account:</h1>
                         
                   
                     <div class="form-group col-sm-6">
                        <input required type="number" class="form-control" placeholder="Personal Cnic" name="cnic" value="3840102138687">
                    </div>
                    <div class="form-group col-sm-6">
                        <input required type="number" class="form-control" placeholder="Account Number" name="account_number" value="123000001">
                    </div>
                     <div class="form-group col-sm-6">
                        <input required type="number" class="form-control" placeholder="Pin Code" name="pincode" value="1122">
                    </div>
                    <div class="form-group col-sm-6">
                        <input required type="email" class="form-control" placeholder="Person Email" name="email" value="infotectalha@gmail.com">
                    </div>
                    <div class="form-group col-sm-6">
                        <input required type="text" class="form-control" placeholder="User Name" name="user_name" value="talha786">
                    </div>
                    
                     <div class="form-group col-sm-6">
                        <input type="password" class="form-control" placeholder="Password" name="password" value="123456">
                    </div>
                   
                    <div class="form-group col-sm-6">      
                        <button type="submit" class="btn btn-dark ">Create</button>
                    </div>
                     <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
                    
          </form>
          
      </div>
     
    </div>
  </div>
</div>
<?php if(isset($html)) echo $html; ?>
<?php if(isset($success)) echo $success;?>
</div>

  



<?php include_once 'footer.php';