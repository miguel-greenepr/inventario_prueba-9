<?php
include 'conexion.php';
class Tipo{
    var $objetos;
    public function __construct(){
        $db = new Conexion();
        $this -> acceso = $db -> pdo;
    }

    // Inicia componente de Crear.

    function crear($nombre){
        $sql="SELECT id_tipo_equipo FROM tipo_equipo WHERE nombre=:nombre";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':nombre'=>$nombre));
        $this->objetos=$query->fetchall();
        if(!empty($this->objetos)){
            echo 'noAdd';
        }else{
            $sql="INSERT INTO tipo_equipo(nombre) values (:nombre);";
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
            $sql="SELECT * FROM tipo_equipo where nombre LIKE :consulta";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }else{
            $sql="SELECT * FROM tipo_equipo where nombre NOT LIKE '' ORDER BY id_tipo_equipo LIMIT 50";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
        
    }

    // Termina componente de Buscar.

    // Inicia componente de Eliminar.

    function eliminar($id){
        $sql="DELETE FROM tipo_equipo WHERE id_tipo_equipo=:id";
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
        $sql="UPDATE tipo_equipo SET nombre=:nombre WHERE id_tipo_equipo=:id";
        $query=$this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_editado,':nombre'=>$nombre));
        echo 'edit';
    }

    // Incia componente de Editar.

    // Incia componente de select 2 en Tipos.

    function rellenar_tipos(){
        $sql="SELECT * FROM tipo_equipo WHERE nombre!='CPU' AND nombre!='SWITCH' ORDER BY nombre ASC";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchall();
        return $this->objetos;
    }

    // Termina componente de select 2 en Tipos.
}
?>