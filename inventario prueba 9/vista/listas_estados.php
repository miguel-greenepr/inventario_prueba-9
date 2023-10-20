<?php
session_start();
if($_SESSION['us_tipo']==1){
    include_once 'layout/header.php';
?>

<title>Lista de Estados</title>

<?php
    include_once 'layout/nav_adm.php';
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lista de Estados</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../vista/adm_catalogo.php">Home</a></li>
                        <li class="breadcrumb-item active">Estados</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a href="#activos" class="nav-link active" data-toggle="tab">Activos</a></li>
                                <li class="nav-item"><a href="#mantenimiento" class="nav-link" data-toggle="tab">Mantenimiento</a></li>
                                <li class="nav-item"><a href="#muertos" class="nav-link" data-toggle="tab">Muertos</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="activos">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title m-2">Buscar Activos</div>
                                            <div class="input-group">
                                                <input id="buscar-activos" type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body"></div>
                                        <div class="card-footer"></div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="mantenimiento">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title m-2">Buscar Mantenimiento</div>
                                            <div class="input-group">
                                                <input id="buscar-mantenimiento" type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body"></div>
                                        <div class="card-footer"></div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="muertos">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title m-2">Buscar Muertos</div>
                                            <div class="input-group">
                                                <input id="buscar-muertos" type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body"></div>
                                        <div class="card-footer"></div>
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

</div>

<?php
include_once 'layout/footer.php';
}
else{
    header('Location: ../index.php');
}
?>