<?php

$db = new mysqli("localhost", "root", "", "med");

$q = $db->prepare("SELECT * FROM staff");
if($q->execute()){
    $result = $q->get_result();
    while($row = $result->fetch_assoc()){
        $id = $row['id'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        echo "Lekarz $firstName $lastName<br>";
    }
} else {

    die("Błąd pobierania z bazy danych");
}

?>