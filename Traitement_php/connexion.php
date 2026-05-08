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
          
                 extract($_POST);//ceci permet de faire ce qui est en dessous pour chaque elts nom,prenom... une seule fois.
          
          //  echo $nom ; 
          //   echo $prenom = $_POST['prenom'];
        


   
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
                          echo  " <script>
                          alert('Bienvenue . !!!!  ');
                          </script>" ;
                        }
                    else
                      { 
                         header("Location: ../Pages/pagedacc.php");  }
        
                


                  echo  " <script>
                  alert('Bienvenue . !!!!  ');
                  </script>" ;
                       
                }
          else
          {
            echo  " <script>
            alert('Access  refuse, creer votre compte. !!!!  ');
            </script>" ;

            header("Location: ../Pages/Creation de compte.php");  
             
          }
            //  header("Location: pagedacc.html");

         

          exit();  
             }
              catch(PDOException $e)
                {
                     echo"Echec de lors de la verification  dans  la BD:".$e->getMessage() ;
                }

                echo "hello word" ; 

       
        }
    

   
    

       

?>
