<?php 
 if (session_status() === PHP_SESSION_NONE) {
    session_start();
} ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Css/fond3.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Mes reservations </title>
</head>

<?php
// Répertoire des images
$imageFolder = "../Image/bus/"; 
$images = glob($imageFolder . "*.{jpg,png,gif}", GLOB_BRACE); // Récupérer toutes les images du dossier


$totalImages = count($images);

// Index de l'image actuelle
$currentIndex = isset($_GET['image']) ? (int)$_GET['image'] : 0;
$currentIndex = ($currentIndex + $totalImages) % $totalImages; // Boucler sur les images

// Image actuelle
$currentImage = $images[$currentIndex];
?>










<style>
     

     @keyframes fadeIn {
      0% {
          opacity: 0;
          transform: translateY(20px);
      }
      100% {
          opacity: 1;
          transform: translateY(0);
      }
  }

  /* Conteneur global pour chaque enregistrement des tickets */
  .record {
      display: flex;
      justify-content: space-around; /* Répartition égale horizontale */
      margin-bottom: 20px;           /* Espace entre les enregistrements */
      border: 1px solid #ccc;
      border-radius: 8px;
      padding: 8px;
      background-color: rgba(229, 120, 241, 0.12);
      position: relative;
      overflow: hidden;
      border-bottom: 3px solid #28a745; 
      
      /* animation: fadeIn 0.8s ease-out forwards; */
  }

  .record:hover{
    background-color: rgba(235, 28, 235, 0.57);
    border-color: white ;
    position: relative;
    transform: translateY(-10px);
  
  }





 /* Pseudo-élément qui servira de contour animé */
 .record::before {
      content: "";
      position: absolute;
      top: -2px;
      left: -2px;
      right: -2px;
      bottom: -2px;
      /* Création d'un dégradé animé (vous pouvez ajuster les couleurs ici) */
      background: linear-gradient(90deg, #FF00CC, #333399, #FF00CC);
      background-size: 200% auto;  /* Permet de faire défiler le dégradé */
      z-index: -1;
      border-radius: inherit;  /* Pour que le pseudo-élément suive la forme du record */
      opacity: 0;  /* Masqué par défaut */
      transition: opacity 0.3s ease;
  }
  
  /* Au survol, on affiche le contour et on démarre l'animation */
  .record:hover::before {
      opacity: 1;
      animation: borderAnimation 2s linear infinite;
    
  }
  
  /* Animation qui défile la position du background pour créer l'effet de mouvement */
  @keyframes borderAnimation {
      from { background-position: 0% center; }
      to { background-position: 200% center; }
  }






 
  h2.trigger {
      height: 200px;
      margin: 0;
      line-height: 200px;
      text-align: center;
      font-size: 24px;
    }
  /* Classe activée pour lancer l'animation */
  .record.animate {
      animation: fadeIn 0.8s ease-out forwards;
  }


  /* Conteneur pour chaque champ : regroupe valeur et description en colonne */
  .field {
      display: flex;
      flex-direction: column;
      align-items: center;     
      margin: 0 20px;      
      width: 150px;  /* Permet à tous les champs d'avoir la même largeur */
     
  }

  /* Style de la valeur */
  .value {
      font-size: 1.1em;         /* Taille de police réduite */
      font-weight: bold;
      color: #333;
      margin-bottom: 3px;       /* Espace entre la valeur et la description */
      white-space: nowrap;   /* Empêche le retour à la ligne si le mot est trop long */
     
  }


  /* Style de la description */
  .label {
      font-size: 0.9em;
      color: #666;
      text-align: center;
  }




 /* Conteneur pour le bouton de statut et l'option annulation */
 .status-container {
      position: relative;
      display: inline-block;
  }


  /* Option d'annulation cachée par défaut */
  .cancel-option {
      position: absolute;
      top: 100%;
      left: 0;
      background: #fff;
      border: 1px solid #ccc;
      padding: 5px 10px;
      z-index: 10;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      display: none;
  }
  
  /* Bouton dans la zone d'annulation */
  .cancel-option .cancel-btn {
      border: none;
      background: none;
      color: #dc3545;
      cursor: pointer;
      font-weight: bold;
  }

  .status-button {
      font-size: 1.1em;
      font-weight: bold;
      color: #fff;
      border: none;
      border-radius: 4px;
      padding: 6px 7px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      white-space: nowrap;  
  }


 /* Bouton pour les statuts "Valide" */
  .status-accepté{
      background-color: #28a745;
  }
  .status-accepté:hover {
      background-color: #218838; /* Vert un peu plus sombre */
  }
 
  .status-en-attente {
      background-color: #ffc107; 
  }
  .status-en-attente:hover {
      background-color: #e0a800; /* Jaune plus foncé */
  }
  
  
  .status-refuse {
      background-color: #dc3545; 
  }
  .status-refuse:hover {
      background-color:rgb(144, 18, 30); /* Rouge sombre */
  }


  
  .status-terminé {
      background-color:rgb(41, 238, 235); 
  }
  .status-terminé:hover {
      background-color:rgb(13, 114, 119); 
  }



  .status-annule {
      background-color:rgba(0, 0, 0, 0.21); 
  }
  .status-annule:hover {
      background-color:rgb(0, 0, 0); 
  }





  section {
      padding: 60px 0;
    }
    h2 {
      font-weight: bold;
      color: #343a40;
    }
    /* Style pour les cartes de réservation */
    .card {
      transition: transform 0.3s, box-shadow 0.3s;
      border: none;
      border-radius: 12px;
      overflow: hidden;
      position: relative; /* Pour positionner le bouton like */
      background: #fff;
    }
    .card:hover {
      transform: scale(1.05);
      box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.2);
    }
    .card-img-top {
      display: block;
      width: 100%;
      height: auto;
      box-shadow: 10px 30px 50px rgba(0, 0, 0, 0.1);
    }
    /* Bouton Like en overlay sur l'image */
    .like-button {
      position: absolute;
      bottom: 15px;
      right: 15px;
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 50%;
      padding: 8px;
      cursor: pointer;
      transition: transform 0.2s ease;
    }
    .like-button:hover {
      transform: scale(1.1);
    }
    .like-button.liked i {
      color: #ff0606e0;
    }
    .card-title {
      font-size: 1.5rem;
      color: #343a40;
    }
    .btn-custom {
      background-color: #225dff;
      color: #fff;
      font-size: 1rem;
      border: none;
      transition: background-color 0.3s;
      margin-top: 10px;
    }
    .btn-custom:hover {
      background-color:#225dff;
    }



    .transition-text-container {
  max-width: 800px;      /* Largeur augmentée à 800px */
  margin: 40px auto;     /* Centre le bloc horizontalement avec un interstice vertical */
  padding: 20px;         /* Espacement intérieur pour plus de lisibilité */
  text-align: center;    /* Texte centré */
  background: #fafafa;   /* Fond clair */
  border-radius: 8px;    /* Bords arrondis */
  box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Légère ombre pour un effet de relief */
}

