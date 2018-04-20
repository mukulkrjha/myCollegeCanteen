<?php

 include 'functions.php';

?>

 <?php


  if (isset($_POST['login-submit']))
  {

    $username=strtolower(mysqli_real_escape_string($conn,$_POST['username']));
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $pwd  =mysqli_real_escape_string($conn,$_POST['pwd']);
     

  if(empty($username)||empty($email)||empty($pwd))
    {
      set_msg("PLEASE FILL OUT ALL THE FIELDS ","error");
    	header('Location:./login.php?login=error');
      exit();
    }
  elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    
     set_msg("please enter a valid email !!!","error");
     header('Location:./login.php?login=error');
     exit();
   } 
  else
    {
       $query="SELECT * FROM users WHERE email='$email' AND username='$username' ;";

       $result= mysqli_query($conn,$query);

       if( mysqli_num_rows($result)>0)
          {
           $resultCheck=mysqli_fetch_array($result);	
           $pwdcheck = password_verify($pwd,$resultCheck['password']);
          	 
             if($pwdcheck===true)
               {
                 $_SESSION['username']=$resultCheck["username"];
                 $_SESSION['email']=$resultCheck["email"];
                 if($username=='admin')
                 {
                    $_SESSION['admin']="admin";
                    set_msg("you are logged in as<span>ADMIN</span> !!!","error");
                    header("Location:./update.php");
                    exit();
                 }
                 
                 else
                  {     
                   set_msg("you are logged in !!!","error");
                   header("Location:./order.php");
                   exit();
                 }

               } 
            else  
             {
                // when no result(i.e no such email exists) is returned
                set_msg(" INCORRECT PASSWORD :(","error");
                header('Location: ./login.php?login=error');
                exit();
             }
          } 
        else 
        {
              set_msg("WRONG USERNAME OR EMAIL ","error");
              header('Location: ./login.php?login=error');
              exit();
        }   

     }
   
   }
 else
 {
 	echo "<h2 style='color:red; text-align:center;text-transform:uppercase;'>please fill the form first</h2>";
}

 ?>

