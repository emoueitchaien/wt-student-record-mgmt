function validateForm() {


    var username = document.forms["form1"]["username"].value;
    var password1 = document.forms["form1"]["password1"].value;


    if (username == "") {
        alert("Username must be filled out");
        return false;
    }

    if (password1 == "") {
        alert("Password must be filled out");
        return false;
    } else if (password1.length < 5) {
        alert("Password must be at least of length 5");
        return false;
    }
}

console.log("Login connected!")