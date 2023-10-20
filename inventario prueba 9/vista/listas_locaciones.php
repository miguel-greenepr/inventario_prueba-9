<?php
session_start();
if($_SESSION['us_tipo']==1){
    include_once 'layout/header.php';
?>

<title>Lista de Locaciones</title>

<?php
    include_once 'layout/nav_adm.php';
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lista de Locaciones</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../vista/adm_catalogo.php">Home</a></li>
                        <li class="breadcrumb-item active">Locaciones</li>
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
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">1 - 10</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#lDireccion" data-toggle="tab">Dirección</a>
      <a class="dropdown-item" href="#lCalidad" data-toggle="tab">Unidad de Calidad</a>
      <a class="dropdown-item" href="#locacion3" data-toggle="tab">Unidad de Planeación</a>
      <a class="dropdown-item" href="#locacion4" data-toggle="tab">Unidad de Enseñanza e Investigación</a>
      <a class="dropdown-item" href="#locacion5" data-toggle="tab">Unidad de Relaciones Públicas</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#locacion6" data-toggle="tab">Unidad de Asuntos Jurídicos</a>
      <a class="dropdown-item" href="#locacion7" data-toggle="tab">Unidad de Información y Análisis del Seguro Popular</a>
      <a class="dropdown-item" href="#locacion8" data-toggle="tab">Enlace de la Unidad de Acceso a la Información</a>
      <a class="dropdown-item" href="#locacion9" data-toggle="tab">Unidad de Administración</a>
      <a class="dropdown-item" href="#locacion10" data-toggle="tab">Unidad Médica</a>
    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">11 - 20</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#locacion11" data-toggle="tab">Unidad de Enfermería</a>
      <a class="dropdown-item" href="#locacion12" data-toggle="tab">Servicios Generales</a>
      <a class="dropdown-item" href="#locacion13" data-toggle="tab">Recursos Humanos</a>
      <a class="dropdown-item" href="#locacion14" data-toggle="tab">Recursos Financieros</a>
      <a class="dropdown-item" href="#locacion15" data-toggle="tab">Recursos Materiales y Servicios</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#locacion16" data-toggle="tab">Informática y Sistemas</a>
      <a class="dropdown-item" href="#locacion17" data-toggle="tab">Conservación y Mantenimiento</a>
      <a class="dropdown-item" href="#locacion18" data-toggle="tab">Coordinación de Asistencia Médica</a>
      <a class="dropdown-item" href="#locacion19" data-toggle="tab">Atención Prehospitalaria</a>
      <a class="dropdown-item" href="#locacion20" data-toggle="tab">Consulta Externa</a>
    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">21 - 30</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#locacion21" data-toggle="tab">Cirugia General</a>
      <a class="dropdown-item" href="#locacion22" data-toggle="tab">Ginecología y Obstetricía</a>
      <a class="dropdown-item" href="#locacion23" data-toggle="tab">Medicina Interna</a>
      <a class="dropdown-item" href="#locacion24" data-toggle="tab">Traumatología y Ortopedia</a>
      <a class="dropdown-item" href="#locacion25" data-toggle="tab">Pediatría</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#locacion26" data-toggle="tab">Urgencias</a>
      <a class="dropdown-item" href="#locacion27" data-toggle="tab">Anestesiología</a>
      <a class="dropdown-item" href="#locacion28" data-toggle="tab">Banco de Sangre</a>
      <a class="dropdown-item" href="#locacion29" data-toggle="tab">Dietética</a>
      <a class="dropdown-item" href="#locacion30" data-toggle="tab">Farmacía</a>
    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">31 - 38</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#locacion31" data-toggle="tab">Imagenología</a>
      <a class="dropdown-item" href="#locacion32" data-toggle="tab">Laboratorio y Análisis Clínicos</a>
      <a class="dropdown-item" href="#locacion33" data-toggle="tab">Medicina Preventiva</a>
      <a class="dropdown-item" href="#locacion34" data-toggle="tab">Patología</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#locacion35" data-toggle="tab">Trabajo Social</a>
      <a class="dropdown-item" href="#locacion36" data-toggle="tab">Registros Hospitalarios</a>
      <a class="dropdown-item" href="#locacion37" data-toggle="tab">Enseñanza e Investigación en Enfermería</a>
      <a class="dropdown-item" href="#locacion38" data-toggle="tab">Gestríon del Cuidado</a>
    </div>
  </li>
</ul>


                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="lDireccion">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title m-2">Buscar en Dirección</div>
                                            <div class="input-group">
                                                <input id="buscar-locacion-1" type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body"></div>
                                        <div class="card-footer"></div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="lCalidad">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title m-2">Buscar en Unidad de Calidad</div>
                                            <div class="input-group">
                                                <input id="buscar-locacion-2" type="text" class="form-control float-left" placeholder="Ingrese nombre">
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