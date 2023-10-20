$(document).ready(function(){
    buscar_tipo();
    var funcion;
    var edit=false;
    $('#form-crear-tipo').submit(e=>{
        let nombre_tipo = $('#nombre-tipo').val();
        let id_editado = $('#id_editar_tip').val();
        if(edit==false){
            funcion='crear';
        }else{
            funcion='editar';
        }
        $.post('../controlador/tipoController.php',{nombre_tipo,id_editado,funcion},(response)=>{
            if(response=='add'){
                $('#add-tipo').hide('slow');
                $('#add-tipo').show(1000);
                $('#add-tipo').hide(3000);
                $('#form-crear-tipo').trigger('reset');
                buscar_tipo();
            }
            if(response=='noAdd'){
                $('#noAdd-tipo').hide('slow');
                $('#noAdd-tipo').show(1000);
                $('#noAdd-tipo').hide(3000);
                $('#form-crear-tipo').trigger('reset');
            }
            if(response=='edit'){
                $('#edit-tip').hide('slow');
                $('#edit-tip').show(1000);
                $('#edit-tip').hide(3000);
                $('#form-crear-tipo').trigger('reset');
                buscar_tipo();
            }
            edit==false;
        })
        e.preventDefault();
    });

    // Comienza codigo del boton Buscar.

    function buscar_tipo(consulta){
        funcion='buscar';
        $.post('../controlador/tipoController.php',{consulta,funcion},(response)=>{
            const tipos = JSON.parse(response);
            let template='';
            tipos.forEach(tipo => {
                template+=`
                    <tr tipId="${tipo.id}" tipNombre="${tipo.nombre}">
                        <td>${tipo.nombre}</td>
                        <td>
                            <button class="editar-tip btn btn-success" title="Editar el Tipo" type="button" data-toggle="modal" data-target="#crearTipo">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="eliminar-tip btn btn-danger" title="Eliminar el Tipo">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;
            });
            $('#tipos').html(template);
        })
    }
    $(document).on('keyup','#buscar-tipo',function(){
        let valor = $(this).val();
        if(valor!=''){
            buscar_tipo(valor);
        }else{
            buscar_tipo();
        }
    })

    // Termina codigo del boton Buscar.

    // Comienza codigo del boton Eliminar.

    $(document).on('click','.eliminar-tip',(e)=>{
        funcion="eliminar";
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(elemento).attr('tipId');
        const nombre = $(elemento).attr('tipNombre');

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
                $.post('../controlador/tipoController.php',{id,funcion},(response)=>{
                    edit==false;
                    //console.log(response);
                    if(response=='eliminado'){
                        swalWithBootstrapButtons.fire(
                            'Eliminado.',
                            ''+nombre+' ha sido eliminado.',
                            'success'
                        )
                        buscar_tipo();
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

    $(document).on('click','.editar-tip',(e)=>{
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(elemento).attr('tipId');
        const nombre= $(elemento).attr('tipNombre');
        $('#id_editar_tip').val(id);
        $('#nombre-tipo').val(nombre);
        edit=true;
    })

    // Termina codigo del boton Editar.

});