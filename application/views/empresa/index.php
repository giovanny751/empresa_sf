<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Usuarios    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/')."/Empresa/save_empresa"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
        <div class="row">
                                    <?php $id=(isset($datos[0]->id)?$datos[0]->id:'' ) ?>
                                                <input type="hidden" value="<?php echo (isset($datos[0]->id)?$datos[0]->id:'' ) ?>" class=" form-control obligatorio  " id="id" name="id">
                    

                    <div class="col-md-3">
                        <label for="nit">
                            *                             NIT                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->nit)?$datos[0]->nit:'' ) ?>" class=" form-control obligatorio  number" id="nit" name="nit">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="nombre">
                            *                             Nombre                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->nombre)?$datos[0]->nombre:'' ) ?>" class=" form-control obligatorio  " id="nombre" name="nombre">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="ciudad">
                            *                             Ciudad                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->ciudad)?$datos[0]->ciudad:'' ) ?>" class=" form-control obligatorio  " id="ciudad" name="ciudad">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="telefono">
                            *                             Telefono                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->telefono)?$datos[0]->telefono:'' ) ?>" class=" form-control obligatorio  number" id="telefono" name="telefono">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="direccion">
                            *                             Dirección                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->direccion)?$datos[0]->direccion:'' ) ?>" class=" form-control obligatorio  " id="direccion" name="direccion">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="fax">
                            *                             Fax                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->fax)?$datos[0]->fax:'' ) ?>" class=" form-control obligatorio  number" id="fax" name="fax">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="pais">
                            *                             Pais                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->pais)?$datos[0]->pais:'' ) ?>" class=" form-control obligatorio  " id="pais" name="pais">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="direccion_web">
                            *                             Dirección web                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->direccion_web)?$datos[0]->direccion_web:'' ) ?>" class=" form-control obligatorio  " id="direccion_web" name="direccion_web">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="email">
                            *                             E-mail                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="email" value="<?php echo (isset($datos[0]->email)?$datos[0]->email:'' ) ?>" class=" form-control obligatorio  " id="email" name="email">

                            
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
                <a href="<?php echo base_url('index.php')."/Empresa/consult_empresa" ?>" class="btn btn-dcs">Listado </a>
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
