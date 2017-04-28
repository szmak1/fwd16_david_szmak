<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Knifes</title>
    </head>
    <body>
        <?php 
          
            require_once ("subClasses.php");
             //skapa  objekt av klassen theInterceptor
            $Viggen = new theInterceptor(6, "Viggen", 2000, 3500, 6000);
            print_r($Viggen->texaco()."<br><br>");
           
            aircraft::stat();
            //skapa objekt av theBomber
            $B52 = new theBomber(40, "B52", 900, 15000, 20000);
            
            //våra objekt från  de två aircraft
            
            echo "<pre>".print_r($Viggen, TRUE)."</pre>";
            echo "<pre>".print_r($B52, TRUE)."</pre>";
            
         ?>
    </body>
</html>
 