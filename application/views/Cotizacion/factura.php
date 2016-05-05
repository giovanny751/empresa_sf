<table style="border:1px solid #000">
    <tr >
        <td rowspan="4" style="border:1px solid #000" width="30%"></td>
        <td rowspan="4" style="border:1px solid #000" width="30%">
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;COTIZACION
        </td>
        <td rowspan="1" style="border:1px solid #000" width="25%">Codigo</td>
        <td rowspan="1" style="border:1px solid #000" width="15%">CO-REG-3</td>
    </tr>
    <tr style="border:1px solid #000">
        <td rowspan="1" style="border:1px solid #000">Versión</td>
        <td rowspan="1" style="border:1px solid #000">1</td>
    </tr>
    <tr style="border:1px solid #000">
        <td rowspan="1" style="border:1px solid #000">Número</td>
        <td rowspan="1" style="border:1px solid #000">0130</td>
    </tr>
    <tr style="border:1px solid #000">
        <td rowspan="1" style="border:1px solid #000">Fecha de implementación</td>
        <td rowspan="1" style="border:1px solid #000"><?php echo date('Y-m-d'); ?></td>
    </tr>
</table>

<table>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>Cliente:</td>
        <td></td>
    </tr>
    <tr>
        <td>Contacto:</td>
        <td></td>
    </tr>
    <tr>
        <td>Cargo:</td>
        <td></td>
    </tr>
    <tr>
        <td>Ciudad:</td>
        <td></td>
    </tr>
    <tr>
        <td>Fecha:</td>
        <td></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td></td>
    </tr>
    <tr>
        <td>Teléfono:</td>
        <td></td>
    </tr>
</table>
<p>
<hr>
<p>
    <br>
<table>
    <tr>
        <td style="border:1px solid #000" width="10%">&nbsp;&nbsp;ITEM</td>
        <td style="border:1px solid #000" width="30%">&nbsp;&nbsp;DESCRIPCIÓN</td>
        <td style="border:1px solid #000" width="10%">&nbsp;&nbsp;CANT.</td>
        <td style="border:1px solid #000" width="15%">&nbsp;&nbsp;V/UNIT.</td>
        <td style="border:1px solid #000" width="15%">&nbsp;&nbsp;IVA 16%</td>
        <td style="border:1px solid #000" width="20%">&nbsp;&nbsp;V/TOTAL</td>
    </tr>
    <?php
    $i = 0;
    $resultado = 0;
    if (isset($consultaProductos))
        foreach ($consultaProductos as $c):
            ?>
            <tr>
                <td style="border:1px solid #000" >&nbsp;&nbsp;&nbsp;<?php echo ++$i ?></td>
                <td style="border:1px solid #000"><?php echo $c->Nombre ?></td>
                <td style="border:1px solid #000">&nbsp;&nbsp;<?php echo number_format($c->proCot_cantidad) ?></td>
                <td style="border:1px solid #000">&nbsp;&nbsp;<?php echo number_format($c->proCot_costo - ($c->proCot_costo * 0.16)) ?></td>
                <td style="border:1px solid #000">&nbsp;&nbsp;<?php echo number_format(($c->proCot_costo * 0.16)) ?></td>
                <td style="border:1px solid #000">&nbsp;&nbsp;<?php echo number_format($c->proCot_costo * $c->proCot_cantidad) ?></td>
            </tr>
            <?php
            $resultado+=$c->proCot_costo * $c->proCot_cantidad;
        endforeach;
    ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td style="border:1px solid #000" colspan="2">
            Total
        </td>
        <td style="border:1px solid #000">
            <?php echo number_format($resultado); ?>
        </td>
    </tr>
</table>

<p><br></p>

<table>
    <tr>
        <td>Forma de Pago:</td>
        <td></td>
    </tr>
    <tr>
        <td>Tiempo de Entrega:</td>
        <td></td>
    </tr>
    <tr>
        <td>Garantia:</td>
        <td></td>
    </tr>
    <tr>
        <td>Validez de la Oferta</td>
        <td></td>
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
