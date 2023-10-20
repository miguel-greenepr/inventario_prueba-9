<?php
session_start();
if($_SESSION['us_tipo']==1){
    include_once 'layout/header.php';
?>

<title>Lista de Tipos</title>

<?php
    include_once 'layout/nav_adm.php';
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lista de Tipos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../vista/adm_catalogo.php">Home</a></li>
                        <li class="breadcrumb-item active">Tipos</li>
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
                                <li class="nav-item"><a href="#cpu" class="nav-link active" data-toggle="tab">CPU</a></li>
                                <li class="nav-item"><a href="#monitor" class="nav-link" data-toggle="tab">Monitor</a></li>
                                <li class="nav-item"><a href="#teclado" class="nav-link" data-toggle="tab">Teclado</a></li>
                                <li class="nav-item"><a href="#mouse" class="nav-link" data-toggle="tab">Mouse</a></li>
                                <li class="nav-item"><a href="#impresora" class="nav-link" data-toggle="tab">Impresora</a></li>
                                <li class="nav-item"><a href="#switch" class="nav-link" data-toggle="tab">Switch</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="cpu">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title m-2">Buscar CPU</div>
                                            <div class="input-group">
                                                <input id="buscar-cpu" type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body"></div>
                                        <div class="card-footer"></div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="monitor">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title m-2">Buscar Monitor</div>
                                            <div class="input-group">
                                                <input id="buscar-monitor" type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body"></div>
                                        <div class="card-footer"></div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="teclado">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title m-2">Buscar Teclado</div>
                                            <div class="input-group">
                                                <input id="buscar-teclado" type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body"></div>
                                        <div class="card-footer"></div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="mouse">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title m-2">Buscar Mouse</div>
                                            <div class="input-group">
                                                <input id="buscar-mouse" type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body"></div>
                                        <div class="card-footer"></div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="impresora">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title m-2">Buscar Impresora</div>
                                            <div class="input-group">
                                                <input id="buscar-impresora" type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body"></div>
                                        <div class="card-footer"></div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="switch">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title m-2">Buscar Switch</div>
                                            <div class="input-group">
                                                <input id="buscar-switch" type="text" class="form-control float-left" placeholder="Ingrese nombre">
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