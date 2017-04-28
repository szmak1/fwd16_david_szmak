<?php
//include_once("config_local.php");
include_once("config.php");

/*
 * Vi organiserar sidan på sån sätt att vi har all processkod här i toppen av
 * sidan. All information som vi behöver processa hämtas från den nedre delen
 * av sida n där html formuläret finns.
 * Där finns  namnen på formulärfälten som vi använder i php koden här upp för 
 * att processas.
*/
 
/*
 * Session start koden lägger vi  till på samtliga sidor som ska vara skyddade
*/
session_start();
if(empty($_SESSION['email']))
{
 header("location:index.php");
}


if(isset($_POST['Submit'])) {    
    $aircraftName = $_POST['aircraftName'];
    $roleId = $_POST['roleId'];
    $aircraftSpeed = $_POST['aircraftSpeed'];
    $aircraftLength = $_POST['aircraftLength'];
   
    
        
    // checking empty fields
    if(empty($aircraftName) || empty($roleId) || empty($aircraftSpeed) || empty($aircraftLength)) {
                
        if(empty($aircraftName)) {
            echo "<font color='red'>Aircraft field is empty.</font><br/>";
        }
        
        if(empty($roleId)) {
            echo "<font color='red'>RoleId field is empty.</font><br/>";
        }
        if(empty($aircraftSpeed)) {
            echo "<font color='red'>aircraftSpeed field is empty.</font><br/>";
        }
        if(empty($aircraftLength)) {
            echo "<font color='red'>aircraftLength field is empty.</font><br/>";
        }


        
        
     //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database        
        $sql = "INSERT INTO aircraft(aircraftName, roleId, aircraftSpeed, aircraftLength) VALUES(:aircraftName, :roleId, :aircraftSpeed, :aircraftLength)";
        $query = $pdo->prepare($sql);
                
        $query->bindparam(':aircraftName', $aircraftName);
        $query->bindparam(':roleId', $roleId);
        $query->bindparam(':aircraftSpeed', $aircraftSpeed);
        $query->bindparam(':aircraftLength', $aircraftLength);
      
        $query->execute();
        
        // Alternative to above bindparam and execute
        // $query->execute(array(':joketext' => $joketext, ':authorId' => $authorId));
        
        //display success message
            echo "<font color='orange'>Data added successfully.";
        echo "<br/><a href='aircraft.php'><font color='orange'>View Result</a>";
    }
}

/*
 * För att inte användaren ska behöva skriva siffror för en authorid, så vill vi
 * skapa en dropdown så att användare kan välja från namnlista från databasen
 * som ladda i en dropdown.
 * Nedanståend sql fråga är basen för den dropdown
*/
$roleSql = "SELECT * FROM role"; 
$roleQuery = $pdo->prepare($roleSql); 
$roleQuery->execute(); 
        
?>

<!DOCTYPE html>

<html>
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Aeroplane</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                color: lightskyblue;
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
                width: 300px;
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
            
            
        </style>
    </head>
    <body>
        <a class="btn btn-success" href="aircraft.php">Home</a>
    <br/><br/>

    <form action="aircraftAdd.php" method="post" name="form1" class="form-inline">
       
        <table class="table table-bordered">
            <tr> 
                <td class="lead"><h4>Aeroplane Name</h4></td>
<!-- Här lägger vi till det nya skämtet  -->                
                <td><input type="text" name="aircraftName"></td>
                <td class="lead"><h4>Aircraft Top Speed(km/h)</h4></td>
                <td><input type="text" name="aircraftSpeed"></td>
                <td class="lead"><h4>Aeroplane Range</h4></td>
                <td><input type="text" name="aircraftLength"></td>
             
            </tr>
            
            
            <td><h4>Maker Name</h4></td> 
<td>

<!-- Vi skapar en dropdown som laddas med författare från databasen, så att inte
användare inte lägger till författare som inte existerar-->    
<select class="form-control" name="roleId"> 
            
  
<?php

$roleId="";
while($role = $roleQuery->fetch()) { 
if ($role['roleId'] == $roleId) { 
//The author is currently associated to the joke, select it by default 
echo "<option value=\"{$role['roleId']}\" selected>{$role['roleName']}</option>"; 
} else { 
//The author is not currently associated to the joke 
echo "<option value=\"{$role['roleId']}\">{$role['roleName']}</option>"; 
} 
} 
?> 
</select> 
</td> 
</tr> 
    <tr> 
        <td></td>
            <td><input class="btn btn-warning" type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
<!--För att logga ut skickar vi användaren till en sida där sessionen avslutas
med session_destroy-->    
    <a class="btn btn-danger" href="logout.php">Logout</a>
    </body>
</html>


