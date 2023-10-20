$(document).ready(function(){
    var funcion = '';
    var id_usuario = $("#id_usuario").val();
    buscar_usuario(id_usuario);
    function buscar_usuario(dato){
        funcion = 'buscar_usuario';
        $.post('../controlador/userController.php',{dato,funcion},(response)=>{
            // console.log(response);
            let nombre='';
            let apellidos='';
            let clave='';
            let contrasena='';
            let tipo='';
            const usuario = JSON.parse(response);
            nombre+=`${usuario.nombre}`;
            apellidos+=`${usuario.apellidos}`;
            clave+=`${usuario.clave}`;
            contrasena+=`${usuario.contrasena}`;
            tipo+=`${usuario.tipo}`;
            $('#nombre_us').html(nombre);
            $('#apellidos_us').html(apellidos);
            $('#clave_us').html(clave);
            $('#contrasena_us').html(contrasena);
            $('#us_tipo').html(tipo);
        })
    }
    $('#form-pass').submit(e=>{
        let oldPassword=$('#oldPassword').val();
        let newPassword=$('#newPassword').val();
        funcion='cambiar_contraseña';
        $.post('../controlador/userController.php',{id_usuario,funcion,oldPassword,newPassword},(response)=>{
            if(response=='update'){
                $('#update').hide('slow');
                $('#update').show(1000);
                $('#update').hide(3000);
                $('#form-pass').trigger('reset');
            }else{
                $('#noUpdate').hide('slow');
                $('#noUpdate').show(1000);
                $('#noUpdate').hide(3000);
                $('#form-pass').trigger('reset');

            }
        })
        e.preventDefault();
    })
})