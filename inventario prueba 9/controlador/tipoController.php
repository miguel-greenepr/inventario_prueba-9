<?php
include '../modelo/tipo.php';
$tipo = new Tipo();

// Inicia componente de Crear.

if($_POST['funcion']=='crear'){
    $nombre = $_POST['nombre_tipo'];
    $tipo->crear($nombre);
}

// Termina componente de Crear.

// Inicio componente de Editar.

if($_POST['funcion']=='editar'){
    $nombre = $_POST['nombre_tipo'];
    $id_editado = $_POST['id_editado'];
    $tipo->editar($nombre,$id_editado);
}

// Termina componente de Editar.

// Inicio componente de Buscar.

if($_POST['funcion']=='buscar'){
    $tipo->buscar();
    $json=array();
    foreach ($tipo->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id_tipo_equipo,
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
    $tipo->eliminar($id);
}

// Termina componente de Eliminar.

// Incia componente de select 2 en Tipos.

if($_POST['funcion']=='rellenar_tipos'){
    $tipo->rellenar_tipos();
    $json = array();
    foreach ($tipo->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id_tipo_equipo,
            'nombre'=>$objeto->nombre
        );
    }
    $jsonstring=json_encode($json);
    echo $jsonstring;
}

// Termina componente de select 2 en Tipos.

?>