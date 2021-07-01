<?php include_once "header.php";?>
  <body>
    <div class="wrapper">
      <section class="form login">
        <header>Chat en Tiempo Real</header>
        <form action="#">
          <div class="error-txt"></div>
          <div class="field input">
            <label>Email</label>
            <input type="text" name="email" placeholder="Introduzca su email" />
          </div>
          <div class="field input">
            <label>Contraseña</label>
            <input type="password" name="password" placeholder="Introduzca su contraseña" />
            <i class="fa fa-eye"></i>
          </div>
          <div class="field button">
            <input type="submit" value="Empiece a chatear!" />
          </div>
        </form>
        <div class="link">¿No está registrado? <a href="index.php">Regístrese</a></div>
      </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
  </body>
</html>