.transition-text {
  font-size: 1.2rem;     /* Taille de police confortable */
  color: #333;           /* Couleur du texte */
  line-height: 1.5;      /* Interligne pour une lecture aisée */
  margin: 0;
}


.zone {
      position: relative;       /* Contexte pour le positionnement absolu */
      width: 100%;
      height: 400px;            /* Hauteur personnalisable */
      overflow: hidden;         /* Masque les éléments dépassant la zone */
      background: #000;         /* Couleur de fallback */
    }
    .zone video {
      position: absolute;
      top: 50%;
      left: 50%;
      min-width: 100%;
      min-height: 100%;
      transform: translate(-50%, -50%);
      z-index: 1;              /* Place la vidéo derrière le contenu */
    }
    .zone .content {
      position: relative;
      z-index: 1;               /* Contenu au-dessus de la vidéo */
      color: #fff;
      text-align: center;
      padding: 20px;
      font-family: Arial, sans-serif;
    }


    </style>



<body>

<?php $page = "Mes reservations"  ; include('../Include/barre_de_navigation.php') ;  ?> <br> <br>


<!-- pour le boutton de theme et la sidebar -->
<?php include('../Include/SideBar.php') ;  ?> 






      <br><br><br><br><br>
      <div class="zone">
                <!-- Vidéo en arrière-plan -->
              
                <video autoplay muted src="../Image/pub.mp4" type="video/mp4">  
                 
                        Votre navigateur ne supporte pas la vidéo.
                </video>


                <!-- Contenu affiché par-dessus la vidéo -->
                <div class="content">
                        <h1  style = "color: white ">Bienvenue sur Touristique</h1>
                        <p>Planifiez mieux avec plus de 300 000 expériences de voyage proposées par nos partenaires.</p>
                </div>

               
      </div>



 <br> <br><br><br>


 

