<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> 
        COTIZACIÓN
    </h5>
</div>
<div class='well'>
    <form class='form-horizontal' id='frmCotizacion' method="post">
        <input type="hidden" name="encCot_id" id="encCot_id" value="<?php echo (isset($encCot_id)?$encCot_id:'') ?>">
        <div class='row'>
            <div class='col-md-6'>
                <div class='form-group'>
                    <label div class='col-md-6'><i class="fa fa-question-circle" aria-hidden="true" title=" Seleccionar el nombre de la empresa o la razón social."></i> <span style='color: red'>*&nbsp;&nbsp;</span>Cliente</label>
                    <div class='col-md-6'>
                        <select name='cliente' id='cliente' class='form-control obligatorio'>  
                            <option value=''>::Seleccionar</option>
                            <?php foreach ($cliente as $c): ?>
                                <option <?php echo ((isset($consultaEncabezado->id_cliente) ? $consultaEncabezado->id_cliente : '') == $c->id ) ? "selected" : ""; ?> value='<?php echo $c->id ?>'><?php echo $c->cliente ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class='form-group'>
                    <label div class='col-md-6'><i class="fa fa-question-circle" aria-hidden="true" title="Seleccionar forma en la que se realizara el pago de la cotización "></i><span style='color: red'>*&nbsp;&nbsp;</span>Forma de pago</label>
                    <div class='col-md-6'>
                        <select name='formaPago' id='formaPago' class='form-control obligatorio'>  
                            <option value=''>::Seleccionar</option>
                            <?php foreach ($formaPago as $f): ?>
                                <option <?php echo ((isset($consultaEncabezado->id_formaPago) ? $consultaEncabezado->id_formaPago : '') == $f->id ) ? "selected" : ""; ?> value='<?php echo $f->id ?>'><?php echo $f->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class='form-group'>
                    <label div class='col-md-6'><i class="fa fa-question-circle" aria-hidden="true" title="Seleccionar tiempo de entrega de los productos."></i><span style='color: red'>*&nbsp;&nbsp;</span>Tiempo de entrega</label>
                    <div class='col-md-6'>
                        <select name='tiempoEntrega' id='tiempoEntrega' class='form-control obligatorio'>  
                            <option value=''>::Seleccionar</option>
                            <?php foreach ($tiempoEntrega as $t): ?>
                                <option <?php echo ((isset($consultaEncabezado->id_tiempoEntrega) ? $consultaEncabezado->id_tiempoEntrega : '') == $t->id ) ? "selected" : ""; ?> value='<?php echo $t->id ?>'><?php echo $t->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <label div class='col-md-6'><i class="fa fa-question-circle" aria-hidden="true" title="Seleccionar tiempo de garantía de los productos."></i><span style='color: red'>*&nbsp;&nbsp;</span>Garantía</label>
                    <div class='col-md-6'>
                        <select name='garantia' id='garantia' class='form-control obligatorio'>  
                            <option value=''>::Seleccionar</option>
                            <?php foreach ($Garantia as $g): ?>
                                <option <?php echo ((isset($consultaEncabezado->id_garantia) ? $consultaEncabezado->id_garantia : '') == $g->id) ? "selected" : ""; ?> value='<?php echo $g->id ?>'><?php echo $g->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class='form-group'>
                    <label div class='col-md-6'><i class="fa fa-question-circle" aria-hidden="true" title="Seleccionar tiempo de validez de la cotización."></i><span style='color: red'>*&nbsp;&nbsp;</span>Validez de la oferta</label>
                    <div class='col-md-6'>
                        <select name='validezOferta' id='validezOferta' class='form-control obligatorio'>  
                            <option value=''>::Seleccionar</option>
                            <?php foreach ($validezOferta as $v): ?>
                                <option <?php echo ((isset($consultaEncabezado->id_validezOferta) ? $consultaEncabezado->id_validezOferta : '') == $v->id ) ? "selected" : ""; ?> value='<?php echo $v->id ?>'><?php echo $v->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class='form-group'>
                    <label div class='col-md-6'><i class="fa fa-question-circle" aria-hidden="true" title="Seleccionar estado de la cotización. "></i><span style='color: red'>*&nbsp;&nbsp;</span>Estado</label>
                    <div class='col-md-6'>
                        <select name='est_id' id='est_id' class='form-control obligatorio'>  
                            <option value=''>::Seleccionar</option>
                            <?php foreach ($estados as $v): ?>
                                <option <?php echo ((isset($consultaEncabezado->est_id) ? $consultaEncabezado->est_id : '') == $v->id ) ? "selected" : ""; ?> value='<?php echo $v->id ?>'><?php echo $v->nombre ?></option>
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
                        <th>Valor Unitario</th>
                        <th>Cantidad</th>
                        <th>Valor Total</th>
                        <th>Eliminar</th>
                        </thead>
                        <tbody>
                            <?php
                            $resultado = 0;
                            if (isset($consultaProductos))
                                foreach ($consultaProductos as $c):
                                    ?>
                                    <tr>
                                        <td><?php echo $c->referencia ?></td>
                                        <td><input type='hidden' value='<?php echo $c->id_Producto ?>' name='IdProducto[]'><?php echo $c->Nombre ?></td>
                                        <td><input type='hidden' value='<?php echo $c->proCot_costo ?>' name='costoPro[]'><?php echo $c->proCot_costo ?></td>
                                        <td><input type='text' style='text-align:center' value='<?php echo $c->proCot_cantidad ?>' name='cantidadProductos[]' class='cantidadProductos'></td>
                                        <td><span class='valor_total'><?php echo number_format($c->proCot_costo * $c->proCot_cantidad) ?></span></td>
                                        <td><button type='button' class='btn btn-danger eliminar'>Eliminar</button></td>
                                    </tr>
                                    <?php
                                    $resultado+=$c->proCot_costo * $c->proCot_cantidad;
                                endforeach;
                            ?>
                        </tbody>
                    </table>
                    <hr>
                    <table class='table table-hover table-bordered'>
                        <thead>
                        <th>Total</th>
                        <th><span class='valor_toal_factura'><?php echo number_format($resultado) ?></span></th>
                        </thead>
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
                        <th>Costo</th>
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
                cuerpo += "<td class='costo_prod'>" + val.costo_cop + "</td>";
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
                table += "<td><input type='hidden' value='" + $(this).parent('td').siblings('.costo_prod').text() + "' name='costoPro[]'>" + $(this).parent('td').siblings('.costo_prod').text() + "</td>"
                table += "<td><input type='text' style='text-align:center' value='" + $(this).parent('td').parent('tr').find('.cantidad').val() + "' name='cantidadProductos[]' class='cantidadProductos'></td>"
                table += "<td><span class='valor_total'>" + (CurrencyFormatted(parseInt($(this).parent('td').siblings('.costo_prod').text()) * parseInt($(this).parent('td').parent('tr').find('.cantidad').val()))) + "</span></td>"
                table += "<td><button type='button' class='btn btn-danger eliminar'>Eliminar</button></td>"
                table += "</tr>"
            }
        });
        $('#tablaPrincipal').append(table);
        $('#myModal').modal('hide');
        sumar_todo()
    });

    $('body').delegate('.eliminar', "click", function () {
        if (confirm("Esta seguro de eliminar el registro")) {
            $(this).parents('tr').remove();
        }
        sumar_todo()
    });

    $('body').delegate("#guardarFormulario", "click", function () {
        if (obligatorio('obligatorio')) {
            $.post(
                    "<?php echo base_url("index.php/cotizacion/guardarCotizacion") ?>",
                    $('#frmCotizacion').serialize()
                    ).done(function (msg) {
                $('#guardarFormulario').hide();
                alert('Datos Guardados Con Éxito.')
                location.href='<?php echo base_url('index.php/Cotizacion/consultaCotizacion') ?>'
            }).fail(function () {

            });
        }
        ;
    });

    $('body').delegate('.cantidadProductos', 'change', function () {
        var unidades = $(this).val();
        var costo = $(this).parent().parent('tr').find('input[name="costoPro[]"]').val();
        console.log(costo)
        var resultado = parseInt(unidades) * parseInt(costo);
        $(this).parent().parent('tr').find('.valor_total').html(CurrencyFormatted(resultado));

        sumar_todo()
    })



    function sumar_todo() {
        var valor = 0;
        $('.cantidadProductos').each(function () {
            var dato = $(this).parent().parent('tr').find('.valor_total').html();
            dato = dato.replace(',', '');
            dato = dato.replace(',', '');
            dato = dato.replace(',', '');
            dato = dato.replace(',', '');
            valor = parseInt(dato) + parseInt(valor);
        })

        $('.valor_toal_factura').html(CurrencyFormatted(valor));
    }

    function CurrencyFormatted(num) {
        num = num.toString().replace(/\$|\,/g, '');
        if (isNaN(num))
            num = "0";
        sign = (num == (num = Math.abs(num)));
        num = Math.floor(num * 100 + 0.50000000001);
        cents = num % 100;
        num = Math.floor(num / 100).toString();
        if (cents < 10)
            cents = "0" + cents;
        for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
            num = num.substring(0, num.length - (4 * i + 3)) + ',' +
                    num.substring(num.length - (4 * i + 3));
        return (((sign) ? '' : '-') + num);
    }



    $('#guardarFormulario').hide();
<?php if (isset($consultaEncabezado->est_id)) { ?>
    <?php if ($this->session->userdata('permisos') == 1 && $consultaEncabezado->est_id == 4) { ?>
            $('#guardarFormulario').show();
    <?php } ?>
    <?php if ($this->session->userdata('permisos') == 1 && $consultaEncabezado->est_id == 1) { ?>
            $('#guardarFormulario').show();
    <?php } ?>
    <?php if ($this->session->userdata('permisos') == 2 && $consultaEncabezado->est_id = 2) { ?>
            $('#guardarFormulario').show();
    <?php } ?>
<?php } ?>



<?php if (!isset($consultaEncabezado->est_id)) { ?>
        $('#guardarFormulario').show();
<?php } ?>



</script>