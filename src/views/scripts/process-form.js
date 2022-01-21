function reject(){
    let id = document.getElementById("form-id").getAttribute("name");
    location.href = 'http://localhost/Doatap/src/views/reject.php?id='+id;
}

function approve(){
    let id = document.getElementById("form-id").getAttribute("name");
    let select = document.getElementById("university");
    let university = select.value;
    select = document.getElementById("department");
    let department = select.value;
    location.href = 'http://localhost/Doatap/src/helpers/form-process/aprrove.php?id='+id+'&university='+university+'&department='+department;
}