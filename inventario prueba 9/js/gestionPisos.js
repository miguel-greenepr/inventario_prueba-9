$(document).ready(function(){
    buscar_piso();
    var funcion;
    var edit=false;
    $('#form-crear-piso').submit(e=>{
        let nombre_piso = $('#nombre-piso').val();
        let id_editado = $('#id_editar_pis').val();
        if(edit==false){
            funcion='crear';
        }else{
            funcion='editar';
        }
        $.post('../controlador/pisoController.php',{nombre_piso,id_editado,funcion},(response)=>{
            if(response=='add'){
                $('#add-piso').hide('slow');
                $('#add-piso').show(1000);
                $('#add-piso').hide(3000);
                $('#form-crear-piso').trigger('reset');
                buscar_piso();
            }
            if(response=='noAdd'){
                $('#noAdd-piso').hide('slow');
                $('#noAdd-piso').show(1000);
                $('#noAdd-piso').hide(3000);
                $('#form-crear-piso').trigger('reset');
            }
            if(response=='edit'){
                $('#edit-pis').hide('slow');
                $('#edit-pis').show(1000);
                $('#edit-pis').hide(3000);
                $('#form-crear-piso').trigger('reset');
                buscar_piso();
            }
            edit==false;
        })
        e.preventDefault();
    });

    // Comienza codigo del boton Buscar.

    function buscar_piso(consulta){
        funcion='buscar';
        $.post('../controlador/pisoController.php',{consulta,funcion},(response)=>{
            const pisos = JSON.parse(response);
            let template='';
            pisos.forEach(piso => {
                template+=`
                    <tr pisId="${piso.id}" pisNombre="${piso.nombre}">
                        <td>${piso.nombre}</td>
                        <td>
                            <button class="editar-pis btn btn-success" title="Editar el Piso" type="button" data-toggle="modal" data-target="#crearPiso">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="eliminar-pis btn btn-danger" title="Eliminar el Piso">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;
            });
            $('#pisos').html(template);
        })
    }
    $(document).on('keyup','#buscar-piso',function(){
        let valor = $(this).val();
        if(valor!=''){
            buscar_piso(valor);
        }else{
            buscar_piso();
        }
    })

    // Termina codigo del boton Buscar.

    // Comienza codigo del boton Eliminar.

    $(document).on('click','.eliminar-pis',(e)=>{
        funcion="eliminar";
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(elemento).attr('pisId');
        const nombre = $(elemento).attr('pisNombre');

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
                $.post('../controlador/pisoController.php',{id,funcion},(response)=>{
                    edit==false;
                    //console.log(response);
                    if(response=='eliminado'){
                        swalWithBootstrapButtons.fire(
                            'Eliminado.',
                            ''+nombre+' ha sido eliminado.',
                            'success'
                        )
                        buscar_piso();
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

    $(document).on('click','.editar-pis',(e)=>{
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(elemento).attr('pisId');
        const nombre= $(elemento).attr('pisNombre');
        $('#id_editar_pis').val(id);
        $('#nombre-piso').val(nombre);
        edit=true;
    })

    // Termina codigo del boton Editar.

});