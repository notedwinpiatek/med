
<?php
if(isset($_REQUEST['firstName']) && isset($_REQUEST['lastName'])){
    $p = newPatient();
    $p->setFirstName($_REQUEST['firstName']);
    $p->setLastName($_REQUEST['lastName']);
    $p->setPhone($_REQUEST['phone']);
    $p->setPesel($_REQUEST['pesel']);
    if($p->save()) [
        $smarty->assign("message", "Pacjent dodany do systemu");
        $smarty->assign("returnUrl", "newPatient.php");
        $smarty->assign("message.tpl");
    ]
/*
    $db = new mysqli("localhost", "root", "", "med");
    $q = $db->prepare("INSERT INTO patient VALUES (NULL, ?, ?, ? , ?)");
    $q->bind_param("ssss", $_REQUEST['firstName'], $_REQUEST['lastName'],
                            $_REQUEST['phone'], $_REQUEST['pesel']);
    if($q->execute()) {
        echo "Pacjent dodany do bazy";
    }
*/
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
