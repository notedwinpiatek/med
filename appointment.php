<?php

$db = new mysqli("localhost", "root", "", "med");
$appointmentId = $_REQUEST['id'];
$q = $db->prepare("SELECT * FROM appointment WHERE  id = ?");
if($q && $q->execute()) {
    $appointment = $q->get_result()->fetch_assoc();
    $appointmentDate = $appointment['date'];
    $appointmentTimestamp = strtotime($appointmentDate);
    echo "Zapisz na wizytę w terminie ".date("j.m H:i", $appointmentTimeStamp);
}
if(isset($_REQUEST['firstName']) && isset($_REQUEST['lastName'])
        && $_REQUEST['phone']) {
            //zapis na wizytę
            $q->prepare("INSERT INTO pacjent VALUES (NULL, ?, ?, ?");
            $q->bind_param("sss", $_REQUEST['firstname'], $_REQUEST['lastName'], $_REQUEST['phone']);
            $q->execute();
            $patientId = $db->insert_id;
            $q->prepare("INSERT INTO ")
        }
?>

<form action="appointment.php">
    Imię: <input type="text" name="firstName">
    Nazwisko: <input type="text" name="lastName">
    Telefon: <input type="text" name="phone">
    <input type="hidden" value="<?php echo $appointmentId ?>" name="id">
    <input type="submit" value="Zapisz wizytę">
</form>