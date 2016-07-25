<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Usuarios    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/') . "/User/save_user"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
        <div class="row">
            <?php $id = (isset($datos[0]->usu_id) ? $datos[0]->usu_id : '' ) ?>
            <input type="hidden" value="<?php echo (isset($datos[0]->usu_id) ? $datos[0]->usu_id : '' ) ?>" class=" form-control   " id="usu_id" name="usu_id">


            <div class="col-md-3">
                <label for="usu_cedula">
                   <i class="fa fa-question-circle" aria-hidden="true" title="Ingrese el numero correspondiente a su  documento de identificación. "></i> *                             Cédula                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" maxlength="10" value="<?php echo (isset($datos[0]->usu_cedula) ? $datos[0]->usu_cedula : '' ) ?>" class=" form-control obligatorio  number" id="usu_cedula" name="usu_cedula">


                <br>
            </div>



            <div class="col-md-3"> 
                <label for="usu_nombre">
                   <i class="fa fa-question-circle" aria-hidden="true" title="Ingrese su nombre completo. "></i> *                             Nombre                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" maxlength="50" value="<?php echo (isset($datos[0]->usu_nombre) ? $datos[0]->usu_nombre : '' ) ?>" class=" form-control obligatorio  " id="usu_nombre" name="usu_nombre">


                <br>
            </div>



            <div class="col-md-3">
                <label for="usu_apellido">
                   <i class="fa fa-question-circle" aria-hidden="true" title="Ingrese sus apellidos completos. "></i> *                             Apellidos                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" maxlength="50" value="<?php echo (isset($datos[0]->usu_apellido) ? $datos[0]->usu_apellido : '' ) ?>" class=" form-control obligatorio  " id="usu_apellido" name="usu_apellido">


                <br>
            </div>



            <div class="col-md-3">
                <label for="usu_usuario">
                   <i class="fa fa-question-circle" aria-hidden="true" title="Ingrese el nombre de usuario con el que va acceder al sistema."></i> *                             Usuario                        </label>
            </div>
            <div class="col-md-3">
                <input type="text"  maxlength="10" value="<?php echo (isset($datos[0]->usu_usuario) ? $datos[0]->usu_usuario : '' ) ?>" class=" form-control obligatorio  " id="usu_usuario" name="usu_usuario">


                <br>
            </div>



            <div class="col-md-3">
                <label for="usu_contrasena">
                   <i class="fa fa-question-circle" aria-hidden="true" title="Ingrese una contraseña de 6 caracteres combinando mayusculas, minusculas, números y caracteres especiales como simbolos o signos de puntuaciòn ,-#$@."></i> *                             Contraseña                        </label>
            </div>
            <div class="col-md-3">
                <input type="password" value="" maxlength="6" class=" form-control obligatorio  " id="usu_contrasena" name="usu_contrasena">


                <br>
            </div>



            <div class="col-md-3">
                <label for="usu_email">
                   <i class="fa fa-question-circle" aria-hidden="true" title="Ejemplo@um.es"></i> *                             E-mail                        </label>
            </div>
            <div class="col-md-3">
                <input type="email" maxlength="50" value="<?php echo (isset($datos[0]->usu_email) ? $datos[0]->usu_email : '' ) ?>" class=" form-control obligatorio  " id="usu_email" name="usu_email">


                <br>
            </div>



            <div class="col-md-3">
                <label for="emp_id">
                   <i class="fa fa-question-circle" aria-hidden="true" title="Ingrese el nombre de la empresa a la cual pertenece."></i> *                             Empresa                        </label>
            </div>
            <div class="col-md-3">
                <?php echo lista("emp_id", "emp_id", "form-control obligatorio", "empresa", "id", "nombre", (isset($datos[0]->emp_id) ? $datos[0]->emp_id : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                        <br>
            </div>
            <div class="col-md-3">
                <label for="emp_id">
                   <i class="fa fa-question-circle" aria-hidden="true" title="Seleccione la opción segun su cargo."></i> *                             Permiso                        </label>
            </div>
            <div class="col-md-3">
                <?php echo lista("permisos", "permisos", "form-control obligatorio", "permiso", "id", "nombre", (isset($datos[0]->permisos) ? $datos[0]->permisos : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                        <br>
            </div>

        </div>
        <?php if (isset($post['campo'])) { ?>
            <input type="hidden" name="<?php echo $post['campo'] ?>" value="<?php echo $post[$post['campo']] ?>">
            <input type="hidden" name="campo" value="<?php echo $post['campo'] ?>">
        <?php } ?>
        <div class="row">
            <span id="boton_guardar">
                <button class="btn btn-dcs" >Guardar</button> 
                <input class="btn btn-dcs" type="reset" value="Limpiar">
                <a href="<?php echo base_url('index.php') . "/User/consult_user" ?>" class="btn btn-dcs">Listado </a>
            </span>
            <span id="boton_cargar" style="display: none">
                <h2>Cargando ...</h2>
            </span>
        </div>
        <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
    </form>
</div>
<script>
    $('#usu_usuario').change(function () {
        var usu_usuario = $('#usu_usuario').val();
        var usu_id = $('#usu_id').val();
        $('#boton_cargar').show();
        $('#boton_guardar').hide();
        $.post('<?php echo base_url('index.php/User/usu_usuario') ?>', {usu_usuario: usu_usuario, usu_id: usu_id})
                .done(function (msg) {
                    if (msg == 0) {
                        alerta('verde', 'Usuario valido')
                    } else {
                        alerta('rojo', 'Usuario no valido')
                        $('#usu_usuario').val('');
                    }
                    $('#boton_cargar').hide();
                    $('#boton_guardar').show();
                })
                .fail(function (msg) {
                    $('#boton_cargar').hide();
                    $('#boton_guardar').show();
                })
    }) 
    function campos() {
        $('input[type="file"]').each(function (key, val) {
            var img = $(this).val();
            if (img != "") {
                var r = (img.indexOf('jpg') != -1) ? '' : ((img.indexOf('png') != -1) ? '' : ((img.indexOf('gif') != -1) ? '' : false))
                if (r === false) {
                    alert('Tipo de archivo no valido');
                    return false;
                }
            }
        });
        if (obligatorio('obligatorio') == false) {
            return false
        } else {
            $('#boton_guardar').hide();
            $('#boton_cargar').show();
            return true;
        }
    }
    $('body').delegate('.number', 'keypress', function (tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker({dateFormat: 'yy-mm-dd'});


</script>
