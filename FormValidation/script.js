function SignupValidation(){
    const stringRegularExpression = /^[a-zA-Z]+$/;
    const emailRegularExpression = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9._%+-]+\.[a-zA-Z]{2,}$/;


    var firstname = document.getElementById('firstname').value;
    const firstnameIsValid = stringRegularExpression.test(firstname);

    var lastname = document.getElementById('lastname').value;
    const lastnameIsValid = stringRegularExpression.test(lastname);

    var email = document.getElementById('email').value ;
    var emailError = document.getElementById("emailError");
    const emailIsValid =  emailRegularExpression.test(email);

    var password = document.getElementById("password").value;
    var passwordError = document.getElementById("passwordError");

    var conPassword = document.getElementById("conPassword").value;
    var conPasswordError = document.getElementById("conPasswordError");

    var country = document.getElementById("country").value;
    var countryError = document.getElementById("countryError");


    if(firstname.trim() == ""){
        document.getElementById('firstnameError').innerHTML = "** Firstname Required";
        return false;
    }else if(!firstnameIsValid){
        document.getElementById('firstnameError').innerHTML = "** Only letter is allowed";
        return false;
    }else{
        document.getElementById('firstnameError').innerHTML = "";
    }

    //Lastname
    if(lastname.trim() == ""){
        document.getElementById('lastnameError').innerHTML = "** Lastname Required";
        return false;
    }else if(!lastnameIsValid){
        document.getElementById('lastnameError').innerHTML = "** Only letter is allowed";
        return false;
    }else{
        document.getElementById('lastnameError').innerHTML = "";
    }

    //Email Validation
    if(email.trim() == ""){
        emailError.innerHTML = "** Email Required";
        return false;
    }else if(!emailIsValid){
        emailError.innerHTML = "** Invalid Email";
        return false;
    }else{
        emailError.innerHTML = "";
        
    }


    //Password
    
    if(password.trim() == ""){
        passwordError.innerHTML = "** Password Required";
        return false;
    }else{
        passwordError.innerHTML = "";
    }


    //Confirmation Password
    if(conPassword.trim() == ""){
        conPasswordError.innerHTML = "** Confirmation Required";
        return false;
    }else if(conPassword != password){
        conPasswordError.innerHTML = "** Confirmation Failed";
        return false;
    }else{
        conPasswordError.innerHTML = "";
    }

    //Selection of a Country 

    if(country == "default"){
        countryError.innerHTML = "** Please select a valid option";
        return false;
    }else{
        countryError.innerHTML = "";
    }

    //image
    // var image = document.getElementById("image").files.length;
    // var imageError = document.getElementById("imageError");
    // if(image === 0){
    //     imageError.innerHTML = "** Image Required";
    //     return false;
    // }else{
    //     imageError.innerHTML = "";
    // }


    
}




//Login Function
function LoginValidation(){
    var email = document.getElementById('email').value ;
    var emailError = document.getElementById("emailError");
    const emailRegularExpression = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9._%+-]+\.[a-zA-Z]{2,}$/;
    const isValid =  emailRegularExpression.test(email);


    var password = document.getElementById("password").value;
    var passwordError = document.getElementById("passwordError");

    //Email Validation
    if(email.trim() == ""){
        emailError.innerHTML = "** Email Required";
        return false;
    }else if(!isValid){
        emailError.innerHTML = "** Invalid Email";
        return false;
    }else{
        emailError.innerHTML = "";
        
    }

    //Password
    
    if(password.trim() == ""){
        passwordError.innerHTML = "** Password Required";
        return false;
    }else{
        passwordError.innerHTML = "";
    }
}