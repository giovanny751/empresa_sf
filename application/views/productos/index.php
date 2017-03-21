<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Productos    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php') . "/Productos/save_productos"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
        <div class="row">
            <?php $id = (isset($datos[0]->id) ? $datos[0]->id : '' ) ?>
            <input type="hidden" value="<?php echo (isset($datos[0]->id) ? $datos[0]->id : '' ) ?>" class=" form-control   " id="id" name="id">


            <div class="col-md-3">
                <label for="referencia">
                    *                             Referencia                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" maxlength="15"  value="<?php echo (isset($datos[0]->referencia) ? $datos[0]->referencia : '' ) ?>" class=" form-control obligatorio " id="referencia" name="referencia" title=" Ingresar el código para identificación del producto.">


                <br>
            </div>



            <div class="col-md-3">
                <label for="Nombre">
                    *                             Nombre                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" maxlength="60" value="<?php echo (isset($datos[0]->Nombre) ? $datos[0]->Nombre : '' ) ?>" class=" form-control obligatorio  " id="Nombre" name="Nombre" title="Ingresar el nombre del producto.">


                <br>
            </div>



            <div class="col-md-3">
                <label for="Descripcion">
                    *                             Descripcion                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" maxlength="100" value="<?php echo (isset($datos[0]->Descripcion) ? $datos[0]->Descripcion : '' ) ?>" class=" form-control obligatorio  " id="Descripcion" name="Descripcion" title="Ingresar la descripción detallada del producto.">


                <br>
            </div>



            <div class="col-md-3">
                <label for="Categoria">
                    <i class="fa fa-question-circle" aria-hidden="true" title="Seleccione la categoria a la que asignara el producto."></i> *                             Categoria                        </label>
            </div>
            <div class="col-md-3">
                <?php echo lista("Categoria", "Categoria", "form-control obligatorio", "categoria", "id", "nombre", (isset($datos[0]->Categoria) ? $datos[0]->Categoria : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                        <br>
            </div>



            <div class="col-md-3">
                <label for="costo_usd">
                    *                             Costo USD                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" maxlength="10" value="<?php echo (isset($datos[0]->costo_usd) ? $datos[0]->costo_usd : '' ) ?>" class="number form-control  costo_n " id="costo_usd" name="costo_usd" title=" Ingresar el valor del producto en dolares.">
                <br>
            </div>
            <div class="col-md-3">
                <label for="costo_cop">
                    *                             Costo COP                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" maxlength="10" value="<?php echo (isset($datos[0]->costo_cop) ? $datos[0]->costo_cop : '' ) ?>" class="number form-control costo_n  " id="costo_cop" name="costo_cop" title=" Ingresar el valor del producto en pesos.">
                <br>
            </div>
            <div class="col-md-12">
                Datos de impuestos al producto
                <br><hr>
            </div>
            <div class="col-md-3">
                <label for="arancel_pre">Arancel</label>
            </div>
            <div class="col-md-3">
                <select class=" form-control obligatorio" id="arancel_pre" name="arancel_pre">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                </select>
                <br>
            </div>
            <div class="col-md-3">
                <label for="flete_pre">Flete</label>
            </div>
            <div class="col-md-3">
                <select class=" form-control obligatorio " id="flete_pre" name="flete_pre">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                </select>
                <br>
            </div>
            <div class="col-md-3">
                <label for="g_nacionalizacion_pre">Gastos Nacionalización</label>
            </div>
            <div class="col-md-3">
                <select class=" form-control  obligatorio" id="g_nacionalizacion_pre" name="g_nacionalizacion_pre">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                </select>
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
                <a href="<?php echo base_url('index.php') . "/Productos/consult_productos" ?>" class="btn btn-dcs">Listado </a>
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
    var r = (img.indexOf('jpg') != - 1) ? '' : ((img.indexOf('png') != - 1) ? '' : ((img.indexOf('gif') != - 1) ? '' : false));
    if (r === false) {
    alert('Tipo de archivo no valido');
    return false;
    }
    }
    });
    if (obligatorio('obligatorio') == false) {
    return false;
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
    $(function () {
    $('#referencia').focus();
    });
    $('input[name="costo_usd"]').change(function () {
    $('input[name="costo_cop"]').val('');
    $('input[name="costo_cop"]').removeClass('obligatorio');
    $('input[name="costo_usd"]').addClass('obligatorio');
    });
    $('input[name="costo_cop"]').change(function () {
    $('input[name="costo_usd"]').val('');
    $('input[name="costo_usd"]').removeClass('obligatorio');
    $('input[name="costo_cop"]').addClass('obligatorio');
    });
    
<?php if (isset($datos[0]->id)) { ?>
        $(function(){
        $('#arancel_pre').val('<?php echo $datos[0]->arancel_pre; ?>');
        $('#flete_pre').val('<?php echo $datos[0]->flete_pre; ?>');
        $('#g_nacionalizacion_pre').val('<?php echo $datos[0]->g_nacionalizacion_pre; ?>');
        })
<?php } ?>
    $('#referencia').change(function(){
    $.post('<?php echo base_url('index.php/Productos/consultarReferencia') ?>', {referencia:$('#referencia').val()})
            .done(function(msg){
            if (msg > 0){
            alerta('rojo', 'Referencia ya existe.')
                    $('#referencia').val('')
            } else{
            alerta('verde', 'Referencia no existe.')
            }
            })
            .fail(function(){

            });
    });
</script>
