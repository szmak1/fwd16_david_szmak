<?php 
// including  the database connection file 
include_once("config.php");
//include_once("config_local.php");

/* 
 * Vi organiserar si dan på sån sätt att vi har all processkod här i toppen av
 * sidan. All  information som vi behöver processa hämtas från den nedre delen
 * av sidan där html formuläret finns.
 * Där finns namnen på formulärfälten som vi använder i php koden här upp för 
 * att processas.
*/

/*
 * Session start koden lägger vi till på samtliga sidor som ska vara skyddade
*/
session_start();
if(empty($_SESSION['email']))
{
 header("location:index.php");
}


/*
 * Vi vill ta emot resultatet från föregående sida och med $_GET ta emot id för
 * den raden vi ska redigera
*/
$aircraftId = $_GET['aircraftId'];

/*
 * vi använder värdet på id från föregående sida som vi fick från get och 
 * skriver en sql fråga där vi anvnder :id för vara basis för en where fråga.
 * Vi vill alltså bara presentera ett enskild skämt baserat på den id vi
 * sprarade från raden från förra sidan.
 */
$sql = "SELECT * FROM aircraft WHERE aircraftId=:aircraftId"; 
$query = $pdo->prepare($sql); 
$query->execute(array(':aircraftId' => $aircraftId)); 
/*
 * Resultatet av nedanstående kod kommer vi fylla ut i en html forumlär längre
 * ner på sidan. 
*/
while($row = $query->fetch()) 
{ 
$aircraftName = $row['aircraftName']; 
$aircraftSpeed = $row['aircraftSpeed'];
$aircraftLength = $row['aircraftLength'];
$roleId = $row['roleId']; 
}

/*
 * På redigerings sidan så kommer vi en textruta för att en enskild skämt.
 * Vi vill däremot inte att användaren ska behöva skriva en authorid för
 * skämtet. Förutom att möjligheten till misstförstånd blir större att hålla 
 * koll pa en siffra så försämrar det avsevärt användarupplevelsen.
 * Vi skapar en seperat fråga som kommer vara basis för en dropdown senare i 
 * html formuläret
*/
$roleSql = "SELECT * FROM role"; 
$roleQuery = $pdo->prepare($roleSql); 
$roleQuery->execute();


?> 
<?php 

