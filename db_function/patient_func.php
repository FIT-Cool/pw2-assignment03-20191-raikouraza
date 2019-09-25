<?php
function getAllPatient(){
    $link = new PDO("mysql:host=localhost; dbname=prakpw220191", 'root', "");
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT p.med_record_number, p.citizen_id_number, p.name, p.address, p.birth_place, p.birth_date,p.insurance_id FROM patient p INNER JOIN  insurance i ON p.insurance_id= i.id ORDER BY p.med_record_number";
    $result = $link->query($query);
    return $result;}

function addPatient($med_record_number,$citizen_id_number,$name,$address,$birth_place,$birth_date,$insurance_id){
    $link = new PDO("mysql:host=localhost; dbname=prakpw220191", 'root', "");
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = "INSERT INTO patient(med_record_number,citizen_id_number,name,address,birth_place,birth_date,insurance_id) VALUES (?,?,?,?,?,?,?)";
    $statement = $link->prepare($query);
    $statement->bindParam(1, $med_record_number, PDO::PARAM_STR);
    $statement->bindParam(2, $citizen_id_number, PDO::PARAM_STR);
    $statement->bindParam(3, $name, PDO::PARAM_STR);
    $statement->bindParam(4, $address, PDO::PARAM_STR);
    $statement->bindParam(5, $birth_place, PDO::PARAM_STR);
    $statement->bindParam(6, $birth_date, PDO::PARAM_STR);
    $statement->bindParam(7, $insurance_id, PDO::PARAM_INT);
    if ($statement->execute()){
        $link->commit();
    }
    else{
        $link->rollBack();
    }
    $link = null;
}
function deletePatient($med_record_number){
    $link = new PDO("mysql:host=localhost; dbname=prakpw220191", 'root', "");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = "DELETE FROM patient WHERE med_record_number = ?";
    $statement = $link->prepare($query);
    $statement->bindParam(1, $med_record_number, PDO::PARAM_INT);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;
}

function updatePatient($med_record_number,$citizen_id_number,$name,$address,$birth_place,$birth_date,$insurance_id){
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191", "root", "");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = "UPDATE patient SET name = ? WHERE med_record_number = ?";
    $statement = $link->prepare($query);
    $statement->bindParam(1, $med_record_number, PDO::PARAM_STR);
    $statement->bindParam(2, $citizen_id_number, PDO::PARAM_STR);
    $statement->bindParam(3, $name, PDO::PARAM_STR);
    $statement->bindParam(4, $address, PDO::PARAM_STR);
    $statement->bindParam(5, $birth_place, PDO::PARAM_STR);
    $statement->bindParam(6, $birth_date, PDO::PARAM_STR);
    $statement->bindParam(7, $insurance_id, PDO::PARAM_INT);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;
}
function getPatient($med_rec_number)
{
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191", "root", "");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM patient WHERE med_rec_number = ? LIMIT 1";
    $statement = $link->prepare($query);
    $statement->bindParam(1, $med_rec_number, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetch();
    $link = null;
    return $result;
}


?>
