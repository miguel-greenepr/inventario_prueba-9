<?php
session_start();
if($_SESSION['us_tipo']==1 || $_SESSION['us_tipo']==2){
  include_once 'layout/header.php';
?>

  <title>Usuario</title>
  <!-- Google Font: Source Sans Pro -->
  <?php
    include_once 'layout/nav_adm.php';
  ?>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="cambiarContrasena" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h1>
        <button data-dismiss="modal" aria-label="close" class="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <img src="../img/avatar5.png" class="profile-user-img img-fluid img-circle">
        </div>
        <div class="text-center">
          <b>
            <?php
              echo $_SESSION['nombre_us'];
            ?>
          </b>
        </div>

        <div class="alert alert-success text-center" id="update" style='display:none'>
          <span><i class="fas fa-check m-1"></i>Se cambio correctamente la contraseña.</span>
        </div>
        <div class="alert alert-success text-center" id="noUpdate" style='display:none;'>
          <span><i class="fas fa-times m-1"></i>La contraseña no es correcta.</span>
        </div>

        <form id="form-pass">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-unlock"></i></span>
            </div>
            <input id="oldPassword" type="password" class="form-control" placeholder="Ingrese contraseña actual">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>
            <input id="newPassword" type="text" class="form-control" placeholder="Ingrese nueva contraseña">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Close</button>
        <button type="submit" class="btn bg-gradient-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Usuario</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../vista/adm_catalogo.php">Home</a></li>
              <li class="breadcrumb-item active">Datos de usuario</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
              <div class="card card-success card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img src="../img/avatar5.png" class="profile-user-img img-fluid img-circle">
                  </div>
                  <input id="id_usuario" type="hidden" value="<?php echo $_SESSION["usuario"]?>">
                  <h3 id="nombre_us" class="profile-username text-center text-success">Nombre</h3>
                  <p id="apellidos_us" class="text-muted text-center">Apellidos</p>
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b style="color:#0B7300">Clave</b><a id="clave_us" class="float-right">12</a>
                    </li>
                    <li class="list-group-item">
                      <b style="color:#0B7300">Contraseña</b><a id="contrasena_us" class="float-right">12</a>
                    </li>
                    <li class="list-group-item">
                      <b style="color:#0B7300">Tipo Usuario</b>
                      <span id="us_tipo" class="float-right badge badge-primary">Admin</span>
                    </li>

                    <!--

                    <button data-toggle="modal" data-target="#cambiarContrasena" type="button" class="btn btn-block btn-outline-warning btn-sm">Cambiar contraseña</button>

                    -->

                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

  

<?php
include_once 'layout/footer.php';
}
else{
    header('Location: ../index.php');
}
?>
<script src="../js/user.js"></script>