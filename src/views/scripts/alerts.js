function alertDeleteForm(){
    let id = document.getElementById("form-id").getAttribute("name");
    let ok = confirm('Ειστε σιγουρος οτι θελετε να διαγραψετε την φορμα;');
    if(ok){
        location.href = 'http://localhost/Doatap/src/helpers/auth/delete-form.php?id='+id;
    }
}

function alertDeleteUser(){
    let id = document.getElementById("user-id").getAttribute("name");
    let ok = confirm('Ειστε σιγουρος οτι θελετε να διαγραψετε τον λογαριασμό σας;');
    if(ok){
        location.href = 'http://localhost/Doatap/src/helpers/auth/delete.php?id='+id;
    }
}