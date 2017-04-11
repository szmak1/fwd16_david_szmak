<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo "<p><b>required base - success</b></p>";
        // Inloggning uppgifter
        $servername = '83.168.227.23';
        $username = 'u1164707_DavidS';
        $password = 'sY0;px<2q(';
        $dbname = 'db1164707_DavidS';
        // Hantering av databas uppgifters
try {
    // skapar en connection till db
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"."<br>----------------------------<br>"; 
    }
    // error hanterings
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    
    ?>