<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @package     NYGSOFT
 * @author      Gerson J Barbosa / Nelson G Barbosa
 * @Pagina      www.nygsoft.com
 * @celular     301 385 9952
 * @email       javierbr12@hotmail.com    
 */
class Cotizacion extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Crea_formularios_model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }

    function index() {

        $this->load->model("Cotizacion_model");

        if (!empty($this->input->post("encCot_id"))) {
            $this->data['encCot_id'] = $this->input->post("encCot_id");
            $this->data['consultaEncabezado'] = $this->Cotizacion_model->consultaEncabezado($this->input->post('encCot_id'))[0];
            $this->data['consultaProductos'] = $this->Cotizacion_model->consultaProductosCotizacion($this->input->post("encCot_id"));
//           var_dump($this->data['consultaProductos']);die;
        }
        $this->data['cliente'] = $this->Cotizacion_model->cliente();
        $this->data['formaPago'] = $this->Cotizacion_model->formaPago();
        $this->data['tiempoEntrega'] = $this->Cotizacion_model->TiemoEntrega();
        $this->data['Garantia'] = $this->Cotizacion_model->garantia();
        $this->data['validezOferta'] = $this->Cotizacion_model->ValidezOferta();
        $this->data['estados'] = $this->Cotizacion_model->estados();
        $this->layout->view("Cotizacion/cotizacion", $this->data);
    }

    function consultaProductos() {
        $this->load->model("Cotizacion_model");
        $producto = $this->data['producto'] = $this->Cotizacion_model->productos();
        $this->output->set_content_type('application/json')->set_output(json_encode($producto));
    }

    function guardarCotizacion() {
        try {
            $this->load->model("Cotizacion_model");
            $post = $this->input->post();
            $cotizacion = array(
                "id_cliente" => $this->input->post("cliente"),
                "id_formaPago" => $this->input->post("formaPago"),
                "id_tiempoEntrega" => $this->input->post("tiempoEntrega"),
                "id_garantia" => $this->input->post("garantia"),
                "encCot_nota" => (!empty($this->input->post("nota"))) ? $this->input->post("nota") : "",
                "id_validezOferta" => $this->input->post("validezOferta"),
                "est_id" => $this->input->post("est_id")
            );
            if (!empty($post['encCot_id'])) {
                $idEncabezadoCotizacion = $this->Cotizacion_model->actualizarEncabezadoCotizacion($cotizacion, $post['encCot_id']);
            } else {
                $idEncabezadoCotizacion = $this->Cotizacion_model->guardarEncabezadoCotizacion($cotizacion);
            }

            if (empty($idEncabezadoCotizacion))
                throw new Exception('No fue posible guardar el encabezado de la cotización');

            $producto = $this->input->post('IdProducto');
            $costoPro = $this->input->post('costoPro');
            $margenProductos = $this->input->post('margenProductos');
            if (count($producto)) {
                $productoCotizacion = array();
                for ($i = 0; $i < count($producto); $i++) {
                    $productoCotizacion[] = array(
                        "id_Producto" => $producto[$i],
                        "proCot_costo" => $costoPro[$i],
                        "encCot_id" => $idEncabezadoCotizacion,
                        "proCot_margen" => $margenProductos[$i],
                        "proCot_cantidad" => $this->input->post("cantidadProductos")[$i],
                    );
                }
                $idEncabezadoCotizacion = $this->Cotizacion_model->guardarProductoCotizacion($productoCotizacion);
            }
        } catch (exception $e) {
            
        } finally {
            
        }
    }

    function consultaCotizacion() {
        $this->load->model("Cotizacion_model");
        $this->data['cliente'] = $this->Cotizacion_model->cliente();
        $this->data['formaPago'] = $this->Cotizacion_model->formaPago();
        $this->data['tiempoEntrega'] = $this->Cotizacion_model->TiemoEntrega();
        $this->data['Garantia'] = $this->Cotizacion_model->garantia();
        $this->data['validezOferta'] = $this->Cotizacion_model->ValidezOferta();
        $this->layout->view("Cotizacion/consultaCotizacion", $this->data);
    }

    function filtroBusqueda() {
        $this->load->model("Cotizacion_model");
        $cotizaciones = $this->Cotizacion_model->consultaEncabezadoCotizaciones($this->input->post());
        $this->output->set_content_type('application/json')->set_output(json_encode($cotizaciones));
    }

    function pdf($dato = null) {
        if ($dato == null)
            redirect('index.php', 'location');
        $this->load->model("Cotizacion_model");
        $this->data['cotizaciones'] = $this->Cotizacion_model->consultaEncabezadoCotizaciones2($dato);
        $this->data['consultaProductos'] = $this->Cotizacion_model->consultaProductosCotizacion($dato);
        $html = $this->load->view("Cotizacion/factura", $this->data, true);

        pdf($html);
    }

}
