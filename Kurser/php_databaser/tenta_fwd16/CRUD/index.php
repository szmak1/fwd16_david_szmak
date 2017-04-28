<?php

/*
 * Denna version som körs på servern är en för gammal version för att köra det
 * mycket säkrare password_hash()
 * Använd  aldrig md5()  som vi använder i detta exempel i produktknsmilö då det
 * anses för osäkert. 
 */
include_once("config.php");
/*
 * Vi använder sessions för att spåra våra använder på websidan
*/
session_start();
 
/*
 * Vi kontrollerar om nedan värden är fyllda i formuläret, om signup knappen
 * användes.   
*/
if(isset($_POST['signup'])){
 $name = $_POST['name'];
 $email = $_POST['email'];
 /*
  * OBS! Här använder vi md5 för att skicka in värden till lösenordet krypterat
  * till databasen, oavsett sträng så kommer detta omvandlas till en 35 tecken
  * lång krypterad sträng i databasen, denna krypterade sträng passar enbart till
  * den strängen ni valde att ha som  lösenord.
 */
 $pass = md5($_POST['pass']);
 
 $insert = $pdo->prepare("INSERT INTO users (name,email,pass)
values(:name,:email,:pass) ");
$insert->bindParam(':name',$name);
$insert->bindParam(':email',$email);
$insert->bindParam(':pass',$pass);
$insert->execute();
}elseif(isset($_POST['signin'])){
 $email = $_POST['email'];
 /*
  * Vid login så passerar vi den krypterade lösenordet tillbaks till databasen
 */
 $pass = md5($_POST['pass']);
 
 $select = $pdo->prepare("SELECT * FROM users WHERE email='$email' and pass='$pass'");
 $select->setFetchMode();
 $select->execute();
 $data=$select->fetch();
 /*
  * Om inloggningen inte fungerar
 */
 if($data['email']!=$email and $data['pass']!=$pass)
 {
  echo "invalid email or pass";
 }
 /*
  * Om inloggningen fungerade så sparar vi bla användarnamnet och skickar vidare
  * användare till den sidan vi vill att den härnäst ska gå till, i detta fall
  * joke.php.
  * Där kommer vi hälsa användare med dennes användarnamn
 */
 elseif($data['email']==$email and $data['pass']==$pass)
 {
 $_SESSION['email']=$data['email'];
    $_SESSION['name']=$data['name'];
header("location:aircraft.php"); 
 }
 }


?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Credentials</title>
        <style>
            .formContainer{
  display: flex;
  justify-content: center;
  align-items: center;
  
  
}

.rightForm{
 padding:85px;
}

.leftForm{
 margin-left: auto;
 padding:85px;
}

          
                body {
                background: lightblue;
                margin:0;
                padding:0;
                font-family:"arial",heletica,sans-serif;
                font-size:12px;
                background: #2980b9 url('http://static.tumblr.com/03fbbc566b081016810402488936fbae/pqpk3dn/MRSmlzpj3/tumblr_static_bg3.png') repeat 0 0;
                -webkit-animation: 10s linear 0s normal none infinite animate;
                -moz-animation: 10s linear 0s normal none infinite animate;
                -ms-animation: 10s linear 0s normal none infinite animate;
                -o-animation: 10s linear 0s normal none infinite animate;
                animation: 10s linear 0s normal none infinite animate;
                }
 
                @-webkit-keyframes animate {
                from {background-position:0 0;}
                to {background-position: 500px 0;}
                }
 
                @-moz-keyframes animate {
                from {background-position:0 0;}
                to {background-position: 500px 0;}
                }
 
                @-ms-keyframes animate {
                from {background-position:0 0;}
                to {background-position: 500px 0;}
                }
 
                @-o-keyframes animate {
                from {background-position:0 0;}
                to {background-position: 500px 0;}
                }      
 
                @keyframes animate {
                from {background-position:0 0;}
                to {background-position: 500px 0;}
                }
             
         
            tr {
                border: 4px solid;
                align-self: center;
            }
            tr:nth-child(1) {
                background-color: lightskyblue;
              
            }
              .buttoncenter{
                display:flex;
                justify-content: center;
                justify-content: space-between;
            }
            h3{
                text-align: center;
            }
      
            .animationtest {
            width: 225px; height: 400px;
            background-image: url(http://estelle.github.com/10/files/sprite.png);
            animation: gangham 4s steps(23,start) infinite,
            movearound 12s steps(69,end) infinite alternate 44ms;
            animation-direction: normal, alternate;
            }
            @keyframes gangham {
            0% {background-position: 0 0}
            100% {background-position: -5175px 0}
            }
            @keyframes movearound {
             0% {transform: translatex(0)}
            100% {transform: translatex(600px);}
             }
        </style>
    </head>
    <body>
        <!-- Outputs PHP -->
        <h5><?php echo 'Current PHP version: ' . phpversion();?></h5>
        
        <h3>Coded by David Szmak</h3>
        <div class="formContainer">
  <div class="rightForm">
    <h1>Create Account Here</h1>
  <form method="post">
<input type="text" name="name" placeholder="User Name"><br><br>
<input type="text" name="email" placeholder="example@example.com"><br><br>
<input type="password" name="pass" placeholder="password"><br><br>

<input class="btn btn-warning" type="submit" name="signup" value="SIGN UP">
</form>
  </div>
  <div class="leftForm">
  <h1>Log In Here</h1>
<form method="post">
<input type="text" name="email" placeholder="example@example.com"><br><br>
<input type="password" name="pass" placeholder="password"><br><br>
<input class="btn btn-success" type="submit" name="signin" value="SIGN IN">
</form>
  </div>
</div>
    <div class="animationtest"></div>
    </body>
</html>
