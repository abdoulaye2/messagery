let form = document.querySelector('#form');
let username = document.querySelector('#form .username');
let password = document.querySelector('#form .password');

let div = document.createElement('div');
div.setAttribute('class', 'alert alert-danger');
div.setAttribute('role', 'alert');
div.textContent = "Le champ nom d'utilisateur est obligatoire.";

let divpass = document.createElement('div');
divpass.setAttribute('class', 'alert alert-danger');
divpass.setAttribute('role', 'alert');
divpass.textContent = "Le champ mot de passe est obligatoire..";

form.addEventListener("submit", function(e){
	
	if (username.value == '') {
		form.insertBefore(div, form.childNodes[0]);
		e.preventDefault();
	} else if (password.value == '') {
		username.value = username.value
		form.insertBefore(divpass, form.childNodes[0]);
		e.preventDefault();
	}
});