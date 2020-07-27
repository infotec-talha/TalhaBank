<?php
function databaseCon()
{
$database='talhaBank';
$host='localhost';
$user='root';
$pass='';
$link= mysqli_connect($host, $user, $pass, $database);
if($link===false)
  die(mysqli_connect_error ());
return $link;
}
function executeQuery($link,$query)
{
  $result=mysqli_query($link,$query);
  if($result===false)
     die(mysqli_error ($link));
  return $result;        
}
function signUp($full_name,$person_adress,$person_cnic,$account_type,$amount,$pincode)
{
    $sql="SELECT * FROM person WHERE cnic="."$person_cnic";
        $link= databaseCon();
        $result= executeQuery($link, $sql);
        $row_count= mysqli_num_rows($result);
        if($row_count==0)
        {
           $sql="INSERT INTO person (full_name,adress,cnic) VALUES($full_name,$person_adress,$person_cnic)";
           mysqli_begin_transaction($link, MYSQLI_TRANS_START_READ_WRITE);
           $inserted=executeQuery($link, $sql);
           $sql="SELECT id FROM person WHERE cnic="."$person_cnic";
           $res=executeQuery($link, $sql);
           $person_id= mysqli_fetch_assoc($res);
           $id=$person_id["id"];
           $sql="INSERT INTO accounts(account_type,total_amount,pincode,person_id) VALUES($account_type,$amount,$pincode,$id) ";
           $res=executeQuery($link, $sql);
           mysqli_commit($link);
           if($res)
           $html='<small class="text-success">user successfully registerd!</small>';
           else
           $html='<small class="text-danger">error!</small>';   
          
           
        }
        elseif($row_count>0)
        {
          $sql="SELECT id FROM person WHERE cnic=$person_cnic";
          $res=executeQuery($link, $sql);
          $res_id= mysqli_fetch_assoc($res);
          $id=$res_id["id"];
          $sql="SELECT account_type FROM accounts WHERE person_id=$id";
          $acc_type=executeQuery($link, $sql);
          $res_acc_type= mysqli_fetch_assoc($result);
          if($account_type!==$res_acc_type["account_type"])
          { 
              $sql="INSERT INTO accounts (account_type,total_amount,person_id) VALUES($account_type,$amount,$id)";
              $result=executeQuery($link, $sql);
              $html='<small class="text-success">user successfully open second account!</small>';
          }
        }
          else 
          $html='<small class="text-danger">user already exists</small>';
}
function logIn($user_name,$password,$user_type)
{
          $link= databaseCon();
          $sql="SELECT * FROM $user_type WHERE user_name=$user_name AND password=$password";
          $result= executeQuery($link, $sql);
          $count_row=mysqli_num_rows($result);
          if($count_row>0)
          {
              return true; 
          }
         else 
          {
            return false;
          }
} 
function bank_access_online($person_cnic,$account_number,$pincode)
{
        $link= databaseCon();
    $sql="SELECT cnic FROM person WHERE cnic=$person_cnic";
    $check_cnic= executeQuery($link, $sql);
    $res_row= mysqli_num_rows($check_cnic);
    if($res_row==0)
    {
        $response="your cnic number is incorrect!";
        return $response;
    }
    else
    {
        $sql="SELECT * FROM accounts  WHERE account_number=$account_number AND pincode=$pincode";
        $check_acc_num= executeQuery($link, $sql);
        $result_acc_num=mysqli_num_rows($check_acc_num);
        if($result_acc_num==0)
        {  
          $response="your account number is incorrect!";
          return $response;
        } 
       
    }
   

}
function check_user_name($user_name)
{
            $sql="SELECT user_name FROM users  WHERE user_name=$user_name";
            $link= databaseCon();
            $check_user= executeQuery($link, $sql);
            $res_row= mysqli_num_rows($check_user);
            return $res_row;
}
