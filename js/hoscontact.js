
const form = document.getElementById('form');
const firstname = document.getElementById('firstname');
const lastname = document.getElementById('lastname');
const email = document.getElementById('email');
const contact = document.getElementById('contact');


form.addEventListener('submit', e => {
  e.preventDefault();
  
  checkInputs();
});

function checkInputs() {
 
  const firstnameValue = firstname.value.trim();
  const lastnameValue = lastname.value.trim();
  const emailValue = email.value.trim();
  const contactValue = contact.value.trim();
  
  
  if(firstnameValue === '') {
    setErrorFor(firstname, 'Firstname cannot be blank');
  } else {
    setSuccessFor(firstname);
  }
  if(lastnameValue === '') {
    setErrorFor(lastname, 'Lastname cannot be blank');
  } else {
    setSuccessFor(lastname);
  }
  
  if(emailValue === '') {
    setErrorFor(email, 'Email cannot be blank');
  } else if (!isEmail(emailValue)) {
    setErrorFor(email, 'Not a valid email');
  } else {
    setSuccessFor(email);
  }
  
  if(contactValue === '') {
    setErrorFor(contact, 'Contact no. cannot be blank');
  } else {
    setSuccessFor(contact);
    alert("Form Submitted");
  }
  
  
}






function setErrorFor(input, message) {
  const formControl = input.parentElement;
  const small = formControl.querySelector('small');
  formControl.className = 'form-control error';
  small.innerText = message;
}

function setSuccessFor(input) {
  const formControl = input.parentElement;
  formControl.className = 'form-control success';
}
  
function isEmail(email) {
  return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}














