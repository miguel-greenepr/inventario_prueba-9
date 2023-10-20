$(document).ready(function(){
    buscar_estado();
    var funcion;
    var edit=false;
    $('#form-crear-estado').submit(e=>{
        let nombre_estado = $('#nombre-estado').val();
        let id_editado = $('#id_editar_est').val();
        if(edit==false){
            funcion='crear';
        }else{
            funcion='editar';
        }
        $.post('../controlador/estadoController.php',{nombre_estado,id_editado,funcion},(response)=>{
            if(response=='add'){
                $('#add-estado').hide('slow');
                $('#add-estado').show(1000);
                $('#add-estado').hide(3000);
                $('#form-crear-estado').trigger('reset');
                buscar_estado();
            }
            if(response=='noAdd'){
                $('#noAdd-estado').hide('slow');
                $('#noAdd-estado').show(1000);
                $('#noAdd-estado').hide(3000);
                $('#form-crear-estado').trigger('reset');
            }
            if(response=='edit'){
                $('#edit-est').hide('slow');
                $('#edit-est').show(1000);
                $('#edit-est').hide(3000);
                $('#form-crear-estado').trigger('reset');
                buscar_estado();
            }
            edit==false;
        })
        e.preventDefault();
    });
    function buscar_estado(consulta){
        funcion='buscar';
        $.post('../controlador/estadoController.php',{consulta,funcion},(response)=>{
            const estados = JSON.parse(response);
            let template='';
            estados.forEach(estado => {
                template+=`
                    <tr estId="${estado.id}" estNombre="${estado.nombre}">
                        <td>${estado.nombre}</td>
                        <td>
                            <button class="editar btn btn-success" title="Editar el Estado" type="button" data-toggle="modal" data-target="#crearEstado">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="eliminar btn btn-danger" title="Eliminar el Estado">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;
            });
            $('#estados').html(template);
        })
    }
    $(document).on('keyup','#buscar-estado',function(){
        let valor = $(this).val();
        if(valor!=''){
            buscar_estado(valor);
        }else{
            buscar_estado();
        }
    })

    // Comienza codigo del boton eliminar.

    $(document).on('click','.eliminar',(e)=>{
        funcion="eliminar";
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(elemento).attr('estId');
        const nombre = $(elemento).attr('estNombre');

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
                $.post('../controlador/estadoController.php',{id,funcion},(response)=>{
                    edit==false;
                    //console.log(response);
                    if(response=='eliminado'){
                        swalWithBootstrapButtons.fire(
                            'Eliminado.',
                            ''+nombre+' ha sido eliminado.',
                            'success'
                        )
                        buscar_estado();
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

    // Termina codigo del boton eliminar.

    // Comienza codigo del boton editar.

    $(document).on('click','.editar',(e)=>{
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(elemento).attr('estId');
        const nombre= $(elemento).attr('estNombre');
        $('#id_editar_est').val(id);
        $('#nombre-estado').val(nombre);
        edit=true;
    })

    // Termina codigo del boton editar.

});