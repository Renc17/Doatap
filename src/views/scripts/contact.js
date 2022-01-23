function contact_success(){
    let name = document.getElementById("name").value;
    let surname = document.getElementById("surname").value;

    location.href = 'http://localhost/Doatap/src/views/success.php?name='+name+'&surname='+surname;
}