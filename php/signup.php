<?php
session_start();
    include_once "config.php";
    $fname=mysqli_real_escape_string($conn,$_POST['fname']);
    $lname=mysqli_real_escape_string($conn,$_POST['lname']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);

    if(!empty($fname) &&  !empty($lname) && !empty($email) && !empty($password)) {
    //check email valido
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //miramos si está en la base de datos
            $sql=mysqli_query($conn, "SELECT email FROM users WHERE email='{$email}'");
            if (mysqli_num_rows($sql)>0) {//el email existe
                echo "$email - Este email existe";
            } else {
                //check imagen
                if (isset($_FILES['image'])) { //si la imagen se ha subido
                    $img_name=$_FILES['image']['name'];//cogemos el nombre de la imagen subida
                    $img_type=$_FILES['image']['type'];//cogemos el tipo de la imagen subida
                    $tmp_name=$_FILES['image']['tmp_name'];//nombre temporal para guardar/mover la imagen en nuestra carpeta

                    //separar extension
                    $img_explode=explode('.', $img_name);
                    $img_ext=end($img_explode); //obtenemos la extension de la imagen

                    $extensions=['png','jpeg','jpg'];//extensiones validas

                    if (in_array($img_ext, $extensions)===true) {//si la extension existe y se encuntra en el array de extensiones
                        $time=time();//tiempo actual, nombramos las imagenes con el, obteniendo un unique id
                        //movemos la imagen subida a nuestra carpeta
                        $new_img_name=$time.$img_name;

                        if (move_uploaded_file($tmp_name, "images/".$new_img_name)) {//si la imagen se sube con exito
                            $status='Conectado';//asiganmos al usuario el estatus de conectado
                            $random_id=rand(time(), 10000000); //creamod un id aleatorio para cada usuario

                            //Introdocimos los datos del usuario en la base de datos
                            $sql2=mysqli_query($conn, "INSERT INTO users (unique_id,fname, lname,email,password,img,status) 
                            VALUES ({$random_id},'{$fname}','{$lname}','{$email}','{$password}','{$new_img_name}','{$status}')");
                            if ($sql2) {
                                $sql3=mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'");
                                if (mysqli_num_rows($sql3)>0) {
                                    $row=mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id']=$row['unique_id'];//usamos SESSION en este archivo, en el resto unique_id
                                    echo 'exito';
                                }
                            } else {
                                echo "Ha fallado la subida de datos";
                            }
                        }
                    } else {
                        echo 'Extensiones permitidas - jpeg, jpg, png';
                    }
                } else {
                    echo " Por favor, seleccione una imagen de perfil";
                }
            }
                    
        } else {
                    echo "$email - No es un email válido";
                }
        
    }else{  
            echo"Debe rellenar todos los campos";
        }   



?>