<h1>Vos reservation(s)</h1>
                                            <!-- Bloc de transition avant la présentation des réservations -->
                            <div class="transition-text-container">
                            <p class="transition-text">
                                <strong>Découvrez le récit de vos voyages</strong><br>
                                Vos réservations témoignent de votre passion pour l'aventure.<br>
                                Chaque escapade est un chapitre unique de votre histoire,<br>
                                et nous sommes fiers de vous accompagner dans cette belle aventure.<br>
                                Préparez-vous à revivre les moments forts de vos voyages réalisés avec Touristique.
                            </p>
                            </div>

    <h2 class="trigger">Ici</h2>
            <?php include('../Include/connexion bd.php') ;  ?>
 
        <?php 
        
                try{

           
              $x=   $_SESSION['id_user'];
                 $requete1 = $connexion->prepare("SELECT * from reservation where id_client = ? ");
                 $requete1->execute([$x]) ;
                 $resultat = $requete1->fetchAll() ;



                 if ($resultat != null)
                    {
                        $i = 0 ;
                        echo'<div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">';
  
                        foreach ($resultat as $index => $row) {
                                // Déterminer la classe en fonction du statut
                                $cssClass = '';
                                switch(trim($row["status"])) {
                                    case 'Accepté':
                                        $cssClass = 'status-accepté';
                                        break;
                                    case 'En attente de payement':
                                        $cssClass = 'status-en-attente';
                                        break;
                                    case 'Refusée':
                                        $cssClass = 'status-refuse';
                                        break;
                                    case 'Terminé':
                                        $cssClass = 'status-terminé';
                                        break;
                                   
                                    case 'Annulée':
                                        $cssClass = 'status-annule';
                                        break;

                                        
                                }

                                $allowCancellation = in_array(trim($row["status"]), ['Accepté', 'En attente de payement']);
                           echo '<div class="record" style="animation-delay: ' . ($index * 0.1) . 's;">';
                                       // echo '<div class="field">';
                                       //     echo '<div class="value">' . htmlspecialchars($row["id_reservation"]) . '</div>';
                                       //     echo '<div class="label">ID Reservation</div>';
                                       // echo '</div>';
       
                                       // echo '<div class="field">';
                                       //     echo '<div class="value">' . htmlspecialchars($row["id_client"]) . '</div>';
                                       //     echo '<div class="label">ID Client</div>';
                                       // echo '</div>';
       
                                       echo '<div class="field">';
                                           echo '<div class="value">' . htmlspecialchars($row["Depart"]) . '</div>';
                                           echo '<div class="label">Départ</div>';
                                       echo '</div>';
       
                                       echo '<div class="field">';
                                           echo '<div class="value">' . htmlspecialchars($row["Arrivé"]) . '</div>';
                                           echo '<div class="label">Arrivée</div>';
                                       echo '</div>';
       
                                       echo '<div class="field">';
                                           echo '<div class="value">' . htmlspecialchars($row["date_depart"]) . '</div>';
                                           echo '<div class="label">Date de départ</div>';
                                       echo '</div>';
       
                                       echo '<div class="field">';
                                           echo '<div class="value">' . htmlspecialchars($row["date_retour"]) . '</div>';
                                           echo '<div class="label">Date de retour</div>';
                                       echo '</div>';


                                       echo '<div class="field">';
                                            echo '<div class="value">' . htmlspecialchars($row["passager"]) . '</div>';
                                            echo '<div class="label">Nombre de places</div>';
                                       echo '</div>';
       
                                       echo '<div class="field">';
           // Conteneur pour le bouton de statut et l'option d'annulation
           echo '<div class="status-container">';
               echo '<button type="button" class="status-button ' . $cssClass . '" data-reservation-id="' . htmlspecialchars($row["id_reservation"]) . '">';
                   echo htmlspecialchars($row["status"]);
               echo '</button>';
               // Si l'annulation est autorisée, on affiche le menu déroulant d'annulation qui est caché par défaut
               if ($allowCancellation) {
                   echo '<div class="cancel-option">';
                       echo '<form id="monFormulaire" method="post" action="../Traitement_php/Annuler_reservation.php">';
                       echo' <input type="hidden" id="maVariableCachee" name="maVariable" value="">';
                       echo '<button type="submit" class="cancel-btn ">Annuler la réservation</button>';
                       echo'</form>';
                   echo '</div>';
               }
           echo '</div>';
           echo '<div class="label">Statut</div>';
       echo '</div>';
       
    echo '</div>';
   
                     
                       }
                       echo'</div>';
                    }
                else
                {
                     echo '<div class="record" style="animation-delay: 2s;">';

                     echo '<div class="field">';
                     echo '<div class="value">  <h2>Oups vous n\'avez effectuez aucune reservation 😞 </h2></div>';
                     echo '<div class="label"><a href="Reservation.php">Effecteur une reservation </a></div>';
                     echo '</div>';


                     echo '</div>';

                }

                
                }
                

       
    
                
                catch(PDOException $e)
                {
                     echo"Echec de lors de la recherche des tickets dans  la BD:".$e->getMessage() ;
                }
                
        
        
        ?> <br> <br>

        



