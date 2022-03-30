<?php
$appointmentId = $_REQUEST['id'];


?>

<div style="display: flex; flex-direction: row">
    <div style="flex-grow: 1; text-align:center">
    <h1>Zaloguj się</h1>
    <form action="appointment.php">
    <label for="pesel">PESEL:</label>
    <input type="text" name="pesel" id="pesel"><br>
    <label for="phone">Numer telefonu:</label><br>
    <input type="text" name="phone" id="phone"><br>
    <input type="hidden" name="appointmentID"
                        value="<?php echo $appointmentId; ?>">
    <input type="submit" value="Zaloguj się">
</form>
</div>
    <div style="flex-grow: 1;">
    <h1>Zarejestruj się</h1>
</div>
</div>