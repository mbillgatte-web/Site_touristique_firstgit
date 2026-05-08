<?php session_start();  ?>


<?php

    $userserver = 'localhost';
    $username='root';
    $pwd= '';


    
    try
        {   
            $connexion= new PDO("mysql:host=localhost;dbname=voyage", $username , $pwd);
            $connexion->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e)
            {
                echo"Echec de la connexion a la BD:".$e->getMessage() ;
            }

           
          
            if(isset($_POST['maVariable'])) {
                $reservationId = $_POST['maVariable'];
               
                                   
                             $x=   $_SESSION['id_user'];
                              // Mise à jour du statut dans la base de données
                              $requete = $connexion->prepare("UPDATE reservation SET status = 'Annulée' WHERE id_reservation = ? AND id_client=?");
                              $requete->execute([$reservationId,$x]);
                                        
                              header("Location: ../Pages/mes reservations.php");                  
                                    
                                
             } else
                {
                   echo 'Identifiant de réservation non transmis.';
                }



        
         
          
        
            
        





?>
