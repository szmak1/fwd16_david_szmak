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
$roleId = $_GET['roleId'];

/*
 * vi använder värdet på id från föregående sida som vi fick från get och 
 * skriver en sql fråga där vi anvnder :id för vara basis för en where fråga.
 * Vi vill alltså bara presentera ett enskild skämt baserat på den id vi
 * sprarade från raden från förra sidan.
 */
$sql = "SELECT * FROM role WHERE roleId=:roleId"; 
$query = $pdo->prepare($sql); 
$query->execute(array(':roleId' => $roleId)); 
/*
 * Resultatet av nedanstående kod kommer vi fylla ut i en html forumlär längre
 * ner på sidan. 
*/
while($row = $query->fetch()) 
{ 
$roleName = $row['roleName']; 
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
$roleId = $_POST['roleId']; 
$roleName=$_POST['roleName']; 




// checking empty fields

if(empty($roleName) || empty($roleId)) { 

if(empty($roleName)) { 
echo "<font color='orange'>Role name field is empty.</font><br/>"; 
} 

if(empty($roleId)) { 
echo "<font color='orange'>Role id field is empty.</font><br/>"; 
} 


} else { 
/*
 * vi använder sql syntaxen för uppdateringar och skickar med id för raden.
 * OBS att man i PDO använder platshållare (joketext=:joketext) där :joketext är
 * namnet på platshållaren för att para ihop det som finns i  formuläret till
 *  databasen. Detta läggs till i variablen $sql
*/

$sql = "UPDATE role SET roleName=:roleName WHERE roleId=:roleId";

/*
 * vi använder pdo objektets prepare metod som tar $sql som argument och sparar
 * resultaet i variabeln $query
*/
$query = $pdo->prepare($sql); 
/*Sedan binder vi det som finns i platshållaren till variabeln*/
$query->bindparam(':roleId', $roleId); 
$query->bindparam(':roleName', $roleName); 
//vi använder det som nu finns i $query för att köra sql frågan 
$query->execute(); 

// Alternative to above bindparam and execute 
// $query->execute(array(':id' => $id, ':joketext' => $joketext)); 

//header används för att skicka tillbaka efter proccesn är klart till en sida
header("Location: role.php"); 
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
                color:white;
                font-weight: bold;
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
        
                h1{
                text-align: center;
                color: lightseagreen;
                margin-left: 10px;
   
            }
            
             h2{
                text-align: center;
            }
             
border{
    border: 4px solid #191919;
}
            td{
                text-align: center;
            }
            tr {
                border: 4px solid #191919;
                
               
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
               .btn{
                color:black;
                font-weight: bold;
            }
            
</style>
</head> 
<body> 
<a class="btn btn-success" href="role.php">Home</a> 
<br/><br/> 

<form name="form1" method="post" action="roleEdit.php"> 
<table class="table table-bordered"> 
<tr> 
    <td><h4>Role</h4></td> 
<td><input type="text" name="roleName" value="<?php echo $roleName;?>"/></td>

</tr> 

<!-- För att användare ine ska behöva stoppa in siffror för en authorid så skapar
vi en dropdown, där resultatet av sql frågan från rad 47 $authorQuery stoppar in
i $author-->    





<tr>
<!-- Vi visar inte id för den skämtet vi vill redigera -->    
<td><input type="hidden" name="roleId" value=<?php echo $_GET['roleId'];?></td> 
<td><input class="btn btn-warning" type="submit" name="update" value="Update"></td> 
</tr> 
</table> 
</form>
<!--För att logga ut skickar vi användaren till en sida där sessionen avslutas
med session_destroy--> 
<a class="btn btn-danger" href="logout.php">Logout</a>
    </body>
</html>
