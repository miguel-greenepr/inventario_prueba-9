<?php
session_start();
if($_SESSION['us_tipo']==1){
    include_once 'layout/header.php';
?>

<title>Gestion de Atributos</title>
<?php
    include_once 'layout/nav_adm.php';
?>

<!-- Comienzo de los modales -->

<div class="modal fade" id="crearEstado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Estado</h3>
                    <button data-dismiss="modal" aria-label="close" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="alert alert-success text-center" id="add-estado" style='display:none;'>
                        <span><i class="fas fa-check m-1"></i>Se creo el Estado correctamente.</span>
                    </div>
                    <div class="alert alert-danger text-center" id="noAdd-estado" style='display:none;'>
                        <span><i class="fas fa-times m-1"></i>El Estado ya existe.</span>
                    </div>
                    <div class="alert alert-success text-center" id="edit-est" style='display:none;'>
                        <span><i class="fas fa-check m-1"></i>Se edito correctamente el Estado.</span>
                    </div>
                    <form id="form-crear-estado">
                        <div class="form-group">
                            <label for="nombre-estado">Nombre</label>
                            <input id="nombre-estado" type="text" class="form-control" placeholder="Ingrese nombre" required>
                            <input type="hidden" id="id_editar_est">
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

<div class="modal fade" id="crearLocacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Locacion</h3>
                    <button data-dismiss="modal" aria-label="close" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="alert alert-success text-center" id="add-locacion" style='display:none;'>
                        <span><i class="fas fa-check m-1"></i>Se creo la Locacion correctamente.</span>
                    </div>
                    <div class="alert alert-danger text-center" id="noAdd-locacion" style='display:none;'>
                        <span><i class="fas fa-times m-1"></i>La Locacion ya existe.</span>
                    </div>
                    <div class="alert alert-success text-center" id="edit-loc" style='display:none;'>
                        <span><i class="fas fa-check m-1"></i>Se edito correctamente la Locacion.</span>
                    </div>
                    <form id="form-crear-locacion">
                        <div class="form-group">
                            <label for="nombre-locacion">Nombre</label>
                            <input id="nombre-locacion" type="text" class="form-control" placeholder="Ingrese nombre" required>
                            <input type="hidden" id="id_editar_loc">
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

<div class="modal fade" id="crearPiso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Piso</h3>
                    <button data-dismiss="modal" aria-label="close" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="alert alert-success text-center" id="add-pis" style='display:none;'>
                        <span><i class="fas fa-check m-1"></i>Se creo el Piso correctamente.</span>
                    </div>
                    <div class="alert alert-danger text-center" id="noAdd-pis" style='display:none;'>
                        <span><i class="fas fa-times m-1"></i>El Piso ya existe.</span>
                    </div>
                    <div class="alert alert-success text-center" id="edit-pis" style='display:none;'>
                        <span><i class="fas fa-check m-1"></i>Se edito correctamente el Piso.</span>
                    </div>
                    <form id="form-crear-piso">
                        <div class="form-group">
                            <label for="nombre-piso">Nombre</label>
                            <input id="nombre-piso" type="text" class="form-control" placeholder="Ingrese nombre" required>
                            <input type="hidden" id="id_editar_pis">
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

<div class="modal fade" id="crearTipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Tipo</h3>
                    <button data-dismiss="modal" aria-label="close" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="alert alert-success text-center" id="add-tipo" style='display:none;'>
                        <span><i class="fas fa-check m-1"></i>Se creo el Tipo correctamente.</span>
                    </div>
                    <div class="alert alert-danger text-center" id="noAdd-tipo" style='display:none;'>
                        <span><i class="fas fa-times m-1"></i>El Tipo ya existe.</span>
                    </div>
                    <div class="alert alert-success text-center" id="edit-tip" style='display:none;'>
                        <span><i class="fas fa-check m-1"></i>Se edito correctamente el Tipo.</span>
                    </div>
                    <form id="form-crear-tipo">
                        <div class="form-group">
                            <label for="nombre-tipo">Nombre</label>
                            <input id="nombre-tipo" type="text" class="form-control" placeholder="Ingrese nombre" required>
                            <input type="hidden" id="id_editar_tip">
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn bg-gradient-primary float-right m-1">Crear</button>
                    <button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Fin de los modales -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestion de Atributos</h1>
                </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Atributos</li>
                </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a href="#estado" class="nav-link active" data-toggle="tab">Estado</a></li>
                                <li class="nav-item"><a href="#locacion" class="nav-link" data-toggle="tab">Locacion</a></li>
                                <li class="nav-item"><a href="#piso" class="nav-link" data-toggle="tab">Piso</a></li>
                                <li class="nav-item"><a href="#tipo" class="nav-link" data-toggle="tab">Tipo</a></li>
                            </ul>
                        </div>
                        <div class="card-body p-0">
                            <div class="tab-content">
                                <div class="tab-pane active" id='estado'>
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title">Buscar Estado <button type="button" data-toggle="modal" data-target="#crearEstado" class="btn bg-gradient-primary btn-sm m-2">Crear Estado</button></div>
                                            <div class="input-group">
                                                <input id="buscar-estado" type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body p-0 table-responsive">
                                            <table class="table table-over text-nowrap">
                                                <thead class="table-success">
                                                    <tr>
                                                        <th>Estado</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-active" id="estados">

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id='locacion'>
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title">Buscar Locacion <button type="button" data-toggle="modal" data-target="#crearLocacion" class="btn bg-gradient-primary btn-sm m-2">Crear Locacion</button></div>
                                            <div class="input-group">
                                                <input id="buscar-locacion" type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body p-0 table-responsive">
                                            <table class="table table-over text-nowrap">
                                                <thead class="table-success">
                                                    <tr>
                                                        <th>Locacion</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-active" id="locaciones">

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id='piso'>
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title">Buscar Piso <button type="button" data-toggle="modal" data-target="#crearPiso" class="btn bg-gradient-primary btn-sm m-2">Crear Piso</button></div>
                                            <div class="input-group">
                                                <input id="buscar-piso" type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body p-0 table-responsive">
                                            <table class="table table-over text-nowrap">
                                                <thead class="table-success">
                                                    <tr>
                                                        <th>Piso</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-active" id="pisos">

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id='tipo'>
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title">Buscar Tipo <button type="button" data-toggle="modal" data-target="#crearTipo" class="btn bg-gradient-primary btn-sm m-2">Crear Tipo</button></div>
                                            <div class="input-group">
                                                <input id="buscar-tipo" type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body p-0 table-responsive">
                                            <table class="table table-over text-nowrap">
                                                <thead class="table-success">
                                                    <tr>
                                                        <th>Tipo</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-active" id="tipos">

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include_once 'layout/footer.php';
}
else{
    header('Location: ../index.php');
}
?>
<script src="../js/gestionEstados.js"></script>
<script src="../js/gestionLocaciones.js"></script>
<script src="../js/gestionPisos.js"></script>
<script src="../js/gestionTipos.js"></script>