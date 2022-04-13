
<?php

require_once('./config.php');

$db = new mysqli("localhost", "root", "", "med");


$q = $db->prepare("SELECT * FROM staff");
if($q && $q->execute()) {
    
    $result = $q->get_result();
    $staffList = array();
    while($staff = $result->fetch_assoc()) {
        
        $staffId = $staff['id'];
        $firstName = $staff['firstName'];
        $lastName = $staff['lastName'];
        //echo "Lekarz $firstName $lastName<br>";
        array_push($staffList, $firstName." ".$lastName);
        $q = $db->prepare("SELECT * FROM appointment WHERE staff_id = ?");
        
        $q->bind_param("i", $staffId);
        if($q && $q->execute()) {
            
            $appointments = $q->get_result();
            $appointmentList = array();
            while($appointment = $appointments->fetch_assoc()) {
                
                $appointmentId = $appointment['id'];
                $appointmentDate = $appointment['date'];
                
                $appointmentTimestamp = strtotime($appointmentDate);
                $appointment = array("id" => $appointmentId "date" => $appointmentDate);
                array_push($appointmentList, $appointment);
                
                //echo "<a href=\"patientLogin.php?id=$appointmentId\" style=\"margin:10px; display:block\">";                
                //echo date("j.m H:i", $appointmentTimestamp);
                //echo "</a>";
            }
            $staffMember = array("firstName" => $firstName, "lastName" => $lastName,"appointmentList" => $appointmentList);
            array_push($staffList, $staffMember);
            //echo "<br>";
        } else {
            
            die("Błąd pobierania wizyt z bazy danych");
        }
    }
    $smarty->assign("staffList", $staffList);
    $smarty->display("index.tpl")
} else {
    
    die("Błąd pobierania lekarzy z bazy danych");
}
