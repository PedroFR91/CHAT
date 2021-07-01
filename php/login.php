<?php
   session_start();
   include_once "config.php";
   $email=mysqli_real_escape_string($conn,$_POST['email']);
   $password=mysqli_real_escape_string($conn,$_POST['password']);

    if(!empty($email) && !empty($password)){
        //check si email y password esta en la base de datos
        $sql=mysqli_query($conn,"SELECT * FROM users WHERE email='{$email}' AND password='{$password}'");
        if(mysqli_num_rows($sql)>0){//si las credenciales son correctas
            $row=mysqli_fetch_assoc($sql);
            $_SESSION['unique_id']=$row['unique_id'];//usamos SESSION en este archivo, en el resto unique_id
            echo 'exito';
        }else{
            echo "¡Email o contraseña incorrectos!";
        }
    }else{
        echo "Rellene los campos, por favor.";
    }
?>