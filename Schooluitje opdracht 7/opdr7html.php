<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Trip Participants</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
require_once "opdracht7.php";

$student1 = new Student("Piet", "Klas A", true, 80);
$student2 = new Student("Jan", "Klas B", false, 70);
$teacher1 = new Leraar("Mr. Peter", "Klas C", false);

$schooltripList = new SchooltripList();
$schooltripList->addParticipant($student1);
$schooltripList->addParticipant($student2);
$schooltripList->addParticipant($teacher1);


echo "<table>";
echo "<tr><th>Naam</th><th>Klas</th><th>Betaald</th><th>Role</th><th>Percentage</th></tr>";


foreach ($schooltripList->getParticipants() as $participant) {
    echo "<tr>";
    echo "<td>" . $participant->getName() . "</td>";
    echo "<td>" . $participant->getClass() . "</td>";
    echo "<td>" . ($participant->hasPaid() ? "Yes" : "No") . "</td>";
    echo "<td>" . $participant->role() . "</td>";
    if ($participant instanceof Student) {
        echo "<td>" . $participant->getPercentage() . "%</td>";
    } else {
        echo "<td>N/A</td>";
    }
    echo "</tr>";
}

// Einde van de tabel
echo "</table>";

?>

</body>
</html>
