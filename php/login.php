<?php

  include 'header.php';
  titlebar();

?>


<?php

  if(isset($_SESSION['msg']))
  {

    display_msg();

  }



 if(!isset($_SESSION['username'] )&& !isset($_SESSION['email']))

 {
   echo '
   <div class="form-container">
    <div class="form-cont">
      <form action="login_handler.php" method="POST">
        <fieldset>
         <legend  style="margin-left:300px;">
         <h1>LOG-IN</h1>
         </legend>
      
     
        <div class="u-input-cont">
          <label for ="username">USER NAME</label>
          <input type="text" name="username" placeholder="username">
    
        </div> 
        <div class="u-input-cont">
          <label for ="email">e-mail</label>
          <input type="email" name="email" placeholder="e-mail">
        </div>
        <div class="u-input-cont">
          <label for ="pwd">enter password</label>
           <input type="password" name="pwd" placeholder="password">
    
        </div> 
       </fieldset>
   
      <button type="submit" name="login-submit" value="submit">log-in </button>
   
      </form>
    </div>
   </div>  ' 
    ;
  }
  else 
  {

    logout();

  } 

  include 'footer.php';