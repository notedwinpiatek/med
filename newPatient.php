<<<<<<< HEAD
<?php
if(isset($_REQUEST['firstName']) && isset($_REQUEST['lastName'])){

    $db = new mysqli("localhost", "root", "", "med");
    $q = $db->prepare("INSERT INTO patient VALUES (NULL, ?, ?, ? , ?)");
    $q->bind_param("ssss", $_REQUEST['firstName'], $_REQUEST['lastName'],
                            $_REQUEST['phone'], $_REQUEST['pesel']);
    if($q->execute()) {
        echo "Pacjent dodany do bazy";
    }


}else {
    echo '
    <form action="newPatient.php" method="post">
    <label for="firstName">Imię:</label>
    <input type="text" name="firstName" id="firstName">
    <label for="lastName">Nazwisko:</label>
    <input type="text" name="lastName" id="lastName">
    <label for="phone">Numer telefonu:</label>
    <input type="text" name="phone" id="phone">
    <label for="pesel">Numer PESEL</label>
    <input type="text" name="pesel" id="pesel">
    <input type="submit" value="Zapisz">
    </form>
    ';
}

?>


=======
<?php
if(isset($_REQUEST['firstName']) && isset($_REQUEST['lastName'])) {
    $db = new mysqli("localhost", "root", "", "med");
    $q = $db->prepare("INSERT INTO patient VALUES (NULL, ?, ?, ?, ?)");
    $q->bind_param("ssss", $_REQUEST['firstName'], $_REQUEST['lastName'], 
                            $_REQUEST['phone'], $_REQUEST['pesel']);
    if($q->execute()) {
    echo "Pacjent dodany do systemu!";
    }
} else {
    echo '
    <form action="newPatient.php" method="post">
    <label for="firstName">Imię</label>
    <input type="text" name="firstName" id="firstName">
    <label for="lastName">Nazwisko</label>
    <input type="text"  name="lastName" id="lastName">
    <label for="phone">Numer telefonu</label>
    <input type="text" name="phone" id="phone">
    <label for="pesel">Numer PESEL</label>
    <input type="text" name="pesel" id="pesel">
    <input type="submit" value="Zapisz">
    </form>
    ';
}



?>

>>>>>>> b7b7fe91fbf28868c340787505a64d511b3430ff
