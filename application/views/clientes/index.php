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
                        <input type="text" value="<?php echo (isset($datos[0]->nit) ? $datos[0]->nit : '' ) ?>" class=" form-control obligatorio  number" id="nit" name="nit">
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
                <input type="text" value="<?php echo (isset($datos[0]->cliente) ? $datos[0]->cliente : '' ) ?>" class=" form-control obligatorio  " id="cliente" name="cliente">


                <br>
            </div>



            <div class="col-md-3">
                <label for="contacto">
                    *                             Contacto                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->contacto) ? $datos[0]->contacto : '' ) ?>" class=" form-control obligatorio  " id="contacto" name="contacto">


                <br>
            </div>



            <div class="col-md-3">
                <label for="cargo">
                    *                             Cargo                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->cargo) ? $datos[0]->cargo : '' ) ?>" class=" form-control obligatorio  " id="cargo" name="cargo">


                <br>
            </div>



            <div class="col-md-3">
                <label for="ciudad">
                    *                             Ciudad                        </label>
            </div>
            <div class="col-md-3">
                <?php echo lista("ciudad", "ciudad", "form-control obligatorio", "ciudad", "ciu_id", "ciu_nombre", (isset($datos[0]->ciudad) ? $datos[0]->ciudad : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                    <br>
                <br>
            </div>



            <div class="col-md-3">
                <label for="email">
                    *                             E-mail                        </label>
            </div>
            <div class="col-md-3">
                <input type="email" value="<?php echo (isset($datos[0]->email) ? $datos[0]->email : '' ) ?>" class=" form-control obligatorio  " id="email" name="email">


                <br>
            </div>



            <div class="col-md-3">
                <label for="telefono_cli">
                    *                             Teléfono cliente                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->telefono_cli) ? $datos[0]->telefono_cli : '' ) ?>" class=" form-control obligatorio  number" id="telefono_cli" name="telefono_cli">


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
    $('#nit').change(function () {
//    if(this)
        var url = "<?= base_url("index.php/Empresa/digito_ver") ?>"
        $.post(url, {nit: $(this).val()})
                .done(function (msg) {
                    $('#digito_ver').html('- ' + msg)
                }).fail(function () {

        })
    })
    $('#nit').trigger('change');
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
