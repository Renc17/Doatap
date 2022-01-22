function reject(){
    let id = document.getElementById("form-id").getAttribute("name");
    var reasons = ''
    var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')
    for (var i = 0; i < checkboxes.length; i++) {
        reasons += (checkboxes[i].value + ', ')
    }
    let comment = document.getElementById("comment").value;
    location.href = 'http://localhost/Doatap/src/helpers/form-process/reject.php?id='+id+'&reasons='+reasons+'&comment='+comment;
}

function approve(){
    let id = document.getElementById("form-id").getAttribute("name");
    let select = document.getElementById("university");
    let university = select.value;
    select = document.getElementById("department");
    let department = select.value;
    location.href = 'http://localhost/Doatap/src/helpers/form-process/aprrove.php?id='+id+'&university='+university+'&department='+department;
}

function standBy(){
    let id = document.getElementById("form-id").getAttribute("name");

    let select = document.getElementById("rec-department");
    let department = select.value;

    select = document.querySelectorAll("#classes option:checked");
    var recommendations = ''
    for (var i = 0; i < select.length; i++) {
        recommendations += (select[i].value + ', ')
    }
    location.href = 'http://localhost/Doatap/src/helpers/form-process/standBy.php?id='+id+'&classes='+recommendations+'&department='+department;
}