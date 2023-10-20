<?php
session_start();
if($_SESSION['us_tipo']==1){
    include_once 'layout/header.php';
?>

<title>Gestion de Usuarios</title>

<?php
    include_once 'layout/nav_adm.php';
?>

<!-- Comienzo de los modales -->

<div class="modal fade" id="confirmar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmar Acción</h1>
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

                <span>Se requiere la contraseña actual para continuar.</span>

                <div class="alert alert-success text-center" id="eliminado" style='display:none'>
                    <span><i class="fas fa-check m-1"></i>Se elimino el usuario correctamente.</span>
                </div>
                <div class="alert alert-success text-center" id="noEliminado" style='display:none;'>
                    <span><i class="fas fa-times m-1"></i>No se pudo eliminar el usuario.</span>
                </div>

                <form id="form-confirmar">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                        </div>
                        <input id="oldPassword" type="password" class="form-control" placeholder="Ingrese contraseña actual">
                        <input type="hidden" id="id_user">
                        <input type="hidden" id="funcion">
                    </div>
        
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Close</button>
                <button type="submit" class="btn bg-gradient-primary">Guardar</button>
                </form>
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="crearUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Crear Usuario</h3>
                    <button data-dismiss="modal" aria-label="close" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="card-body">
                    <div class="alert alert-success text-center" id="add" style='display:none;'>
                        <span><i class="fas fa-check m-1"></i>Se agrego correctamente el usuario.</span>
                    </div>
                    <div class="alert alert-success text-center" id="noAdd" style='display:none;'>
                        <span><i class="fas fa-times m-1"></i>La clave ya existe en otro usuario.</span>
                    </div>
                    <form id="form-crear">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" type="text" class="form-control" placeholder="Ingrese nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input id="apellidos" type="text" class="form-control" placeholder="Ingrese apellidos" required>
                        </div>
                        <div class="form-group">
                            <label for="clave">Clave</label>
                            <input id="clave" type="text" class="form-control" placeholder="Ingrese una clave" required>
                        </div>
                        <div class="form-group">
                            <label for="pass">Contraseña</label>
                            <input id="pass" type="password" class="form-control" placeholder="Ingrese una contraseña" required>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn bg-gradient-primary float-right m-1">Guardar</button>
                    <button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Fin de los modales -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-7">
                    <h1>Gestion de Usuarios<button id="button-crear" data-toggle="modal" data-target="#crearUsuario" type="button" class="btn bg-gradient-primary ml-2">Crear Usuario</button></h1>
                    <input type="hidden" id="tipo_usuario" value="<?php echo $_SESSION['us_tipo']?>">
                </div>
                <div class="col-sm-5">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../vista/adm_catalogo.php">Home</a></li>
                        <li class="breadcrumb-item active">Usuarios</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section>

    <div class="container-fluid">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title m-2">Buscar Usuario</h3>
                <div class="input-group">
                    <input type="text" id="buscar" class="form-control float-left" placeholder="Ingrese nombre de Usuario">
                    <div class="input-group-append">
                        <button class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="usuarios" class="row d-flex align-items-stretch">

                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>

    </section>
</div>


<?php
include_once 'layout/footer.php';
}
else{
    header('Location: ../index.php');
}
?>
<script src="../js/gestionUsuarios.js"></script>