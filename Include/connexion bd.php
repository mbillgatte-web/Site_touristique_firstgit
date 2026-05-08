

<?php


    $userserver = 'localhost';
    $username='root';
    $pwd= '';

    try
        { 
        //echo'bill';   
            $connexion= new PDO("mysql:host=localhost;dbname=voyage", $username , $pwd);
            $connexion->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION); 
        }catch(PDOException $e)
            {
                echo"Echec de la connexion a la BD:".$e->getMessage() ;
            }
  
        

?>
