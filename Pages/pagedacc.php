<?php session_start(); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="../css/fond1.css" rel="stylesheet" />
    <link href="../css/fond2.css?" rel="stylesheet" /> -->
    <link href="../css/fond3.css" rel="stylesheet" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Page d'accueil </title>

</head>


<style>
     /* Bouton Like en overlay sur l'image */
     .like-button {
      position: absolute;
      bottom: 15px;
      right: 15px;
      border-radius: 15%;
      padding: 8px;
      cursor: pointer;
      transition: transform 0.2s ease;
      background-color: white ;
    }
    .like-button:hover {
      transform: scale(1.1);
    }
    .like-button.liked i {
      color: #ff0606e0;
    }
    
     

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
</style>



<?php
// Répertoire des images
$imageFolder = "../Image/Fonds/"; 
$images = glob($imageFolder . "*.{jpg,png,gif}", GLOB_BRACE); // Récupérer toutes les images du dossier


$totalImages = count($images);

// Index de l'image actuelle
$currentIndex = isset($_GET['image']) ? (int)$_GET['image'] : 0;
$currentIndex = ($currentIndex + $totalImages) % $totalImages; // Boucler sur les images

// Image actuelle
$currentImage = $images[$currentIndex];
?>


<body > 
  <!-- barre de navigation importer depuis un autre fichier pour ne plus avoir a l'exrire plusieur fois -->
  <?php $page = "Page d'accueil"  ; include('../Include/barre_de_navigation.php') ;  ?>

<!-- pour le boutton de theme et la sidebar -->
<?php include('../Include/SideBar.php') ;  ?> 
  




    
    <br>
 <!-- Conteneur d'image -->
 <div class="background-container"> 
      <div class="text-overlay">
            <h1 style = "color: white "> Bonjour  <?php echo $_SESSION['nom'] ; ?> !! </h1>
              <p>Planifiez mieux avec plus de 300 000 expériences de voyage proposées par nos partenaires.</p>
              <div class="animated-element">  <a href="Reservation.php" title="Page pour effectuer une reservation " style="color: white">Planifier votre Voyage</a> </div> 
                     
                                                                                            <!-- <div class="transition-overlay"></div>
                                                                                            <div class="content">
                                                                                            <h1>Bienvenue</h1>
                                                                                            <p>Ceci est une transition stylée.</p>
                                                                                            </div> -->
      </div> <br><br>
      <!-- Boutons de navigation ronds -->
        <div class="button-container">

             <?php for ($i = 0; $i < $totalImages; $i++): ?>
                  <a href="pagedacc.php?image=<?php echo $i; ?>"  class="<?php echo $i === $currentIndex ? 'active' : ''; ?>"  title="Image <?php echo $i + 1; ?>"></a>
             <?php endfor; ?>
        </div>


        
 </div>  <br> <br>


        <h1>Pourquoi réserver sur notre plateforme </h1>
        <p>Coder par Bill pour touristique </p>


   

 <div class="loader"></div>
  <p>Chargement...</p>
