<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de registro SCIII</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>

    <script>
        const emailInput = document.getElementById('correo');
emailInput.addEventListener('input', function () {
  if (emailInput.checkValidity()) {
    emailInput.classList.add('valid');
    emailInput.classList.remove('invalid');
  } else {
    emailInput.classList.add('invalid');
    emailInput.classList.remove('valid');
  }
});
    </script>
   
</head>
<body>
    <div class="content row justify-content-center align-items-center letra">
    <div class="caja">
        <form method="POST" action="">
            <h2><em>Formulario de Registro</em></h2>
            <label for="nombre">Nombre<span><em>(requerido)</em></span></label>
            <input type="text" name="nombre" class="form-input w-100" required/>

            <label for="apellido">Apellido<span><em>(requerido)</em></span></label>
            <input type="text" name="apellido" class="form-input w-100" required/>

            <label for="email">email<span><em>(requerido)</em></span></label>
            <input type="email" name="email" class="form-input w-100" required/>
            <input type="submit" name="submit" value="Suscribirse" class="btn bg-primary"/>
            </form>

    <?php

    if(isset($_POST['submit'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];

        if(empty($nombre)|| empty($apellido)||empty($email)){
            header("location: ingrese los datos");
            exit();
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("location: el correo no es valido");
            exit();
        }else{
            echo "<h1> Formulario enviado correctamente</h1>";
        }

    }

    if($_POST){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cursosql";

        $conn = new mysqli($servername,$username,$password,$dbname);

        if($conn->connect_error){
            die("connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO usuario (nombre, apellido, email)
                VALUES ('$nombre','$apellido','$email')";

        if($conn->query($sql) === TRUE ) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

    }
    ?>

        
    </div>
    </div>
</body>
</html>