/*
 * vi kontrollerar om vi har tryckt på uppdatera knappen som har namnet update
 * i formuläret, i så fall så lagrar vi id och fälten joketext och authorid i 
 * respektive variabel, som ska finnas i vår db tabell.
*/
if(isset($_POST['update'])) 
{ 
$aircraftId = $_POST['aircraftId']; 

$aircraftName=$_POST['aircraftName']; 
$aircraftSpeed=$_POST['aircraftSpeed']; 
$aircraftLength=$_POST['aircraftLength'];

$roleId=$_POST['roleId'];



// checking empty fields

if(empty($aircraftName) || empty($roleId)) { 

if(empty($aircraftName)) { 
echo "<font color='red'>Name field is empty.</font><br/>"; 
} 

if(empty($roleId)) { 
echo "<font color='red'>Director field is empty.</font><br/>"; 
} 


} else { 
/*
 * vi använder sql syntaxen för uppdateringar och skickar med id för raden.
 * OBS att man i PDO använder platshållare (joketext=:joketext) där :joketext är
 * namnet på platshållaren för att para ihop det som finns i  formuläret till
 *  databasen. Detta läggs till i variablen $sql
*/

$sql = "UPDATE aircraft SET aircraftName=:aircraftName, roleId=:roleId, aircraftSpeed=:aircraftSpeed, aircraftLength=:aircraftLength WHERE aircraftId=:aircraftId";

/*
 * vi använder pdo objektets prepare metod som tar $sql som argument och sparar
 * resultaet i variabeln $query
*/
$query = $pdo->prepare($sql); 
/*Sedan binder vi det som finns i platshållaren till variabeln*/
$query->bindparam(':aircraftId', $aircraftId); 
$query->bindparam(':aircraftName', $aircraftName); 
$query->bindparam(':roleId', $roleId);
$query->bindparam(':aircraftSpeed', $aircraftSpeed);
$query->bindparam(':aircraftLength', $aircraftLength);

//vi använder det som nu finns i $query för att köra sql frågan 
$query->execute(); 

// Alternative to above bindparam and execute 
// $query->execute(array(':id' => $id, ':joketext' => $joketext)); 

//header används för att skicka tillbaka efter proccesn är klart till en sida
header("Location: aircraft.php"); 
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
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<meta charset="UTF-8"> 
<title></title>
<style>
                .logout22 {
                display:flex;
                align-content: top;
                justify-content: right;
                margin-bottom: 5px;
               
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
             
        
border{
    border: 4px solid #191919;
}
            td{
                text-align: center;
            }
            tr {
                border: 4px solid #191919;
                align-self: center;
                background: rgba(0, 0, 0, 0.3);
                border-color: black;
                
            }
            tr:nth-child(1) {
                background-color: lightskyblue;
                color: #191919;
                border: 4px solid #191919;
                
                text-align: center;
            }
            .buttoncenter{
                display:flex;
                justify-content: center;
                justify-content: space-between;
            }
            h1, h3{
                text-align: center;
                color: lightskyblue;
                margin-left: 10px;
   
            }
 
            
             h2{
                text-align: center;
                color: #191919
            }
            .h1h2center {
                display:flex;
                justify-content: center;
                align-items: baseline;
            }
            a{
                color:#191919;
            }
            .btn{
                color:black;
                font-weight: bold;
            }
            
</style>
</head> 
<body> 
<a class="btn btn-success" href="aircraft.php">Home</a> 
<br/><br/> 

<form name="form1" method="post" action="aircraftEdit.php"> 
<table class="table table-condensed-responsive"> 
<tr class="text-uppercase"> 

    <td><h5><strong>Aeroplane Name</strong></h5></td>
<td><input type="text" name="aircraftName" value="<?php echo $aircraftName;?>"/></td>
<td><h5><strong>Aeroplane Speed</strong></h5></td>
<td><input type="text" name="aircraftSpeed" value="<?php echo $aircraftSpeed;?>"/></td>

<td><h5><strong>Aeroplane Range</strong></h5></td>
<td><input type="text" name="aircraftLength" value="<?php echo $aircraftLength;?>"/></td>



</tr> 
 <td><h3><strong>Maker Name</strong></h3></td>
<td>
    
<!-- För att användare ine ska behöva stoppa in siffror för en authorid så skapar
vi en dropdown, där resultatet av sql frågan från rad 47 $authorQuery stoppar in
i $author-->    
<select class="form-control" name="roleId"> 
<?php 
while($role = $roleQuery->fetch()) { 
if ($role['roleId'] == $roleId) { 
/*
 * Vi använder id som vi har för att, som defualt visa den författaren som var
 * kopplat till ett viss skämt vald från föregående sida.
*/ 
echo "<option value=\"{$role['roleId']}\" selected>{$role['roleName']}</option>"; 
} else { 
/*
 * Skulle vi däremot vilj ändra författaren till nåt annat det som vi fick från
 * förra sidan, så väljer vi det nu och också fångar upp id:et för den
 * författaren
*/ 
echo "<option value=\"{$role['roleId']}\">{$role['roleName']}</option>"; 
} 
} 
?> 
</select> 
</td> 


<tr>
    
<!-- Vi visar inte id för den skämtet vi vill redigera -->    
<td><input type="hidden" name="aircraftId" value=<?php echo $_GET['aircraftId'];?></td> 
<td><input class="btn btn-primary" type="submit" name="update" value="Update"></td> 
</tr> 
</table> 
</form>
<!--För att logga ut skickar vi användaren till en sida där sessionen avslutas
med session_destroy--> 
<a class="btn btn-danger" href="logout.php">Logout</a>
    </body>
</html>
