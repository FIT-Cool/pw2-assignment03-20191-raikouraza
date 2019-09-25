function deletePatient(med_record_number) {
    confirmation = window.confirm("Apakah anda yakin akan menghapus data berikut?")
    if (confirmation) {
        window.location = "index.php?menu=pt&delcom=1&id=" + id;
    }
}

function updatePatient(med_record_number) {
    window.location = "index.php?menu=ptu&id=" + id;

}