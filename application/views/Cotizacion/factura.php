<table style="border:1px solid #999">
    <tr >
        <td rowspan="4" style="border:1px solid #999" width="30%">
            &nbsp;<br>&nbsp;
            <img src="<?php echo base_url('img/logoaaorig.png');?>">
        </td>
        <td rowspan="4" style="border:1px solid #999" width="30%">
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;COTIZACION
        </td>
        <td rowspan="1" style="border:1px solid #999" width="25%">Codigo</td>
        <td rowspan="1" style="border:1px solid #999" width="15%">CO-REG-3</td>
    </tr>
    <tr style="border:1px solid #999">
        <td rowspan="1" style="border:1px solid #999">Versión</td>
        <td rowspan="1" style="border:1px solid #999">1</td>
    </tr>
    <tr style="border:1px solid #999">
        <td rowspan="1" style="border:1px solid #999">Número</td>
        <td rowspan="1" style="border:1px solid #999">0130</td>
    </tr>
    <tr style="border:1px solid #999">
        <td rowspan="1" style="border:1px solid #999">Fecha de implementación</td>
        <td rowspan="1" style="border:1px solid #999"><?php echo date('Y-m-d'); ?></td>
    </tr>
</table>

<table>
    <tr>
        <td width="20%"></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>Cliente:</td>
        <td><?php  echo $cotizaciones[0]->cliente ?></td>
    </tr>
    <tr>
        <td>Contacto:</td>
        <td><?php  echo $cotizaciones[0]->contacto ?></td>
    </tr>
    <tr>
        <td>Cargo:</td>
        <td><?php  echo $cotizaciones[0]->cargo ?></td>
    </tr>
    <tr>
        <td>Ciudad:</td>
        <td><?php  echo $cotizaciones[0]->ciu_nombre ?></td>
    </tr>
    <tr>
        <td>Fecha:</td>
        <td><?php echo date('d-m-Y'); ?></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td><?php  echo $cotizaciones[0]->email ?></td>
    </tr>
    <tr>
        <td>Teléfono:</td>
        <td><?php  echo $cotizaciones[0]->telefono_cli; ?></td>
    </tr>
</table>
<p>

<p>
    <br>
<table>
    <tr>
        <td style="border:1px solid #999" width="10%">&nbsp;&nbsp;ITEM</td>
        <td style="border:1px solid #999" width="30%">&nbsp;&nbsp;DESCRIPCIÓN</td>
        <td style="border:1px solid #999" width="10%">&nbsp;&nbsp;CANT.</td>
        <td style="border:1px solid #999" width="15%">&nbsp;&nbsp;V/UNIT.</td>
        <td style="border:1px solid #999" width="15%">&nbsp;&nbsp;IVA 19%</td>
        <td style="border:1px solid #999" width="20%">&nbsp;&nbsp;V/TOTAL</td>
    </tr>
    <?php
    $i = 0;
    $resultado = 0;
    if (isset($consultaProductos))
        foreach ($consultaProductos as $c):
            ?>
            <tr>
                <td style="border:1px solid #999" >&nbsp;&nbsp;&nbsp;<?php echo ++$i ?></td>
                <td style="border:1px solid #999"><?php echo $c->Nombre ?></td>
                <td style="border:1px solid #999">&nbsp;&nbsp;<?php echo number_format($c->proCot_cantidad) ?></td>
                <?php $costo= ($c->proCot_costo*($c->proCot_margen/100))+$c->proCot_costo ?>
                <td style="border:1px solid #999">&nbsp;&nbsp;<?php echo number_format($costo) ?></td>
                <td style="border:1px solid #999">&nbsp;&nbsp;<?php echo number_format(($costo * 0.19)) ?></td>
                <td style="border:1px solid #999">&nbsp;&nbsp;<?php echo number_format($costo * $c->proCot_cantidad) ?></td>
            </tr>
            <?php
            $resultado+=$costo * $c->proCot_cantidad;
        endforeach;
    ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td style="border:1px solid #999" colspan="2">
            Total
        </td>
        <td style="border:1px solid #999">
            <?php echo number_format($resultado); ?>
        </td>
    </tr>
</table>

<p><br></p>

<table>
    <tr>
        <td width="30%">Forma de Pago:</td>
        <td><?php  echo $cotizaciones[0]->formaPago ?></td>
    </tr>
    <tr>
        <td>Tiempo de Entrega:</td>
        <td><?php  echo $cotizaciones[0]->tiempoEntrega ?> <?php  echo $cotizaciones[0]->per_nombre ?></td>
    </tr>
    <tr>
        <td>Garantia:</td>
        <td><?php  echo $cotizaciones[0]->garantia ?></td>
    </tr>
    <tr>
        <td>Validez de la Oferta</td>
        <td><?php  echo $cotizaciones[0]->validezOferta ?></td>
    </tr>
</table>

<p><br></p>
<p><br></p>

<table>
    <tr>
        <td>Elaborado por:</td>
        <td>Aprobado por:</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>_________________________</td>
        <td>_________________________</td>
    </tr>
</table>
