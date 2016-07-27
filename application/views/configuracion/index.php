<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Configuración    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/') . "/Configuracion/save_configuracion"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
        <div class="row">
            <?php $id = (isset($datos[0]->id) ? $datos[0]->id : '' ) ?>
            <input type="hidden" value="<?php echo (isset($datos[0]->id) ? $datos[0]->id : '' ) ?>" class=" form-control   " id="id" name="id">


            <div class="col-md-3">
                <label for="dolar">
                   <i class="fa fa-question-circle" aria-hidden="true" title="Precio del dolar, TRM (tasa de cambio representativa del mercado) vigente."></i> *                             Dolar                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->dolar) ? $datos[0]->dolar : '' ) ?>" class=" form-control obligatorio  " id="dolar" name="dolar">


                <br>
            </div>



            <div class="col-md-3">
                <label for="arancel">
                   <i class="fa fa-question-circle" aria-hidden="true" title="Impuesto que se cobra sobre las importaciones."></i> *                             Arancel                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->arancel) ? $datos[0]->arancel : '' ) ?>" class=" form-control obligatorio  " id="arancel" name="arancel">


                <br>
            </div>



            <div class="col-md-3">
                <label for="flete">
                   <i class="fa fa-question-circle" aria-hidden="true" title="Costo del transporte de mercancías."></i> *                             Flete                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->flete) ? $datos[0]->flete : '' ) ?>" class=" form-control obligatorio  " id="flete" name="flete">


                <br>
            </div>



            <div class="col-md-3">
                <label for="g_nacionalizacion">
                   <i class="fa fa-question-circle" aria-hidden="true" title="Costo de nacionalización del producto."></i> *                             Gastos Nacionalización                         </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->g_nacionalizacion) ? $datos[0]->g_nacionalizacion : '' ) ?>" class=" form-control obligatorio  " id="g_nacionalizacion" name="g_nacionalizacion">


                <br>
            </div>



            <div class="col-md-3">
                <label for="margen">
                   <i class="fa fa-question-circle" aria-hidden="true" title="Margen de ganancia del producto, es expresado en porcentaje."></i> *                             Márgen                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($datos[0]->margen) ? $datos[0]->margen : '' ) ?>" class=" form-control obligatorio  " id="margen" name="margen">


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
                <a href="<?php echo base_url('index.php') . "/Configuracion/consult_configuracion" ?>" class="btn btn-dcs">Listado </a>
            </span>
            <span id="boton_cargar" style="display: none">
                <h2>Cargando ...</h2>
            </span>
        </div>
        <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
    </form>
</div>
<script>
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
