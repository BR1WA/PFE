<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>

    <!-- css start -->
    <style>
        *{
            margin: 0px;
            padding:0px;
            box-sizing: border-box;
        }
        body{
            
            font-family: 'Open Sans', sans-serif;
            font-size: 16px;
            background-color: aliceblue;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            animation: 0.5s linear;
        }
        .header{
            position: absolute;
            top: 0px;
            width: 100%;
            height: 33%;
            background: url(background_pic.png);
        }
        div.form_container{
            position: relative;
            width: 350px;
            height: 400px;
            border-radius: 10px;
            animation: 0.3s linear;
            top: 20px;
            background-color: antiquewhite;

        }
        .form_container::before{
            content: "";
            border-radius: 10px;
            background-color: aliceblue;
            position: absolute;
            margin: auto;
            inset: 1px;
            height: 94px;
        }
        @keyframes animate {
          0% {
            background-position: bottom;
          }
          100% {
            background-position: top;
          }
        }
        form{
            inset: 3.5px;
            position: absolute;
            background-color: aliceblue;
            border-radius: 10px;
        }
        div.form_container input{
            display: block;
            margin: auto;
            margin-top: 20px;
            margin-bottom: 30px;
            height: 35px;
            width: 85%;
            border: none;
            border-color: red;
            padding: 10px 10px;
            border-radius: 5px;
        }
        div.form_container input:last-child{
            width: 130px;
            height: 40px;
            color:black;
            background-color: antiquewhite;
            border-radius: 5px;
            font-family: 'Open Sans', sans-serif;
            font-size: 16px;
        }
        div.form_container input:last-child:hover{
            background-color: black;
            color: antiquewhite;
            transition: 0.3s;
            cursor: pointer;
        }
        form h2{
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            color: rgb(255, 218, 169);
            margin-top: 47px;
            margin-bottom: 50px;
        }
        form h2 span{
            color: black;
        }
        p.login{
            display: block;
            margin: auto;
            margin-top: 12px;
            width: 85%;
            height: 40px;
        }
        p.login a{
            color:coral;
        }
        .logo_container{
            font-family: 'Open Sans', sans-serif;
            font-size: 25px;
            color: antiquewhite;
            width: 200px;
            height: 80px;
        }
        .logo_container a{
            display: flex;
            justify-content:center;
            align-items: center;
            width: auto;
            height: 100%;
            text-decoration: none;
            color: antiquewhite;
        }
        .logo_container a img{
            width: 50px;
        }
        @media  screen and (max-width:777px) {
            .logo_container{
                width: 100%;
                height: 50px;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        }
        button#night-mode-toggle{
            color: antiquewhite;
            position:absolute;
            right: 7px;
            top: 7px;
            background-color:transparent;
            border: none;
            cursor: pointer;
        }
        .hidden_div{
            position: absolute;
            z-index: 10;
            display: none;
            justify-content: center;
            justify-items:center;
            width: 400px;
            height: 200px;
            background-color: aliceblue;
            border-radius: 10px;
            border: 2px antiquewhite solid;
        }
        .hidden_div h2{
            position: absolute;
            top: 15px;
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
        }
        .hidden_div p{
            position: absolute;
            top: 88px;
            font-family: 'Open Sans', sans-serif;
            font-size: 16px;
        }
        .black_layer{
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.486);
            z-index: 5;
            display: none;
        }
    </style>
    <!-- css end -->
</head>
<body>

    <!-- html start -->
    <div class="black_layer" id="black_layer" onclick="removeAlertMessage();"></div>
    <div class="hidden_div" id="alert_message_container">
        <h2>Alert!</h2>
        <p id="alert_message"></p>
      </div>
    <div class="header">
        <div class="logo_container">
            <a href="index.php"><img src="spotify-logo-white-png-2.gif" alt="Spotify"> Spotify </a>
        </div>
    </div>
    <div class="form_container" id="form_container">
        <form action="" method="post" id="form">
            <h2 align="center">Log <span id="txt1">In!</span></h2>
            <input type="email" name="email" id="" oninput="runanimation();" placeholder="Enter Your Email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
            <input type="password" name="pwd" id="" oninput="runanimation();" placeholder="Enter Your Password" value="<?php if(isset($_POST['pwd'])) echo $_POST['pwd']; ?>">
            <p class="login" id="txt2">Dont have an account? <a href="signup.php">Create one</a>.</p>
            <input type="submit" name="sub" class="sub" id="">
        </form>
    </div>
    <!-- html end -->
    
    <!-- javaScript start -->
    <script>
        function getRandomNumber(min, max) {
          return Math.floor(Math.random() * (max - min + 1)) + min;
        }
        function getRandomColor(){
          return getRandomNumber(0,255);
        }
  
        function runanimation(){
          const element=document.getElementById('form_container');
          element.style.background="linear-gradient(to bottom,transparent,transparent,transparent,rgb("+getRandomColor()+","+getRandomColor()+","+getRandomColor()+"),rgb("+getRandomColor()+","+getRandomColor()+","+getRandomColor()+"),transparent,transparent)";
          element.style.backgroundSize="100% 300%";
          element.style.animationName="animate";
          setTimeout(() => {
            element.style.animationName="none";
          }, 270);
        }

        function alertMessage(message){
            document.getElementById('alert_message').innerHTML=message;
            document.getElementById('black_layer').style.display="unset";
            document.getElementById('alert_message_container').style.display="flex";
            setTimeout(removeAlertMessage,2000);
        }
        function removeAlertMessage(){
            document.getElementById('black_layer').style.display="none";
            document.getElementById('alert_message_container').style.display="none";

        }

      </script>
      <!-- javaScript end -->
    
    <!-- php start -->
    <?php
        if(isset($_POST['sub'])){
            if(isset($_POST['email']) and !empty($_POST['email']) and
            isset($_POST['pwd']) and !empty($_POST['pwd'])){
                $email=htmlentities($_POST['email']);
                $pwd=htmlentities($_POST['pwd']);
                    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) echo "<script>alertMessage('Invalid email address')</script>";
                    else{
                        $conn=mysqli_connect("localhost","root","","spotify_db");
                        if(!$conn) die("error : ".mysqli_connect_error());
                        else{
                            $info_check=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
                            if(mysqli_num_rows($info_check)==!1) echo "<script>alertMessage('Email address not found')</script>";
                            else{
                                $row=mysqli_fetch_array($info_check);
                                if(password_verify($pwd,$row['password'])){
                                    echo "<script>window.location='home.php';</script>";
                                    }else echo "<script>alertMessage('Incorrect password')</script>";
                                }

                            }
                        }
                    }else echo "<script>alertMessage('make sure to input all fields please')</script>";
                }
    ?>
    <!-- php end -->
</body>
</html>