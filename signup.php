<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <style>
        *{
            margin: 0px;
            padding:0px;
            box-sizing: border-box;
        }
        body{
            background-color: aliceblue;
        }
        nav{
            margin-top: 0px;
            width: 100%;
            height: 200px;
            background: url(Rectangle_1.png);
        }
        div.input_field{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: aliceblue;
            padding: 16px 50px;
            border-radius: 10px;
        }
        div.input_field input{
            display: block;
            margin-top: 20px;
            height: 35px;
            width: 250px;
            border: none;
            padding: 10px 10px;
            border-radius: 5px;
        }
        input:last-child{
            width: 40px;
            height: 40px;
            background-color:black ;
            color: aliceblue;
            border-radius: 5px;
        }
        form h2{
            color: rgb(12, 56, 186);
        }
        form h2 span{
            color: black;
        }
    </style>
</head>
<body>
    <nav>
        <!-- later -->
    </nav>
    <div class="input_field">
        <form action="" method="post">
            <h2 align="center">Sign <span>Up!</span></h2>
            <input type="text" name="userName" placeholder="Enter A User Name">
            <input type="email" name="email" id="" placeholder="Enter Your Email">
            <input type="password" name="pwd" id="" placeholder="Enter Your Password">
            <input type="password" name="cPwd" id="" placeholder="Confirm Your Password">
            <input type="submit" name="sub" class="sub" id="">
        </form>
    </div>

    
    <?php
        if(isset($_POST['sub'])){
            if(isset($_POST['userName']) and !empty($_POST['userName']) and
            isset($_POST['email']) and !empty($_POST['email']) and
            isset($_POST['pwd']) and !empty($_POST['pwd']) and
            isset($_POST['cPwd']) and !empty($_POST['cPwd'])){
                $userName=htmlentities($_POST['userName']);
                $email=htmlentities($_POST['email']);
                $pwd=htmlentities($_POST['pwd']);
                $cPwd=htmlentities($_POST['cPwd']);
                $hashed_password=password_hash($pwd,PASSWORD_DEFAULT);
                    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) echo "Invalid email address";
                    else{
                        $conn=mysqli_connect("localhost","root","","spotify_db");
                        if(!$conn) die("error : ".mysqli_connect_error());
                        else{
                            $emailCheck=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
                            if(mysqli_num_rows($emailCheck)>0) echo "email already exists";
                            else{
                            $sql="INSERT INTO users values('','$userName','$email','$hashed_password')";
                            $resul=mysqli_query($conn,$sql);
                            if($resul){
                                echo "data inserted correctly";
                            }else
                                echo "query error";
                            }
                        }
                    }
            }
        }
    ?>
</body>
</html>