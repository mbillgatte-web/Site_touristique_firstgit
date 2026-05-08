
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="../css/fond1.css" rel="stylesheet" />
  <link href="../css/fond2.css" rel="stylesheet" />
 
  <title>Page de connexion</title>
  <style>
    /* Conteneur de la barre de chargement (masqué par défaut) */
    #loadingContainer {
      display: none;
      margin-top: 20px;
    }
    
    #loadingText {
      margin-bottom: 10px;
      font-size: 14px;
      color: #555;
    }
    
    /* Style de la barre de chargement */
    #loadingBarContainer {
      width: 100%;
      height: 8px;
      background-color: #e0e0e0;
      border-radius: 4px;
      overflow: hidden;
    }
    
    #loadingBar {
      width: 0;
      height: 100%;
      background: linear-gradient(90deg, #00c6ff, #0072ff);
    }
    
    /* Animation de remplissage de la barre sur 5 secondes */
    .animate-loading {
      animation: fillBar 5s linear forwards;
    }
    
    @keyframes fillBar {
      from { width: 0%; }
      to { width: 100%; }
    }
  </style>
</head>



<body class="bg-gray-200"  >
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        
        <!-- Navbar -->
        <?php  $page =  "Page de connexion " ; include('../Include/barre_de_navigation.php') ;    ?>
        <!-- End Navbar -->
      </div>
    </div>
  </div> <br><br>
  <main class="main-content mt-0">
    <div class="page-header align-items-start min-vh-100">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Connectez vous </h4>
                  <div class="row mt-3">
                    <div class="col-2 text-center ms-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-facebook text-white text-lg"></i>
                      </a>
                    </div>
                  
                  </div>
                </div>
              </div>
              <div class="card-body">
              <!-- method="POST" action="../Traitement_php/connexion.php" -->
                <form  method="POST" action="../Traitement_php/connexion.php"   id="loginForm">
                  <div class="input-group input-group-outline my-3">
                    
                    <input type="text" class="form-control"   id="nom_user"name="nom_user" placeholder="NOM: " required>


                  </div>
                  <div class="input-group input-group-outline mb-3">
                   
                    <input type="password" class="form-control" id="password" name="password"  placeholder="password: " required>
                  </div>
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Se souvenir de moi </label>
                  </div>
                  <div class="text-center">
                    <input type="reset"  class="btn  w-100 my-4 mb-2" value="EFFACER">
                    <input type="submit" value="Se Connecter" id="btnSeConnecter" class="btn bg-gradient-dark w-100 my-4 mb-2">
                    <input type="hidden" name="SeConnecter" value="true">
                  </div>
                 
                </form>


<!-- Élément de chargement -->
<div id="loadingContainer">
      <div id="loadingText">Vérification en cours...</div>
      <div id="loadingBarContainer">
        <div id="loadingBar"></div>
      </div>
    </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div class="copyright text-center text-sm text-white text-lg-start">
             
                © Realisé  <i class="fa fa-heart" aria-hidden="true"></i>par le groupe 1 pour l'agence de voyage Touristique 
                
              </div>
            </div>
           
          </div>
        </div>
      </footer>
    </div>
  </main>




  <script>
    // Écoute de la soumission du formulaire
    document.getElementById('loginForm').addEventListener('submit', function(e) {
      // Désactiver le bouton pour éviter plusieurs clics
      document.getElementById('btnSeConnecter').disabled = true;
      
      // Afficher le conteneur de chargement
      var loadingContainer = document.getElementById('loadingContainer');
      loadingContainer.style.display = 'block';
      
      // Lancer l'animation de la barre de chargement
      var loadingBar = document.getElementById('loadingBar');
      loadingBar.classList.add('animate-loading');
    });
  </script>











</body>

</html>