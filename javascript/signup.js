const form = document.querySelector('.signup form'),
  continueButton = form.querySelector('.button input'),
  errorText = form.querySelector('.error-txt');

form.onsubmit = (e) => {
  e.preventDefault();
};
continueButton.onclick = () => {
  //COMENZAMOS CON AJAX
  let xhr = new XMLHttpRequest(); //creating XML object
  xhr.open('POST', 'php/signup.php', true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data == 'exito') {
          location.href = 'users.php';
        } else {
          errorText.textContent = data;
          errorText.style.display = 'block';
        }
      }
    }
  };
  //Enviamor el form mediante ajax hasta php
  let formData = new FormData(form); //creamos nuevo objeto
  xhr.send(formData); //enviamos el form a php
};
