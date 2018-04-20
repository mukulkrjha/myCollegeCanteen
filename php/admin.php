<?php 

include 'header.php';

?>

<?php 

titlebar();
if(isset($_SESSION['msg']))
{
  display_msg();
 
}
 
  if(!isset($_SESSION['admin']))
  {

     echo '<div class="form-cont">
         <form action="admin_handler.php" method="POST">
           <fieldset>
             <legend style="margin-left:210px;">
               <h1>admin account</h1>
             </legend>
           
           <div class="u-input-cont">
          
              <label for="adminname">admin name</label>
              <input type="text" name="admin" placeholder="admin name" required>
          
           </div>
           
            <div class="u-input-cont">
          
              <label for="adminemail">admin email</label>
              <input type="email" name="adminemail" placeholder="admin email" required>
          
           </div>

           <div class="u-input-cont">
          
              <label for="adminname">admin password</label>
              <input type="password" name="adminpwd" placeholder="admin password" required>
          
           </div>
       
           </fieldset>
           <button type="submit" name="admin-submit" value="submit"> submit</button>
        </form>
      </div>'  ;

}

else if(isset($_SESSION['admin']))
{
echo

 '<div class="container ">
      
     <div class="admin-search-cont searchback">
            
        <form action="order_handler2.php" method="POST" class="admin-search searchform2-admin " >
          <select name="addRem" class="addRem">
        <option value="+">ADD</option>
        <option value="-">REMOVE</option>
 
      </select>
      <select name="categorySel" class="categorySel">
        <option value="1">snacks</option>
        <option value="2">biscuits</option>
        <option value="3">drinks</option>
        <option value="4">other food</option>
 
      </select>
          <input type="text" name="search"  class="admin-search-cont-input"  value="" placeholder="NAME " >
      <input type="number" class="numOfItem" name="numOfItem" placeholder="NUMBERS">
      <input type="number" name="priceOfItem" class="priceOfItem" placeholder="PRICE">
 
          <input type="submit" name="submit-admin" class="submit-admin" value=" GO" >
 
        </form> 
        </div>
   
      <div class="grid-cont-admin">
      <div class="all_items_head"><h4>AVAILABLE ITEMS</h4></div>
      <div class="col-1-of-4 cat1">
        <ul class="row-1">
          <li class="catHead">snacks </li>
                 <li>
            <div class="item-admin">
          <div class="item-admin_name">
            NAME  name  
          </div>
          <DIV class="item-admin_price">
            PRICE 
          </DIV>
            <div class="item-admin_avail">
              AVAIL<div class="item-admin_cancel">X</div>
            </div>
         </div>
                </li> 
        </ul>
      </div>
      <div class="col-1-of-4 cat2">
        <ul class="row-1">
          <li class="catHead">drinks</li>
        </ul>
      </div>
      <div class="col-1-of-4 cat3">
        <ul class="row-1">
          <li class="catHead">biscuits</li>
        </ul>
      </div>
      <div class="col-1-of-4 cat4">
        <ul class="row-1">
          <li class="catHead">CATEGORY 4</li>
        </ul>
      </div>
  
       </div>
 ' ;


}

include "footer.php";

?>