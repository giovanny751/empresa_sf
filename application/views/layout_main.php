<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script src="<?php echo base_url('js/jquery-1.10.2.js') ?>" type="text/javascript"></script>


<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>




<link href="<?php echo base_url('img/blanco.jpg'); ?>" rel="shortcut icon" type="image/x-icon">
<script src="<?php echo base_url('js/jquery.smartmenus.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('js/jquery.smartmenus.bootstrap.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('js/bootstrap.js') ?>" type="text/javascript"></script>
<link href="<?php echo base_url('css/bootstrap.css') ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('css/style.css') ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('css/jquery.smartmenus.bootstrap.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('/assets/global/scripts/metronic.js'); ?>" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/global/plugins/jquery-notific8/jquery.notific8.min.css'); ?>"/>
<script src="<?php echo base_url('/assets/global/plugins/jquery-notific8/jquery.notific8.min.js'); ?>"></script>
<script src="<?php echo base_url('/assets/admin/pages/scripts/ui-notific8.js'); ?>"></script>
<link href="<?php echo base_url('/assets/global/plugins/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/estilos.css'); ?>"/>  
<script src="<?php echo base_url('js/jquery.blockUI.js') ?>" type="text/javascript"></script>

<!-- Estilos principales de botones y/o elementos -->
<link rel="stylesheet" href="<?php echo base_url('css/DCSestilos.css') ?>" />

<link rel="stylesheet" href="<?php echo base_url('css/menuVertical.css') ?>" />
<script type="text/javascript" src="<?php echo base_url('js/menuVertical.js') ?>"></script>

<link rel="stylesheet" href="<?php echo base_url('css/tabs.css') ?>" />
<script type="text/javascript" src="<?php echo base_url('js/tabs.js') ?>"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/dt-1.10.9/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/r/dt/dt-1.10.9/datatables.min.js"></script>


<header>
    <span class="tituloH">SF</span>
</header>
<div id="cssmenu">
    aka va el menu quemado
</div> 
<div class="contenidoLayout">
    <div class="container">
        <div class="row contenido " >
            <?php echo $content_for_layout ?>
            <p><br></p>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="row" style="">
        <div class="container">
            <div class="col-md-4 col-lg-4 col-sm-4 col-sx-4" align="center">

            </div>
        </div>  
    </div>  
</footer>
<style>
    .marco {
        background-color: white !important;
        border: 2px solid #337ab7 !important;
        color: gray;
        border-radius: 15px;
        margin: 15px;
        padding: 25px;
    }

    .cree tbody tr td {
        border: 1px solid #CCC !important;
    }

    .cree tr th {
        border: 1px solid #CCC !important;
        background-color: #008ac9;
        color: #FFF
    }

    .cree thead tr td {
        border: 1px solid #CCC !important;
        background-color: #008ac9;
        color: #FFF
    }
    .obligado{
        background-color: rgb(250, 255, 189);
    }
    .caption {
        display: inline-block;
        float: left;
        font-size: 18px;
        font-weight: 400;
        line-height: 18px;
        padding: 10px 0;
    }
    .portlet.box, .portlet-title {
        border-bottom: 1px solid #eee;
        color: #fff;
        margin-bottom: 0;
        padding: 0 10px;
    }
    .row{
        margin-top: 1%;
    }
    .container{
        padding-top: 83px;
    }
    * { 
        font-family: HelveticaLTStd;
    }
    label{
        font-size: 16px !important;
    }
    .campoobligatorio{
        color:red;
        font-size:16px;
    }
    i{
        cursor:pointer;
    }
    .table tbody tr td {
        border: 1px solid #CCC !important;
    }
    .dataTables_info, .dataTables_paginate{
        font-size: 14px !important;
    }

    .table tr th {
        border: 1px solid #CCC !important;
        background-color: #008ac9 !important;
        color: #FFF
    }

    .table thead tr td {
        border: 1px solid #CCC !important;
        background-color: #008ac9;
        color: #FFF
    }
</style>
<script>
    $('.limpiar').click(function () {
        $('select,input').val('');
    });
    $('input[type="reset"]').click(function () {
        $('select,input[type="text"]').val('');
    });

