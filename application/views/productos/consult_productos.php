<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Consultar Productos    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/') . '/Productos/consult_productos'; ?>" method="post" >
        <div class="row">


            <div class="col-md-3">
                <label for="referencia">
                    Referencia                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['referencia']) ? $post['referencia'] : '' ) ?>" class="form-control obligatorio " id="referencia" name="referencia" title=" Digite el código de identificación del producto.">
                <br>
            </div>

            <div class="col-md-3">
                <label for="Nombre">
                    Nombre                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['Nombre']) ? $post['Nombre'] : '' ) ?>" class="form-control obligatorio  " id="Nombre" name="Nombre" title="Digite el nombre del producto.">
                <br>
            </div>

            <div class="col-md-3">
                <label for="Descripcion">
                    Descripcion                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['Descripcion']) ? $post['Descripcion'] : '' ) ?>" class="form-control obligatorio  " id="Descripcion" name="Descripcion" title="Digite la descripción del producto.">
                <br>
            </div>

            <div class="col-md-3">
                <label for="Categoria">
				<i class="fa fa-question-circle" aria-hidden="true" title="Seleccione la categoria a la que pertenece el producto."></i>
                    Categoria                        </label>
            </div>
            <div class="col-md-3">

                <?php echo lista("Categoria", "Categoria", "form-control obligatorio", "categoria", "id", "nombre", (isset($datos[0]->Categoria) ? $datos[0]->Categoria : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                    <br>
            </div>
        </div>
        <button class="btn btn-dcs">Consultar</button>
    </form>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <th></th>
                <th>Referencia</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Categoria</th>
                <th>Costo COP</th>
                <th>Acción</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($datos as $key => $value) {
                        echo "<tr>";
                        $i = 0;

                        foreach ($value as $key2 => $value2) {
                            if ($key2 == 'costo_cop')
                                echo "<td>" . number_format($value->$key2) . "</td>";
                            else
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
        <a href="<?php echo base_url() . "/index.php/Productos/index" ?>" class="btn btn-dcs" >Nuevo</a>
    </div>
</div>
<?php if (isset($campo)) { ?>
    <form action="<?php echo base_url('index.php/') . "/Productos/edit_productos"; ?>" method="post" id="editar">
        <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
        <input type="hidden" name="campo" value="<?php echo $campo ?>">
    </form>
    <form action="<?php echo base_url('index.php/') . "/Productos/delete_productos"; ?>" method="post" id="delete">
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
    $(function(){
    $('#referencia').focus();
})
</script>
