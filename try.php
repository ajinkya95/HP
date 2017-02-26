<!doctype html>
 <?php
 include_once 'DB_Con.php';
 ?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Accordion - Default functionality</title>
  <link rel="stylesheet" href="css/try.css">
  <link rel="stylesheet" href="css/list.css">
  <link rel="stylesheet" href="css/w3.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script src="js/checkbox.js"></script>
  <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  
  
  
  
  
  <script>
//       $('#button').click(function(){
//     alert("hii");
// }); 
/*$(document).ready(function() {
    $('#button').click(function(e) {
        e.preventDefault();
        //alert(array.toString());
        $.ajax({
            
            type:"POST",
            url:"profile.php",
            data:{skillsArray:array},
            success: function(response) {
                console.log('success',data);
                //$('#result').html(response);
            }
//                error:function(exception){
//                      alert('Exception:'+exception);
//                   }
        });
        e.preventDefault();
    });
});*/
    var  ownSkills= [];
    var chooseSkills=0;
    function getOwnSkillCheckedVal(val,id){
          
          //alert("Clicked, new value = " + val);
          
          if(document.getElementById(id).checked===true && chooseSkills<15)
          {
              ownSkills.push(val);
              chooseSkills++;
          }
          else if(chooseSkills>15 || chooseSkills===15)
          {
              alert("you can't choose more than 15 skills");
//          }
//          else
//          {
              var index=ownSkills.indexOf(val);
              ownSkills.splice(index,1);
              chooseSkills--;
              alert(ownSkills.toString());
              document.getElementById(id)
          }
          
 }
    function getSkill()
    {
        
        alert('In getSkill()------'+ownSkills);
        var jsonString = JSON.stringify(ownSkills);

       
        $.ajax({
        type: 'post',
        //dataType :  'html',
        url: 'getSkills.php',
        data: { 'jsonString' : jsonString },
        //cache:false,
        success: function(data1) {
            //$('#result').html(response);
            //alert('Ajinkya');
            //console.log('success',data1);
            //document.location = "getSkills.php";
            //alert('This is');
        }
//        error: function (xmlHttpRequest, textStatus, errorThrown) {
//         alert(errorThrown);
//    }
    });
    }
      
                
      
   
