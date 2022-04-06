<?php
$db = new mysqli("localhost", "root", "", "med");
$q = $db->prepare("SELECT id, firstName, lastName FROM staff ");
$q->execute();
$staffResult = $q->get_result();
?>
<form action="addAppointments.php"> 
    <select name="staffId" id="staffId">
        <?php
            while($staffRow = $staffResult->fetch_assoc()) {
                $staffId = $staffRow['id'];
                $staffFirstName = $staffRow['firstname'];
                $staffLastName = $staffRow['lastName'];

                echo "<option value=\"";
            }
        ?>
        <option value="x">Przykładowy lekarz</option>
        <option value="x">Przykładowy lekarz</option>
        <option value="x">Przykładowy lekarz</option>
    </select>
</form>