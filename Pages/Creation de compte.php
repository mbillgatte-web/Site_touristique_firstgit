<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="fich_style.css"> -->
    <!-- <link href="../Assets/Css/nucleo-icons.css" rel="stylesheet" /> -->
  <link href="../Css/fond1.css" rel="stylesheet" />
  <link href="../Css/fond2.css?" rel="stylesheet" />
    <title>Page d'inscription </title>
</head>


<body>

          <!-- <h1 class="contenu">BARBILLARD  ELECTRONIQUE</h1>

  
            <a href="pagedacc" >ACCUEIL  </a>
            <a href="Ajouter_Annonce.html">  |   AJOUTER UNE ANNONCE        |</a>
<a href="modifier.html">   | MODIFIER UNE ANNONCE | </a>
<a href="Page de'ajout d'utilisateur.php" class="pageactuel"> USERS</a><br><br><br><br>
  -->






  
       <!-- Navbar -->
       <?php   $page =  "Page d'inscription" ;  include('../Include/barre_de_navigation.php') ?>

       
      
        <!-- End Navbar -->

        <main class="main-content  mt-0" style="width: 5000px;">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">User  </h4>
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

              <form  method="POST" action="../Traitement_php/creer_compte .php">

<fieldset >

    

         <div class="input-group input-group-outline my-3">
         <input type="text" id="nom"name="nom" placeholder='Le nom:' class="form-control"  >
         </div>

         <div class="input-group input-group-outline mb-3">
         <input type="text" id="prenom" name="prenom" placeholder='Le prenom:' class="form-control"  >
         </div>

         <div class="input-group input-group-outline mb-3">
         <input type="number" id="tel" name="tel" placeholder='Numero de telephone 📞:'  class="form-control"  >
         </div>

         <div class="input-group input-group-outline mb-3">
         <input type="password"  class="form-control"  id="password" name="password" placeholder='Mots de passe🔐:'required> 
         </div>

         <div class="text-center">
         <input type="reset"  class="btn  w-100 my-4 mb-2" value="EFFACER">
         <input type="submit" value="Envoyer" name ="Envoyer"  class="btn bg-gradient-dark w-100 my-4 mb-2">
         </div>

</fieldset>
 
</form>


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
             
                © Realisé  <i class="fa fa-heart" aria-hidden="true"></i>par le groupe 1  pour l'agence de voyage TOURISTIQUE
                
              </div>
            </div>
           
          </div>
        </div>
      </footer>
    </div>
  </main>
          
           

</body>
</html>







