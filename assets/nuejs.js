// Register Validation
// input
var firstname = document.forms['form']['firstname'];
var lastname = document.forms['form']['lastname'];
var email = document.forms['form']['email'];
var pwd = document.forms['form']['pwd'];
var pwd2 = document.forms['form']['pwd2'];
// i
var valid1 = document.getElementById('valid1');
var valid2 = document.getElementById('valid2');
var valid3 = document.getElementById('valid3');
var valid4 = document.getElementById('valid4');
var valid5 = document.getElementById('valid5');
// small
var small1 = document.getElementById('small1');
var small2 = document.getElementById('small2');
var small3 = document.getElementById('small3');
var small4 = document.getElementById('small4');
var small5 = document.getElementById('small5');
// evenet Listener
firstname.addEventListener('input',firstnameVerify);
lastname.addEventListener('input',lastnameVerify);
email.addEventListener('input',emailVerify);
pwd.addEventListener('input',pwdVerify);
pwd2.addEventListener('input',passVerify);

// function
function validated(){
    var firstnameValue = firstname.value.trim();
    var lastnameValue = lastname.value.trim();
    var emailValue = email.value.trim();
    var pwdValue = pwd.value.trim();
    var pwd2Value = pwd2.value.trim();

    if(firstnameValue === ''){
        small1.innerText = "Firstname cannot be blank";
        small1.style.visibility = "visible";
        small1.style.color = "#e74c3c";
        firstname.style.background =  "linear-gradient(#e74c3c, #e74c3c) center bottom 5px /calc(100% - 10px) 2px no-repeat";
        valid1.style.visibility = "visible";
        valid1.style.color = "#e74c3c";
        firstname.focus();
        return false;
    }
    if(lastnameValue === ''){
        small2.innerText = "Lastname cannot be blank";
        small2.style.visibility = "visible";
        small2.style.color = "#e74c3c";
        lastname.style.background =  "linear-gradient(#e74c3c, #e74c3c) center bottom 5px /calc(100% - 10px) 2px no-repeat";
        valid2.style.visibility = "visible";
        valid2.style.color = "#e74c3c";
        lastname.focus();
        return false;
    }
    if(emailValue === ''){
        small3.innerText = "Email cannot be blank";
        small3.style.visibility = "visible";
        small3.style.color = "#e74c3c";
        email.style.background =  "linear-gradient(#e74c3c, #e74c3c) center bottom 5px /calc(100% - 10px) 2px no-repeat";
        valid3.style.visibility = "visible";
        valid3.style.color = "#e74c3c";
        email.focus();
        return false;
    }
    if(!isEmail(emailValue)){
        small3.innerText = "Email does not valid";
        small3.style.visibility = "visible";
        small3.style.color = "#e74c3c";
        email.style.background =  "linear-gradient(#e74c3c, #e74c3c) center bottom 5px /calc(100% - 10px) 2px no-repeat";
        valid3.style.visibility = "visible";
        valid3.style.color = "#e74c3c";
        email.focus();
        return false;
    }
    if(pwdValue === ''){
        small4.innerText = "Password cannot be blank";
        small4.style.visibility = "visible";
        small4.style.color = "#e74c3c";
        pwd.style.background =  "linear-gradient(#e74c3c, #e74c3c) center bottom 5px /calc(100% - 10px) 2px no-repeat";
        valid4.style.visibility = "visible";
        valid4.style.color = "#e74c3c";
        pwd.focus();
        return false;
    }
    if(pwd2Value === ''){
        small5.innerText = "Password cannot be blank";
        small5.style.visibility = "visible";
        small5.style.color = "#e74c3c";
        pwd2.style.background =  "linear-gradient(#e74c3c, #e74c3c) center bottom 5px /calc(100% - 10px) 2px no-repeat";
        valid5.style.visibility = "visible";
        valid5.style.color = "#e74c3c";
        pwd.focus();
        return false;
    }
    if(pwd2Value !== pwdValue){
        small5.innerText = "Password does not match";
        small5.style.visibility = "visible";
        small5.style.color = "#e74c3c";
        pwd2.style.background =  "linear-gradient(#e74c3c, #e74c3c) center bottom 5px /calc(100% - 10px) 2px no-repeat";
        valid5.style.visibility = "visible";
        valid5.style.color = "#e74c3c";
        pwd2.focus();
        return false;
    }

}

function isEmail(email){
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

function firstnameVerify(){
    var firstnameValue = firstname.value.trim();
    if(firstnameValue !== ''){
        firstname.style.background =  "linear-gradient(silver, silver) center bottom 5px /calc(100% - 10px) 2px no-repeat";
        valid1.style.visibility = "hidden";
        small1.style.visibility = "hidden";
        return true;
    }
}

function lastnameVerify(){
    var lastnameValue = lastname.value.trim();
    if(lastnameValue !== ''){
        lastname.style.background =  "linear-gradient(silver, silver) center bottom 5px /calc(100% - 10px) 2px no-repeat";
        valid2.style.visibility = "hidden";
        small2.style.visibility = "hidden";
        return true;
    }
}

function emailVerify(){
    var emailValue = email.value.trim();
    if(isEmail(emailValue)){
        email.style.background =  "linear-gradient(silver, silver) center bottom 5px /calc(100% - 10px) 2px no-repeat";
        valid3.style.visibility = "hidden";
        small3.style.visibility = "hidden";
        return true;
    }
}

function pwdVerify(){
    var pwdValue = pwd.value.trim();
    if(pwdValue !== ''){
        pwd.style.background =  "linear-gradient(silver, silver) center bottom 5px /calc(100% - 10px) 2px no-repeat";
        valid4.style.visibility = "hidden";
        small4.style.visibility = "hidden";
        return true;
    }
}

function passVerify(){
    var pwd2Value = pwd2.value.trim();
    var pwdValue = pwd.value.trim();
    if(pwd2Value == pwdValue){
        pwd2.style.background =  "linear-gradient(silver, silver) center bottom 5px /calc(100% - 10px) 2px no-repeat";
        pwd.style.background =  "linear-gradient(silver, silver) center bottom 5px /calc(100% - 10px) 2px no-repeat";
        valid4.style.visibility = "hidden";
        small4.style.visibility = "hidden";
        valid5.style.visibility = "hidden";
        small5.style.visibility = "hidden";
        return true;
    }
}