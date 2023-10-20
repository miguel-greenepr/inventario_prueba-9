<?php
include 'conexion.php';
class Estado{
    var $objetos;
    public function __construct(){
        $db = new Conexion();
        $this -> acceso = $db -> pdo;
    }

    // Inicia componente de Crear.

    function crear($nombre){
        $sql="SELECT id_estado FROM estado WHERE nombre=:nombre";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':nombre'=>$nombre));
        $this->objetos=$query->fetchall();
        if(!empty($this->objetos)){
            echo 'noAdd';
        }else{
            $sql="INSERT INTO estado(nombre) values (:nombre);";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':nombre'=>$nombre));
            echo 'add';
        }
    }

    // Termina componente de Crear.

    // Inicia componente de Buscar.

    function buscar(){
        if(!empty($_POST['consulta'])){
            $consulta=$_POST['consulta'];
            $sql="SELECT * FROM estado where nombre LIKE :consulta";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }else{
            $sql="SELECT * FROM estado where nombre NOT LIKE '' ORDER BY id_estado LIMIT 50";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
        
    }

    // Termina componente de Buscar.

    // Inicia componente de Eliminar.

    function eliminar($id){
        $sql="DELETE FROM estado WHERE id_estado=:id";
        $query=$this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id));
        if(!empty($query->execute(array(':id'=>$id)))){
            echo 'eliminado';
        }else{
            echo 'noEliminado';
        }
    }

    // Termina componente de Eliminar.

    // Inicia componente de Editar.

    function editar($nombre,$id_editado){
        $sql="UPDATE estado SET nombre=:nombre WHERE id_estado=:id";
        $query=$this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_editado,':nombre'=>$nombre));
        echo 'edit';
    }

    // Termina componente de Editar.

    // Incia componente de select 2 en Equipos.

    function rellenar_estados(){
        $sql="SELECT * FROM estado ORDER BY nombre ASC";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchall();
        return $this->objetos;
    }

    // Termina componente de select 2 en Equipos.

}
?>