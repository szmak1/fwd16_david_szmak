<!DOCTYPE html>

<?php
//including the database connection file
//include_once("config_local.php");
include_once("config.php");
/*
 * Vi kontrollerar alltid att ignen har kommit till en sida som är skyddad, i 
 * detta fall gör vi med det med att kontrollera om sessionen för epost inte är
 * tomt, så fall så skic kas den personen tillbaka till start sidan. 
*/
session_start();
if(empty($_SESSION['email']))
{
 header("location:index.php");
}
/*
 * Annars blir vi insläppta med ett hälsningsfras och namnet på användaren som
 * vi sparade från inloggningssidan.
*/



 
/*Vi använder pdo objekets metod query och sparar resultatet i $result 
 * (via vår store procedure) Bygga alltid sp där det finns en primarykey id, 
 * även om den inte visas i raden, så måste vi ha en id som referens om vi sen
 * ska redigera eller ta bort en rad.
 */

$result = $pdo->query("call sp_role");



?>
<html>
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <meta charset="UTF-8">
        <title>Maker Name</title>
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
               .btn{
                color:black;
                font-weight: bold;
            }
             
        </style>
    </head>
    <body>
        
<!-- Länk till lägga till nya skämt -->        
    <div class="buttoncenter">
        <a class="btn btn-warning" href="roleAdd.php">Add New Maker Name</a>
        <a class="btn btn-success" href="aircraft.php">Go back to Aeroplane</a>
    </div>
<h1><strong>Type of Aeroplane</strong></h1>
    <div class="table-responsive">
    <table class="table table-bordered">

    <tr class="text-uppercase">
        <td class="lead"><strong>Maker Name</strong></td>
        <td class="lead"><strong>Update</strong></td>
    </tr>
       

    <?php
/*
 * vi behöver inte skriva $authorQuery->fetch(FETCH_ASSOC) då vi i vår databas
 * kopplinga redan har angett att det är den metoden vi har satt som default.
 * 
 * Vi fetch så loopar vi genom alla rader från sp och matar in i varje rad i 
 * tabellen.
 * 
 * För varje rad vi får ut, så tar vi reda på id (vår primary key i tabllen) och 
 * sprarar den  i varibeln $row. Denna id använder vi sen som basis för att
 * redigera e n enskild rad som bär med sig det värdet till edit sidan, eller tar
 * det värde för att radera en ensild rad i tabellen.
*/    
    while($row = $result->fetch()) {         
        echo "<tr>";
        echo "<td><h4>".$row['roleName']."</h4></td>";
        echo "<td><a class=\"btn btn-warning\" href=\"roleEdit.php?roleId=$row[roleId]\">Edit</a> <a class=\"btn btn-danger\" href=\"roleDelete.php?roleId=$row[roleId]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
    }
    
    ?>
<!--För att logga ut skickar vi användaren till en sida där sessionen avslutas
med session_destroy-->    
<div class="logout22"><a class="btn btn-danger" href="logout.php" role="button">Logout</a></div>
    </table>
    </body>
</html>
