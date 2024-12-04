<?php
include 'db.php';

$sql = "SELECT r.date_reservation, r.nom_utilisateur, s.nom AS salle
        FROM reservations r
        JOIN salles s ON r.salle_id = s.id
        ORDER BY r.date_reservation";
$result = $conn->query($sql);

$reservations_rows = '';
while ($row = $result->fetch_assoc()) {
    $reservations_rows .= "<tr>
        <td>" . htmlspecialchars($row['salle']) . "</td>
        <td>" . htmlspecialchars($row['date_reservation']) . "</td>
        <td>" . htmlspecialchars($row['nom_utilisateur']) . "</td>
    </tr>";
}

$html = file_get_contents('../html/reservations_list.html');

echo $html;
?>
