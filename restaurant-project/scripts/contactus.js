//alert("connected");

window.onload = function(){

var firstName = document.getElementById("customer-fname");
var fnameError = document.getElementById("fname-error");    
var lastName = document.getElementById("customer-lname");
var lnameError = document.getElementById("lname-error");
var eMail = document.getElementById("customer-email");
var emailError = document.getElementById("email-error");
var fName = /^[a-zA-Z]{2,30}$/;
var lName = /^[a-zA-z]{2,30}$/;
var emailValid = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
//email validation referenced from https://www.w3resource.com/javascript/form/email-validation.php

    
var contactForm = document.forms[0];
console.log(contactForm);    

contactForm.onsubmit = processForm;
    
function processForm(){
    if (!(fName.test(firstName.value))) {
        fnameError.innerHTML="Please enter a valid first name.";
        firstName.focus();
        return false;
    } else {
        firstName.style.background="white";
    }
    
    if (!(lName.test(lastName.value))) {
        lnameError.innerHTML="Please enter a valid last name.";
        lastName.focus();
        return false;
    } else {
        lastName.style.background="white";
    }
    
    if (!(emailValid.test(eMail.value))) {
        emailError.innerHTML="Please enter a valid E-mail address.";
        eMail.focus();
        return false;
    } else {
        eMail.style.background="white";
    }
    }//process form
}//window onload