<?php
session_start();
/*Vi avsluta r sessi onen  och skickar tillbaka användare till start sidan*/
session_destroy();

header("location:index.php");

?> 