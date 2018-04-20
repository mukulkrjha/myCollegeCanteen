<?php 

 include 'php/header.php';

?>
    <section id="Welcomepage">
    	 <div class ="Welcomeline">
    		   <p class="Welcome1">welcome to dbms project</p>
    	     <p class="Welcome2"> "my college canteen "</p> 
    	     <div  class ="Continuebtn" >
    	          <a href="#Main"> let's continue <i class="arrow right"></i></a> 
    	     </div>
    	 </div>

    </section>
    <div id="Main">
           
    	<div id="headbar">
            
            <div class="logo">
              <div class="logo__icon"> 
                  <i class="icon-basic-heart"></i>
              </div>  
              <div class="logo__name">
                  MY COLLEGE CANTEEN 
              </div>
           </div> 
            <div class="titlebar">
                <div class=" titlebar__option titlebar__option--1"><a class="titlebar__option__link" href="./php/login.php" >login</a></div>
                <div class="titlebar__option titlebar__option--2"><a class="titlebar__option__link"  href="./php/signup.php">Create an Account</a></div>
                <div class="titlebar__option titlebar__option--3"><a class="titlebar__option__link" href="./php/admin.php">update</a></div>
                <div class="titlebar__option titlebar__option--3"><a class="titlebar__option__link" href="./php/order__page.php">order</a></div>
                <div class="titlebar__option titlebar__option--4"><a class="titlebar__option__link" href="#footer">about us</a></div>
            </div>
            <div class="headertext">
               
                <p>MY COLLEGE CANTEEN is a site developed for AIACT&R students and faculty , it is synced with our college canteen and provide you the functionality of ordering food and delivering it to you where ever you are in the college campus  within 20min .
                The site is very is easy to use ,just create your account and go hit "order now "  button where you will find food items sorted by name .you can also filter out the food item with various options like price range ,food category,available food etc </p>
            </div>
           
    	</div>
         <div class="sliderframe">
           <div class="slidercontainer">
              <div class="slider">
                <ul class="slides">
                  <li class="slide">
                     <div class="cards cards1"> 
                        <div class="cards1__img">
                            <img src="./photos/burger.jpg" alt="photo1">
                        </div>  
                        <div class="cards1__content"> 
                            <div class="u-textback u-textback__medium ">  <span>snacks</span></div>
                           <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod cillum dolore eu fugiat nulla pariatur. Excepteur sint Lorem ipsum dolor sit amet.   </p>
                         </div> 
                            <div class="cards__see-more"> <a href="./php/update.php">SEE MORE</a></div>
                            
                    </div>
                  </li>
                  <li class="slide">
                    <div class=" cards cards2">
                        <div class="cards1__img">
                           <img src="./photos/drinks.jpg" alt="photo1">
                        </div>
                        <div class="cards2__content">  
                            <div class="u-textback u-textback__medium "> <span>drinks</span>
</div>                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod cillum dolore eu fugiat nulla pariatur. Excepteur sint Lorem ipsum dolor sit amet. </p>
                        </div>
                           <div class="cards__see-more"> <a href="./php/update.php">SEE MORE</a></div>
                        
                    </div>
                  </li>
                  <li class="slide">
                      <div class=" cards cards3">
                         <div class="cards3__img">
                              <img src="./photos/biscuit.jpg" alt="photo1">
                          </div>  
                           <div class="cards3__content">
                            <div class="u-textback u-textback__medium "> <span>biscuits</span> </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod cillum dolore eu fugiat nulla pariatur. Excepteur sint Lorem ipsum dolor sit amet. </p>
                           </div> 
                               <div class="cards__see-more"> <a href="./php/update.php">SEE MORE</a></div>
                           
                    </div>
                  </li>
                  <li class="slide">
                     <div class="cards cards1"> 
                        <div class="cards1__img">
                            <img src="./photos/burger.jpg" alt="photo1">
                        </div>  
                        <div class="cards1__content"> 
                            <div class="u-textback u-textback__medium"><span>Snacks</span></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod cillum dolore eu fugiat nulla pariatur. Excepteur sint</p> 
                        </div>
                            <div class="cards__see-more"> <a href="./php/update.php">SEE MORE</a></div>
                       
                    </div>
                  </li>
                  
               </ul>
             </div>
          </div>
        </div> 
           
   
    <section id="footer" >
            <div class="u-textback u-textback__large ">
                <span class="textanimate">  About Us</span>
            </div>

            <div class="footer__container clearfix">
               <div class="footer__container--left clearfix">
                    ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
               tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
               quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
               </div>
                              
               <div class="footer__container--right clearfix">
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint   occaecat cupidatat non
                 proident, sunt in culpa qui officia deserunt mollit anim id  est laborum. 
               </div>
            </div>
            <div  class="social-links-cont">
               <div class="social-links">
                      
                      <div class="social-links__icon ">
                          <a href="https://www.facebook.com/mukulkr.jha.9" class="social-links__icon--fb">
                           <img src="photos/fb.png">
                          </a>
                      </div>
                      <div class="social-links__icon ">
                          <a href="#" class="social-links__icon--twitter">
                           <img src="photos/twitter.png">
                          </a>
                      </div>
                      <div class="social-links__icon ">
                          <a href="#" class="social-links__icon--github">
                           <img src="photos/github.svg">
                          </a>
                      </div>
   
            </div> 
             </div>
    </section>

  </div>
  <div id="headerback"> </div>
  

<?php include 'php/footer.root.php' ?>