</div>








 <div class="gallery-container  fade-in">
       
        <div class="gallery-item fade-in">
            <h1>🕖</h1>
            <h5>Assistance 24 h/24, 7 j/7</h5>

            <p>Quel que soit le fuseau horaire, nous sommes là pour vous aider.</p>
        </div>
      
        <div class="gallery-item fade-in">
            <h1>🎁</h1>
            <h5>Gagnez des récompenses </h5>
            <p>Explorez, gagnez des récompenses, utilisez-les avec notre programme de fidélité, et recommencez.</p>
        </div>
       
        <div class="gallery-item fade-in">
            <h1> 🗓️</h1>
            <h5>Planifiez selon vos envies</h5>
            <p>Restez flexible avec l'annulation gratuite et l'option Réservez maintenant et payez plus tard sans frais supplémentaires.</p>
        </div>

        <div class="gallery-item fade-in">
            <h1> ⭐</h1>
            <h5>Des millions d'avis</h5>
            <p>Planifiez et réservez en toute confiance grâce aux avis des autres voyageurs.</p>
        </div>
 </div>



        <h1>Destinations favorites </h1>
       

        <div class="grid-container fade-in">
                 <?php
                         $imageFolder2 = "../Image/Destination/"; // Chemin vers le dossier contenant les images
                         $images2 = glob($imageFolder2 . "*.{jpg,png,gif}", GLOB_BRACE);

                            foreach ($images2 as $img)
                             {
                                     echo '<div class="grid-item">';
                                     $fileNameParts = explode('.', basename($img)); // Divise le nom du fichier
                                     echo '<div class="text-overlay">' . $fileNameParts[0] .  '</div>'; // Texte superposé
                                     echo '<img src="' . $img . '" alt="Image">';
        
                                     echo '</div>';
                             }


                   ?>

        </div><br> <br>





        <div class="intervalle fade-in">

            <h1>Annulation gratuite </h1>
            <p>Vous recevrez un remboursement intégral pour la plupart des expériences si vous annulez au moins 24 heures avant.</p>


        </div><br> 
    
    
    



       
    
        <h1>Meilleurs attractions </h1><br>
        <p>Échappez à l’ordinaire et laissez-vous emporter vers des destinations où chaque instant devient une aventure inoubliable. Que vous rêviez de plages dorées caressées par des vagues cristallines, de forêts luxuriantes peuplées de murmures mystérieux ou de villes vibrantes où culture et modernité se rencontrent, nous avons tout ce qu’il faut pour éveiller votre soif de découverte.</p>
        <br>

        


      
    <!-- <div class="image-grid">
            <?php          
            // recuperations des images 
                     //   $imageFolder = "../Image/";
                      //  $images = glob($imageFolder . "*.{jpg,png,gif}", GLOB_BRACE);
          //   echo"<marquee behavior=\"scroll\" direction=\"left\"> " ;
            
                    //  foreach ($images as $img) 
                    //     {  
                    //           echo '   <div class="image-item">  ';
                    //           echo ' <img src="' . $img . '" alt="Image"> ';
                    //           echo '<p>' . basename($img) . '</p>'; 
                    //           echo '</div> ';
                    //     } 
          
        //    echo" </marquee> ";
            
            ?>

    </div> -->


<!-- la meme chose que ce qui est en haut mais en manipullant les images moi meme de facon manuelle  -->
    
    <div class="image-grid fade-in">
   
                <div class="image-item">  
                     <img src="../Image/Destination/Adamaoua.jpg " alt="Image">  
                     <h3>Adamaoua</h3>
                    <p>500 visites
                      
                    <div class="like-button" onclick="toggleLike(this)">
                        <i class="bi bi-heart"></i>
                    </div>
                      
                     </p>
                     
                </div> 

                <div class="image-item">  
                     <img src="../Image/Destination/Hilton.jpg " alt="Image"> 
                     <h3>Hilton</h3> 
                    <p>1200 visites  
                    <div class="like-button" onclick="toggleLike(this)">
                        <i class="bi bi-heart"></i>
                    </div>
                    </p>
                   
                </div> 

                <div class="image-item">  
                     <img src="../Image/Destination/Musée_Bamoun.jpg " alt="Image">
                     <h3>Musée de Bamoun</h3>  
                    <p>800 visites 
                    <div class="like-button" onclick="toggleLike(this)">
                        <i class="bi bi-heart"></i>
                    </div>
                      
                    </p>
                  
                </div> 

                <div class="image-item">  
                     <img src="../Image/Fonds/Plage2.jpg " alt="Image">  
                     <h3>Limbée</h3>
                    <p>1000 visites 
                    <div class="like-button" onclick="toggleLike(this)">
                        <i class="bi bi-heart"></i>
                    </div>
                    </p>
                   
                </div> 

                <div class="image-item">  
                     <img src="../Image/Destination/kribi.jpg " alt="Image">  
                     <h3>Kribi</h3>
                    <p>5800 visites 
                    <div class="like-button" onclick="toggleLike(this)">
                        <i class="bi bi-heart"></i>
                    </div>
                    </p>
                
                    
                </div> 

                <div class="image-item">  
                     <img src="../Image/Destination/Yaounde .jpg " alt="Image">  
                     <h4>Monument de la reunification</h>
                    <p>2000 visites 
                    <div class="like-button" onclick="toggleLike(this)">
                        <i class="bi bi-heart"></i>
                    </div>
                    </p>
                   
                </div> 
 
               
     
    </div>  <br> <br> <br> <br>

    <!-- fin -->
    <div class="intervalle fade-in" >

         <h1> Merci et aurevoir  </h1>
        <p> Cette page vous a-t-elle été utile ?</p>
    </div><br> 




    <?php include('../Include/footer.php') ;  ?>

   
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




    <!-- Inclusion du bundle Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Script pour le bouton Like -->
  <script>
    function toggleLike(button) {
      button.classList.toggle('liked');
      var icon = button.querySelector('i');
      if (button.classList.contains('liked')) {
        icon.classList.remove('bi-heart');
        icon.classList.add('bi-heart-fill');
      } else {
        icon.classList.remove('bi-heart-fill');
        icon.classList.add('bi-heart');
      }
    }
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