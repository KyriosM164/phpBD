<?php
include("../../bd.php");
if($_POST){
    //RECOLECTAR DATOS DE POST
    $usuario=(isset($_POST["usuario"])?$_POST["usuario"]:"");
    $correo=(isset($_POST["correo"])?$_POST["correo"]:"");
    $password=(isset($_POST["password"])?$_POST["password"]:"");
    //PREPARAR LA INSERCCION DE LOS DATOS
    $sentencia=$conexion->prepare("INSERT INTO tbl_usuarios(id,usuario, correo, password)
    VALUES (null,:usuario,:correo,:password) ");
    //Asigna valores que tienen uso de :variable
    $sentencia->bindParam(":usuario",$usuario);
    $sentencia->bindParam(":correo",$correo);
    $sentencia->bindParam(":password",$password);
    $sentencia->execute();

    $mensaje="Registro agregado";

    header("Location:index.php?mensaje=".$mensaje);

}
?>
<?php include("../../templates/header.php"); ?>

<br/>
    <div class="card">
        <div class="card-header">
            Datos del usuario
        </div>
        <div class="card-body">

        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">  
              <label for="usuario" class="form-label">Nombre del usuario:</label>
              <input type="text"
                class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Nombre del usuario">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Email</label>
              <input type="email"
                class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="Escriba su correo">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Password</label>
              <input type="password"
                class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Escriba su contraseña">   
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>

            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>


            

        </form>

        </div>
        <div class="card-footer text-muted">
           
        </div>
    </div>
<?php include("../../templates/footer.php"); ?>