function deleteInsurance(id) {
    confirmation = window.confirm("Apakah anda yakin akan menghapus data berikut?")
    if (confirmation) {
        window.location = "index.php?menu=ir&delcom=1&id=" + id;
    }
}

function updateInsurance(id) {
    window.location = "index.php?menu=iru&id=" + id;

}