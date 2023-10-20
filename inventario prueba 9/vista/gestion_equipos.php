<?php
session_start();
if($_SESSION['us_tipo']==1){
    include_once 'layout/header.php';
?>

<title>Gestion de Equipos</title>

<?php
    include_once 'layout/nav_adm.php';
?>

<!-- Comienzo de los modales -->

<div class="modal fade" id="crearEquipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Crear Equipo</h3>
                    <button data-dismiss="modal" aria-label="close" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="card-body">
                    <div class="alert alert-success text-center" id="add" style='display:none;'>
                        <span><i class="fas fa-check m-1"></i>Se agrego correctamente el Equipo.</span>
                    </div>
                    <div class="alert alert-success text-center" id="noAdd" style='display:none;'>
                        <span><i class="fas fa-times m-1"></i>No se agrego el Equipo.</span>
                    </div>
                    <form id="form-crear-equipo">
                        <div class="form-group">
                            <label for="encargado">Encargado</label>
                            <input id="encargado" type="text" class="form-control" placeholder="Encargado del equipo">
                        </div>
                        <div class="form-group">
                            <label for="marca">Marca</label>
                            <input id="marca" type="text" class="form-control" placeholder="Marca del equipo">
                        </div>
                        <div class="form-group">
                            <label for="modelo">Modelo</label>
                            <input id="modelo" type="text" class="form-control" placeholder="Modelo del equipo">
                        </div>
                        <div class="form-group">
                            <label for="invEst">Inv. Estatal</label>
                            <input id="invEst" type="text" class="form-control" placeholder="Codigo de inventario estatal del equipo">
                        </div>
                        <div class="form-group">
                            <label for="invFed">Inv. Federal</label>
                            <input id="invFed" type="text" class="form-control" placeholder="Codigo de inventario federal del equipo">
                        </div>
                        <div class="form-group">
                            <label for="nSerie">Num. de Serie</label>
                            <input id="nSerie" type="text" class="form-control" placeholder="Num. de serie del equipo">
                        </div>

                        <!-- Inicio del SWITCH y CPU -->

                        <!--

                        <div class="form-group">
                            <label for="discoDuro_cpu">Disco Duro</label>
                            <input id="discoDuro_cpu" type="text" class="form-control" placeholder="Discuo duro del CPU">
                        </div>
                        <div class="form-group">
                            <label for="memoria_cpu">Memoria</label>
                            <input id="memoria_cpu" type="text" class="form-control" placeholder="Memoria del CPU">
                        </div>
                        <div class="form-group">
                            <label for="sisOp_cpu">Sistema Operativo</label>
                            <input id="sisOp_cpu" type="text" class="form-control" placeholder="Sistema Operativo del CPU">
                        </div>
                        <div class="form-group">
                            <label for="direccionIp">Direccion IP</label>
                            <input id="direccionIp" type="text" class="form-control" placeholder="Direccion IP del equipo">
                        </div>
                        <div class="form-group">
                            <label for="direccionFisica">Direccion Fisica</label>
                            <input id="direccionFisica" type="text" class="form-control" placeholder="Direccion Fisica del equipo">
                        </div>
                        <div class="form-group">
                            <label for="procesador_cpu">Procesador</label>
                            <input id="procesador_cpu" type="text" class="form-control" placeholder="Procesador del CPU">
                        </div>
                        <div class="form-group">
                            <label for="antivirus_cpu">Antivirus</label>
                            <input id="antivirus_cpu" type="text" class="form-control" placeholder="Antivirus del CPU">
                        </div>
                        <div class="form-group">
                            <label for="versionBios_cpu">Version BIOS</label>
                            <input id="versionBios_cpu" type="text" class="form-control" placeholder="Version BIOS del CPU">
                        </div>
                        <div class="form-group">
                            <label for="fibraOpt_switch">Fibra Optica</label>
                            <input id="fibraOpt_switch" type="text" class="form-control" placeholder="Fibra optica del SWITCH">
                        </div>
                        <div class="form-group">
                            <label for="puertos_switch">Puertos</label>
                            <input id="puertos_switch" type="text" class="form-control" placeholder="Puertos del SWITCH">
                        </div>
                        <div class="form-group">
                            <label for="poe_switch">POE</label>
                            <input id="poe_switch" type="text" class="form-control" placeholder="POE del SWITCH">
                        </div>
                        <div class="form-group">
                            <label for="capa_switch">Capa</label>
                            <input id="capa_switch" type="text" class="form-control" placeholder="Capa del SWITCH">
                        </div>
                        <div class="form-group">
                            <label for="usuario_switch">Usuario</label>
                            <input id="usuario_switch" type="text" class="form-control" placeholder="Usuario del SWITCH">
                        </div>
                        <div class="form-group">
                            <label for="passwordS_switch">Password</label>
                            <input id="passwordS_switch" type="text" class="form-control" placeholder="Password del SWITCH">
                        </div>

                        -->

                        <!-- Fin del SWITCH y CPU -->

                        <!-- Inicio de style2 -->

                        <div class="form-group">
                            <label for="estado_equipo">Estado</label>
                            <select id="estado_equipo" class="form-control select2" style="width: 100%"></select>
                        </div>
                        <div class="form-group">
                            <label for="locacion_equipo">Locacion</label>
                            <select id="locacion_equipo" class="form-control select2" style="width: 100%"></select>
                        </div>
                        <div class="form-group">
                            <label for="piso_equipo">Piso</label>
                            <select id="piso_equipo" class="form-control select2" style="width: 100%"></select>
                        </div>
                        <div class="form-group">
                            <label for="tipo_equipo">Tipo</label>
                            <select id="tipo_equipo" class="form-control select2" style="width: 100%"></select>
                        </div>

                        <!-- Fin de style2 -->

                        <div class="form-group">
                            <label for="datosAdicionales">Datos Adicionales</label>
                            <textarea id="datosAdicionales" type="text" class="form-control"  rows="3" placeholder="Datos adicionales del equipo"></textarea>
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
                    <h1>Gestion de Equipos
                        <button id="button-crear-equipo" data-toggle="modal" data-target="#crearEquipo" type="button" class="btn bg-gradient-primary ml-2">Crear Equipo</button>
                        <button id="button-crear-cpu" data-toggle="modal" data-target="#crearCPU" type="button" class="btn bg-gradient-primary ml-2">Crear CPU</button>
                        <button id="button-crear-switch" data-toggle="modal" data-target="#crearSWITCH" type="button" class="btn bg-gradient-primary ml-2">Crear SWITCH</button>
                    </h1>
                </div>
                <div class="col-sm-5">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../vista/adm_catalogo.php">Home</a></li>
                        <li class="breadcrumb-item active">Equipos</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section>

    <div class="container-fluid">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title m-2">Buscar Equipo</h3>
                <div class="input-group">
                    <input type="text" id="buscar-equipo" class="form-control float-left" placeholder="Ingrese nombre de Equipo">
                    <div class="input-group-append">
                        <button class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="equipos" class="row d-flex align-items-stretch">

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
<script src="../js/gestionEquipos.js"></script>