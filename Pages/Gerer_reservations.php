<?php
// update_status.php
session_start();

$pdo = new PDO("mysql:host=localhost;dbname=voyage", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Afficher les erreurs pendant le développement (à désactiver en production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Spécifier le type de contenu de la réponse JSON
//header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer l'ID et le nouveau statut depuis le formulaire
    $id = $_POST['id'] ?? '';
    $newStatus = $_POST['status'] ?? '';
    
    if (!empty($id) && !empty($newStatus)) {
        try {
            // Préparation et exécution de la requête de mise à jour
            $stmt = $pdo->prepare("UPDATE reservation SET status = :status WHERE id_reservation = :id");
            if ($stmt->execute([':status' => $newStatus, ':id' => $id])) {
                // Vous pouvez rediriger l'utilisateur ou afficher un message
                header("Location: ../Dashboard/index.html");
                exit;
            } else {
                echo "Erreur lors de la mise à jour.";
            }
        } catch (PDOException $e) {
            echo "Erreur PDO : " . $e->getMessage();
        }
    } else {
        echo "Données manquantes.";
    }
} else {
   // echo "Méthode non autorisée.";
}
?>





<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération de la valeur choisie dans le formulaire
    $newStatus = $_POST['status'] ?? '';
    
    if (empty($newStatus)) {
        echo "Aucun statut fourni.";
        exit;
    }
    
    try {
        // Préparer la requête de mise à jour pour tous les enregistrements
        $stmt = $pdo->prepare("UPDATE reservation SET statut = :status");
        if ($stmt->execute([':status' => $newStatus])) {
            // Redirection vers la page d'affichage des réservations
            header("Location: ../Dashboard/index.html");
            echo '<script>    Alert("Mise à jour Enregistrée.");       </script>';
            exit;
        } else {
            echo "Erreur lors de la mise à jour des statuts.";
        }
    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
    }
} else {
   // echo "Méthode non autorisée.";
}
?>

  


<?php
// clients-ajax.php
// Démarrage de la session et inclusion de la connexion à la base de données

$stmt = $pdo->prepare(" select reservation.id_reservation , utilisateur.id, utilisateur.nom , reservation.Depart , reservation.Arrivé , reservation.date_depart , reservation.date_retour , reservation.passager , reservation.status from reservation inner join utilisateur on utilisateur.id = reservation.id_client  ");

// vue que j'ai creer pour rendre la requete plus courte 
// $stmt = $pdo->prepare("SELECT * FROM  liste_des_reservation ");

$stmt->execute();
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
     #reservationsBtn {
      transition: background-color 0.3s;
    }
    /* Style du bouton actif */
    #reservationsBtn.active-btn {
      background-color: #0a7ea1; /* Couleur active (vous pouvez changer cette couleur selon votre charte graphique) */
      color: #fff;
    }

    .table {
  table-layout: fixed; /* Permet d'assurer que les colonnes aient une largeur fixe */
}

th, td {
  word-wrap: break-word; /* Évite les dépassements de contenu */
}



 /* Appliquer no-wrap aux cellules pour éviter le retour à la ligne */
 table.table th,
    table.table td {
      white-space: nowrap;
      vertical-align: middle; /* Centre verticalement le contenu */
    }
    /* Optionnel : fixer une largeur minimale pour le conteneur responsive */
    .table-responsive {
      width: 1200px; /* Ajustez cette valeur selon la largeur totale souhaitée */
    }




</style>






