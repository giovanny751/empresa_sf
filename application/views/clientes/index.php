<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Clientes    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/') . "/Clientes/save_clientes"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
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
                        <input type="text" maxlength="10" value="<?php echo (isset($datos[0]->nit) ? $datos[0]->nit : '' ) ?>" <?php echo (isset($datos[0]->nit) ? 'disabled="disabled"' : '' ) ?> class=" form-control obligatorio  number" id="nit" name="nit" title="Ingresar el NIT de la empresa sin dígito verificador."    >
                    </div>
                    <div class="col-md-3">
                        <div class="col-md" id="digito_ver" style="margin: 10 0;">

                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-3">
                <label for="cliente">
                    *                             Cliente                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" maxlength="50" value="<?php echo (isset($datos[0]->cliente) ? $datos[0]->cliente : '' ) ?>" class=" form-control obligatorio  " id="cliente" name="cliente" title="Ingresar el nombre completo de la empresa o la razón social."
                       >


                <br>
            </div>



            <div class="col-md-3">
                <label for="contacto">
                    *                             Contacto                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" maxlength="50" value="<?php echo (isset($datos[0]->contacto) ? $datos[0]->contacto : '' ) ?>" class=" form-control obligatorio  " id="contacto" name="contacto" title="Ingresar el nombre del contacto de la empresa.">


                <br>
            </div>



            <div class="col-md-3">
                <label for="cargo">
                    *                             Cargo                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" maxlength="50" value="<?php echo (isset($datos[0]->cargo) ? $datos[0]->cargo : '' ) ?>" class=" form-control obligatorio  " id="cargo" name="cargo" title="Ingresar el cargo del cual es responsable el contacto en la organización.">


                <br>
            </div>

            <div class="col-md-3">
                <label for="pais">
                    <i class="fa fa-question-circle" aria-hidden="true" title="Seleccione el país donde se encuentra ubicada la empresa."></i>
                    *                             País                        </label>
            </div>
            <div class="col-md-3">
                <?php echo lista("pais", "pais", "form-control obligatorio", "pais", "pai_id", "pai_nombre", (isset($datos[0]->pais) ? $datos[0]->pais : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>    <br>
                <br>
            </div>

            <div class="col-md-3">
                <label for="ciudad">
                    <i class="fa fa-question-circle" aria-hidden="true" title="Seleccione la ciudad donde se encuentra ubicada la empresa."></i>*                             Ciudad                        </label>
            </div>
            <div class="col-md-3">
                <?php echo lista("ciudad", "ciudad", "form-control obligatorio", "ciudad", "ciu_id", "ciu_nombre", (isset($datos[0]->ciudad) ? $datos[0]->ciudad : ''), array("ACTIVO" => "S"), /* readOnly? */ false,'pai_id'); ?>  <br>
                <br>
            </div>



            <div class="col-md-3">
                <label for="email">
                    *                             E-mail                        </label>
            </div>
            <div class="col-md-3">
                <input type="email" maxlength="50" value="<?php echo (isset($datos[0]->email) ? $datos[0]->email : '' ) ?>" class=" form-control obligatorio  " id="email" name="email" title="Ingrese el e-mail de contacto de la empresa. Ejemplo@um.com">


                <br>
            </div>



            <div class="col-md-3">
                <label for="telefono_cli">
                    *                             Teléfono cliente                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" maxlength="15" value="<?php echo (isset($datos[0]->telefono_cli) ? $datos[0]->telefono_cli : '' ) ?>" class=" form-control obligatorio  number" id="telefono_cli" name="telefono_cli" title="Ingresar el número telefónico del cliente.">


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
                <a href="<?php echo base_url('index.php') . "/Clientes/consult_clientes" ?>" class="btn btn-dcs">Listado </a>
            </span>
            <span id="boton_cargar" style="display: none">
                <h2>Cargando ...</h2>
            </span>
        </div>
        <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
    </form>
</div>
<script>
    ss = 0;
    $('#nit').change(function () {
        var nit = $('#nit').val();
        var id = $('#id').val();
        $('#boton_cargar').show();
        $('#boton_guardar').hide();
        $.post('<?php echo base_url('index.php/Empresa/nit_cliente') ?>', {nit: nit, id: id})
                .done(function (msg) {
                    if (ss == 0) {
                        if (msg == 0) {
                            alerta('verde', 'Nit no registrado')
                        } else {
                            alerta('rojo', 'Nit ya registrado')
                            $('#nit').val('');
                        }
                    } else {
                        ss = 0;
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
<?php if (isset($datos[0]->id)) { ?>
        ss = 1
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

$(function(){
    $('#nit').focus();
})
</script>
