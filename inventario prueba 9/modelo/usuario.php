<?php
include_once "conexion.php";
class Usuario{
    var $objetos;
    public function __construct(){
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }
    function loguearse($clave,$pass){
        $sql="SELECT * FROM usuario inner join tipo_us on us_tipo=id_tipo_us where clave_us=:clave and contrasena_us=:pass";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':clave' => $clave,':pass'=>$pass));
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
    function obtener_datos($id){
        $sql="SELECT * FROM usuario join tipo_us on us_tipo = id_tipo_us and id_usuario=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id' => $id));
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
    function cambiar_contraseña($id_usuario,$oldPassword,$newPassword){
        $sql="SELECT * FROM usuario where id_usuario=:id and contrasena_us=:oldPassword";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_usuario,':oldPassword'=>$oldPassword));
        $this->objetos = $query->fetchall();
        if(!empty($this->objetos)){
            $sql="UPDATE usuario SET contrasena_us=:newPassword where id_usuario=:id";
            $query=$this->acceso->prepare($sql);
            $query->execute(array(':id'=>$id_usuario,':newPassword'=>$newPassword));
            echo 'update';
            
        }
        else{
            echo 'noupdate';
        }
    }
    function gestionar(){
        if(!empty($_POST['consulta'])){
            $consulta=$_POST['consulta'];
            $sql="SELECT * FROM usuario join tipo_us on us_tipo = id_tipo_us where nombre_us LIKE :consulta";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }else{
            
            $sql="SELECT * FROM usuario join tipo_us on us_tipo = id_tipo_us where nombre_us NOT LIKE '' ORDER BY id_usuario LIMIT 50";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
        
    }
    function crear($nombre,$apellidos,$clave,$pass,$tipo){
        $sql="SELECT id_usuario FROM usuario WHERE clave_us=:clave";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':clave'=>$clave));
        $this->objetos=$query->fetchall();
        if(!empty($this->objetos)){
            echo 'noadd';
        }else{
            $sql="INSERT INTO usuario(nombre_us,apellidos_us,clave_us,contrasena_us,us_tipo) VALUES (:nombre,:apellidos,:clave,:pass,:tipo);";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':nombre'=>$nombre,':apellidos'=>$apellidos,':clave'=>$clave,':pass'=>$pass,':tipo'=>$tipo));
            echo 'add';
        }
    }

    // Codigo incompleto de editar y eliminar usuarios.

}
?>