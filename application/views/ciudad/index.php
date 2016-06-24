<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Ciudad    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/')."/Ciudad/save_ciudad"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
        <div class="row">
                                    <?php $id=(isset($datos[0]->ciu_id)?$datos[0]->ciu_id:'' ) ?>
                                                <input type="hidden" value="<?php echo (isset($datos[0]->ciu_id)?$datos[0]->ciu_id:'' ) ?>" class=" form-control   " id="ciu_id" name="ciu_id">
                    

                    <div class="col-md-3">
                        <label for="pai_id">
                            <i class="fa fa-question-circle" aria-hidden="true" title="pendiente"></i>*                             Pais                        </label>
                    </div>
                    <div class="col-md-3">
                        <?php echo lista("pai_id", "pai_id", "form-control obligatorio", "pais", "pai_id", "pai_nombre", (isset($datos[0]->pai_id)?$datos[0]->pai_id:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                        <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="ciu_nombre">
                            <i class="fa fa-question-circle" aria-hidden="true" title="pendiente"></i>*                             Nombre ciudad                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->ciu_nombre)?$datos[0]->ciu_nombre:'' ) ?>" class=" form-control obligatorio  " id="ciu_nombre" name="ciu_nombre">

                            
                                                <br>
                    </div>

                            </div>
        <?php if(isset($post['campo'])){ ?>
        <input type="hidden" name="<?php echo $post['campo']?>" value="<?php echo $post[$post['campo']]?>">
        <input type="hidden" name="campo" value="<?php echo $post['campo']?>">
        <?php } ?>
        <div class="row">
            <span id="boton_guardar">
                <button class="btn btn-dcs" >Guardar</button> 
                <input class="btn btn-dcs" type="reset" value="Limpiar">
                <a href="<?php echo base_url('index.php')."/Ciudad/consult_ciudad" ?>" class="btn btn-dcs">Listado </a>
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
        $('input[type="file"]').each(function(key, val) {
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
    $('body').delegate('.number', 'keypress', function(tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker({ dateFormat: 'yy-mm-dd' });


</script>
