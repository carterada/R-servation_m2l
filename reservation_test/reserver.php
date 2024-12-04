<?php
include 'db.php';

$salle_id = $_POST['salle_id'];
$date_reservation = $_POST['date_reservation'];
$nom_utilisateur = $_POST['nom_utilisateur'];

$sql = "SELECT * FROM reservations WHERE salle_id = ? AND date_reservation = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $salle_id, $date_reservation);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "La salle est déjà réservée à cette date. <a href='../html/reservation_form.html'>Retour</a>";
} else {
    $sql = "INSERT INTO reservations (salle_id, date_reservation, nom_utilisateur) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $salle_id, $date_reservation, $nom_utilisateur);

    if ($stmt->execute()) {
        echo "Réservation effectuée avec succès ! <a href='../html/reservation_form.html'>Retour</a>";
    } else {
        echo "Erreur lors de la réservation : " . $conn->error;
    }
}
?>
