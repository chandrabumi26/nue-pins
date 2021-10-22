// Login Validation
// input
var emailLogin = document.forms['formLogin']['emailLogin'];
var pwdLogin = document.forms['formLogin']['pwdLogin'];
// i
var validEmail = document.getElementById('validEmail');
var validPwd = document.getElementById('validPwd');
// small
var smallEmail = document.getElementById('smallEmail');
var smallPwd = document.getElementById('smallPwd');
// evenet Listener
emailLogin.addEventListener('input',emailVerify);
pwdLogin.addEventListener('input',pwdVerify);


// function
function validatedLogin(){
    var emailValue = emailLogin.value.trim();
    var pwdValue = pwdLogin.value.trim();

    if(emailValue === ''){
        smallEmail.innerText = "Email cannot be blank";
        smallEmail.style.visibility = "visible";
        smallEmail.style.color = "#e74c3c";
        emailLogin.style.background =  "linear-gradient(#e74c3c, #e74c3c) center bottom 5px /calc(100% - 10px) 2px no-repeat";
        validEmail.style.visibility = "visible";
        validEmail.style.color = "#e74c3c";
        emailLogin.focus();
        return false;
    }
    if(!isEmail(emailValue)){
        smallEmail.innerText = "Email does not valid";
        smallEmail.style.visibility = "visible";
        smallEmail.style.color = "#e74c3c";
        emailLogin.style.background =  "linear-gradient(#e74c3c, #e74c3c) center bottom 5px /calc(100% - 10px) 2px no-repeat";
        validEmail.style.visibility = "visible";
        validEmail.style.color = "#e74c3c";
        emailLogin.focus();
        return false;
    }
    if(pwdValue === ''){
        smallPwd.innerText = "Password cannot be blank";
        smallPwd.style.visibility = "visible";
        smallPwd.style.color = "#e74c3c";
        pwdLogin.style.background =  "linear-gradient(#e74c3c, #e74c3c) center bottom 5px /calc(100% - 10px) 2px no-repeat";
        validPwd.style.visibility = "visible";
        validPwd.style.color = "#e74c3c";
        pwdLogin.focus();
        return false;
    }

}

function isEmail(email){
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

function emailVerify(){
    var emailValue = emailLogin.value.trim();
    if(isEmail(emailValue)){
        emailLogin.style.background =  "linear-gradient(silver, silver) center bottom 5px /calc(100% - 10px) 2px no-repeat";
        validEmail.style.visibility = "hidden";
        smallEmail.style.visibility = "hidden";
        return true;
    }
}

function pwdVerify(){
    var pwdValue = pwdLogin.value.trim();
    if(pwdValue !== ''){
        pwdLogin.style.background =  "linear-gradient(silver, silver) center bottom 5px /calc(100% - 10px) 2px no-repeat";
        validPwd.style.visibility = "hidden";
        smallPwd.style.visibility = "hidden";
        return true;
    }
}
