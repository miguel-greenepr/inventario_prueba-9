$(document).ready(function(){
    var funcion;
    $('.select2').select2();
    rellenar_estados();
    rellenar_locaciones();
    rellenar_pisos();
    rellenar_tipos();

    // Inicio funcion rellenar.

    function rellenar_estados(){
        funcion="rellenar_estados";
        $.post('../controlador/estadoController.php',{funcion},(response)=>{
            const estados = JSON.parse(response);
            let template = '';
            estados.forEach(estado => {
                template+=`
                    <option value="${estado.id}">${estado.nombre}</option>
                `;
            });
            $('#estado_equipo').html(template);
        })
    }

    function rellenar_locaciones(){
        funcion="rellenar_locaciones";
        $.post('../controlador/locacionController.php',{funcion},(response)=>{
            const locaciones = JSON.parse(response);
            let template = '';
            locaciones.forEach(locacion => {
                template+=`
                    <option value="${locacion.id}">${locacion.nombre}</option>
                `;
            });
            $('#locacion_equipo').html(template);
        })
    }

    function rellenar_pisos(){
        funcion="rellenar_pisos";
        $.post('../controlador/pisoController.php',{funcion},(response)=>{
            const pisos = JSON.parse(response);
            let template = '';
            pisos.forEach(piso => {
                template+=`
                    <option value="${piso.id}">${piso.nombre}</option>
                `;
            });
            $('#piso_equipo').html(template);
        })
    }

    function rellenar_tipos(){
        funcion="rellenar_tipos";
        $.post('../controlador/tipoController.php',{funcion},(response)=>{
            const tipos = JSON.parse(response);
            let template = '';
            tipos.forEach(tipo => {
                template+=`
                    <option value="${tipo.id}">${tipo.nombre}</option>
                `;
            });
            $('#tipo_equipo').html(template);
        })
    }

    // Termina funcion rellenar.

    // Inicia submit y crear.

    $('#form-crear-equipo').submit(e=>{
        let encargado = $('#encargado').val();
        let marca = $('#marca').val();
        let modelo = $('#modelo').val();
        let invEst = $('#invEst').val();
        let invFed = $('#invFed').val();
        let nSerie = $('#nSerie').val();
/*
        let discoDuro = $('#discoDuro_cpu').val();
        let memoria = $('#memoria_cpu').val();
        let sisOp = $('#sisOp_cpu').val();
        let direccionIp = $('#direccionIp').val();
        let direccionFisica = $('#direccionFisica').val();
        let procesador = $('#procesador_cpu').val();
        let antivirus = $('#antivirus_cpu').val();
        let versionBios = $('#versionBios_cpu').val();
        let fibraOpt = $('#fibraOpt_switch').val();
        let puertos = $('#puertos_switch').val();
        let poe = $('#poe_switch').val();
        let capa = $('#capa_switch').val();
        let usuario = $('#usuario_switch').val();
        let passwordS = $('#passwordS_switch').val();
*/
        let estadoEquipo = $('#estado_equipo').val();
        let locacionEquipo = $('#locacion_equipo').val();
        let pisoEquipo = $('#piso_equipo').val();
        let tipoEquipo = $('#tipo_equipo').val();
        let datosAdicionales = $('#datosAdicionales').val();
        funcion="crear";
        $.post('../controlador/equipoController.php',{  funcion,encargado,marca,modelo,invEst,invFed,nSerie,
/*
                                                        discoDuro,memoria,sisOp,direccionIp,direccionFisica,procesador,antivirus,
                                                        versionBios,fibraOpt,puertos,poe,capa,usuario,passwordS,
*/
                                                        estadoEquipo,locacionEquipo,pisoEquipo,tipoEquipo,datosAdicionales},(response)=>{
            console.log(response);
        })

        /*
        console.log(encargado+" "+marca+" "+modelo+" "+invEst+" "+invFed+
                    " "+nSerie+" "+estadoEquipo+" "+locacionEquipo+" "+pisoEquipo+" "+tipoEquipo+
                    " "+datosAdicionales);
        */

        /*
        console.log(encargado+" "+marca+" "+modelo+" "+invEst+" "+invFed+
                    " "+nSerie+" "+discoDuro+" "+memoria+" "+sisOp+" "+direccionIp+
                    " "+direccionFisica+" "+procesador+" "+antivirus+" "+versionBios+" "+fibraOpt+
                    " "+puertos+" "+poe+" "+capa+" "+usuario+" "+passwordS+
                    " "+estado+" "+locacion+" "+piso+" "+tipo+" "+datosAdicionales);
        */

        e.preventDefault();
    });

    // Termina submit y crear.

})