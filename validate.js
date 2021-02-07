function validateForm() {

  const re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i

  var name = document.forms["student-form"]["name"].value;
  var roll_no = document.forms["student-form"]["roll_no"].value;
  var faculty = document.forms["student-form"]["faculty"].value;
  var batch = document.forms["student-form"]["batch"].value;
  var dob = document.forms["student-form"]["dob"].value;
  var address = document.forms["student-form"]["address"].value;
  var email = document.forms["student-form"]["email"].value;
  var phone = document.forms["student-form"]["phone"].value;

  if (name == "") {
    alert("Name must be filled out");
    return false;
  }
  else if(!(/[a-zA-Z]+\s+[a-zA-Z]+/g.test(name))){
  	alert("Invalid Name! Full name required!");
    return false;
  }

  if (roll_no == "") {
    alert("Roll_no must be filled out");
    return false;
  }

  if (faculty == "") {
    alert("Faculty must be filled out");
    return false;
  }

  if (batch == "") {
    alert("Batch must be filled out");
    return false;
  }

  if (dob == "") {
    alert("DOB must be filled out");
    return false;
  }

  if (address == "") {
    alert("address must be filled out");
    return false;
  }

  if (email == "") {
    alert("Email must be filled out");
    return false;
  }
  else if (!(re.test(email))) 
  {
    alert("You have entered an invalid email address!")
    return false;
  }
   
  if (phone == "") {
    alert("Phone must be filled out");
    return false;
  }
}

console.log("JS connected!")