<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> 
        COTIZACIÓN
    </h5>
</div>
<div class='well'>
    <form class='form-horizontal' id='frmCotizacion' method="post">
        <div class='row'>
            <div class='col-md-6'>
                <div class='form-group'>
                    <label div class='col-md-6'><span style='color: red'>*&nbsp;&nbsp;</span>Cliente</label>
                    <div class='col-md-6'>
                        <select name='cliente' id='cliente' class='form-control obligatorio'>  
                            <option value=''>::Seleccionar</option>
                            <?php foreach ($cliente as $c): ?>
                                <option <?php echo ((isset($consultaEncabezado->id_cliente)?$consultaEncabezado->id_cliente:'') == $c->id ) ? "selected" : ""; ?> value='<?php echo $c->id ?>'><?php echo $c->cliente ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class='form-group'>
                    <label div class='col-md-6'><span style='color: red'>*&nbsp;&nbsp;</span>Forma de pago</label>
                    <div class='col-md-6'>
                        <select name='formaPago' id='formaPago' class='form-control obligatorio'>  
                            <option value=''>::Seleccionar</option>
                            <?php foreach ($formaPago as $f): ?>
                                <option <?php echo ((isset($consultaEncabezado->id_formaPago)?$consultaEncabezado->id_formaPago:'') == $f->id ) ? "selected" : ""; ?> value='<?php echo $f->id ?>'><?php echo $f->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class='form-group'>
                    <label div class='col-md-6'><span style='color: red'>*&nbsp;&nbsp;</span>Tiempo de entrega</label>
                    <div class='col-md-6'>
                        <select name='tiempoEntrega' id='tiempoEntrega' class='form-control obligatorio'>  
                            <option value=''>::Seleccionar</option>
                            <?php foreach ($tiempoEntrega as $t): ?>
                                <option <?php echo ((isset($consultaEncabezado->id_tiempoEntrega)?$consultaEncabezado->id_tiempoEntrega:'') == $t->id ) ? "selected" : ""; ?> value='<?php echo $t->id ?>'><?php echo $t->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class='form-group'>
                    <label div class='col-md-6'><span style='color: red'>*&nbsp;&nbsp;</span>Garantía</label>
                    <div class='col-md-6'>
                        <select name='garantia' id='garantia' class='form-control obligatorio'>  
                            <option value=''>::Seleccionar</option>
                            <?php foreach ($Garantia as $g): ?>
                                <option <?php echo ((isset($consultaEncabezado->id_garantia)?$consultaEncabezado->id_garantia:'') == $g->id) ? "selected" : ""; ?> value='<?php echo $g->id ?>'><?php echo $g->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class='form-group'>
                    <label div class='col-md-6'><span style='color: red'>*&nbsp;&nbsp;</span>Validez de la oferta</label>
                    <div class='col-md-6'>
                        <select name='validezOferta' id='validezOferta' class='form-control obligatorio'>  
                            <option value=''>::Seleccionar</option>
                            <?php foreach ($validezOferta as $v): ?>
                                <option <?php echo ((isset($consultaEncabezado->id_validezOferta)?$consultaEncabezado->id_validezOferta:'') == $v->id ) ? "selected" : ""; ?> value='<?php echo $v->id ?>'><?php echo $v->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class='form-group'>
                    <label div class='col-md-6'><span style='color: red'>*&nbsp;&nbsp;</span>Estado</label>
                    <div class='col-md-6'>
                        <select name='est_id' id='est_id' class='form-control obligatorio'>  
                            <option value=''>::Seleccionar</option>
                            <?php foreach ($estados as $v): ?>
                            <option <?php echo ((isset($consultaEncabezado->est_id)?$consultaEncabezado->est_id:'') == $v->id ) ? "selected" : ""; ?> value='<?php echo $v->id ?>'><?php echo $v->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class='col-md-6'>

            </div>

            <div class='col-md-12'>
                <button type="button" id='agregar' class='btn btn-info'>Agregar</button>
            </div>
            <div class='col-md-12'>
                <div class='table-responsive'>
                    <table class='table table-hover table-bordered' id='tablaPrincipal'>
                        <thead>
                        <th>Referencia</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Eliminar</th>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($consultaProductos))
                                foreach ($consultaProductos as $c):
                                    ?>
                                    <tr>
                                        <td><?php echo $c->referencia ?></td>
                                        <td><input type='hidden' value='<?php echo $c->id_producto ?>' name='IdProducto[]'><?php echo $c->Nombre ?></td>
                                        <td><input type='text' style='text-align:center' value='<?php echo $c->proCot_cantidad ?>' name='cantidadProductos[]' class='cantidadProductos'></td>
                                        <td><button type='button' class='btn btn-danger eliminar'>Eliminar</button></td>
                                    </tr>
    <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class='col-md-12'>
                <div class="form-group">
                    <label class='col-md-2'>Nota</label>
                    <div class='col-md-10'>
                        <textarea name='nota' id='nota' class='form-control'><?php echo (!empty($consultaEncabezado->encCot_nota)) ? $consultaEncabezado->encCot_nota : ""; ?></textarea>
                    </div>
                </div>
            </div>
            <br>
            <div class='col-md-12' style='text-align: center'>
                <button type='button' id='guardarFormulario' class='btn btn-dcs'>Guardar</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="<?php echo base_url('index.php/Cotizacion/consultaCotizacion') ?>" class="btn btn-dcs">Listado</a>
            </div>
        </div>
    </form>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="text-align: center;"> <div class="circuloIcon guardarmodificacion" title="Guardar"><i class="fa fa-floppy-o fa-2x"></i></div> Agregar</h4>
            </div>
            <div class="modal-body form-horizontal">
                <div class="row" >
                    <table class='table table-bordered table-hover' >
                        <thead>
                        <th>Referencia</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        </thead>
                        <tbody id='bodyProducto'>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('body').delegate("#agregar", "click", function () {
        $.post(
                "<?php echo base_url("index.php/cotizacion/consultaProductos") ?>"
                ).done(function (msg) {
            $('#bodyProducto *').remove();
            cuerpo = "";
            $.each(msg, function (key, val) {
                cuerpo += "<tr>";
                cuerpo += "<td class='columnaReferencia'><input class='idProducto' type='hidden' name='idProducto' value='" + val.id + "' class='idProducto' >" + val.referencia + "</td>";
                cuerpo += "<td class='nombreProducto'>" + val.Nombre + "</td>";
                cuerpo += "<td class='cantidadProducto'><input type='text' name='cantidad' class='form-control cantidad' style='text-align:center'></td>";
                cuerpo += "</tr>";
            })
            $('#bodyProducto').append(cuerpo);
            $('#myModal').modal();
        }).fail(function (msg) {

        });
    });

    $('body').delegate('.guardarmodificacion', "click", function () {
        var table = "";
        $.each($('.cantidad'), function (key, val) {
            if ($(this).val() != "") {
                table += "<tr>"
                table += "<td>" + $(this).parent('td').siblings('.columnaReferencia').text() + "</td>"
                table += "<td><input type='hidden' value='" + $(this).parent('td').parent('tr').find('.idProducto').val() + "' name='IdProducto[]'>" + $(this).parent('td').siblings('.nombreProducto').text() + "</td>"
                table += "<td><input type='text' style='text-align:center' value='" + $(this).parent('td').parent('tr').find('.cantidad').val() + "' name='cantidadProductos[]' class='cantidadProductos'></td>"
                table += "<td><button type='button' class='btn btn-danger eliminar'>Eliminar</button></td>"
                table += "</tr>"
            }
        });
        $('#tablaPrincipal').append(table);
        $('#myModal').modal('hide');
    });

    $('body').delegate('.eliminar', "click", function () {
        if (confirm("Esta seguro de eliminar el registro")) {
            $(this).parents('tr').remove();
        }
    });

    $('body').delegate("#guardarFormulario", "click", function () {
        if (obligatorio('obligatorio')) {
            $.post(
                    "<?php echo base_url("index.php/cotizacion/guardarCotizacion") ?>",
                    $('#frmCotizacion').serialize()
                    ).done(function (msg) {

            }).fail(function () {

            });
        }
        ;
    });
    
    $('#guardarFormulario').hide();
    
<?php if ($this->session->userdata('permisos') == 1 && $consultaEncabezado->est_id==4) { ?>
        $('#guardarFormulario').show();
<?php } ?>
<?php if ($this->session->userdata('permisos') == 1 && $consultaEncabezado->est_id==1) { ?>
        $('#guardarFormulario').show();
<?php } ?>
<?php if ($this->session->userdata('permisos') == 2 && $consultaEncabezado->est_id=2) { ?>
        $('#guardarFormulario').show();
<?php } ?>
    
    
    
<?php if (!isset($consultaEncabezado->est_id)) { ?>
        $('#guardarFormulario').show();
<?php } ?>
    
    
    
</script>