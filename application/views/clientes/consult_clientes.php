<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Consultar Clientes    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/') . '/Clientes/consult_clientes'; ?>" method="post" >
        <div class="row">

            <div class="col-md-3">
                <label for="nit">
                    NIT                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['nit']) ? $post['nit'] : '' ) ?>" class="form-control obligatorio  number" id="nit" name="nit" title="Digité el NIT de la empresa sin dígito verificador." >
                <br>
            </div>

            <div class="col-md-3">
                <label for="cliente">
                    Cliente                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['cliente']) ? $post['cliente'] : '' ) ?>" class="form-control obligatorio  " id="cliente" name="cliente" title="Digité el nombre de la empresa o la razón social.">
                <br>
            </div>

            <div class="col-md-3">
                <label for="contacto">
                    Contacto                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['contacto']) ? $post['contacto'] : '' ) ?>" class="form-control obligatorio  " id="contacto" name="contacto" title="Ingresar el nombre del contacto del cliente.">
                <br>
            </div>

            <div class="col-md-3">
                <label for="cargo">
                    Cargo                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['cargo']) ? $post['cargo'] : '' ) ?>" class="form-control obligatorio  " id="cargo" name="cargo" title="Digité el cargo del cual es responsable el contacto del cliente.">
                <br>
            </div>

            <div class="col-md-3">
                <label for="ciudad">
                    Ciudad                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['ciudad']) ? $post['ciudad'] : '' ) ?>" class="form-control obligatorio  " id="ciudad" name="ciudad" title="Digité la ciudad donde se encuentra ubicada la empresa.">
                <br>
            </div>

            <div class="col-md-3">
                <label for="email">
                    E-mail                        </label>
            </div>
            <div class="col-md-3">

                <input type="email" value="<?php echo (isset($post['email']) ? $post['email'] : '' ) ?>" class="form-control obligatorio  " id="email" name="email" title="Ingrese el e-mail de contacto de la empresa. Ejemplo@um.com">
                <br>
            </div>

            <div class="col-md-3">
                <label for="telefono_cli">
                    Teléfono cliente                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['telefono_cli']) ? $post['telefono_cli'] : '' ) ?>" class="form-control obligatorio  number" id="telefono_cli" name="telefono_cli" title="Digité el número telefónico del contacto del cliente.">
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
                <th>NIT</th>
                <th>Cliente</th>
                <th>Contacto</th>
                <th>Cargo</th>
                <th>Ciudad</th>
                <th>E-mail</th>
                <th>Teléfono cliente</th>
                <th>Acción</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($datos as $key => $value) {
                        echo "<tr>";
                        $i = 0;
                        $d = array();
                        foreach ($value as $key2 => $value2) {
                            if ($key2 == 'nit') {
                                $d[] = $value->$key2 . '-' . calcularDV($value->$key2);
                                echo "<td>" . $value->$key2 . '-' . calcularDV($value->$key2) . "</td>";
                            } else {
                                $d[] = $value->$key2;
                                echo "<td>" . $value->$key2 . " </td>";
                            }
                            if ($i == 0) {
                                $campo = $key2;
                                $valor = "'" . $value->$key2 . "'";
                            }
                            $i++;
                        }
                        echo "<td>"
                        . '<a href="javascript:" class="btn btn-dcs" onclick="editar(' . $valor . ')"><i class="fa fa-pencil"></i></a>'
                        . '<a href="javascript:" class="btn btn-danger" onclick="delete_(' . $valor . ',' . "'" . $d[1] . "'" . ',' . "'" . $d[2] . "'" . ')"><i class="fa fa-trash-o"></i></a>'
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
        <a href="<?php echo base_url() . "/index.php/Clientes/index" ?>" class="btn btn-dcs" >Nuevo</a>
    </div>
</div>
<?php if (isset($campo)) { ?>
    <form action="<?php echo base_url('index.php/') . "/Clientes/edit_clientes"; ?>" method="post" id="editar">
        <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
        <input type="hidden" name="campo" value="<?php echo $campo ?>">
    </form>
    <form action="<?php echo base_url('index.php/') . "/Clientes/delete_clientes"; ?>" method="post" id="delete">
        <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>3">
        <input type="hidden" name="campo" value="<?php echo $campo ?>">
    </form>
<?php } ?>
<script>
    function editar(num) {
        $('#<?php echo $campo ?>2').val(num);
        $('#editar').submit();
    }
    function delete_(num,nit,nombre) {
        var r = confirm('Nit: '+nit+'\nNombre: '+nombre+'\n¿Confirma que desea eliminar el registro?');
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
    $(function () {
        $('#nit').focus();
    })
</script>
