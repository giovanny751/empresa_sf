<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Consultar Usuarios    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/') . '/User/consult_user'; ?>" method="post" >
        <div class="row">

            <div class="col-md-3">
                <label for="usu_cedula">
                    Cédula                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['usu_cedula']) ? $post['usu_cedula'] : '' ) ?>" class="form-control obligatorio  number" id="usu_cedula" name="usu_cedula" title="Digite el número correspondiente al documento de identificación.">
                <br>
            </div>

            <div class="col-md-3">
                <label for="usu_nombre">
                    Nombre                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['usu_nombre']) ? $post['usu_nombre'] : '' ) ?>" class="form-control obligatorio  " id="usu_nombre" name="usu_nombre" title="	Digite el nombre del usuario.">
                <br>
            </div>

            <div class="col-md-3">
                <label for="usu_apellido">
                    Apellido                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['usu_apellido']) ? $post['usu_apellido'] : '' ) ?>" class="form-control obligatorio  " id="usu_apellido" name="usu_apellido" title=" Digite los apellidos completos.">
                <br>
            </div>

            <div class="col-md-3">
                <label for="usu_usuario">
                    Usuario                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['usu_usuario']) ? $post['usu_usuario'] : '' ) ?>" class="form-control obligatorio  " id="usu_usuario" name="usu_usuario" title="Digite el nombre del usuario con el que accede al sistema.">
                <br>
            </div>

            <div class="col-md-3">
                <label for="usu_email">
                    E-mail                        </label>
            </div>
            <div class="col-md-3">

                <input type="email" value="<?php echo (isset($post['usu_email']) ? $post['usu_email'] : '' ) ?>" class="form-control obligatorio  " id="usu_email" name="usu_email" title="Ejemplo@um.com".>
                <br>
            </div>

            <div class="col-md-3">
                <label for="emp_id">
                    <i class="fa fa-question-circle" aria-hidden="true" title="Seleccione la empresa a la cual pertenece el usuario."></i>
                    Empresa                        </label>
            </div>
            <div class="col-md-3">


                <?php echo lista("emp_id", "emp_id", "form-control obligatorio", "empresa", "id", "nombre", (isset($datos[0]->emp_id) ? $datos[0]->emp_id : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                    <br>
            </div>

        </div>
        <button class="btn btn-dcs">Consultar</button>
    </form>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <th></th>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Usuario</th>
                <th>E-mail</th>
                <th>Empresa</th>
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
        <a href="<?php echo base_url() . "/index.php/User/index" ?>" class="btn btn-dcs" >Nuevo</a>
    </div>
</div>
<?php if (isset($campo)) { ?>
    <form action="<?php echo base_url('index.php/') . "/User/edit_user"; ?>" method="post" id="editar">
        <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
        <input type="hidden" name="campo" value="<?php echo $campo ?>">
    </form>
    <form action="<?php echo base_url('index.php/') . "/User/delete_user"; ?>" method="post" id="delete">
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
    $(function () {
        $('#usu_cedula').focus();
    })
</script>
