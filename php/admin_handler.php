<?php 

  include 'dbh.php' ;
  include 'functions.php'
?>

<?php

//********************** CODE FOR LOGGING IN THE ADMIN *************************//

 if(isset($_POST['admin-submit']))
 {

   $admin= strtolower(mysqli_real_escape_string($conn,$_POST['admin']));
   $adminemail= mysqli_real_escape_string($conn,$_POST['adminemail']);
   $adminpwd= mysqli_real_escape_string($conn,$_POST['adminpwd']);

   if($admin==="admin")
   {
    
    if(filter_var($adminemail, FILTER_VALIDATE_EMAIL))
    { 
    	 $sql ="SELECT * FROM users WHERE username='$admin' and email='$adminemail'";
         $result = mysqli_query($conn,$sql);
         $resultcheck = mysqli_num_rows($result);
    
         if($resultcheck==1)
         {
          
            $resultarray=mysqli_fetch_assoc($result);
            
            if(password_verify($adminpwd,$resultarray['password']))
            {
              	 set_msg("you are logged in as ADMIN","error");
              	 $_SESSION['username']="admin";
              	 $_SESSION['email']=$resultarray['email'];
                   $_SESSION['admin']='admin';
              	 header('Location: ./admin.php?login=admin');
              	 exit();
    
            }
            else
            {
              	set_msg("please enter correct password","error");
              	header('Location: ./admin.php?login=error');
              	exit();
            }
         }
         else
         {
           	set_msg("NO ADMIN ACCOUNT EXISTS","error");
           	header('Location: ./admin.php?login=error');
           	exit();
          }

     }
     else 
     {
     	set_msg('wrong email address of admin account',"error");
     	header('Location: ./admin.php?login=error');
     	exit();
     }

   }
   else 
   {
    set_msg( "username doesnot match!!","error");
    header('Location: ./admin.php?login=error');
     exit();
   }


 }
 
//************** CODE FOR HANDLING CRUD OPERATIONS DONE BY THE ADMIN  *****************//

 elseif (isset($_POST['search']))
 {

      $name=mysqli_real_escape_string($conn,$_POST['search']);
      $num=mysqli_real_escape_string($conn,$_POST['numOfItem']);
      $price=mysqli_real_escape_string($conn,$_POST['priceOfItem']);
      $category=mysqli_real_escape_string($conn,$_POST['categorySel']);
      $addRem=mysqli_real_escape_string($conn,$_POST['addRem']);

    if($addRem== '-')
     {
        if((!empty($name))&&(!empty($num))&&(!empty($price))&&(!empty($avail)))
        {
           echo "error-empty";

        }
      else
       {
           if(is_numeric($num)||is_numeric($price)||is_numeric($avail))
           {
             echo "error-not-num";
           
           }
           else
           {
               $query="SELECT * FROM fooditems WHERE foodname='$name'";
               $queryRes=mysqli_query($conn,$query);
               if(mysqli_num_rows($queryRes)=='1'||mysqli_num_rows($queryRes))
              {
                   $resArr=mysqli_fetch_assoc($queryRes);
                   $newavail=$resArr['available']-$num;
                   $query2="UPDATE fooditems SET price='$price' ,available='$newavail' WHERE foodname='$name' ";
                   $query2res=mysqli_query($conn,$query2);
                   $success=mysqli_affected_rows($conn);
                     if(!$success)
                     {
                         echo "error-sql";
                     }
                     else
                     {
                        echo $category."&success-updated";
                     }

              }
            else
               { 
                     echo "error-no-such-item";
               }
           

           } 

        }

     }  
    else if($addRem=='+')
    {
          if((empty($name))||(empty($num))||(empty($price))||(empty($category)))
          {
              echo "error-empty2";

          }
          else
         {
             if(!(is_numeric($num))||(!is_numeric($price)))
             {
              echo "error-not num";
             }
              else
             {
               $query="SELECT * FROM fooditems WHERE foodname='$name'";
               $queryRes=mysqli_query($conn,$query);
                 if(mysqli_num_rows($queryRes)=='1'||mysqli_num_rows($queryRes))
                 {
                     $resArr=mysqli_fetch_assoc($queryRes);
                     $newavail=$resArr['available']+$num;
                     $query2="UPDATE fooditems SET price='$price' ,available='$newavail' WHERE foodname='$name'";
                     $query2res=mysqli_query($conn,$query2);
                     $success=mysqli_affected_rows($conn);
                       if(!$success)
                       {
                        echo "error-sql";
                       }
                       else
                       {
                        echo $category."&success-updated";
                       }

                 }
                 else
                 { 
                   // no such item exists in the table so will be add it //
                     $query="INSERT INTO fooditems (foodname,foodcategory,price,available ) VALUES('$name','$category','$price','$num')";
                     $queryRes=mysqli_query($conn,$query); 
                     
                     $success=mysqli_affected_rows($conn);
                       if($success>0)
                       {
                         echo $category.'&success';
                       }
                       else
                       {
                        echo "error-sql-new";
                       } 

                 }

              }

           }

        }
      }
  /**************************** REFRESHING THE ADMIN PAGE AFTER EACH CRUD PAGE LOAD AT FIRST TIMES ********************************/

     else if(isset($_REQUEST["admin-update"]))
      {
        $catname=mysqli_real_escape_string($conn,$_REQUEST["catname"]);
   
       // match this string against the foodnames and food categories only . Later we will add search by price and availability //

      if (empty($catname))
        { 
          echo "hello world";
        
        }
      else 
      {
        $seachquery ="SELECT * FROM fooditems WHERE foodcategory ='$catname'";
        $searchResult=mysqli_query($conn,$seachquery);
        $row=mysqli_num_rows($searchResult);
        
        if($row)
          { 
          $result=array();
             
              while($res=mysqli_fetch_assoc($searchResult))
              {
                array_push($result, $res);
              }  
             
          }
         else 
          {
         echo "no such food item","error";
         // header("Location: ./order.php?no-results");
          }
   
      echo json_encode($result);
  
     }
    }



?>