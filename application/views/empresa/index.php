<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Empresa    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/') . "/Empresa/save_empresa"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
        <div class="row">
            <?php $id = (isset($datos[0]->id) ? $datos[0]->id : '' ) ?>
            <input type="hidden" value="<?php echo (isset($datos[0]->id) ? $datos[0]->id : '' ) ?>" class=" form-control   " id="id" name="id">


            <div class="col-md-3">
                <label for="nit">
*                             NIT                        </label>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-9">
                        <input type="text" maxlength="10" value="<?php echo (isset($datos[0]->nit) ? $datos[0]->nit : '' ) ?>" class=" form-control obligatorio  number" id="nit" name="nit"  title="Ingresar el NIT de la empresa sin dígito verificador.">
                    </div>
                    <div class="col-md-3">
                        <div class="col-md" id="digito_ver" style="margin: 10 0;">

                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-3">
                <label for="nombre">
                    *                             Nombre                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" maxlength="50" value="<?php echo (isset($datos[0]->nombre) ? $datos[0]->nombre : '' ) ?>" class=" form-control obligatorio  " id="nombre" name="nombre" title="Ingresar el nombre completo de la empresa.">


                <br>
            </div>
            <div class="col-md-3">
                <label for="telefono">
                    
                    *                             Teléfono                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" maxlength="15" value="<?php echo (isset($datos[0]->telefono) ? $datos[0]->telefono : '' ) ?>" class=" form-control obligatorio  number" id="telefono" name="telefono" title="Ingresar el número de contacto de la empresa.">


                <br>
            </div>



            <div class="col-md-3">
                <label for="direccion">
                    *                             Dirección                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" maxlength="50" value="<?php echo (isset($datos[0]->direccion) ? $datos[0]->direccion : '' ) ?>" class=" form-control obligatorio  " id="direccion" name="direccion" title="Ingresar la dirección de residencia de la empresa.">


                <br>
            </div>



            <div class="col-md-3">
                <label for="fax">
                    *                             Fax                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" maxlength="15" value="<?php echo (isset($datos[0]->fax) ? $datos[0]->fax : '' ) ?>" class=" form-control obligatorio  number" id="fax" name="fax" title="Ingresar el número de contacto de la empresa.">


                <br>
            </div>



            <div class="col-md-3">
                <label for="pais">
				<i class="fa fa-question-circle" aria-hidden="true" title="Seleccione el pais de residencia de la empresa"></i>
                    *                             País                        </label>
            </div>
            <div class="col-md-3">
                <?php echo lista("pais", "pais", "form-control obligatorio", "pais", "pai_id", "pai_nombre", (isset($datos[0]->pais) ? $datos[0]->pais : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>    <br>
                <br>
            </div>
            <div class="col-md-3">
                <label for="ciudad">
                    <i class="fa fa-question-circle" aria-hidden="true" title="Seleccione la ciudad de residencia de la empresa"></i>
                    *                             Ciudad                        </label>
            </div>
            <div class="col-md-3">
                <?php echo lista("ciudad", "ciudad", "form-control obligatorio", "ciudad", "ciu_id", "ciu_nombre", (isset($datos[0]->ciudad) ? $datos[0]->ciudad : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                    <br>
                <br>
            </div>



            <div class="col-md-3">
                <label for="direccion_web">
                    *                             Direcci&oacute;n web                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" maxlength="50" value="<?php echo (isset($datos[0]->direccion_web) ? $datos[0]->direccion_web : '' ) ?>" class=" form-control obligatorio  " id="direccion_web" name="direccion_web" title="Ingresar la dirección de la página web de la empresa.">


                <br>
            </div>



            <div class="col-md-3">
                <label for="email">
                    *                             E-mail                        </label>
            </div>
            <div class="col-md-3">
                <input type="email"  maxlength="50" value="<?php echo (isset($datos[0]->email) ? $datos[0]->email : '' ) ?>" class=" form-control obligatorio  " id="email" name="email" title="Ejemplo@um.com">


                <br>
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
                <a href="<?php echo base_url('index.php') . "/Empresa/consult_empresa" ?>" class="btn btn-dcs">Listado </a>
            </span>
            <span id="boton_cargar" style="display: none">
                <h2>Cargando ...</h2>
            </span>
        </div>
        <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
    </form>
</div>
<script>

    $('#nit').change(function () {
        var nit = $('#nit').val();
        var id = $('#id').val();
        $('#boton_cargar').show();
        $('#boton_guardar').hide();
        $.post('<?php echo base_url('index.php/Empresa/nit') ?>', {nit: nit, id: id})
                .done(function (msg) {
                    if (msg == 0) {
                        alerta('verde', 'Nit valido')
                    } else {
                        alerta('rojo', 'Nit no valido')
                        $('#nit').val('');
                    }
                    $('#boton_cargar').hide();
                    $('#boton_guardar').show();
                })
                .fail(function (msg) {
                    $('#boton_cargar').hide();
                    $('#boton_guardar').show();
                })
    })
    
    $('#nit').change(function () {
//    if(this)
        var url = "<?= base_url("index.php/Empresa/digito_ver") ?>"
        $.post(url, {nit: $(this).val()})
                .done(function (msg) {
                    $('#digito_ver').html('- ' + msg)
                }).fail(function () {

        })
    })
    <?php if(isset($datos[0]->id)){ ?>
        $('#nit').trigger('change');
    <?php } ?>
        
        

    
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
