function hideElement(id) {
    var x = document.getElementById(id);
    //x.classList.add("alert-fade");
    x.style.display = "none";
}

function showElement(id) {
    var x = document.getElementById(id);
    //x.classList.add("alert-fade");
    x.style.display = "inline";
}