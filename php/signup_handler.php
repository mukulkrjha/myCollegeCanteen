<?php
 
 include 'header.php';

?>

<?php
  if(isset($_POST['signup-submit'])) 
   { 
         
       $fname =mysqli_real_escape_string($conn,$_POST['fname']);
       $lname =mysqli_real_escape_string($conn,$_POST['lname']);
       $username =mysqli_real_escape_string($conn,$_POST['username']);
       $email =mysqli_real_escape_string($conn,$_POST['email']);
       $pwd    =mysqli_real_escape_string($conn,$_POST['pwd']);
       $cnfpwd =mysqli_real_escape_string($conn,$_POST['cnfpwd']);
   
       // hashing the password 
       $hashedpwd= password_hash($pwd,PASSWORD_DEFAULT);

       //error handling
       
     if(empty($fname)|| empty($lname)|| empty($username)||empty($email)||empty($pwd)||empty($cnfpwd))
       {
         set_msg("please fill out all the fields","error");
         header('Location:./signup.php?success=empty1');
         exit();
       }
       
       // no special characters used in fnmae or lname  
     $namePattern="/^[a-zA-Z]+/";


    if(!preg_match($namePattern, $fname)&&!preg_match($namePattern, $lname))
     {

      set_msg("Name should contain only alphabets","error");
      header('Location:./signup.php?success=empty1');
      exit();
     
     }

       // validity of email
      elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
      {

        set_msg("enter valid email please","error","error");
        header('Location: ./signup.php?signup=error');
        exit();

      }


      // password matches with confirm password

      elseif(strcmp($pwd, $cnfpwd)!=0)
      {
          set_msg("passwords do not match","error");
          header('Location:./signup.php?success=password not matched');
          exit();
      }


      //password contains both numbers and letters 

      elseif(!preg_match("/^[a-zA-Z0-9]+/", $pwd))
      {
        
         set_msg("password must both numbers and letters");
         header('Location:./signup.php?signup=error');
         exit();

      }

  //
      else 
      { 
   
         $sql="SELECT  * FROM users where username='$username'; ";
         $result =mysqli_query($conn,$sql);
         $resultcheck=mysqli_num_rows($result);
        
         if($resultcheck>0)
         {
          set_msg("this username has been taken already","error");
          header('Location:./signup.php?signup=error');
          exit();
         }

         $sql2="SELECT  * FROM users where email='$email'; ";
         $result2 =mysqli_query($conn,$sql);
         $resultcheck2=mysqli_num_rows($result);
        
         if($resultcheck>0)
         {
          set_msg("account exists with this email","error");
          header('Location:./signup.php?signup=error');
          exit();
         }

         $signupQuery= "INSERT INTO users (fname, lname,username, email, password,active) VALUES ('$fname','$lname','$username','$email','$hashedpwd',1) ;";
          $signupResult= mysqli_query($conn,$signupQuery);
      
          if(!$signupResult)
          {

           set_msg("some error occured","error");
           header('Location:./signup.php?signup=error');
           exit();

          }
          else {

           /*
             send activation link to the email 


           mail($to, $subject, $message);
*/

           set_msg("account activated .Please login  ","success");
           header('Location:./signup.php?signup=success');
           exit();

          }
      }
  
   }


?>