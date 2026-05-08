<link href="../Css/fond1.css" rel="stylesheet" />
<link href="../Css/fond2.css" rel="stylesheet" />
<link href="../Css/fond3.css" rel="stylesheet" />


               <!-- barre de navi -->
               <nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid ps-2 pe-0">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href=" " title="Touristique " >
                    <img src="../Image/Vehicule/Touristique2.png" alt="Logo de mon site " style="width: 100px ;  height: 70px; ; border-radius: 10px; ">
           
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                 
        
              
                <li class="nav-item">
                <?php  if ( $page ===  "Page d'inscription" )  { echo '<a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="">' ; } 
                       else{echo'<a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="../Pages/pagedacc.php">';}  
                ?>
                <i class="bi bi-house-fill"></i>
                    <?php  if ( $page ===  "Page d'accueil" )
                             {
                              echo" <em style=\"text-decoration:underline;\" > Accueil</em> ";
                             }
                             else{echo "  Accueil";}
                    ?>
                   
                  </a>
                </li>




                
                <li class="nav-item">
                <?php  if ( $page ===  "Page d'inscription" )  { echo '<a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="">' ; } 
                       else{echo'<a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="../Pages/mes reservations.php">';}  
                ?>
                    <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                    <?php  if ( $page ===  "Mes reservations" )
                             {
                              echo" <em style=\"text-decoration:underline;\" > Mes reservations</em> ";
                             }
                             else{echo "Mes reservations";}
                    ?>
                   
                  </a>
                </li>
                
               
               <!-- nav pour creer compte si on est dans la page de creation de compte -->
                    <?php  if ( $page ===  "Page d'inscription" )
                             {
                             
                           echo "<li class=\"nav-item\">
                                  <a class=\"nav-link me-2\" href=\"\">
                                     <i class=\"fas fa-key opacity-6 text-dark me-1\"></i>
                                       <em style=\"text-decoration:underline;\" > Creer votre compte</em> 
                                  </a>
                                 
                                 </li> " ;

                             
                             }
                    
                    ?>
                    
                

                <li class="nav-item">
                  <a class="nav-link me-2" href="">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    Parametres
                  </a>
                </li>



              </ul>
              <ul class="navbar-nav d-lg-flex d-none">
                <li class="nav-item d-flex align-items-center">
                  <a class="btn btn-outline-primary btn-sm mb-0 me-2"  href="">Bonjour </a>
                </li>
                <li class="nav-item" id='openSidebar'>
                 <button  class="btn btn-sm mb-0 me-1 bg-gradient-dark">
                      <i class="bi bi-gear-fill"></i> 
                          Parametres
                 </button>
                
                </li>
              </ul>
            </div>
          </div>
        </nav>