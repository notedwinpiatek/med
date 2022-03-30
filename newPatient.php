<?php
if(isset($_REQUEST['firstName']) && isset($_REQUEST['lastName'])) {

} else {
    echo '
    <form action="newPatient.php" method="post"></form>
    <label for="firstName">Imię</label>
    <input type="text" name="firstName" id="firstName">
    <label for="lastName" name="lastName" id="lastName">Nazwisko</label>
    <label for="pesel">Numer PESEL</label>
    <input type="text" name="pesel" id="pesel">
    <input type="submit" value="Zapisz">
    </form>
    ';
}



?>
<input type="text" name="" id="">
