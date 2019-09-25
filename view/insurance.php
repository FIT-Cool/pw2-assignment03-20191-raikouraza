<?php
$submitted = filter_input(INPUT_POST,'btnSubmit');
if(isset($submitted)){
    $id = filter_input(INPUT_POST,'txtInsurance');
    $name_class = filter_input(INPUT_POST, 'txtNameClass');
    addInsurance($id,$name_class);
}
$deleteCommand = filter_input(INPUT_GET, 'delcom');
if (isset($deleteCommand) && $deleteCommand == 1) {
    $id = filter_input(INPUT_GET, 'id');
    deleteInsurance($id);
}
//Block below for insert

$submitted = filter_input(INPUT_POST, 'btnSubmit');
?>

<form action="" method="POST">
    <table>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>
</form>

<form action="" method="POST">
    <table>
        <tr>
            <td>New Insurance:</td>
            <label for="txtInsurance" class="form-label">Insurance</label>
            <td><input type="text"  name="txtInsurance" autofocus required placeholder="Masukan Nomor id Asuransi"><br></td>
            <td><input type="text"  name="txtNameClass" autofocus required placeholder="Masukan Nama Asuransi"><br></td>
            <td><input type="submit" name="btnSubmit" value="addInsurance" class="buttonButton-primary"></td>
        </tr>
    </table>
</form>

<table id="myTable">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>

    </thead>
    <tbody>
    <?php
    $insurances = getAllInsurance();
    foreach($insurances as $insurance){
        echo '<tr>';
        echo '<td>'.$insurance['id'].'</td>';
        echo '<td>'.$insurance['name_class'].'</td>';
        echo '<td><button onclick="deleteInsurance(' .$insurance['id'] . ');">Delete</button><button onclick="updateInsurance(' . $insurance['id'] .')">Update</button>)</td>';
        echo'</tr>';
    }
    ?>
    </tbody>
</table>