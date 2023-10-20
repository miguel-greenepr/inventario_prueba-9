<?php
include '../modelo/piso.php';
$piso = new Piso();

// Inicia componente de Crear.

if($_POST['funcion']=='crear'){
    $nombre = $_POST['nombre_piso'];
    $piso->crear($nombre);
}

// Termina componente de Crear.

// Inicio componente de Editar.

if($_POST['funcion']=='editar'){
    $nombre = $_POST['nombre_piso'];
    $id_editado = $_POST['id_editado'];
    $piso->editar($nombre,$id_editado);
}

// Termina componente de Editar.

// Inicio componente de Buscar.

if($_POST['funcion']=='buscar'){
    $piso->buscar();
    $json=array();
    foreach ($piso->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id_piso,
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
    $piso->eliminar($id);
}

// Termina componente de Eliminar.

// Inicio componente de select2 en Pisos.

if($_POST['funcion']=='rellenar_pisos'){
    $piso->rellenar_pisos();
    $json = array();
    foreach ($piso->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id_piso,
            'nombre'=>$objeto->nombre
        );
    }
    $jsonstring=json_encode($json);
    echo $jsonstring;
}

// Fin componente de select2 en Pisos.

?>