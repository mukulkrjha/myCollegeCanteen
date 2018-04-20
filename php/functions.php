<?php

 session_start();

 include 'dbh.php';

 function set_msg($msg,$type)
 {
  $type=strtolower($type);
  if(!empty($msg)&&(!empty($type)))
  {
    
    $_SESSION['msg']=$msg;
    $_SESSION['msg_type']=$type;

  }
  else
  {
  	
  	$msg="";

  }

 }

function display_msg()
{
 
	if (isset($_SESSION['msg'])&&isset($_SESSION['msg_type']))
	{
   $msg_type=strtolower($_SESSION['msg_type']);
    
    if($msg_type==='error') 
		{
      echo '
        <div class="u-error-cont">
            <div class="u-error">
                <div class="u-error__message">
                  '.$_SESSION["msg"].'
                   <div class="u-error__button"> X </div>
                </div>
             </div> 
        </div>  ';
    
        unset($_SESSION['msg']);
        unset($_SESSION['msg_type']);

    }
    else 
    {
       echo '
        <div class="u-error-cont">
            <div class="u-error">
                <div class="u-error__message">
                  '.$_SESSION['msg'].'
                   <div class="u-error__button"> X </div>
                </div>
             </div> 
        </div>          ';
    
        unset($_SESSION['msg']);
        unset($_SESSION['msg_type']);
    }

	}
}

function token_generator()
{
 
  $token =  md5(uniqid(mt_rand(),true));

  $_SESSION['token']= $token;

  return $token;

}

function titlebar()
{
echo '

  <div class="u-topbar-nav">
      <a class="u-topbar-nav__option" href="./admin.php">update</a>
      <a class="u-topbar-nav__option" href="./login.php">log in/out</a>
      <a class="u-topbar-nav__option" href="./order__page.php">order</a>
      <a class="u-topbar-nav__option" href="../index.php">main</a>
      <a class="u-topbar-nav__option" href="./signup.php">signup</a>
     
  </div>
 
' ;
}


//////////LOGOUT FUNCTION////////////

function logout()
{
  if(isset($_SESSION['admin']))
  {
     echo '
      <div class="u-grey-container">
        <p>
          you are logged in as <span>ADMIN</span>
        </p>
        <form action="./logout_handler.php" method="POST">
          <button class=" logout-button" type="submit" name="submit" value="submit">logout</button>
          </form>
      </div>';
        

  }
  elseif((isset($_SESSION['username'])&&isset($_SESSION['email'])))
  {
  echo '
     <div class="u-grey-container">
      <p>
       you are logged in 
      </p>
       <form action="./logout_handler.php" method="POST">
          <button class=" logout-button" type="submit" name="submit" value="submit">logout</button>
       </form>
      </div>';
  
  }

}


?>
