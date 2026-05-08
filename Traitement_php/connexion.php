<?php
session_start();

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
  
    if(isset($_POST['SeConnecter']))
        {    
            // Récupération explicite des variables (évite extract qui est dangereux)
            $nom_user = isset($_POST['nom_user']) ? $_POST['nom_user'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
        


   
         try
            {
             
           
          
              
            $requete = $connexion->prepare("SELECT * FROM utilisateur where nom = ? and pwd = ? ");
 
            $requete->execute([$nom_user,$password]) ;
            $resultat = $requete->fetch() ;
           
        


           

            if ($resultat != null)
                {    
                  $_SESSION['nom']= $resultat['nom'];
                  $_SESSION['prenom']= $resultat['prenom'];
                  $_SESSION['password']= $resultat['pwd'];
                  $_SESSION['id_user']= $resultat['id'];

                   if ( $resultat['nom']== 'Admin' )
                        {
                          header("Location: ../Dashboard/index.html");
                          exit();
                        }
                    else
                      { 
                          header("Location: ../Pages/pagedacc.php");  
                          exit();
                      }
                }
            else
                {
                    // Utilisateur non trouvé, rediriger vers la création de compte ou afficher une erreur
                    header("Location: ../Pages/Creation de compte.php");  
                    exit();
                }
             }
              catch(PDOException $e)
                {
                     echo "Echec de lors de la verification  dans  la BD:".$e->getMessage() ;
                }
        }
    

   
    

       

?>
