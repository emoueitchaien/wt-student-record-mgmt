function validateForm() {

    const re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i

    var name = document.forms["form1"]["name"].value;
    var username = document.forms["form1"]["username"].value;
    var email = document.forms["form1"]["email"].value;
    var password1 = document.forms["form1"]["password1"].value;

    if (name == "") {
        alert("Name must be filled out");
        return false;
    } else if (!(/[a-zA-Z]+\s+[a-zA-Z]+/g.test(name))) {
        alert("Invalid Name! Full name required!");
        return false;
    }

    if (username == "") {
        alert("Username must be filled out");
        return false;
    }

    if (email == "") {
        alert("Email must be filled out");
        return false;
    } else if (!(re.test(email))) {
        alert("You have entered an invalid email address!")
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

console.log("Signup connected!")