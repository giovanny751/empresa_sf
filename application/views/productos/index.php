<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Productos    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/') . "/Productos/save_productos"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
        <div class="row">
            <?php $id = (isset($datos[0]->id) ? $datos[0]->id : '' ) ?>
            <input type="hidden" value="<?php echo (isset($datos[0]->id) ? $datos[0]->id : '' ) ?>" class=" form-control   " id="id" name="id">


            <div class="col-md-3">
                <label for="referencia">
                   <i class="fa fa-question-circle" aria-hidden="true" title="Código para identificación del producto."></i> *                             Referencia                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" maxlength="15"  value="<?php echo (isset($datos[0]->referencia) ? $datos[0]->referencia : '' ) ?>" class=" form-control obligatorio " id="referencia" name="referencia">


                <br>
            </div>



            <div class="col-md-3">
                <label for="Nombre">
                   <i class="fa fa-question-circle" aria-hidden="true" title="Nombre del producto."></i> *                             Nombre                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" maxlength="60" value="<?php echo (isset($datos[0]->Nombre) ? $datos[0]->Nombre : '' ) ?>" class=" form-control obligatorio  " id="Nombre" name="Nombre">


                <br>
            </div>



            <div class="col-md-3">
                <label for="Descripcion">
                   <i class="fa fa-question-circle" aria-hidden="true" title="Descripción detallada del producto."></i> *                             Descripcion                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" maxlength="100" value="<?php echo (isset($datos[0]->Descripcion) ? $datos[0]->Descripcion : '' ) ?>" class=" form-control obligatorio  " id="Descripcion" name="Descripcion">


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
                   <i class="fa fa-question-circle" aria-hidden="true" title="Valor del producto en dolares."></i> *                             Costo USD                        </label>
            </div>
            <div class="col-md-3">
                <input type="text" maxlength="10" value="<?php echo (isset($datos[0]->costo_usd) ? $datos[0]->costo_usd : '' ) ?>" class=" form-control obligatorio  " id="costo_usd" name="costo_usd">


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
