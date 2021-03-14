"use strict";

let form = document.forms['formLogInto'];
let nameUser = document.getElementById('user-name');
let password = document.getElementById('user-password');
let btn = document.getElementById('enter');
let validDiv = document.querySelectorAll('.hide');
let formRegister = document.forms['formRegister'];
let email = document.getElementById('email');
let userName = document.getElementById('userName');
let userPassword = document.getElementById('userPassword');        
let button = document.getElementById('registration');

function checkInputs(e) {
    for (let i=0; i<validDiv.length; i++){
        validDiv[i].style.display = "none";
    }
	const usernameValue = nameUser.value;
    console.log(usernameValue);
	const passwordValue = password.value.trim();
    console.log(passwordValue);
	
	if(!usernameValue || usernameValue.length<3 || usernameValue.length>35 || !checkName(usernameValue)) {
		nameUser.parentNode.children[2].style.display = "block";
	} else {
		nameUser.parentNode.children[1].style.display = "block";
	}	
	
	if(!passwordValue || passwordValue.length<4 || passwordValue>10 || !checkPassword(passwordValue)) {
		password.parentNode.children[2].style.display = "block";
	} else {
		password.parentNode.children[1].style.display = "block";
	}
	if(!usernameValue || usernameValue.length<3 || usernameValue.length>35 || !checkName(usernameValue) || !passwordValue || passwordValue.length<4 || passwordValue>10 || !checkPassword(passwordValue)) {
		e.preventDefault();
	}
}

form.addEventListener('submit', checkInputs, false);


function checkInput(e) {
    for (let i=0; i<validDiv.length; i++){
        validDiv[i].style.display = "none";
    }
	const emailValue = email.value;
    const nameValue = userName.value;
    const passwordValue = userPassword.value;
	
	if(!emailValue || emailValue.length<9 || emailValue.length>35 || !checkEmail(emailValue)) {
		email.parentNode.children[2].style.display = "block";
	} else {
		email.parentNode.children[1].style.display = "block";
	}	
    if(!nameValue || nameValue.length<3 || nameValue.length>35 || !checkName(nameValue)) {
		userName.parentNode.children[2].style.display = "block";
	} else {
		userName.parentNode.children[1].style.display = "block";
	}	
	if(!passwordValue || passwordValue.length<4 || passwordValue>10 || !checkPassword(passwordValue)) {
		userPassword.parentNode.children[2].style.display = "block";
	} else {
		userPassword.parentNode.children[1].style.display = "block";
	}
	if(!emailValue || emailValue.length<9 || emailValue.length>35 || !checkEmail(emailValue) || !nameValue || nameValue.length<3 || nameValue.length>35 || !checkName(nameValue) || !passwordValue || passwordValue.length<4 || passwordValue>10 || !checkPassword(passwordValue)) {
		e.preventDefault();
	}	
}
	
function checkEmail(value) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
}
function checkName(value) {
	return /^[A-Za-z,'\.\s][A-Za-z,'\.\s]+[A-Za-z,'\.\s]{3,35}$/.test(value);
}
function checkPassword(value) {
	return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{4,10}$/.test(value);
}

formRegister.addEventListener('submit', checkInput, false);