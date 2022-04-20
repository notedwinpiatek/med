<?php
class Patient {
    private $id;
    private $firstName;
    private $lastName;
    private $phone;
    private $pesel;
    private $db;

    function __construct() {
        global $db;
        $this->db = $db;
    }
    function setFirstName(string $firstName) {
        $this->firstname = $firstName;
    }
    function setLastName(string $lastName) {
        $this->lastname = $lastName;
    }
    function setPhone(string $phone) {
        $this->phone = $phone;
    }
    function setPesel(string $pesel) {
        if(strlen($pesel) == 11) {
            $this->pesel = $pesel;
        }else {
            throw new LenghtException("Pesel ma nieprawidłową długość!");
        }
        
    }

    function save() : bool {
         $q = $db->prepare("INSERT INTO patient VALUES (NULL, ?, ?, ? , ?)");
         $q->bind_param("ssss", $this->firstName, $this->lastName, $this->phone, $this->pesel);
         return $q->execute();
    }
    function load() {
        $q = $db->prepare("SELECT * FROM patient WHERE id = ?");
        $q->bind_param("i", $this->id);
        $q->execute();
        $result = $q->get_result();
        $row = $result->fetch_assoc();
        $this->firstName = $row['firstName'];
        $this->lastName = $row['lastName'];
        $this->phone = $row['phone'];
        $this->pesel = $row['pesel'];
    }
    function findByPesel(string $pesel) {
        $q = $this->db->prepare("SELECT id FROM patient WHERE pesel = ? LIMIT 1");
        $q->bind_param("s", $pesel);
        $q->execute();
        $this->id = $q->get_result()->fetch_assoc()['id'];
        $this->load();
    }
}


?>