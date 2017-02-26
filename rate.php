<html>
    <head>
        <link rel="stylesheet" href="css/rate.css" 
        <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
        <script type="text/javascript">
//            var clicked_val=0;
//            
            
           
                
                
                
//                  $('#s1').hover(function{
//                      
//                          $('#s1').attr('src','Images/gstar.png');
//                           $('#s2').attr('src','Images/estar.png');
//                            $('#s3').attr('src','Images/estar.png');
//                             $('#s4').attr('src','Images/estar.png');
//                              $('#s5').attr('src','Images/estar.png');
//                  } );
//                  
//                  $(#s1).click(function{
//                      clicked_val=1;
//                  });
//         $(#s2).hover(function{
//                          
//                          $(#s1).attr('src','Images/gstar.png');
//                           $(#s1).attr('src','Images/gstar.png');
//                            $(#s1).attr('src','Images/estar.png');
//                             $(#s1).attr('src','Images/estar.png');
//                              $(#s1).attr('src','Images/estar.png');
//    } );
//    $(#s1).click(function{
//                      clicked_val=2;
//                  });
//         $(#s3).hover(function{
//                          
//                          $(#s1).attr('src','Images/gstar.png');
//                           $(#s1).attr('src','Images/gstar.png');
//                            $(#s1).attr('src','Images/gstar.png');
//                             $(#s1).attr('src','Images/estar.png');
//                              $(#s1).attr('src','Images/estar.png');
//                          
//    });
//    $(#s1).click(function{
//                      clicked_val=3;
//                  });
//         $(#s4).hover(function{
//                          
//                          $(#s1).attr('src','Images/gstar.png');
//                           $(#s1).attr('src','Images/gstar.png');
//                            $(#s1).attr('src','Images/gstar.png');
//                             $(#s1).attr('src','Images/gstar.png');
//                              $(#s1).attr('src','Images/estar.png');
//                          
//    });
//    $(#s1).click(function{
//                      clicked_val=4;
//                  });
//         $(#s5).hover(function{
//                          
//                          $(#s1).attr('src','Images/gstar.png');
//                           $(#s1).attr('src','Images/gstar.png');
//                            $(#s1).attr('src','Images/gstar.png');
//                             $(#s1).attr('src','Images/gstar.png');
//                              $(#s1).attr('src','Images/gstar.png');
//                          
//    });
//    $(#s1).click(function{
//                      clicked_val=5;
//                  });
//           $('.div_star').mouseout(function{
//                          $(#s1).attr('src','Images/estar.png');
//                           $(#s1).attr('src','Images/estar.png');
//                            $(#s1).attr('src','Images/estar.png');
//                             $(#s1).attr('src','Images/estar.png');
//                              $(#s1).attr('src','Images/estar.png');
//               
//               
//           });
    }
            )
            
            </script>
    </head>
    <body>
        <div class="div_cont">
            <div class="div_star">
                <img src="Images/estar.JPG" class="star" id='s1' onmouseover="this.src='Images/gstar.png';" onmouseout="this.src='Images/estar.JPG';"/>
        <img src="Images/estar.JPG" class="star" id="s2" onmouseover="this.src='Images/gstar.png';" onmouseout="this.src='Images/estar.JPG';"/>
        <img src="Images/estar.JPG" class="star" id="s3" onmouseover="this.src='Images/gstar.png';" onmouseout="this.src='Images/estar.JPG';"/>
        <img src="Images/estar.JPG" class="star" id="s4" onmouseover="this.src='Images/gstar.png';" onmouseout="this.src='Images/estar.JPG';"/>
        <img src="Images/estar.JPG" class="star" id="s5" onmouseover="this.src='Images/gstar.png';" onmouseout="this.src='Images/estar.JPG';"/>
            try{
            $(document).ready(function(){
                  $('#s1').hover(function(){
                      alert('abc');
                  }
                   );
              }
            );
    }
    catch(e)
    {
        alert(''+e.toString());
    }
            
            </script>
    </head>
    <body>
        <div class="div_cont">
            <div class="div_star">
        <img src="Images/estar.JPG" id='s1'/>
        <img src="Images/estar.JPG" id="s2"/>
        <img src="Images/estar.JPG" id="s3"/>
        <img src="Images/estar.JPG" id="s4"/>
        <img src="Images/estar.JPG" id="s5"/>
            </div>
        </div>
    </body>
    
    
</html>
