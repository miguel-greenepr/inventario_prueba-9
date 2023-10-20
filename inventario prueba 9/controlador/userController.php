<?php
include_once '../modelo/usuario.php';
$usuario = new Usuario();
if($_POST['funcion']=='buscar_usuario'){
    $json=array();
    $usuario->obtener_datos($_POST['dato']);
    foreach($usuario->objetos as $objeto){
        $json[]=array(
            'nombre'=>$objeto->nombre_us,
            'apellidos'=>$objeto->apellidos_us,
            'clave'=>$objeto->clave_us,
            'contrasena'=>$objeto->contrasena_us,
            'tipo'=>$objeto->nombre_tipo
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}
if($_POST['funcion']=='cambiar_contraseña'){
    $id_usuario=$_POST['id_usuario'];
    $oldPassword=$_POST['oldPassword'];
    $newPassword=$_POST['newPassword'];
    $usuario->cambiar_contraseña($id_usuario,$oldPassword,$newPassword);
}
if($_POST['funcion']=='gestionar_usuarios'){
    $json=array();
    $usuario->gestionar();
    foreach($usuario->objetos as $objeto){
        $json[]=array(
            'id'=>$objeto->id_usuario,
            'nombre'=>$objeto->nombre_us,
            'apellidos'=>$objeto->apellidos_us,
            'clave'=>$objeto->clave_us,
            'contrasena'=>$objeto->contrasena_us,
            'tipo'=>$objeto->nombre_tipo,
            'tipo_usuario'=>$objeto->us_tipo
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if($_POST['funcion']=='crear_usuario'){
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $clave=$_POST['clave'];
    $pass=$_POST['pass'];
    $tipo=2;
    $usuario->crear($nombre,$apellidos,$clave,$pass,$tipo);
}

// Codigo incompleto de editar y eliminar usuarios.

?>