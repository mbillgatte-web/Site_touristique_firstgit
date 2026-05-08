<?php
session_start();
 ?>


<?php

    $userserver = 'localhost';
    $username='root';
    $pwd= '';


    global $cli ;
    try
        {
            $connexion= new PDO("mysql:host=localhost;dbname=voyage", $username , $pwd);
            $connexion->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e)
            {
                echo"Echec de la connexion a la BD:".$e->getMessage() ;
            }

  

    if(isset($_POST['Confirmer']))
        {
                 extract($_POST);//ceci permet de faire ce qui est en dessous pour chaque elts nom,prenom... une seule fois.
           
           
         try
            {

              
               
 


          global $destination ;
         
           if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               // Récupérer la valeur transmise
               $valeurBouton = isset($_POST['valeurBouton']) ? $_POST['valeurBouton'] : 'Aucune valeur reçue';
              // echo "Valeur du bouton : " . htmlspecialchars($valeurBouton);
              $destination = $valeurBouton ;



           }
         
           
                      


                            if ($destination != null  )
                            {

                            
                                            $idclient =  $_SESSION['id_user'];

                                            $lieudepart = 'YAOUNDE'; 
                                            $requete2 = $connexion->prepare("INSERT INTO reservation ( id_client , Depart , Arrivé , date_depart , date_retour , passager ) values (?,?,?,?,?,?) ");
                                            $requete2->execute([$idclient,$lieudepart, $destination,$Depart, $Retour , $nbrepassager ]) ;
                                        
                                            header("Location: ../Pages/pagedacc.php");  
                                

                            }

                              else 
                                {
                                     echo  " <script>
                                      alert('   Une erreur s'est  produite  !!!!  Veillez  remplire tout les champs  ');
                                      <script> " ;
                                            
                            
                                 }


                  






                    

          exit();  
             }
              catch(PDOException $e)
                {
                     echo"Echec de lors de l'insertion dans  la BD:".$e->getMessage() ;
                }


              
       
        }
    

        





?>
