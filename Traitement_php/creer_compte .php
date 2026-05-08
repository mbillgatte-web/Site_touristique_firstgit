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

  

    if(isset($_POST['Envoyer']))
        {
                 extract($_POST);//ceci permet de faire ce qui est en dessous pour chaque elts nom,prenom... une seule fois.
            // $nom = $_POST['nom'];
            //    $nom = $_POST['nom'];
            //    $prenom = $_POST['prenom'];
            //    $tel = $_POST['tel'];
            //    $password = $_POST['password'];
         try
            {
                //  $nom = 'bill' ;
                //  $prenom ='gates';
                //  $tel = 8525589;
                //  $password ='1234';

            //     $requete = $connexion->prepare("SELECT  * from users");

            //     $requete->execute();
            //     $resultat = $requete->fetchall() ;
            //     $i = $resultat[0][0] ; 
            //    $i++ ; 
            //     echo '<pre>';
            //     print_r($i);
            //     echo '</pre>';

              
               
                

            $requete = $connexion->prepare("INSERT INTO utilisateur  ( nom , prenom , numero_telephone  ,pwd) VALUES(?,?,?,?)");

        //     $requete->bindParam(":nom",$nom);
        //     $requete->bindParam(":prenom",$prenom);
        //     $requete->bindParam(":tel",$tel);
        //     $requete->bindParam(":password",$password);

        //       
        //          $tel = 8525589;
        //          $password ='1234';
           
           $requete->execute([$nom,$prenom,$tel,$password]) ;
           
      
        
           header("Location: ../Pages/page de connexion.php ");
          echo  " <script>
          alert('votre compte a ete creé avec succes !!!! ');
         </script>" ;

       

          exit();  
             }
              catch(PDOException $e)
                {
                     echo"Echec de lors de l'insertion dans  la BD:".$e->getMessage() ;
                }


              
       
        }
    

        





?>
