<?php
include("../../bd.php");
if(isset( $_GET['txtID'])){

  $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

  $sentencia=$conexion->prepare("SELECT * FROM tbl_usuarios WHERE id=:id");
  $sentencia->bindParam(":id",$txtID) ;
  $sentencia->execute();
  $registro=$sentencia->fetch(PDO::FETCH_LAZY);

  $usuario=$registro["usuario"];
  $correo=$registro["correo"];
  $password=$registro["password"];
}
if($_POST){
  //RECOLECTAR DATOS DE POST
  $txtID=(isset($_POST["txtID"])?$_POST["txtID"]:"");
  $usuario=(isset($_POST["usuario"])?$_POST["usuario"]:"");
  $correo=(isset($_POST["correo"])?$_POST["correo"]:"");
  $password=(isset($_POST["password"])?$_POST["password"]:"");
  //PREPARAR LA INSERCCION DE LOS DATOS
  $sentencia=$conexion->prepare("UPDATE tbl_usuarios SET 
  usuario=:usuario,
  correo=:correo,
  password=:password
  WHERE id=:id ");
  //Asigna valores que tienen uso de :variable
  $sentencia->bindParam(":id",$txtID);
  $sentencia->bindParam(":usuario",$usuario);
  $sentencia->bindParam(":correo",$correo);
  $sentencia->bindParam(":password",$password);
  $sentencia->execute();
  
  $mensaje="Registro actualizado";

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
          
          <label for="txtID" class="form-label">ID:</label>
          <input type="text"
          value="<?php echo $txtID;?>"
          class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
        
            <div class="mb-3">  
              <label for="usuario" class="form-label">Nombre del usuario:</label>
              <input type="text"
              value="<?php echo $usuario;?>"
                class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Nombre del usuario">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Email</label>
              <input type="email"
              value="<?php echo $correo;?>"
                class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="Escriba su correo">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Password</label>
              <input type="password"
              value="<?php echo $password;?>"
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