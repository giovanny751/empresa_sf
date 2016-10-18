<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Consultar Ciudad    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/') . '/Ciudad/consult_ciudad'; ?>" method="post" >
        <div class="row">
            <div class="col-md-3">
                <label for="pai_id">
				<i class="fa fa-question-circle" aria-hidden="true" title="Seleccione el país donde se encuentra ubicada la empresa."></i>
                    Pais                        </label>
            </div>
            <div class="col-md-3">

                <?php echo lista("pai_id", "pai_id", "form-control obligatorio", "pais", "pai_id", "pai_nombre", (isset($datos[0]->pai_id) ? $datos[0]->pai_id : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                    <br>
            </div>

            <div class="col-md-3">
                <label for="ciu_nombre">
                    Nombre ciudad                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['ciu_nombre']) ? $post['ciu_nombre'] : '' ) ?>" class="form-control obligatorio  " id="ciu_nombre" name="ciu_nombre" title="Digité la ciudad donde se encuentra ubicada la empresa.">
                <br>
            </div>

        </div>
        <button class="btn btn-dcs">Consultar</button>
    </form>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <th></th>
                <th>Pais</th>
                <th>Nombre ciudad</th>
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
        <a href="<?php echo base_url() . "/index.php/Ciudad/index" ?>" class="btn btn-dcs" >Nuevo</a>
    </div>
</div>
<?php if (isset($campo)) { ?>
    <form action="<?php echo base_url('index.php/') . "/Ciudad/edit_ciudad"; ?>" method="post" id="editar">
        <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
        <input type="hidden" name="campo" value="<?php echo $campo ?>">
    </form>
    <form action="<?php echo base_url('index.php/') . "/Ciudad/delete_ciudad"; ?>" method="post" id="delete">
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
