<?php

$db = new mysqli("localhost", "root", "", "med");

$q = $db->prepare("SELECT * FROM staff");
if ($q && $q->execute()) {
    $result = $q->get_result();
    while ($staff = $result->fetch_assoc()) {
        $staffId = $staff['id'];
        $firstName = $staff['firstName'];
        $lastName = $staff['lastName'];
        echo "Lekarz $firstName $lastName<br>";
        $q = $db->prepare("SELECT * FROM appointment WHERE staff_id = ?");
        $q->bind_param("i", $staffId);
        if ($q && $q->execute()) {
            $appointments = $q->get_result();
            while ($appointment = $appointments->fetch_assoc()) {
                $appointmentsId = $appointment['id'];
                $appointmentDate = $appointment['date'];
                $appointmentTimeStamp = strtotime($appointmentDate);
                echo "<a href=\"appointment.phpstyle=\"margin:10px; display: \">";
                echo date("j.m H:i", $appointmentTimeStamp);
                echo "</a>";
            }
            echo "<br>";
        } else {
            die("Błąd pobierania z bazy danych");
        }
    }
} else {

    die("Błąd pobierania z bazy danych");
}
?>