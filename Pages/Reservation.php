<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <title>Page pour effectuer une reservation</title>
</head>



<style>
    
    /* État initial des sections à animer */
    .fade-in {
      opacity: 0;
      transform: translateY(20px);
      transition: opacity 0.5s ease-out, transform 0.5s ease-out;
    }
    /* Quand la section est active ("apparue") */
    .fade-in.appear {
      opacity: 1;
      transform: translateY(0);
   
    }



    
    .transition-text-container {
  max-width: 600px;      /* Pour éviter que le texte touche les bords */
  margin: 40px auto;     /* Centre le bloc horizontalement et ajoute un espacement vertical */
  padding: 20px;         /* Un bon padding pour aérer le contenu */
  text-align: center;    /* Centre le texte à l'intérieur */
  background: #fafafa;   /* Fond léger pour bien démarquer ce bloc */
  border-radius: 8px;    /* Bords arrondis pour une touche moderne */
  box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Légère ombre pour le relief */
}

.transition-text {
  font-size: 1.2rem;     /* Taille de police agréable */
  color: #333;           /* Couleur sobre et lisible */
  line-height: 1.5;
}
</style>

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

</style>

<body>

<?php $page = "reservation"  ; include('../Include/barre_de_navigation.php') ;  ?> <br> <br>

<?php include('../Include/SideBar.php') ;  ?> 



<div class="background-container" > 
      <div class="text-overlay">
            <h1 style = "color: white "> Effectuer votre reservation ici !! </h1>
      </div> 
                          <div class="button-container">

                                     <?php for ($i = 0; $i < $totalImages; $i++): ?>
                                            <a href="Reservation.php?image=<?php echo $i; ?>"  class="<?php echo $i === $currentIndex ? 'active' : ''; ?>"  title="Image <?php echo $i + 1; ?>"></a>
                                     <?php endfor; ?>
                            </div>   
 </div> <br><br><br>

        <div class="transition-text-container">
                <p class="transition-text fade-in">
                    <strong>Chaque réservation est une aventure unique.</strong><br>
                    Chez Touristique, nous croyons que chaque escapade écrit un nouveau chapitre de votre histoire,<br>
                    transformant vos rêves d'exploration en souvenirs inoubliables.<br>
                    Merci de voyager avec nous et de nous permettre de partager la magie de chaque voyage.
                </p>
        </div>


 <form action="../Traitement_php/T_reservation.php" method="POST" style= "width: 100%">

            <h1  style= "text-align: center" class="fade-in">Choissez votre ville de destination </h1>

       <div class="destination_fond fade-in">  
                

                    <div class="grid-container fade-in">
                            <?php
                                    $imageFolder2 = "../Image/Destination/"; // Chemin vers le dossier contenant les images
                                    $images2 = glob($imageFolder2 . "*.{jpg,png,gif}", GLOB_BRACE);

                                    
                                    foreach ($images2 as $img)
                                    {
                                            echo '<div class="grid-item">';
                                            $fileNameParts = explode('.', basename($img)); // Divise le nom du fichier
                                            echo '<div class="text-overlay">' . $fileNameParts[0] .  '</div>'; // Texte superposé
                                            echo '<div class="btn"><button  onclick="location.href="#les_dates" "type="button" class="bouton-action" data-valeur='. $fileNameParts[0] . ' name="destination" id="destination"   required ><a href="#les_dates"></a></button></div>';
                                            echo '<img src="' . $img . '" alt="Image">';
                                            echo '</div>';
                                    }
                                   echo' <input type="hidden" name="valeurBouton" id="valeurBouton">';

                            ?>
                    </div>

        </div> <br> <br><br> <br>
        
             <h1 id="les_dates" style="text-align: center ;  " class="fade-in">Date de depart et/ou  de retour  </h1>
    <div class="destination_fond fade-in"> 
            
                         <br><br>

        <div class="container1 fade-in">
                                <!-- Bloc 1 -->
                            <div class="block fade-in">
                                 <label for="Depart">Depart :</label>
                                    <input type="date" id="Depart" name="Depart" min=<?php echo date('Y-m-d'); ?>  required>
                            </div>


                                 <!-- Bloc 2 -->
                             <div class="block fade-in">
                                 <label for="Retour">Retour :</label>
                                     <input type="date" id="Retour" name="Retour"   min=<?php echo date('Y-m-d'); ?>>
                              </div>

                                 <!-- Bloc 2 -->
                             <div class="block fade-in">
                                 <label for="nbrepassager">Nombre de Passager  :</label>
                                     <input type="int" id="nbrepassager" name="nbrepassager"  required placeholder="1 passager minimum" >
                            </div> 

                               <!-- Bloc 2 -->
                            <div class="block fade-in">
                                 <label for="nbrepassager">Nom du Client:</label>
                                     <input type="int" id="client" name="client" placeholder="Votre nom ">
                            </div> 


                            

         </div><br><br>

         <button id="Confirmer" type='submit' name="Confirmer" value="Confirmer"  style="background-color:rgb(0, 0, 0) ; color: white ;border-radius:20px" >  Confirmer  </button><br><br>



    </div>  <br><br> <br><br>


 </form>







<?php include('../Include/footer.php') ;  ?>

<script>
        // Ajouter un gestionnaire d'événements pour les boutons
        const boutons = document.querySelectorAll('.bouton-action');
        const champCache = document.getElementById('valeurBouton');

        boutons.forEach(bouton => {
            bouton.addEventListener('click', () => {
                // Récupérer la valeur du bouton cliqué
                champCache.value = bouton.getAttribute('data-valeur');
            });
        });
    </script>


<!-- <script>
        // Sélectionner le bouton
        const bouton = document.getElementById('Confirmer');

        // Ajouter un événement de clic
        bouton.addEventListener('click', function() {
            // Afficher une alerte
            const dep = document.getElementById('Depart');

            if (dep != null )
            alert('Votre voyage a ete enregistré avec succées !!!!');

            // Rediriger vers une autre page après l'alerte
            window.location.href = "../pages/pagedacc.php"; // Remplacez par votre URL cible
        });
    </script> -->



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






<!-- animation pour faire apparaitre les element a l'ecran -->

<script>
 document.addEventListener("DOMContentLoaded", () => {
      const sections = document.querySelectorAll('.fade-in');
  
      // Configurer l'observer : ici, un seuil de 50% est exigé pour déclencher l'animation
      const observerOptions = {
        threshold: 0.5
      };
  
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            // Quand la section entre dans la zone de vue, on ajoute la classe "appear"
            entry.target.classList.add('appear');
          } else {
            // Quand elle sort de la zone, on retire la classe.
            // Ainsi, si l'utilisateur revient, l'animation sera redéclenchée.
            entry.target.classList.remove('appear');
          }
        });
      }, observerOptions);
  
      // Observer chaque section
      sections.forEach(section => observer.observe(section));
    });
</script>


<?php include('../Include/Script_Theme.php') ;  ?>

</body>
</html>