<div class="container mt-4">
<div id="tableContainer">
<div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
<h1 class="text-center">Liste des Réservations</h1><br>



    <!-- Boutons de mise à jour globale sans fond, uniquement contours, et sur une même ligne -->
    <!-- Formulaire global regroupant tous les boutons -->
    <form action="../Pages/Gerer_reservations.php" method="post">
    <div class="d-flex justify-content-center align-items-center gap-3 mb-3">
        <button type="submit" name="status" value="Accepté" class="btn btn-outline-success" id="allConfirmedBtn">   
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm3.97-8.97-4.2 4.2a.75.75 0 0 1-1.06 0L4.03 8.03a.75.75 0 1 1 1.06-1.06l1.76 1.76 3.67-3.67a.75.75 0 1 1 1.06 1.06z"/>
          </svg> Tout Accepter
        </button>

        <button type="submit" name="status" value="Refusée" class="btn btn-outline-danger" id="allRefusedBtn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm3.354-9.354a.5.5 0 0 1 0 .708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 .708-.708L8 7.293l2.646-2.647a.5.5 0 0 1 .708 0z"/>
            </svg> Tout Refuser
       </button>

        <button type="submit" name="status" value="En attente de payement " class="btn btn-outline-warning" id="allPendingBtn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 3.5a.5.5 0 0 1 .5.5v4l3 1.5a.5.5 0 0 1-.5.866L8 8.5V4a.5.5 0 0 1 .5-.5z"/>
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm0-1A7 7 0 1 1 8 1a7 7 0 0 1 0 14z"/>
            </svg> Tout Mettre en attente
        </button>

        <button type="submit" name="status" value="Annulée" class="btn btn-outline-secondary" id="allCancelledBtn ">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm-3-7a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5A.5.5 0 0 1 5 8z"/>
            </svg> Tout Annuler
        </button>

        <button type="submit" name="status" value="Terminé" class="btn btn-outline-primary" id="allTerminatedBtn">
             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-fill-check" viewBox="0 0 16 16">
               <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.8 11.8 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7 7 0 0 0 1.048-.625 11.8 11.8 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.54 1.54 0 0 0-1.044-1.263 63 63 0 0 0-2.887-.87C9.843.266 8.69 0 8 0m2.146 5.146a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793z"/>
             </svg> Tout Terminer
        </button>
      </div>
    </form>




    <!-- Conteneur responsive pour le tableau -->
    <div class="table-responsive">
      <table class="table table-striped text-center">
        <thead>
          <tr>
            <th>ID</th>
            <th>ID_client</th>
            <th>Nom</th>
            <th>Ville de depart</th>
            <th>Destination</th>
            <th>Date de depart</th>
            <th>Date de retour</th>
            <th>Place(s)</th>
            <th>Statut</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($reservations as $reservation): ?>
            <tr>
              <td><?= htmlspecialchars($reservation['id_reservation']) ?></td>
              <td><?= htmlspecialchars($reservation['Id_utilisateur']) ?></td>
              <td><?= htmlspecialchars($reservation['nom']) ?></td>
              <td><?= htmlspecialchars($reservation['Depart']) ?></td>
              <td><?= htmlspecialchars($reservation['Arrivé']) ?></td>
              <td><?= htmlspecialchars($reservation['date_depart']) ?></td>
              <td><?= htmlspecialchars($reservation['date_retour']) ?></td>
              <td><?= htmlspecialchars($reservation['passager']) ?></td>
              <td>
                                        <?php 
                                            // Liste des options de statut proposées
                                            $status_options = array("Accepté", "Annulée", "En attente de payement","Refusée", "Terminé");
                                            // Statut récupéré depuis la base, déjà échappé via htmlspecialchars pour l'affichage
                                            $current_status = htmlspecialchars($reservation['status']);
                                        ?>
                                 <form action="../Pages/Gerer_reservations.php" method="POST">
                                        <!-- Dropdown pour le statut avec l'attribut data-reservation-id pour identifier l'enregistrement -->
                                <select name="status" class="form-select"  data-reservation-id="<?= htmlspecialchars($reservation['id_reservation']) ?>" onchange="this.form.submit()" >
                                        <!-- Option par défaut (actuelle) -->
                                        <option value="<?= $current_status ?>" selected><?= $current_status ?></option>
                                        <!-- Autres options proposées (sans doublon) -->
                                        <?php foreach ($status_options as $option): ?>
                                              <?php if ($option !== $current_status): ?>
                                                  <option value="<?= htmlspecialchars($option) ?>"><?= htmlspecialchars($option) ?></option>
                                              <?php endif; ?>
                                        <?php endforeach; ?>
                                </select>
                                <input type="hidden" name="id" value="<?= htmlspecialchars($reservation['id_reservation']) ?>">
                                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
</div>

</div>
</div>


<!-- 
<script>
  document.querySelectorAll('.status-select').forEach(function(selectElem) {
  selectElem.addEventListener('change', function() {
    // Récupère l'ID de la réservation depuis l'attribut data-reservation-id
    const reservationId = this.getAttribute('data-reservation-id');
    const newStatus = this.value;

                    // Envoi de la requête AJAX pour mettre à jour le statut
         fetch('Gerer_reservations.php', {
                method: 'POST',
                headers: {
                           'Content-Type': 'application/x-www-form-urlencoded'
                        },
                body: 'action=update_status&id=' + encodeURIComponent(reservationId) +
                        '&status=' + encodeURIComponent(newStatus)
                })
                  .then(response => response.json())
                  .then(data => {
                if (data.success) {
                    console.log('Le statut a été mis à jour avec succès.');
                } else {
                    console.error('Erreur lors de la mise à jour: ' + data.message);
                }
                })
                  .catch(error => {
                     console.error('Erreur réseau :', error);
         });

  });
});

</script>

   -->








<!-- 

   // JavaScript pour la mise à jour globale 
  <script>
    // Fonction qui envoie une requête AJAX pour mettre à jour tous les statuts
    function updateAllStatuses(newStatus) {
      fetch('../Pages/Gerer_reservations.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ status: newStatus })
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          Alert('Tous les statuts ont été mis à jour en "' + newStatus + '".');
          location.reload();
        } else {
          Alert('Erreur de mise à jour : ' + data.error);
        }
      })
      .catch(error => console.error('Erreur réseau :', error));
    }
    
    // Association des événements aux boutons globaux
    document.getElementById('allConfirmedBtn').addEventListener('click', () => updateAllStatuses('Accepté'));
    document.getElementById('allCancelledBtn').addEventListener('click', () => updateAllStatuses('Annulée'));
    document.getElementById('allPendingBtn').addEventListener('click', () => updateAllStatuses('En attente de payement'));
    document.getElementById('allRefusedBtn').addEventListener('click', () => updateAllStatuses('Refusée'));
    document.getElementById('allTerminatedBtn').addEventListener('click', () => updateAllStatuses('Terminé'));
    

  </script> -->