<?php include('section_like.html') ;  ?> 








<br><br> <br>
<?php include('../Include/footer.php') ;  ?>


<?php include('../Include/Script_Theme.php') ;  ?>

<script>

// Récupération des éléments
const images = <?php echo json_encode($images); ?>; 
let currentIndex = <?php echo $currentIndex; ?>;

const buttons = document.querySelectorAll('.button-container a'); // Tous les boutons
const backgroundContainer = document.querySelector('.background-container'); // Conteneur principal

// Fonction pour changer d'image et mettre à jour les boutons
function changeImage(index) {
    currentIndex = index;
    // Mettre à jour l'image de fond
    backgroundContainer.style.backgroundImage = `url('${images[currentIndex]}')`;

    // Mettre à jour le bouton actif
    buttons.forEach((button, i) => {
        button.classList.toggle('active', i === currentIndex); // Ajoute ou retire la classe "active"
    });
}

// Défilement automatique des images
function autoSlide() {
    currentIndex = (currentIndex + 1) % images.length; // Boucle sur les images
    changeImage(currentIndex);
}

// Ajout d'événements de clic sur les boutons
buttons.forEach((button, index) => {
    button.addEventListener('click', () => {
        changeImage(index); // Synchroniser l'image avec le bouton cliqué
    });
});

// Défilement automatique toutes les 5 secondes
setInterval(autoSlide, 5000); // Change automatiquement d'image toutes les 5 secondes

// Initialisation de l'image
changeImage(currentIndex);


</script> 



