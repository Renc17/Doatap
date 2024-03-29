var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
        document.getElementById("nextBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").style.display = "none";
        document.getElementById("submitBtn").style.display = "inline";
    } else {
        document.getElementById("submitBtn").style.display = "none";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    console.log('next');
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    checkbox = x[currentTab].getElementsByTagName("input").namedItem("consent");

    if(x[currentTab].querySelector("input[name=identification_type]")){
        var ischecked = x[currentTab].querySelectorAll( 'input[name=identification_type]:checked'); 
        if(!ischecked.length){
            unchecked = document.getElementById("identification-type-error");
            console.log(unchecked);
            unchecked.className = unchecked.className.replace(" unchecked", " invalid");
            valid = false;
        }
    }

    if(x[currentTab].querySelector("input[name=study_cycle]")){
        var ischecked = x[currentTab].querySelectorAll( 'input[name=study_cycle]:checked'); 
        if(!ischecked.length){
            unchecked = document.getElementById("study-cycle-error");
            unchecked.className = unchecked.className.replace(" unchecked", " invalid");
            valid = false;
        }
    }

    diploma_country = x[currentTab].querySelector('#diploma_country')
    if(diploma_country){
        if(!diploma_country.value){
            unchecked = document.getElementById("diploma-country-error");
            unchecked.className = unchecked.className.replace(" unchecked", " invalid");
            valid = false;
        }
    }
    
    university = x[currentTab].querySelector('#university')
    if(university){
        if(!university.value){
            unchecked = document.getElementById("university-error");
            unchecked.className = unchecked.className.replace(" unchecked", " invalid");
            valid = false;
        }
    }


    department = x[currentTab].querySelector('#department')
    if(department){
        if(!department.value){
            unchecked = document.getElementById("department-error");
            unchecked.className = unchecked.className.replace(" unchecked", " invalid");
            valid = false;
        }
    }
    
    if(checkbox){
        if(!checkbox.checked){
            unchecked = document.getElementById("checkbox-error");
            unchecked.className = unchecked.className.replace(" unchecked", " invalid");
            valid = false;
        }
    }
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
        document.getElementsByClassName("next-step-arrow")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";

    var i, x = document.getElementsByClassName("next-step-arrow");
    if(x){
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        x[n].className += " active";
    }
}

function CreditPayment(){
    parent.document.getElementById("credit-payment").style.display = "inline";
    parent.document.getElementById("close").click();
}

function showAddress(){
    document.getElementById("address-panel").style.display = "inline";
}

function digitalOnly(){
    document.getElementById("address-panel").style.display = "none";
}