//    --------------------------------------------------------------------------
//COLORES DE ALERTAS DE METRONIC
//    --------------------------------------------------------------------------
    function alerta(color, texto)
    {
        switch (color) {
            case "rojo":
                var alerta = 'ruby sticky';
                break;
            case "morado":
                var alerta = 'amethyst sticky';
                break;
            case "azul":
                var alerta = 'teal sticky';
                break;
            case "amarillo":
                var alerta = 'lemon sticky';
                break;
            case "verde":
                var alerta = 'lime sticky';
                break;
            case "naranja":
                var alerta = 'tangerine sticky';
                break;
            default:
                break;
        }
        $.notific8('', {
            horizontalEdge: 'bottom',
            life: 5000,
            theme: alerta,
            heading: texto
        });
    }
    $('body').delegate('.number', 'keypress', function (tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    function obligatorio(clase) {
        var i = 0;
        $('.' + clase).each(function (key, val) {
            if ($(this).val() != "")
                $(this).removeClass('obligado');
            else {
                $(this).addClass('obligado');
                i++;
            }
        });
        if (i == 0)
            return true;
        else {
            $.notific8('', {
                horizontalEdge: 'bottom',
                life: 5000,
                theme: 'ruby sticky',
                heading: 'FALTAN CAMPOS POR LLENAR'
            });
            return false;
        }
    }


    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core componets
//        Layout.init(); // init layout
//        TableAjax.init();
//        UIBlockUI.init();
        //TableAdvanced.init();
//        ComponentsPickers.init();
        //QuickSidebar.init() // init quick sidebar
        //Index.init();
        //Index.initDashboardDaterange();
        //Index.initJQVMAP(); // init index page's custom scripts
        //Index.initCalendar(); // init index page's custom scripts
        //Index.initCharts(); // init index page's custom scripts
        //Index.initChat();
        //TableAdvanced.init();
        //Index.initMiniCharts();
        //Index.initIntro();
        //Tasks.initDashboardWidget();
        //ComponentsDropdowns.init();
        //FormValidation.init();
//        UIAlertDialogApi.init();
        UINotific8.init();
    });
    $('.fecha').datepicker({
        dateFormat: "yy-mm-dd",
        autoclose: true,
        dayNames: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
        dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
        dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
        monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
        changeMonth: true,
        changeYear: true,
        yearRange: '1950:<?php echo date('Y') ?>'
    });





//    $('body').on('keyup', 'input[type=text]', function () {
//        var start = this.selectionStart,
//                end = this.selectionEnd;
//        $(this).val($(this).val().toUpperCase());
//        this.setSelectionRange(start, end);
//    });
//
//    $('body').on('keyup', 'input[type=search]', function () {
//        $(this).val($(this).val().toUpperCase());
//    });
//
//    $('body').on('keyup', 'input[type=text], textarea', function () {
//        var start = this.selectionStart,
//                end = this.selectionEnd;
//        $(this).val($(this).val().toUpperCase());
//        this.setSelectionRange(start, end);
//
//    });
//
//    $('body').on('keyup', 'input[type=text]', function () {
//        var $th = $(this);
//        $th.val($th.val().replace(/["<>^}{|\\$%'`´Ç]/g, function (str) {
//            return '';
//        }));
//    });
//
//    $('body').on('keyup', 'input[type=text], textarea', function () {
//        var $th = $(this);
//        $th.val($th.val().replace(/["<>^}{|\\$%'`´Ç]/g, function (str) {
//            return '';
//        }));
//    });
    $(function () {
        //Se pone para que en todos los llamados ajax se bloquee la pantalla mostrando el mensaje Procesando...
        $.blockUI.defaults.message = 'Procesando...';
        $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
    });
//$('.table').DataTable();


    $('body').delegate('input[type="file"]', 'change', function () {

        //this.files[0].size gets the size of your file.
        if (this.files[0].size > 8300000) {
            alerta('rojo', 'El tama&ntilde;o del archivo debe ser inferior a 8mb', false);
            $(this).val('');
            return false;
        }

    });
</script>
<style>
    .blockOverlay{
        z-index:10000 !important;
    }
</style>