<script>
 document.addEventListener("DOMContentLoaded", () => {
      // Sélectionnez le déclencheur ; ici la balise h2 avec la classe trigger
      const trigger = document.querySelector("h2.trigger");
      // Sélectionnez tous les éléments à animer
      const records = document.querySelectorAll(".record");
      
      // Fonction qui réinitialise et relance l'animation sur chaque record
      function resetRecordsAnimation() {
        console.log("Réinitialisation des animations");
        records.forEach((record, index) => {
          // Retirer la classe d'animation
          record.classList.remove("animate");
          // Forcer le reflow pour réinitialiser l'animation
          void record.offsetWidth;
          // Optionnel : définir un délai progressif
          record.style.animationDelay = `${index * 0.1}s`;
          // Réappliquer la classe d'animation
          record.classList.add("animate");
        });
      }
      
      // Créer un observer qui surveille l'intersection de l'élément déclencheur
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          console.log("Intersection Observer:", entry.isIntersecting);
          if (entry.isIntersecting) {
            // Lorsque le déclencheur est visible, réinitialiser l'animation
            resetRecordsAnimation();
          }
          // Vous pouvez aussi choisir de retirer l'animation quand le déclencheur n'est plus visible
          // else {
          //   records.forEach(record => record.classList.remove("animate"));
          // }
        });
      }, { threshold: 0.5 });  // Essayez de modifier le seuil si nécessaire
      
      if (trigger) {
        observer.observe(trigger);
      } else {
        console.error("Le déclencheur n'a pas été trouvé !");
      }
    });
</script>

<!-- 
///////////////////////////////////////////////// -->




<!-- //////////////////////////////////////////////////// -->


<script>
document.addEventListener("DOMContentLoaded", function() {
    // Gestion de l'affichage de la zone d'annulation
    const statusButtons = document.querySelectorAll('.status-button');
    statusButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.stopPropagation(); // empêcher la propagation pour éviter le clic sur le document
            // Trouver la zone d'annulation dans le conteneur
            const container = button.parentElement;
            const cancelOption = container.querySelector('.cancel-option');
            if (cancelOption) {
                // Alterne l'affichage de la zone d'annulation
                cancelOption.style.display = (cancelOption.style.display === "block") ? "none" : "block";
            }
        });
    });
    
    // Gestion du clic sur le bouton d'annulation
    const cancelButtons = document.querySelectorAll('.cancel-btn');
    cancelButtons.forEach(cancelBtn => {
        cancelBtn.addEventListener('click', function(event) {
            event.stopPropagation(); // ne pas fermer le container immédiatement
            if (confirm("Êtes-vous sûr de vouloir annuler la réservation ?")) {
                // Récupérer le conteneur principal et le bouton de statut associé
                const container = cancelBtn.closest('.status-container');
                const statusButton = container.querySelector('.status-button');
                // Mettre à jour le texte et la classe CSS pour indiquer l'annulation.
                statusButton.textContent = "Annulée";
                statusButton.title = "Cette reservation sera bientot supprimée";

                statusButton.className = "status-button status-annule";  // Vous pouvez utiliser ici la classe souhaitée pour annulation
                // Vous pouvez ici déclencher une requête AJAX pour mettre à jour la base de données.
                // Masquer la zone d'annulation

                 const reservationId = statusButton.getAttribute('data-reservation-id');
                // Vous pouvez maintenant utiliser reservationId pour la procédure d'annulation (par exemple, l'inclure dans une requête AJAX)
                
          
                document.getElementById('maVariableCachee').value = reservationId;
                
                container.querySelector('.cancel-option').style.display = "none";
                alert("La réservation a été annulée.");
            }
        });
    });
    
    // Masquer automatiquement la zone d'annulation si l'utilisateur clique ailleurs
    document.addEventListener('click', function(event) {
        document.querySelectorAll('.cancel-option').forEach(cancelOption => {
            cancelOption.style.display = "none";
        });
    });
});
</script>






</body>
</html>