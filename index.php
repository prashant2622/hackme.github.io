<?php
  session_start();

  //Mandatory Files Fetching Code from the Server
  require("config.php");  
  if(isset($_GET['login']))
  {
      $ename=$_GET['username'];
      $pass=$_GET['password'];
      
      //Mysql Email ID & Passowrd Matching
      $sql="select * from users where uname='".$ename."'AND password='".$pass."'
        limit 1";
      $result=mysqli_query($link,$sql);
      $count = mysqli_num_rows($result);
      
      if($count==1)
      {
           while($row=mysqli_fetch_assoc($result))
             {
                 //Saving the Data in Variable 
                 $_SESSION['name']=$row['first_name'];
                 $_SESSION['Userid']=$row['uid'];
                 $_SESSION['avatar']=$row['avatar'];
                 $_SESSION['balance']=$row['balance'];  
                 $_SESSION['notification']=$row['notification'];
                 //Redirecting to the Logged_in Page
                 if($_SESSION['name']=='Admin')
                 {
                   header("Location:loggedIn/admin.php");
                 }
                 else{
                    header("Location:loggedIn/user.php");
                 }
                 
                 
                 
             }
          
      }
      else
      {
          echo "<script>alert('!!HOLY CRAP YOU JUST HACKED IN!! Just joking you script kiddie');</script>";
          
  }}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  </head>
  <body>
  <div class="sign">
      <span class="fast-flicker">s</span>tudy<span class="flicker">e</span>ze
    </div>
    <div class="bg-img">
      <div><canvas id="c"></canvas></div>
      <div class="content">
        <header>Hack_In</header>
        <form action="#" method = "GET">
            <div class="field">
              <span class="fa fa-user"></span>
              <input type="text" name="username" required placeholder="Username">
            </div>
            <div class="field space">
              <span class="fa fa-lock"></span>
              <input type="password" class="pass-key" name="password" required placeholder="Password">
              <span class="show">SHOW</span>
            </div>
            <div class="field">
              <input type="submit" name="login" value="LOGIN">
            </div>
        </form>
      </div>
    </div>
  <script>
      const pass_field = document.querySelector('.pass-key');
      const showBtn = document.querySelector('.show');
      showBtn.addEventListener('click', function(){
       if(pass_field.type === "password"){
         pass_field.type = "text";
         showBtn.textContent = "HIDE";
         showBtn.style.color = "#3498db";
       }else{
         pass_field.type = "password";
         showBtn.textContent = "SHOW";
         showBtn.style.color = "#222";
       }
      });
  </script>
  <script>
      var c = document.getElementById("c");
      var ctx = c.getContext("2d");

      //making the canvas full screen
      c.height = window.innerHeight;
      c.width = window.innerWidth;

      //chinese characters - taken from the unicode charset
      var chinese = "STUDYEZEHACKMEDFIRTEWHQGILADSVKHADSNVERGLFHARSDGUKHS32U8472375984358TU34IOERHTIFLEADSF";
      //converting the string into an array of single characters
      chinese = chinese.split("");

      var font_size = 20;
      var columns = c.width/font_size; //number of columns for the rain
      //an array of drops - one per column
      var drops = [];
      //x below is the x coordinate
      //1 = y co-ordinate of the drop(same for every drop initially)
      for(var x = 0; x < columns; x++)
      drops[x] = 1; 

      //drawing the characters
      function draw()
      {
      //Black BG for the canvas
      //translucent BG to show trail
      ctx.fillStyle = "rgba(0, 0, 0, 0.05)";
      ctx.fillRect(0, 0, c.width, c.height);

      ctx.fillStyle = "#008000"; //green text
      ctx.font = font_size + "px arial";
      //looping over drops
      for(var i = 0; i < drops.length; i++)
      {
        //a random chinese character to print
        var text = chinese[Math.floor(Math.random()*chinese.length)];
        //x = i*font_size, y = value of drops[i]*font_size
        ctx.fillText(text, i*font_size, drops[i]*font_size);
        
        //sending the drop back to the top randomly after it has crossed the screen
        //adding a randomness to the reset to make the drops scattered on the Y axis
        if(drops[i]*font_size > c.height && Math.random() > 0.975)
            drops[i] = 0;
        
        //incrementing Y coordinate
        drops[i]++;
      }
      }

      setInterval(draw, 33);
  </script>
  <style>
  /*basic reset*/
    * {margin: 0; padding: 0;}
    /*adding a black bg to the body to make things clearer*/
    body {background: black;}
    canvas {display: block;}
  </style>
</body>
</html>
?>