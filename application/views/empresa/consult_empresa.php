<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Consultar Empresa    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/') . '/Empresa/consult_empresa'; ?>" method="post" >
        <div class="row">


            <div class="col-md-3">
                <label for="nit">
                    NIT                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['nit']) ? $post['nit'] : '' ) ?>" class="form-control obligatorio  number" id="nit" name="nit" title="Digité el NIT de la empresa sin dígito verificador.">
                <br>
            </div>

            <div class="col-md-3">
                <label for="nombre">
                    Nombre                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['nombre']) ? $post['nombre'] : '' ) ?>" class="form-control obligatorio  " id="nombre" name="nombre" title="Digite el nombre completo de la empresa o la razón social.">
                <br>
            </div>

        </div>
        <button class="btn btn-dcs">Consultar</button>
    </form>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <th></th>
                    <th>NIT</th>
                    <th>Nombre</th>
                    <th>Ciudad</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
<!--                    <th>Fax</th>
                    <th>Pais</th>
                    <th>Dirección web</th>
                    <th>E-mail</th>-->
                    <th>Acción</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($datos as $key => $value) {
                            echo "<tr>";
                            $i = 0;

                            foreach ($value as $key2 => $value2) {
                                if ($key2 == 'nit')
                                    echo "<td>" . $value->$key2.'-'.calcularDV($value->$key2) . "</td>";
                                else
                                    echo "<td>" . $value->$key2 . " </td>";
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
</div>
<div class="row">
    <div class="col-md-12" style="float:right">
        <a href="<?php echo base_url() . "/index.php/Empresa/index" ?>" class="btn btn-dcs" >Nuevo</a>
    </div>
</div>
<?php if (isset($campo)) { ?>
    <form action="<?php echo base_url('index.php/') . "/Empresa/edit_empresa"; ?>" method="post" id="editar">
        <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
        <input type="hidden" name="campo" value="<?php echo $campo ?>">
    </form>
    <form action="<?php echo base_url('index.php/') . "/Empresa/delete_empresa"; ?>" method="post" id="delete">
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
    $('#nit').focus();
})
</script>
