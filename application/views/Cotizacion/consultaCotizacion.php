<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> 
        Busqueda Cotizaciones
    </h5>
</div>
<div class='well'>
    <div class='row'>
        <form class='form-horizontal' id='frmCotizacion' method="post">
            <div class='col-md-6'>
                <div class='form-group'>
                    <label div class='col-md-6'>Cliente</label>
                    <div class='col-md-6'>
                        <select name='cliente' id='cliente' class='form-control obligatorio'>  
                            <option value=''>::Seleccionar</option>
                            <?php foreach ($cliente as $c): ?>
                                <option value='<?php echo $c->id ?>'><?php echo $c->cliente ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class='form-group'>
                    <label div class='col-md-6'>Forma de pago</label>
                    <div class='col-md-6'>
                        <select name='formaPago' id='formaPago' class='form-control obligatorio'>  
                            <option value=''>::Seleccionar</option>
                            <?php foreach ($formaPago as $f): ?>
                                <option value='<?php echo $f->id ?>'><?php echo $f->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class='form-group'>
                    <label div class='col-md-6'>Tiempo de entrega</label>
                    <div class='col-md-6'>
                        <select name='tiempoEntrega' id='tiempoEntrega' class='form-control obligatorio'>  
                            <option value=''>::Seleccionar</option>
                            <?php foreach ($tiempoEntrega as $t): ?>
                                <option value='<?php echo $t->id ?>'><?php echo $t->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

            </div>

            <div class='col-md-6'>
                <div class='form-group'>
                    <label div class='col-md-6'>Garantía</label>
                    <div class='col-md-6'>
                        <select name='garantia' id='garantia' class='form-control obligatorio'>  
                            <option value=''>::Seleccionar</option>
                            <?php foreach ($Garantia as $g): ?>
                                <option value='<?php echo $g->id ?>'><?php echo $g->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class='form-group'>
                    <label div class='col-md-6'>Validez de la oferta</label>
                    <div class='col-md-6'>
                        <select name='validezOferta' id='validezOferta' class='form-control obligatorio'>  
                            <option value=''>::Seleccionar</option>
                            <?php foreach ($validezOferta as $v): ?>
                                <option value='<?php echo $v->id ?>'><?php echo $v->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class='form-group'>
                    <div class='col-md-12' style='text-align:right'>
                        <button type='button' class='btn btn-success consultar'>Consultar</button>
                    </div>
                </div>
            </div>
        </form>
        <div class='col-md-12'>
            <div class='table-responsive'>
                <table class='table table-hover table-bordered' id='tablaPrincipal'>
                    <thead>
                    <th>Codigo</th>
                    <th>Cliente</th>
                    <th>Garantía</th>
                    <th>Forma de pago</th>
                    <th>Validez de la oferta</th>
                    <th>Tiempo de entrega</th>
                    <th>Cantidad Productos</th>
                    <th>Valor Cotización</th>
                    <th>Estado</th>
                    <th>Imprimir</th>
                    <th>Seleccionar</th>
                    </thead>
                    <tbody id='bodyBusqueda'>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<script>
    $('.consultar').click(function () {
        $.post(
                "<?php echo base_url("index.php/cotizacion/filtroBusqueda") ?>",
                $('#frmCotizacion').serialize()
                ).done(function (msg) {
            $('#bodyBusqueda *').remove();
            body = '';
            $.each(msg, function (key, val) {
                body += "<tr>";
                body += "<td>" + val.cotEnc_id + "</td>";
                body += "<td>" + val.cliente + "</td>";
                body += "<td>" + val.garantia + "</td>";
                body += "<td>" + val.formaPago + "</td>";
                body += "<td>" + val.validezOferta + "</td>";
                body += "<td>" + val.tiempoEntrega + "</td>";
                body += "<td>" + val.cantidad + "</td>";
                body += "<td>" + CurrencyFormatted(val.valor_cotizacion) + "</td>";
                body += "<td>" + val.estado + "</td>";
                body += "<td>"+ (val.id_estado==3?"<a href='<?php echo base_url('index.php/Cotizacion/pdf') ?>/" + val.cotEnc_id + "' target='_black'>PDF</a>":'')+ "</td>";
                body += "<td style='text-align:center'><button type='button' name='consultaCotizacion' encCot_id='" + val.cotEnc_id + "' class='btn btn-info consultarEncabezado'>Consultar</button></td>";
                body += "</tr>";
            });
            $('#bodyBusqueda').append(body);
        }).fail(function () {

        });
    });

    $('body').delegate('.consultarEncabezado', "click", function () {
        var form = "<form method='post' id='frmConsulta' action='<?php echo base_url("index.php/cotizacion/index") ?>'>";
        form += "<input type='hidden' value='" + $(this).attr("encCot_id") + "' name='encCot_id'>";
        form += "</form>";

        $('body').append(form);
        $('#frmConsulta').submit();
    })

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

</script>    