<?php
include '../modelo/locacion.php';
$locacion = new Locacion();

// Inicia componente de Crear.

if($_POST['funcion']=='crear'){
    $nombre = $_POST['nombre_locacion'];
    $locacion->crear($nombre);
}

// Termina componente de Crear.

// Inicio componente de Editar.

if($_POST['funcion']=='editar'){
    $nombre = $_POST['nombre_locacion'];
    $id_editado = $_POST['id_editado'];
    $locacion->editar($nombre,$id_editado);
}

// Termina componente de Editar.

// Inicio componente de Buscar.

if($_POST['funcion']=='buscar'){
    $locacion->buscar();
    $json=array();
    foreach ($locacion->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id_locacion,
            'nombre'=>$objeto->nombre
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

// Termina componente de Buscar.

// Inicio componente de Eliminar.

if($_POST['funcion']=='eliminar'){
    $id=$_POST['id'];
    $locacion->eliminar($id);
}

// Termina componente de Eliminar.

// Inicio componente de select2 en Locaciones.

if($_POST['funcion']=='rellenar_locaciones'){
    $locacion->rellenar_locaciones();
    $json = array();
    foreach ($locacion->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id_locacion,
            'nombre'=>$objeto->nombre
        );
    }
    $jsonstring=json_encode($json);
    echo $jsonstring;
}

// Fin componente de select2 en Locaciones.

?>