$(document).ready(function(){
  var tipo_usuario = $('#tipo_usuario').val();

  if(tipo_usuario==2){
    $('#button-crear').hide();
  }

  // console.log(tipo_usuario);

  buscar_datos();

    var funcion;
    function buscar_datos(consulta){
        funcion='gestionar_usuarios';
        $.post('../controlador/userController.php',{consulta,funcion},(response)=>{
            const usuarios = JSON.parse(response);
            let template='';
            usuarios.forEach(usuario=>{
                template+=`
            <div usuarioId="${usuario.id}" class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  ${usuario.tipo}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
                      <h2 class="lead"><b>${usuario.nombre} ${usuario.apellidos}</b></h2>
                      <p class="text-muted text-sm"><b>Tareas: </b> Mantenimiento. </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-user"></i></span> Clave: ${usuario.clave}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-lock"></i></span> Contraseña: ${usuario.contrasena}</li>
                      </ul>
                    </div>
                    
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">`;

                /*
                
                if(tipo_usuario==1){
                  if(usuario.tipo_usuario!=1){
                    template+=`
                    <button class="eliminar-usuario btn btn-danger mr-1" type="button" data-toggle="modal" data-target="#confirmar">
                        <i class="fas fa-window-close mr-1"></i>Eliminar
                    </button>
                    <button class="editar-usuario btn btn-primary ml-1" type="button" data-toggle="modal" data-target="#editar_usuario">
                        <i class="fas fa-pencil mr-1"></i>Editar datos
                    </button>
                    `;
                  }
                  if(usuario.tipo_usuario!=2){
                    template+=`
                    <button class="editar-usuario btn btn-primary ml-1" type="button" data-toggle="modal" data-target="#editar_usuario">
                        <i class="fas fa-pencil mr-1"></i>Editar datos
                    </button>
                    `;
                  }
                }else{
                }

                */

                template+=`
                    
                  </div>
                </div>
              </div>
            </div>
                `;
            })
            $('#usuarios').html(template);
        });
    }
    $(document).on('keyup','#buscar',function(){
        let valor = $(this).val();
        if(valor!=""){
            buscar_datos(valor);
        }else{
            buscar_datos(valor);
        }
    });
    $('#form-crear').submit(e=>{
      let nombre = $('#nombre').val();
      let apellidos = $('#apellidos').val();
      let clave = $('#clave').val();
      let pass = $('#pass').val();
      funcion='crear_usuario';
      $.post('../controlador/userController.php',{nombre,apellidos,clave,pass,funcion},(response)=>{
        if(response=='add'){
          $('#add').hide('slow');
          $('#add').show(1000);
          $('#add').hide(3000);
          $('#form-crear').trigger('reset');
          buscar_datos(valor);
        }else{
          $('#noAdd').hide('slow');
          $('#noAdd').show(1000);
          $('#noAdd').hide(3000);
          $('#form-crear').trigger('reset');
        }
      });
      e.preventDefault();
    });

    // Inicia codigo incompleto de editar y eliminar usuarios.

    $(document).on('click','.eliminar-usuario',(e)=>{
      const elemento=$(this)[0].activeElement.parentElement.parentElement.parentElement.parentElement;
      const id=$(elemento).attr('usuarioId');
      funcion='eliminar_usuario';
      $('#id_user').val(id);
      $('#funcion').val(funcion);
    });
    $(document).on('click','.editar-usuario',(e)=>{
      const elemento=$(this)[0].activeElement.parentElement.parentElement.parentElement.parentElement;
      const id=$(elemento).attr('usuarioId');
      funcion='editar_usuario';
      $('#id_user').val(id);
      $('#funcion').val(funcion);
    });

    $('#form-confirmar').submit(e=>{
      let pass=$('#oldPassword').val();
      let id_usuario=$('#id_user').val();
      funcion=$('#funcion').val();
      console.log(pass);
      console.log(id_usuario);
      console.log(funcion);
      e.preventDefault();
    });

    // Termina codigo incompleto de editar y eliminar usuarios.

})