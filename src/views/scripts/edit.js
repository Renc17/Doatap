function toggleEdit() {

    // window.location.href = "http://localhost/Doatap/src/views/profile.php";
  
    var y = document.getElementById("details");
    var x = document.getElementById("form");

    if (x.style.display === "none") {
      x.style.display = "block";
      y.style.display = "none";
    } else {
      x.style.display = "none";
      y.style.display = "block";
    }
  }