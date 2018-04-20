<?php
 
 include 'header.php';

 titlebar();

?>
 <?php
        if (isset($_SESSION['msg']))
        {
          display_msg();
        }   

if(!isset($_SESSION['username'])&& !isset($_SESSION['email']))
 {
  echo 
 '<div class="form-cont">
  
    <div class="">
      <form action ="signup_handler.php" method="POST" >
        <fieldset >
         <legend style="margin-left:300px;"><h1> SIGN UP </h1>  </legend>
   
        <div class="u-input-cont">
          <label for="fname">FIRST NAME </label> 
          <input type="text" name="fname" placeholder="first name">
        </div>
        
        <div class="u-input-cont">
          <label for="lname">LAST NAME</label> 
          <input type="text" name="lname" placeholder="last name">
        </div>

        <div class="u-input-cont">
          <label for="username">user NAME</label> 
          <input type="text" name="username" placeholder="username">
        </div>
        
        <div class="u-input-cont">      
           <label for="email">E-MAIL </label> 
           <input type="e-mail" name="email" placeholder="email">
        </div>
        
        <div class="u-input-cont">
          <label for="pwd">PASSWORD </label>
          <input type="password" name="pwd" placeholder="password">
        </div>
        
        <div class="u-input-cont">
           <label for="cnfpwd"> CONFIRM PASSWORD </label>
           <input type="password" name="cnfpwd" placeholder="Confirm password">    
        </div>
  
      </fieldset>
        <button type="submit" name="signup-submit">SUBMIT</button>    
       </form>
       
    </div>
     
  
  
  </div> ' ;
 
 }
 else
 {
  logout();
 }

 ?>

<?php include 'footer.php' ?>