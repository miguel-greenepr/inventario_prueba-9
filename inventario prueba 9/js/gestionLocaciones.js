$(document).ready(function(){
    buscar_locacion();
    var funcion;
    var edit=false;
    $('#form-crear-locacion').submit(e=>{
        let nombre_locacion = $('#nombre-locacion').val();
        let id_editado = $('#id_editar_loc').val();
        if(edit==false){
            funcion='crear';
        }else{
            funcion='editar';
        }
        $.post('../controlador/locacionController.php',{nombre_locacion,id_editado,funcion},(response)=>{
            if(response=='add'){
                $('#add-locacion').hide('slow');
                $('#add-locacion').show(1000);
                $('#add-locacion').hide(3000);
                $('#form-crear-locacion').trigger('reset');
                buscar_locacion();
            }
            if(response=='noAdd'){
                $('#noAdd-locacion').hide('slow');
                $('#noAdd-locacion').show(1000);
                $('#noAdd-locacion').hide(3000);
                $('#form-crear-locacion').trigger('reset');
            }
            if(response=='edit'){
                $('#edit-loc').hide('slow');
                $('#edit-loc').show(1000);
                $('#edit-loc').hide(3000);
                $('#form-crear-locacion').trigger('reset');
                buscar_locacion();
            }
            edit==false;
        })
        e.preventDefault();
    });

    // Comienza codigo del boton Buscar.

    function buscar_locacion(consulta){
        funcion='buscar';
        $.post('../controlador/locacionController.php',{consulta,funcion},(response)=>{
            const locaciones = JSON.parse(response);
            let template='';
            locaciones.forEach(locacion => {
                template+=`
                    <tr locId="${locacion.id}" locNombre="${locacion.nombre}">
                        <td>${locacion.nombre}</td>
                        <td>
                            <button class="editar-loc btn btn-success" title="Editar la Locacion" type="button" data-toggle="modal" data-target="#crearLocacion">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="eliminar-loc btn btn-danger" title="Eliminar la Locacion">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;
            });
            $('#locaciones').html(template);
        })
    }
    $(document).on('keyup','#buscar-locacion',function(){
        let valor = $(this).val();
        if(valor!=''){
            buscar_locacion(valor);
        }else{
            buscar_locacion();
        }
    })

    // Termina codigo del boton Buscar.

    // Comienza codigo del boton Eliminar.

    $(document).on('click','.eliminar-loc',(e)=>{
        funcion="eliminar";
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(elemento).attr('locId');
        const nombre = $(elemento).attr('locNombre');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger mr-1'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: '¿Desea eliminar '+nombre+'?',
            text: "No podras revertir esto.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, eliminalo',
            cancelButtonText: 'No, cancelalo',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('../controlador/locacionController.php',{id,funcion},(response)=>{
                    edit==false;
                    //console.log(response);
                    if(response=='eliminado'){
                        swalWithBootstrapButtons.fire(
                            'Eliminado.',
                            ''+nombre+' ha sido eliminado.',
                            'success'
                        )
                        buscar_locacion();
                    }else{
                        swalWithBootstrapButtons.fire(
                            'No se pudo eliminar.',
                            'Algun Equipo ya contiene a '+nombre+'',
                            'error'
                        )
                    }
                })
            }else if(result.dismiss === Swal.DismissReason.cancel){
                swalWithBootstrapButtons.fire(
                    'Cancelado.',
                    ''+nombre+' no fue eliminado.',
                    'error'
                )
            }
        })
        //console.log(id+nombre);
    })

    // Termina codigo del boton Eliminar.

    // Comienza codigo del boton Editar.

    $(document).on('click','.editar-loc',(e)=>{
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(elemento).attr('locId');
        const nombre= $(elemento).attr('locNombre');
        $('#id_editar_loc').val(id);
        $('#nombre-locacion').val(nombre);
        edit=true;
    })

    // Termina codigo del boton Editar.

});