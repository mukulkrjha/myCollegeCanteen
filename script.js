$(function(){

       var interval;
       var currentslider=1;

     /********** SLIDER FUNCTIONALITY************/
     

       function startslider()
        {
          interval=setInterval( function(){
          
           $(".slides").animate({
        	  marginLeft:"-=700px"
              },1000,function(){
          
               currentslider++;
              if(currentslider===$('.slide').length)
              {
              	$('.slides').css('marginLeft',0);
              	currentslider=1;
              }

           });
           },4000);

        }

        function stopslider()
        {
          clearInterval(interval);
        }

       startslider();
       	
        $(".slidercontainer").on('mouseenter',stopslider).on('mouseleave',startslider);
     

/************* ERROR MESSAGE *************/


      $('.u-error__button').on('click',function(){
        
        $('.u-error-cont').hide();

      });



/**********LIST ITEM FOCUS***************/
        function shadowInOut(elParent,el){
        
         elParent.on('mouseenter',el,function(){

             $(this).css({
           
                   "boxShadow":"0 0  7px black",
                   "bordeRadius":"10px",
               
                  });
             $(this).find(".cart__item__right").css({
               transform:"translateX(0rem)"
             });
           
             });

         elParent.on('mouseleave',el,function(){
            $(this).css({
                "boxShadow":"0 0 0 black",
                "bordeRadius":"10px",

            });
              $(this).find(".cart__item__right").css({
               "transform":"translateX(4rem)"
             });

          });

       
        }

        shadowInOut($("#cartitems"),".cart__item");  

       
        function  focusInOut(elParent,el){ 

           
               elParent.on('mouseenter',el,function(){       //hover is not wroking  in mozilla :(  ///
                     $(this).css({
                       "transform":"translateY(-0.4rem) scale(1.02) ",
                       "transition":"all 0.3s",
                       "box-shadow": "2px 2px 4px 4px white",
                       "opacity ":"0"
                     });
       
                });
              elParent.on('mouseleave',el,function(){       //hover is not wroking in mozilla///
       
                      $(this).css({
                       "transform":"translateY(0) scale(1)",
                       "box-shadow": "2px 2px 4px 4px white",
                       "opacity":"1"
           
                     },400);
           
                });
         }

    focusInOut($(".items-container"),".item");                    //for the cards  of items and search result cards
    focusInOut($("#itemOffered-cont"),".itemOffered");

       //******************* STATIC BACKGROUND IN MAIN PAGE ***********************//  
            
        function staticMainBack()
        {
            var off=$('#headbar');

              $("#headerback").css({
               "width":off.outerWidth(),
               "height":off.outerHeight()*1.4,
               
            });
        }

        $(window).on("resize",staticMainBack);
        $(window).on("resize",grid_cont);
        staticMainBack();
        grid_cont();

       //************ SETTING THE HEIGHT OF THE GRID-CONT ON ORDER PAGE ************//
         function grid_cont(){
            var Height= $(window).height();//-$(".grid-cont").offset().top;   
            $(".grid-cont").css({

                 "min-height": Height

            });


         }
        //************** SEARCHING THE ITEMS ON THE ORDER PAGE *********************//

    function ajaxForSearch()
       { 
             var input=$(this)[0][0]["value"];    ///value of the input search box///
            // $("#itemOffered-cont").innerHTML=" <h3 id='cartitems_h3'>search results </h2>";
                   
              $("#itemOffered-cont").html(" <h3 id='cartitems_h3'>search results </h2>");
              var ajaxobj=$.ajax({
              url:$(this).attr("action"),
              method:$(this).attr("method"),
              data:{
                "searchinput" :input } 

               });

             ajaxobj.done(function(data){
              console.log(data);
              var result=JSON.parse(data);
              
            // console.log( +);
              for(var i=0;i<result.length;i++)
              {
              additemDOM(result[i].foodname,result[i].foodcategory,result[i].price,result[i].available);

              }
              

               });
               ajaxobj.fail(function(){
                console.log("ajax failed");
              });
                 ajaxobj.always(function(){
                console.log("ajax is called");

               });
          
              console.log(ajaxobj);    
              return false;
      }

     //**************THIS LINE OF CODE ADDS THE SEARCH RESULT ON THE PAGE BY CALLING AJAXFORSEARCH*****************//

    $(".searchform2").on("submit",ajaxForSearch);


   /************** THIS FUNCTION  ADDS  SEARCH  RESULTS MADE ON ORDER PAGE *************/

    function additemDOM(name,category,price,available){
                     var html='<div class="itemOffered"><div class ="itemOffered__image"></div><div class="itemOffered__content"><span class="itemOffered__content--span">NAME : %name%</span><span class="itemOffered__content--span">CATEGORY :%category%</span><span class="itemOffered__content--span">PRICE :%price%</span></div><div class="itemOffered__side"><div class="itemOffered__side--left">ONLY %NUM% LEFT!!</div><div class="itemOffered__side--add">ADD TO CART</div></div></div>';
                     var newhtml=html.replace('%name%',name).replace('%category%',category).replace('%price%',price).replace('%NUM%',available);

                     var el='#itemOffered-cont';
                     $(newhtml).appendTo(el);
                    
              };

   /*****************THIS FUNCTION ADDS SELECTED ITEMS IN THE CART  *********************/

    function additemcart(name,price){

                var html='<div class="cart__item"><div class="cart__item__name ">%NAME%</div><div class="cart__item__right"><div class="cart__item__right__price"> %PRICE%</div><div class="cart__item__right__cancel">X</div></div><div style="clear:both;"></div></div>';
                var newhtml =html.replace('%NAME%',name).replace('%PRICE%',price);
                $(newhtml).appendTo("#cartitems");

               name=name.split(': ')[1];
               console.log(name);
                $.ajax({
                   
                url:"./order_handler2.php",
                method:"POST",
                data:{
                  ordername:name
                   }

                }).done(function(data){
                  console.log(data);
                }).fail(function(err){
                  console.log(err);
                }).always(function(){
                  console.log("ajax occured");

                }) ;

    

    }




    $("#itemOffered-cont").on("click",".itemOffered__side--add",function(){

              
                var itemcontent =$(this).parent().siblings(".itemOffered__content").children();
                var icname=itemcontent[0].innerHTML;
                var icprice=itemcontent[2].innerHTML;

                additemcart(icname,icprice);

    });


   /**************IMPLEMENATING THE "CANCEL" FUNCTIONALITY IN THE CART LIST***************/

      function cancelCart(elParent,el){

           elParent.on("click",el,function(){
                     
                       var name=$(this).parents(".cart__item__right").siblings(".cart__item__name")[0]["firstChild"]["data"].split(": ")[1];   ///    this returns array [ "NAME","%name%"]    ///

              $(this).parents(".cart__item").remove();


           });

      };

      cancelCart($("#cartitems"),".cart__item__right__cancel");
   
  /*********************** ADMIN PAGE FUNCTIONALITIES *************************/

  
  function adminfun(){

    var data=$('.searchform2-admin').serialize();
       console.log(data);

    $.ajax({
 
     url:"./admin_handler.php",
     method:"POST",
     data:data
    }).done(function(data){
      
        var cat=data.split('&')[0];
        console.log(cat);
        additemDOM_admin(cat);
      

    }).fail(function(err){
      console.log("failed!!!!!!! with ");
      console.log(err);
    });


     return false;

  }

  $(".searchform2-admin").on("submit",adminfun);


/*************** ADMIN PAGE LOADING THE AVAILABLE ITEMS IN THE DATABASE ************************/
  function additemDOM_admin(cat){
     var catname =".cat"+cat+" ul";
     var data="catname="+cat+"&admin-update='update'";
    // $(catname).html("");
     $.ajax({
 
      url:"./admin_handler.php",
      method:"POST",
      data:data
    

     }).done(function(response){
 
         var clearlist=catname+" li:not(:first)";    
           $(clearlist).remove();
           console.log(response);
           response=JSON.parse(response);

           $.each(response ,function(key,value){

           var html="<li><div class='item-admin'><div class='item-admin_name'> %name% </div><DIV class='item-admin_price'>%price%</DIV><div class='item-admin_avail'>%avail%<div class='item-admin_cancel'>X</div></div></div></li>";
           html= html.replace('%name%',value.foodname).replace('%price%',"Rs( "+value.price+")").replace('%avail%',"left("+value.available+")"); 
           
           $(catname).append(html);
         
         
      });
   }).fail(function(){

        console.log("failed ajaxxx");
        

     });


return false;

   }

  for(var i=1;i<=4;i++)
  {
   additemDOM_admin(i) ; 
  }


});

