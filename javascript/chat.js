const form = document.querySelector('.typing-area'),
  inputField = form.querySelector('.input-field'),
  sendButton = form.querySelector('button'),
  chatBox = document.querySelector('.chat-box');

form.onsubmit = (e) => {
  e.preventDefault();
};

sendButton.onclick = () => {
  //COMENZAMOS CON AJAX
  let xhr = new XMLHttpRequest(); //creating XML object
  xhr.open('POST', 'php/insert-chat.php', true); //USAMOS POST PARA MANDAR Y RECIBIR DATOS
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        inputField.value = ''; //al enviar el mensaje dejamos en blanco el campo de escritura
      }
    }
  };
  //Enviamor el form mediante ajax hasta php
  let formData = new FormData(form); //creamos nuevo objeto
  xhr.send(formData); //enviamos el form a php};
};
setInterval(() => {
  //COMENZAMOS CON AJAX
  let xhr = new XMLHttpRequest(); //creating XML object
  xhr.open('POST', 'php/get-chat.php', true); //USAMOS GET PORQUE NECESITAMOS RECIBIR DATOS
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chatBox.innerHTML = data;
      }
    }
  };
  //Enviamor el form mediante ajax hasta php
  let formData = new FormData(form); //creamos nuevo objeto
  xhr.send(formData); //enviamos el form a php};
}, 500); //ejecutamos la funcion cada 500ms
