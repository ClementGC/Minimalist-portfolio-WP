let form  = document.querySelector('.contact-form');
let fields = form.querySelectorAll('input, textarea');

function checkFieldValidity(field) {
	let fieldError = field.nextElementSibling;

	if (!field.checkValidity() ) {
		field.classList.add('is-invalid');
	} else {
		field.classList.remove('is-invalid');
	}

	if ( field.hasAttribute('required') && field.value === "") {
		fieldError.textContent = 'This field is required !'
	} else if ( field.getAttribute('type') === 'email' && !field.validity.valid ) {
		fieldError.textContent = 'Please enter a valid email address.'
	} else {
		fieldError.textContent = ''
	}
}

fields.forEach( field => {
	field.addEventListener('blur', function (event) {
		checkFieldValidity(field);
	})
})

form.addEventListener('submit', function(event){
	fields.forEach( field => {
			checkFieldValidity(field);
	})
	if ( !form.checkValidity() ) {
		event.preventDefault();
		form.querySelector('[type="submit"] + .error ').textContent = 'Please correct all the errors in the form.'
	}
})