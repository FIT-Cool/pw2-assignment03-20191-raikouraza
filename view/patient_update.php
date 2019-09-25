<?php

//Block below for fetch data
$med_rec_number = filter_input(INPUT_GET, 'med_rec_number');
if (isset($med_rec_number)) {
    $patient = getPatient($med_rec_number);
}
//Block below for delete

//Block below for insert

$submitted = filter_input(INPUT_POST, 'btnUpdate');
if (isset($submitted)) {
    $med_record_number = filter_input(INPUT_POST, 'txtMedRec');
    updatePatient($med_record_number);
    header("location:index.php?menu=pt");
}
?>

<form method="post">
    <fieldset>
        <legend>Update Patient</legend>
        <label for="txtNameIdx" class="form-label">Name</label>
        <input type="text" id="txtNameIdx" name="txtname"
               placeholder="Name" autofocus required
               class="form-input" value="<?php echo $patient['name']; ?>">
        <input type="submit" name="btnUpdate" value="Update Patient" class="buttonButton-primary">
    </fieldset>

</form>
