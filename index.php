<?php include_once "header.php";?>
  <body>
    <div class="wrapper">
      <section class="form signup">
        <header>Chat en Tiempo Real</header>
        <form action="#" enctype="multipart/form-data"> <!--Este atributo se usa cuando se utiliza el input type file-->
          <div class="error-txt"></div>
          <div class="name-details">
            <div class="field input">
              <label>Nombre</label>
              <input type="text" name="fname" placeholder="Nombre" required/>
            </div>
            <div class="field input">
              <label>Apellidos</label>
              <input type="text" name="lname"  placeholder="Apellidos" required/>
            </div>
          </div>
          <div class="field input">
            <label>Email</label>
            <input type="text" name="email"  placeholder="Introduzca su email" required />
          </div>
          <div class="field input">
            <label>Contraseña</label>
            <input
              type="password"
              name="password" 
              placeholder="Introduzca su nueva contraseña"
              required 
            />
            <i class="fa fa-eye"></i>
          </div>
          <div class="field image">
            <label>Imagen de perfil</label>
            <input type="file" name="image" required/>
          </div>
          <div class="field button">
            <input type="submit" value="Empiece a chatear!" />
          </div>
        </form>
        <div class="link">¿Está registrado? <a href="login.php">Ingrese</a></div>
      </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script> <!--TUVE UN ERROR AQUI AÑADIENDO // A JAVASCRIPT -->
    <script src="javascript/signup.js"></script>
  </body>
</html>
