<?php

//Block below for fetch data
$id = filter_input(INPUT_GET, 'id');
if (isset($id)) {
    $insurance = getInsurance($id);
}
//Block below for delete

//Block below for insert

$submitted = filter_input(INPUT_POST, 'btnUpdate');
if (isset($submitted)) {
    $name_class = filter_input(INPUT_POST, 'txtNameClass');
    updateInsurance($id, $name_class);
    header("location:index.php?menu=ir");
}
?>

<form method="post">
    <fieldset>
        <legend>Update Insurance</legend>
        <label for="txtInsurance" class="form-label">Name</label>
        <input type="text" id="txtNameClass" name="txtNameClass"
               placeholder="Nomor Insurance" autofocus required
               class="form-input" value="<?php echo $insurance['name_class']; ?>">
        <input type="submit" name="btnUpdate" value="Update Insurance" class="buttonButton-primary">
    </fieldset>

</form>