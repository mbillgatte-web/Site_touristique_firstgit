<?php
// clients-ajax.php
session_start();

$pdo = new PDO("mysql:host=localhost;dbname=voyage", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->prepare("SELECT * FROM utilisateur");
$stmt->execute();
$utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>





<?php
// traitement.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedOption = $_POST['selected_option'] ?? '';
    $id = $_POST['id'] ?? '';
    // Vous pouvez maintenant utiliser $selectedOption pour réaliser le traitement PHP voulu.
    // Par exemple :
    if ( $selectedOption !== 'Modifier')
     {
      $stmt = $pdo->prepare("UPDATE Utilisateur SET Statut = :status WHERE Id_utilisateur = :id");
      $stmt->execute([':status' =>  $selectedOption, ':id' => $id]);

    } 
    
  else
   {
    // Traiter l'option 2
   }
    // Rediriger ou afficher un résultat
    header("Location: ../Dashboard/index.html");
    exit;
} else {
    echo "Méthode non autorisée.";
}
?>









<style>
     /* Le conteneur qui englobe la table doit être positionné en relative */
     .tableContainer {
      border: 1px solid #ccc;
      padding: 15px;
      margin-bottom: 15px;
    }
    /* Le bouton sera positionné absolument par rapport au conteneur */
    .action-btn {
      position: absolute;
      /* Ajustez "top" pour qu'il soit aligné verticalement (exemple : au niveau de la première ligne ou de l'en-tête) */
      top: 10px;
      /* Ajustez "right" pour qu'il s'aligne avec la colonne Actions, 
         ici on suppose qu’elle se trouve vers la droite de la table */
      right: 20px;
      z-index: 10; /* Assurer la visibilité au-dessus du tableau */
    }

       /* Style normal du bouton (on peut utiliser Bootstrap btn-success) */
       #clientsBtn {
      transition: background-color 0.3s;
    }
    /* Style du bouton actif */
    #clientsBtn.active-btn {
      background-color: #0a7ea1; /* Couleur active (vous pouvez changer cette couleur selon votre charte graphique) */
      color: #fff;
    }
 

 
</style>






<div class="container mt-4">
<div id="tableContainer">
<div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">

<h1 style="text-align: center">Liste des Clients</h1><br>
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nom</th>
      <th>Prenom</th>
      <th>numero_telephone</th>
      <th>PWD</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($utilisateurs as $utilisateur): ?>
      <tr>
        <td><?= htmlspecialchars($utilisateur['Id_utilisateur']) ?></td>
        <td><?= htmlspecialchars($utilisateur['nom']) ?></td>
        <td><?= htmlspecialchars($utilisateur['prenom']) ?></td>
        <td><?= htmlspecialchars($utilisateur['numero_telephone']) ?></td>
        <td><?= htmlspecialchars($utilisateur['PWD']) ?></td>
        
        <td>
                 <?php 
                     // Liste des options de statut proposées
                    $status_options = array("Activé", "Desactivé", "Supprimer","Modifier");
                                            // Statut récupéré depuis la base, déjà échappé via htmlspecialchars pour l'affichage
                    $current_status = htmlspecialchars($utilisateur['Statut']);
                ?>
              <form action="../Pages/Gerer_user.php" method="POST" >

                  
                       <!-- Dropdown pour choisir l'action -->
                          <select name="selected_option" class="form-select" onchange="this.form.submit()">
                            <!-- Option par défaut (actuelle) -->
                                    <option value="<?= $current_status ?>" selected><?= $current_status ?></option>
                                        <!-- Autres options proposées (sans doublon) -->
                                        <?php foreach ($status_options as $option): ?>
                                        <?php if ($option !== $current_status): ?>
                                            <option value="<?= htmlspecialchars($option) ?>"><?= htmlspecialchars($option) ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                          </select>
                   
                  <input type="hidden" name="id" value="<?= htmlspecialchars($utilisateur['Id_utilisateur']) ?>">
              </form>
         </td>
            
 
        
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
</div>



  
  <script>

  </script>
  
  

  
  

 