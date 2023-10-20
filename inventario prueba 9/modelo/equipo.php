<?php
include 'conexion.php';
class Equipo{
    var $objetos;
    public function __construct(){
        $db = new Conexion();
        $this -> acceso = $db -> pdo;
    }

    // Inicia componente de Crear.

    function crear(
        $encargado,
        $marca,
        $modelo,
        $invEst,
        $invFed,
        $nSerie,
/*
        $discoDuro,
        $memoria,
        $sisOp,
        $direccionIp,
        $direccionFisica,
        $procesador,
        $antivirus,
        $versionBios,
        $fibraOpt,
        $puertos,
        $poe,
        $capa,
        $usuario,
        $passwordS,
*/
        $estadoEquipo,
        $locacionEquipo,
        $pisoEquipo,
        $tipoEquipo,
        $datosAdicionales){
        $sql="SELECT id_equipo FROM equipos WHERE inv_Est=:invEst AND inv_Fed=:invFed AND n_serie=:nSerie";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(
            ':encargado'=>$encargado,
            ':marca'=>$marca,
            ':modelo'=>$modelo,
            ':invEst'=>$invEst,
            ':invFed'=>$invFed,
            ':nSerie'=>$nSerie,
/*
            ':discoDuro'=>$discoDuro,
            ':memoria'=>$memoria,
            ':sisOp'=>$sisOp,
            ':direccionIp'=>$direccionIp,
            ':direccionFisica'=>$direccionFisica,
            'procesador'=>$procesador,
            'antivirus'=>$antivirus,
            'versionBios'=>$versionBios,
            'fibraOpt'=>$fibraOpt,
            'puertos'=>$puertos,
            'poe'=>$poe,
            'capa'=>$capa,
            'usuario'=>$usuario,
            'passwordS'=>$passwordS,
*/
            ':estadoEquipo'=>$estadoEquipo,
            ':locacionEquipo'=>$locacionEquipo,
            ':pisoEquipo'=>$pisoEquipo,
            ':tipoEquipo'=>$tipoEquipo,
            ':datosAdicionales'=>$datosAdicionales));
        $this->objetos=$query->fetchall();
        if(!empty($this->objetos)){
            echo 'noAdd';
        }else{
            $sql="INSERT INTO equipo(
                encargado,
                marca,
                modelo,
                inv_est,
                inv_fed,
                n_serie,
/*
                direccion_ip,
                direccion_fisica,
                discoDuro_cpu,
                memoria_cpu,
                so_cpu,
                procesador_cpu,
                antivirus_cpu,
                verBios_cpu,
                fibraOptica_switch,
                puertos_switch,
                poe_switch,
                capa_switch,
                usuario_switch,
                password_switch,
*/
                equipo_estado,
                equipo_locacion,
                equipo_piso,
                equipo_tipo,
                datos_adicionales) values (
                    :encargado,
                    :marca,
                    :modelo,
                    :invEst,
                    :invFed,
                    :nSerie,
/*
                    :discoDuro,
                    :memoria,
                    :sisOp,
                    :direccionIp,
                    :direccionFisica,
                    :procesador,
                    :antivirus,
                    :versionBios,
                    :fibraOpt,
                    :puertos,
                    :poe,
                    :capa,
                    :usuario,
                    :passwordS,
*/
                    :estadoEquipo,
                    :locacionEquipo,
                    :pisoEquipo,
                    :tipoEquipo,
                    :datosAdicionales);";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(
                ':encargado'=>$encargado,
                ':marca'=>$marca,
                ':modelo'=>$modelo,
                ':invEst'=>$invEst,
                ':invFed'=>$invFed,
                ':nSerie'=>$nSerie,
/*
                ':discoDuro'=>$discoDuro,
                ':memoria'=>$memoria,
                ':sisOp'=>$sisOp,
                ':direccionIp'=>$direccionIp,
                ':direccionFisica'=>$direccionFisica,
                'procesador'=>$procesador,
                'antivirus'=>$antivirus,
                'versionBios'=>$versionBios,
                'fibraOpt'=>$fibraOpt,
                'puertos'=>$puertos,
                'poe'=>$poe,
                'capa'=>$capa,
                'usuario'=>$usuario,
                'passwordS'=>$passwordS,
*/
                ':estadoEquipo'=>$estadoEquipo,
                ':locacionEquipo'=>$locacionEquipo,
                ':pisoEquipo'=>$pisoEquipo,
                ':tipoEquipo'=>$tipoEquipo,
                ':datosAdicionales'=>$datosAdicionales));
            echo 'add';
        }
    }

    // Termina componente de Crear.

    // Inicia componente de Buscar.



    // Termina componente de Buscar.

    // Inicia componente de Eliminar.



    // Termina componente de Eliminar.

    // Inicia componente de Editar.



    // Termina componente de Editar.

}
?>