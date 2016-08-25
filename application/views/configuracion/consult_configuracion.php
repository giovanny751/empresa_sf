<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> 	Consultar Configuración    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/') . '/Configuracion/consult_configuracion'; ?>" method="post" >
        <div class="row">
            <div class="col-md-3">
                <label for="dolar">
                    Dolar                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['dolar']) ? $post['dolar'] : '' ) ?>" class="form-control obligatorio  " id="dolar" name="dolar" title="Digite el precio del dolar, TRM (tasa de cambio representativa del mercado) vigente.">
                <br>
            </div>

            <div class="col-md-3">
                <label for="arancel">
                    Arancel                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['arancel']) ? $post['arancel'] : '' ) ?>" class="form-control obligatorio  " id="arancel" name="arancel" title=" Digite el impuesto que se cobra sobre las importaciones.">
                <br>
            </div>

            <div class="col-md-3">
                <label for="flete">
                    Flete                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['flete']) ? $post['flete'] : '' ) ?>" class="form-control obligatorio  " id="flete" name="flete" title="Digite  el costo del transporte de mercancías.">
                <br>
            </div>

            <div class="col-md-3">
                <label for="g_nacionalizacion">
                    Gastos Nacionalización                         </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['g_nacionalizacion']) ? $post['g_nacionalizacion'] : '' ) ?>" class="form-control obligatorio  " id="g_nacionalizacion" name="g_nacionalizacion" title="Digite el costo de nacionalización del producto.">
                <br>
            </div>

            <div class="col-md-3">
                <label for="margen">
                    Márgen                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['margen']) ? $post['margen'] : '' ) ?>" class="form-control obligatorio  " id="margen" name="margen" title="Digite el margen de ganancia del producto, expresado en porcentaje.">
                <br>
            </div>

        </div>
        <button class="btn btn-dcs">Consultar</button>
    </form>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <th>id</th>
                <th>Dolar</th>
                <th>Drancel</th>
                <th>Flete</th>
                <th>Gastos Nacionalización </th>
                <th>Márgen</th>
                <th>Acción</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($datos as $key => $value) {
                        echo "<tr>";
                        $i = 0;

                        foreach ($value as $key2 => $value2) {
                            echo "<td>" . $value->$key2 . "</td>";
                            if ($i == 0) {
                                $campo = $key2;
                                $valor = "'" . $value->$key2 . "'";
                            }
                            $i++;
                        }
                        echo "<td>"
                        . '<a href="javascript:" class="btn btn-dcs" onclick="editar(' . $valor . ')"><i class="fa fa-pencil"></i></a>'
                        . '<a href="javascript:" class="btn btn-danger" onclick="delete_(' . $valor . ')"><i class="fa fa-trash-o"></i></a>'
                        . "</td>";
                        echo "</tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12" style="float:right">
        <a href="<?php echo base_url() . "/index.php/Configuracion/index" ?>" class="btn btn-dcs" >Nuevo</a>
    </div>
</div>
<?php if (isset($campo)) { ?>
    <form action="<?php echo base_url('index.php/') . "/Configuracion/edit_configuracion"; ?>" method="post" id="editar">
        <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
        <input type="hidden" name="campo" value="<?php echo $campo ?>">
    </form>
    <form action="<?php echo base_url('index.php/') . "/Configuracion/delete_configuracion"; ?>" method="post" id="delete">
        <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>3">
        <input type="hidden" name="campo" value="<?php echo $campo ?>">
    </form>
<?php } ?>
<script>
    function editar(num) {
        $('#<?php echo $campo ?>2').val(num);
        $('#editar').submit();
    }
    function delete_(num) {
        var r = confirm('Confirma que desea eliminar el registro');
        if (r == false) {
            return false;
        }
        $('#<?php echo $campo ?>3').val(num);
        $('#delete').submit();
    }

    $('body').delegate('.number', 'keypress', function (tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker({
        rtl: Metronic.isRTL(),
        autoclose: true
    });
</script>
