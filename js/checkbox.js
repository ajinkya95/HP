/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    
    
  //toggle the componenet with class msg_body
// $(":checkbox").on('click', function(){
//     $(this).parent().toggleClass("squaredTwo");
//}
        
     //       );
$(document).ready(function(){
$('.drop').removeClass("squaredOne");
$('.cbox').click(function(){
if(this.checked){
$('.drop').hide();
$(this).next().next().show();
$('.drop').style.display="inline-block";
$('.drop').css("z-index","3");
}
else{
$('.drop').hide();
$('.drop').css("z-index","0");
}
});});



/*
}*/