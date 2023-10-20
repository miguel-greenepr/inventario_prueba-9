<?php
include '../modelo/estado.php';
$estado = new Estado();

// Inicio componente Crear.

if($_POST['funcion']=='crear'){
    $nombre = $_POST['nombre_estado'];
    $estado->crear($nombre);
}

// Fin componente Crear.

// Inicio componente de Editar.

if($_POST['funcion']=='editar'){
    $nombre = $_POST['nombre_estado'];
    $id_editado = $_POST['id_editado'];
    $estado->editar($nombre,$id_editado);
}

// Fin componente de Editar.

// Inicio componente de Buscar.

if($_POST['funcion']=='buscar'){
    $estado->buscar();
    $json=array();
    foreach ($estado->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id_estado,
            'nombre'=>$objeto->nombre
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

// Fin componente de Buscar.

// Inicio componente de Eliminar.

if($_POST['funcion']=='eliminar'){
    $id=$_POST['id'];
    $estado->eliminar($id);
}

// Fin componente de Eliminar.

// Inicio componente de select2 en Equipos.

if($_POST['funcion']=='rellenar_estados'){
    $estado->rellenar_estados();
    $json = array();
    foreach ($estado->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id_estado,
            'nombre'=>$objeto->nombre
        );
    }
    $jsonstring=json_encode($json);
    echo $jsonstring;
}

// Fin componente de select2 en Equipos.

?>