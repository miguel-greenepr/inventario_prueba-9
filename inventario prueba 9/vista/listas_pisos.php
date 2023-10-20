<?php
session_start();
if($_SESSION['us_tipo']==1){
    include_once 'layout/header.php';
?>

<title>Lista de Pisos</title>

<?php
    include_once 'layout/nav_adm.php';
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lista de Pisos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../vista/adm_catalogo.php">Home</a></li>
                        <li class="breadcrumb-item active">Pisos</li>
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
                                <li class="nav-item"><a href="#pisoPB" class="nav-link active mb-1" data-toggle="tab">PB</a></li>
                                <li class="nav-item"><a href="#piso1" class="nav-link mb-1" data-toggle="tab">Piso 1</a></li>
                                <li class="nav-item"><a href="#piso2" class="nav-link mb-1" data-toggle="tab">Piso 2</a></li>
                                <li class="nav-item"><a href="#piso3" class="nav-link mb-1" data-toggle="tab">Piso 3</a></li>
                                <li class="nav-item"><a href="#piso4" class="nav-link mb-1" data-toggle="tab">Piso 4</a></li>
                                <li class="nav-item"><a href="#pisoUcam" class="nav-link mb-1" data-toggle="tab">UCAM</a></li>



                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="pisoPB">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title m-2">Buscar PB</div>
                                            <div class="input-group">
                                                <input id="buscar-pisoPB" type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body"></div>
                                        <div class="card-footer"></div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="piso1">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title m-2">Buscar Piso 1</div>
                                            <div class="input-group">
                                                <input id="buscar-piso1" type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body"></div>
                                        <div class="card-footer"></div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="piso2">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title m-2">Buscar Piso 2</div>
                                            <div class="input-group">
                                                <input id="buscar-piso2" type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body"></div>
                                        <div class="card-footer"></div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="piso3">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title m-2">Buscar Piso 3</div>
                                            <div class="input-group">
                                                <input id="buscar-piso3" type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body"></div>
                                        <div class="card-footer"></div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="piso4">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title m-2">Buscar Piso 4</div>
                                            <div class="input-group">
                                                <input id="buscar-piso4" type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body"></div>
                                        <div class="card-footer"></div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="pisoUcam">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title m-2">Buscar UCAM</div>
                                            <div class="input-group">
                                                <input id="buscar-pisoUcam" type="text" class="form-control float-left" placeholder="Ingrese nombre">
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