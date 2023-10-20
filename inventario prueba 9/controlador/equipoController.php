<?php
include '../modelo/equipo.php';
$equipo = new Equipo();

// Inicio de crear.

if($_POST['funcion']=='crear'){
    $encargado = $_POST['encargado'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $invEst = $_POST['invEst'];
    $invFed = $_POST['invFed'];
    $nSerie = $_POST['nSerie'];
/*
    $discoDuro = $_POST['discoDuro'];
    $memoria = $_POST['memoria'];
    $sisOp = $_POST['sisOp'];
    $direccionIp = $_POST['direccionIp'];
    $direccionFisica = $_POST['direccionFisica'];
    $procesador = $_POST['procesador'];
    $antivirus = $_POST['antivirus'];
    $versionBios = $_POST['versionBios'];
    $fibraOpt = $_POST['fibraOpt'];
    $puertos = $_POST['puertos'];
    $poe = $_POST['poe'];
    $capa = $_POST['capa'];
    $usuario = $_POST['usuario'];
    $passwordS = $_POST['passwordS'];
*/
    $estadoEquipo = $_POST['estadoEquipo'];
    $locacionEquipo = $_POST['locacionEquipo'];
    $pisoEquipo = $_POST['pisoEquipo'];
    $tipoEquipo = $_POST['tipoEquipo'];
    $datosAdicionales = $_POST['datosAdicionales'];
    $equipo->crear(
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
        $datosAdicionales);
}

// Fin de crear.

?>