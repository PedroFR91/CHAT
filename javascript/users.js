const searchBar = document.querySelector('.users .search input'),
  searchButton = document.querySelector('.users .search button'),
  usersList = document.querySelector('.users .users-list');

searchButton.onclick = () => {
  searchBar.classList.toggle('active');
  searchBar.focus();
  searchButton.classList.toggle('active');
  searchBar.value = '';
};
searchBar.onkeyup = () => {
  let searchTerm = searchBar.value;
  //para que no se sobreescriban los ajax, creamos una clase active para el primero
  //y en el segundo hacemos que solo se ejecute si el primero esta inactivo
  if (searchTerm != '') {
    searchBar.classList.add('active');
  } else {
    searchBar.classList.remove('active');
  }
  //COMENZAMOS CON AJAX
  let xhr = new XMLHttpRequest(); //creating XML object
  xhr.open('POST', 'php/search.php', true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        usersList.innerHTML = data;
      }
    }
  };
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.send('searchTerm=' + searchTerm);
};
setInterval(() => {
  //COMENZAMOS CON AJAX
  let xhr = new XMLHttpRequest(); //creating XML object
  xhr.open('GET', 'php/users.php', true); //USAMOS GET PORQUE NECESITAMOS RECIBIR DATOS
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (!searchBar.classList.contains('active')) {
          usersList.innerHTML = data;
        }
      }
    }
  };
  xhr.send();
}, 500); //ejecutamos la funcion cada 500ms