function myFunction(id) {
    //$(".drop").hide();
    var x = document.getElementById(id);
    //alert("ID: "+id )
    if (x.className.indexOf("w3-show") === -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
</head>
<body>
   
    <!--<div id="grandparent" class="grandparent">-->
   
    <div class="superparent" id="left_div">
        <h2>Choose your skills </h2><label style="font-family: cursive">(maximum 15)</label>
        
<div class="w3-accordion w3-light-grey">
  <button onclick="myFunction('Demo1')" class="w3-btn-block w3-left-align">
    Everyday skills
  </button>
    
    <!-- Start of Choosing skills-->
    <?php 
        $ownSkills=array();
        
    ?>
  <div id="Demo1" class="w3-accordion-content w3-container">
                                   
                      
                      <?php
                      $skills = array("Bike Driving","Bi-Cycle Driving","Car Driving","Sewing","Decoration","Event Management","Gardenning","Cooking","Baking","To knot a tie","video making,editing and Sound Mixing","Beauty Tips","Photography","Caligraphy","Entrepreneurship","Legal Advices","Communication Skills","Time Management","Fashion","Festival Knowledge","Trademarketing","Swimming","Excel","Rooting a Phone","Formatting Laptop","Meditation");
                      $squared = array("squared1","squared2","squared3","squared4","squared5","squared6","squared7","squared8","squared9","squared10","squared11","squared12","squared13","squared14","squared15","squared16","squared17","squared18","Squared19","squared20","squared21","squared22","squared23","squared24","squared25","squared26");
                      $i=0;
                      foreach($skills as $item){
                      ?>
                                <div class="squaredOne">
                                    <form  method="post">
                                        <input class="cbox" type="checkbox" value="<?php echo $item;?>" id="<?php echo $squared[$i];?>" name="check[]" onclick="try{getOwnSkillCheckedVal(this.value,this.id)}catch(e){alert(e)}"/>
                                        <label for="<?php echo $squared[$i];?>" value="<?php echo $item;?>" ><font size="3"> <?php echo $item;?>  </font></label>
                                        
                                    </form>
                                    <div class="drop w3-card-8 w3-dropdown-content" >
                                    
                          <div ><input class="w3-radio" type="radio" name="gender">
                              <label class="w3-validate">Beginner</label></div>

                                  <div> <input class="w3-radio" type="radio" name="gender" ">
                                      <label class="w3-validate">Intermediate</label></div>

                                      <div> <input class="w3-radio" type="radio" name="gender" >
                                          <label class="w3-validate">Expert</label></div>
                                    </div>
                                    
                                    
                                </div>
                      <?php
                      $i++;
                      }
                      ?>
                                                                     
                     
                 
  </div>
    
  <button onclick="myFunction('Demo2')" class="w3-btn-block w3-left-align">
    Education
  </button>
  <div id="Demo2" class="w3-accordion-content w3-container">
  
                          
                      <?php
                      $skills1 = array("General Mathematics","Statestics","Calculus","Chemistry","Physics","Biology","History","Geography","Economics","Civics","Politics","Psychology","Philosophy","Engineering Graphics","Mechanics","C","C++","Java","Python","Web Developement","Mobile App Developement","Embedded System","Microcontroller Programming","Robotics","Competitive Exams","Interviews","Career Guidance","College Selection");
                      $squared1 = array("squared1","squared2","squared3","squared4","squared5","squared6","squared7","squared8","squared9","squared10","squared11","squared12","squared13","squared14","squared15","squared16","squared17","squared18","squared19","squared20","squared21","squared22","squared23","squared24","squared25","squared26","squared27","squared28");
                      $i=0;
                      foreach($skills1 as $item){
                      ?>
                                <div class="squaredOne">
                                    <input class="cbox" type="checkbox" value="<?php echo $item;?>" id="<?php echo $squared1[$i];?>" name="check[]" onclick="try{getOwnSkillCheckedVal(this.value,this.id)}catch(e){alert(e)}"/>
                                    <label for="<?php echo $squared1[$i];?>"><font size="3"> <?php echo $item;?> </font></label>
                                   <div class="drop w3-card-8 w3-dropdown-content" >
                                    
                          <div ><input class="w3-radio" type="radio" name="gender" value="Beginner" checked>
                              <label class="w3-validate">Beginner</label></div>

                                  <div> <input class="w3-radio" type="radio" name="gender" value="Intermediate">
                                      <label class="w3-validate">Intermediate</label></div>

                                      <div> <input class="w3-radio" type="radio" name="gender" value="Expert">
                                          <label class="w3-validate">Expert</label></div>
                                    </div>
                                    
                                    
                                </div>
                      <?php
                      $i++;
                      }
                      ?>
                                                                     
                     
  </div>
</div>

        <button onclick="myFunction('Demo3')" class="w3-btn-block w3-left-align">
    Languages
  </button>
        <div id="Demo3" class="w3-accordion-content w3-container">
        
                                                 
                      <?php
                      $skills2 = array("English","Germen","French","Spanish","Hindi","Marathi","Sanskrit","Grammer");
                      $squared2 = array("squared1","squared2","squared3","squared4","squared5","squared6","squared7","squared8");
                      $i=0;
                      foreach($skills2 as $item){
                      ?>
                                <div class="squaredOne">
                                    <input class="cbox" type="checkbox" value="<?php echo $item;?>" id="<?php echo $squared2[$i];?>" name="check[]" onclick="try{getOwnSkillCheckedVal(this.value,this.id)}catch(e){alert(e)}"/>
                                    <label for="<?php echo $squared2[$i];?>"><font size="3"> <?php echo $item;?> </font></label>
                                   <div class="drop w3-card-8 w3-dropdown-content" >
                                    
                          <div ><input class="w3-radio" type="radio" name="gender" value="Beginner" checked>
                              <label class="w3-validate">Beginner</label></div>

                                  <div> <input class="w3-radio" type="radio" name="gender" value="Intermediate">
                                      <label class="w3-validate">Intermediate</label></div>

                                      <div> <input class="w3-radio" type="radio" name="gender" value="Expert">
                                          <label class="w3-validate">Expert</label></div>
                                    </div>
                                    
                                    
                                </div>
                      <?php
                      $i++;
                      }
                      ?>
                     
                    </div>
                  
    
     <button onclick="myFunction('Demo4')" class="w3-btn-block w3-left-align">
    Food Fitness and Healthcare
  </button>
    <div id="Demo4" class="w3-accordion-content w3-container">
     
                                                                     
                                    <?php
                      $skills3 = array("Heart Care","Diabetes Care","Yoga","Diet","Home Remidies","BabyCare","Skin Care","Aerobics","Hair Care","Dressing","Mother care");
                      $squared3 = array("squared1","squared2","squared3","squared4","squared5","squared6","squared7","squared8","squared9","squared7","squared8","squared9","squared10","squared11");
                      $i=0;
                      foreach($skills3 as $item){
                      ?>
                                <div class="squaredOne">
                                    <input class="cbox" type="checkbox" value="<?php echo $item;?>" id="<?php echo $squared3[$i];?>" name="check[]" onclick="try{getOwnSkillCheckedVal(this.value,this.id)}catch(e){alert(e)}"/>
                                    <label for="<?php echo $squared3[$i];?>"><font size="3"> <?php echo $item;?> </font></label>
                                   <div class="drop w3-card-8 w3-dropdown-content" >
                                    
                          <div ><input class="w3-radio" type="radio" name="gender" value="Beginner" checked>
                              <label class="w3-validate">Beginner</label></div>

                                  <div> <input class="w3-radio" type="radio" name="gender" value="Intermediate">
                                      <label class="w3-validate">Intermediate</label></div>

                                      <div> <input class="w3-radio" type="radio" name="gender" value="Expert">
                                          <label class="w3-validate">Expert</label></div>
                                    </div>
                                    
                                    
                                </div>
                      <?php
                      $i++;
                      }
                      ?>
                      
                  
        
    </div>
 
        
         <button onclick="myFunction('Demo5')" class="w3-btn-block w3-left-align">
    Art
  </button>
    <div id="Demo5" class="w3-accordion-content w3-container">

                                                                     
                                    <?php
                      $skills4 = array("Sketching","Painting","3-D Art","Nail Art","Dance","Singing","Drama","Guitar","Tabla","Synthesiser","Quilling","Card Making","Handcraft");
                      $squared4 = array("squared1","squared2","squared3","squared4","squared5","squared6","squared7","squared8","squared9","squared7","squared8","squared9","squared10","squared11");
                      $i=0;
                      foreach($skills4 as $item){
                      ?>
                                <div class="squaredOne">
                                    <input class="cbox" type="checkbox" value="<?php echo $item;?>" id="<?php echo $squared4[$i];?>" name="check[]" onclick="try{getOwnSkillCheckedVal(this.value,this.id)}catch(e){alert(e)}"/>
                                    <label for="<?php echo $squared4[$i];?>"><font size="3"> <?php echo $item;?> </font></label>
                                   <div class="drop w3-card-8 w3-dropdown-content" >
                                    
                          <div ><input class="w3-radio" type="radio" name="gender" value="Beginner" checked>
                              <label class="w3-validate">Beginner</label></div>

                                  <div> <input class="w3-radio" type="radio" name="gender" value="Intermediate">
                                      <label class="w3-validate">Intermediate</label></div>

                                      <div> <input class="w3-radio" type="radio" name="gender" value="Expert">
                                          <label class="w3-validate">Expert</label></div>
                                    </div>
                                    
                                    
                                </div>
                      <?php
                      $i++;
                      }
                      ?>
                      
        
    </div>
 
        
        
        
        <button onclick="myFunction('Demo6')" class="w3-btn-block w3-left-align" >
    Sports and Games
  </button>
    <div id="Demo6" class="w3-accordion-content w3-container">
       
                                                                     
                                    <?php
                      $skills5 = array("Cricket","Badminton","Tennise","Table Tennise","Hockey","Chess","Kabaddi");
                      $squared5 = array("squared1","squared2","squared3","squared4","squared5","squared6","squared7");
                      $i=0;
                      foreach($skills5 as $item){
                      ?>
                                <div class="squaredOne">
                                    <input class="cbox" type="checkbox" value="<?php echo $item;?>" id="<?php echo $squared5[$i];?>" name="check[]" onclick="try{getOwnSkillCheckedVal(this.value,this.id)}catch(e){alert(e)}"/>
                                    <label for="<?php echo $squared5[$i];?>"><font size="3"> <?php echo $item;?> </font></label>
                                   <div class="drop w3-card-8 w3-dropdown-content" >
                                    
                          <div ><input class="w3-radio" type="radio" name="gender" value="Beginner" checked>
                              <label class="w3-validate">Beginner</label></div>

                                  <div> <input class="w3-radio" type="radio" name="gender" value="Intermediate">
                                      <label class="w3-validate">Intermediate</label></div>

                                      <div> <input class="w3-radio" type="radio" name="gender" value="Expert">
                                          <label class="w3-validate">Expert</label></div>
                                    </div>
                                    
                                    
                                </div>
                      <?php
                      $i++;
                      }
                      ?>
                      
                  
        
    </div>
 </form>
</div>

    
    <!-- End of Choosing skills-->
    
    <!--start of selection of skills to be requested to others-->
    
        <div class="superparent" id="right_div" >
          
          <h2>Interests/Requirements</h2><label style="font-family: cursive">(maximum 10)</label>
 
<div class="w3-accordion w3-light-grey">
  <button onclick="myFunction('Demo11')" class="w3-btn-block w3-left-align">
    Lifestyle
  </button>
  <div id="Demo11" class="w3-accordion-content w3-container">
                
                      
                      
                      <?php
                      $skills11 = array("Bike Driving","Bi-Cycle Driving","Car Driving","Sewing","Decoration","Event Management","Gardenning","Cooking","Baking","Tie Knot","video making,editing anf Sound Mixing","Beauty Tips","Photography","Caligraphy","Entrepreneurship","Legal Advices","Communication Skills","Time Management","Fashion","Festival Knowledge","Trademarketing","Swimming","Excel","Rooting Phone","Formatting Laptop","Meditation");
                      $squared11 = array("squared1","squared2","squared3","squared4","squared5","squared6","squared7","squared8","squared9","squared10","squared11","squared12","squared13","squared14","squared15","squared16","squared17","squared18","Squared19","squared20","squared21","squared22","squared23","squared24","squared25","squared26");
                      $i=0;
                      foreach($skills11 as $item){
                      ?>
                                <div class="squaredOne">
                                    <input class="cbox" type="checkbox" value="None" id="<?php echo $squared11[$i];?>" name="check" />
                                    <label for="<?php echo $squared11[$i];?>"><font size="3"> <?php echo $item;?> </font></label>
                                   <!--div class="drop w3-card-8 w3-dropdown-content" >
                                    
                          <!--div ><input class="w3-radio" type="radio" name="gender" value="Beginner" checked>
                              <label class="w3-validate">Beginner</label></div>

                                  <div> <input class="w3-radio" type="radio" name="gender" value="Intermediate">
                                      <label class="w3-validate">Intermediate</label></div>

                                      <div> <input class="w3-radio" type="radio" name="gender" value="Expert">
                                          <label class="w3-validate">Expert</label></div>
                                    </div-->
                                    
                                </div> 
                      <?php
                      $i++;
                      }
                      ?>
                                                                     
                     
  </div>
  <button onclick="myFunction('Demo22')" class="w3-btn-block w3-left-align">
    Education
  </button>
  <div id="Demo22" class="w3-accordion-content w3-container">
    
                          
                      <?php
                      $skills22 = array("General Mathematics","Statestics","Calculus","Chemistry","Physics","Biology","History","Geography","Economics","Civics","Politics","Psychology","Philosophy","Engineering Graphics","Mechanics","C","C++","Java","Python","Web Developement","Mobile App Developement","Embedded System","Microcontroller Programming","Robotics","Compititive Exams","Interviews","Career Guidance","College Selection");
                      $squared22 = array("squared1","squared2","squared3","squared4","squared5","squared6","squared7","squared8","squared9","squared10","squared11","squared12","squared13","squared14","squared15","squared16","squared17","squared18","squared19","squared20","squared21","squared22","squared23","squared24","squared25","squared26","squared27","squared28");
                      $i=0;
                      foreach($skills22 as $item){
                      ?>
                                <div class="squaredOne">
                                    <input class="cbox" type="checkbox" value="None" id="<?php echo $squared22[$i];?>" name="check" />
                                    <label for="<?php echo $squared22[$i];?>"><font size="3"> <?php echo $item;?> </font></label>
                                   <!--div class="drop w3-card-8 w3-dropdown-content" >
                                    
                          <div ><input class="w3-radio" type="radio" name="gender" value="Beginner" checked>
                              <label class="w3-validate">Beginner</label></div>

                                  <div> <input class="w3-radio" type="radio" name="gender" value="Intermediate">
                                      <label class="w3-validate">Intermediate</label></div>

                                      <div> <input class="w3-radio" type="radio" name="gender" value="Expert">
                                          <label class="w3-validate">Expert</label></div>
                                    </div-->
                                    
                                    
                                </div>
                      <?php
                      $i++;
                      }
                      ?>
                                                                     
                     
  </div>
</div>

        <button onclick="myFunction('Demo33')" class="w3-btn-block w3-left-align">
    Languages
  </button>
        <div id="Demo33" class="w3-accordion-content w3-container">
         
                                                 
                      <?php
                      $skills33 = array("English","Germen","French","Spanish","Hindi","Marathi","Sanskrit","Grammer");
                      $squared33 = array("squared1","squared2","squared3","squared4","squared5","squared6","squared7","squared8");
                      $i=0;
                      foreach($skills33 as $item){
                      ?>
                                <div class="squaredOne">
                                    <input class="cbox" type="checkbox" value="None" id="<?php echo $squared33[$i];?>" name="check" />
                                    <label for="<?php echo $squared33[$i];?>"><font size="3"> <?php echo $item;?> </font></label>
                                   <!--div class="drop w3-card-8 w3-dropdown-content" >
                                    
                          <div ><input class="w3-radio" type="radio" name="gender" value="Beginner" checked>
                              <label class="w3-validate">Beginner</label></div>

                                  <div> <input class="w3-radio" type="radio" name="gender" value="Intermediate">
                                      <label class="w3-validate">Intermediate</label></div>

                                      <div> <input class="w3-radio" type="radio" name="gender" value="Expert">
                                          <label class="w3-validate">Expert</label></div>
                                    </div-->
                                    
                                    
                                </div>
                      <?php
                      $i++;
                      }
                      ?>
                     
                    </div>
            
    
     <button onclick="myFunction('Demo44')" class="w3-btn-block w3-left-align">
    Food Fitness and Healthcare
  </button>
    <div id="Demo44" class="w3-accordion-content w3-container">
                                                                     
                                    <?php
                      $skills44 = array("Heart Care","Diabetes Care","Yoga","Diet","Home Remidies","BabyCare","Skin Care","Aerobics","Hair Care","Dressing","Mother care");
                      $squared44 = array("squared1","squared2","squared3","squared4","squared5","squared6","squared7","squared8","squared9","squared7","squared8","squared9","squared10","squared11");
                      $i=0;
                      foreach($skills44 as $item){
                      ?>
                                <div class="squaredOne">
                                    <input class="cbox" type="checkbox" value="None" id="<?php echo $squared44[$i];?>" name="check" />
                                    <label for="<?php echo $squared44[$i];?>"><font size="3"> <?php echo $item;?> </font></label>
<!--                                   <div class="drop w3-card-8 w3-dropdown-content" >
                                    
                          div ><input class="w3-radio" type="radio" name="gender" value="Beginner" checked>
                              <label class="w3-validate">Beginner</label></div>

                                  <div> <input class="w3-radio" type="radio" name="gender" value="Intermediate">
                                      <label class="w3-validate">Intermediate</label></div>

                                      <div> <input class="w3-radio" type="radio" name="gender" value="Expert">
                                          <label class="w3-validate">Expert</label></div>
                                    </div
                                    
                                    
                                </div>-->
</div>
                      <?php
                      $i++;
                      }
                      ?>
                      
                  
                  
        
    </div>
    
 
        
         <button onclick="myFunction('Demo55')" class="w3-btn-block w3-left-align">
    Art
  </button>
    <div id="Demo55" class="w3-accordion-content w3-container">
      
                                                                     
                                    <?php
                      $skills55 = array("Sketching","Painting","3-D Art","Nail Art","Dance","Singing","Drama","Guitar","Tabla","Synthesiser","Quilling","Card Making","Handcraft");
                      $squared55 = array("squared1","squared2","squared3","squared4","squared5","squared6","squared7","squared8","squared9","squared7","squared8","squared9","squared10","squared11");
                      $i=0;
                      foreach($skills55 as $item){
                      ?>
                                <div class="squaredOne">
                                    <input class="cbox" type="checkbox" value="None" id="<?php echo $squared55[$i];?>" name="check" />
                                    <label for="<?php echo $squared55[$i];?>"><font size="3"> <?php echo $item;?> </font></label>
<!--                                   <div class="drop w3-card-8 w3-dropdown-content" >
                                    
                          div ><input class="w3-radio" type="radio" name="gender" value="Beginner" checked>
                              <label class="w3-validate">Beginner</label></div>

                                  <div> <input class="w3-radio" type="radio" name="gender" value="Intermediate">
                                      <label class="w3-validate">Intermediate</label></div>

                                      <div> <input class="w3-radio" type="radio" name="gender" value="Expert">
                                          <label class="w3-validate">Expert</label></div>
                                    </div
                                    
                                    
                                </div>-->
                                </div>
                      <?php
                      $i++;
                      }
                      ?>
                      
                  </div>
                  
        
  
        
        
        
         <button onclick="myFunction('Demo66')" class="w3-btn-block w3-left-align">
    Sports and Games
  </button>
    <div id="Demo66" class="w3-accordion-content w3-container">
     
                                                                     
                                    <?php
                      $skills66 = array("Cricket","Badminton","Tennise","Table Tennise","Hockey","Chess","Kabaddi");
                      $squared66 = array("squared1","squared2","squared3","squared4","squared5","squared6","squared7");
                      $i=0;
                      foreach($skills66 as $item){
                      ?>
                                <div class="squaredOne">
                                    <input class="cbox" type="checkbox" value="None" id="<?php echo $squared66[$i];?>" name="check" />
                                    <label for="<?php echo $squared66[$i];?>"><font size="3"> <?php echo $item;?> </font></label>
                                   <!--div class="drop w3-card-8 w3-dropdown-content" >
                                    
                          <div ><input class="w3-radio" type="radio" name="gender" value="Beginner" checked>
                              <label class="w3-validate">Beginner</label></div>

                                  <div> <input class="w3-radio" type="radio" name="gender" value="Intermediate">
                                      <label class="w3-validate">Intermediate</label></div>

                                      <div> <input class="w3-radio" type="radio" name="gender" value="Expert">
                                          <label class="w3-validate">Expert</label></div>
                                    </div-->
                                    
                                    
                                </div>
                      <?php
                      $i++;
                      }
                      ?>
                      
                 
        
    </div>
                  

            </div>  
    <!--End of selection of skills to be requested to others-->
    
    
    
    
    <!--<input type="submit" id="submitskill" name="submit" class="btn" style="float:left">-->
    
    <button id="button1" type="submit"  onclick="getSkill()">Submit</button>

        <?php  
if(isset($_POST['submit']))  
{  
    $selectedChecks=$_POST['checked'];
    foreach($selectedChecks as $check)
    {
        $checks.=$check.",";
    }
    printf($checks);
    //$query="Insert into users_skills values ('$email','$fname $lname','$password')";
    //mysqli_query($con, $query);
    print_r($ownSkills);
}
    ?>
    <footer>
        <a href="home.php"><button type="submit" id="submitskill" class="btn" style="float:right">OK</button></a>

        <br>
       
        <form>
            
            <label style="color: floralwhite; margin:2%; font:cursive "> Couldn't find your skill?? Suggest yours..</label>
            <input type="text">
            <button type="submit" id="accept_skill" class="btn" >suggest</button>
            
        </form>
        <a href="home.php"><button type="button" id="skillskip" class="btn btn-blue" style="float:right">Skip>></button></a>

        
</footer>  
        
   
    <!--</div>-->  
    
</body>

</html>
