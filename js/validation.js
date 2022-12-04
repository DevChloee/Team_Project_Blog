let email = document.querySelector('#signup-email');
let password = document.querySelector('#signup-password');
let password2 = document.querySelector('#signup-password2');


const emailRe = /^[a-zA-Z0-9]+\@[a-zA-z]+\.[a-zA-Z]{2,4}$/;

const passwordLower = /[a-z]+/;
const passwordUpper = /[A-Z]+/;
const passwordMin = /[a-zA-Z0-9\*\$\!\@\#\%\^\&\-\_]{6,}/;
const passwordNum = /[0-9]+/;

let emailBool = false;
let passBool = false;
let pass2Bool = false;

let emailInvalid = document.createElement("p");
let passInvalid = document.createElement("p");
let pass2Invalid = document.createElement("p");

emailInvalid.textContent = "Invalid entry! email must have a pattern of xxx@xxx.xxx";
passInvalid.innerHTML = "Password Requirements <br> 1 uppercase letter <br> 1 lowercase letter <br> At least 6 characters/digits";
pass2Invalid.textContent = "Invalid entry! passwords must be the same";

signUpForm = document.querySelectorAll(".form-group");
submit = document.querySelector("#signup-submit");

email.addEventListener("blur", validateEmail);
function validateEmail(){
    if (email.value.match(emailRe) !== null){
        emailBool = true;
        emailInvalid.remove();
        email.removeAttribute('class', 'invalid');
    }
    else if (email.value.match(emailRe) == null){
        emailBool = false;
        signUpForm[0].appendChild(emailInvalid);
        email.setAttribute('class', 'invalid');
    }
}
password.addEventListener('blur', validatePassword);
function validatePassword(){
    if (password.value.match(passwordUpper) !== null && password.value.match(passwordLower) !== null && password.value.match(passwordMin) 
    !== null && password.value.match(passwordNum) !== null){
        passBool = true;
        passInvalid.remove();
        password.removeAttribute('class', 'invalid');
    }
    else{
        passBool = false;
        signUpForm[1].appendChild(passInvalid);
        password.setAttribute('class', 'invalid');
    }
}
password2.addEventListener('blur', validatePasswordEquality);
function validatePasswordEquality(){
    if (password.value === password2.value){
        pass2Bool = true;
        pass2Invalid.remove();
        password2.removeAttribute('class', 'invalid');
    }
    else{
        pass2Bool = false;
        signUpForm[2].appendChild(pass2Invalid);
        password2.setAttribute('class', 'invalid');
    }
}
submit.addEventListener('click', validate);
function validate(){
    if (!(emailBool == true && pass2Bool == true && passBool == true)){
        event.preventDefault();
if (!emailBool){
    signUpForm[0].appendChild(emailInvalid);
    email.setAttribute('class', 'invalid');
}
if (!passBool){
    signUpForm[1].appendChild(passInvalid);
    password.setAttribute('class', 'invalid');
}
if (!pass2Bool){
    signUpForm[2].appendChild(pass2Invalid);
    password2.setAttribute('class', 'invalid');
}
}   
}