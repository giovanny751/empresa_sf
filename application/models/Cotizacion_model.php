<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @package     NYGSOFT
 * @author      Gerson J Barbosa / Nelson G Barbosa
 * @copyright   www.nygsoft.com
 * @celular     301 385 9952 - 312 421 2513
 * @email       javierbr12@hotmail.com    
 */
class Cotizacion_model extends CI_Model {

    function __construct() {
        $this->db = $this->load->database('default', TRUE);
        parent::__construct();
    }

    function cliente() {
        $this->db->where("activo", 'S');
        return $this->db->get('clientes')->result();
    }

    function formaPago() {
        $this->db->where("activo", 'S');
        return $this->db->get('forma_pago')->result();
    }

    function TiemoEntrega() {
        $this->db->where("activo", 'S');
        return $this->db->get('tiempo_entrega')->result();
    }

    function garantia() {
        $this->db->where("activo", 'S');
        return $this->db->get('garantia')->result();
    }

    function ValidezOferta() {
        $this->db->where("activo", 'S');
        return $this->db->get('validez_oferta')->result();
    }

    function productos() {
        $this->db->where("activo", 'S');
        $this->db->order_by("Descripcion");
        return $this->db->get('productos')->result();
    }

    function guardarEncabezadoCotizacion($encabezadoCotizacion) {
        $this->db->where("id_cliente", $post['cliente']);
        $this->db->insert("encabezado_cotizacion", $encabezadoCotizacion);
        return $this->db->insert_id();
    }

    function actualizarEncabezadoCotizacion($encabezadoCotizacion, $id) {
        $this->db->where("encCot_id", $id);
        $this->db->update("encabezado_cotizacion", $encabezadoCotizacion);

        $this->db->where("encCot_id", $id);
        $this->db->delete("producto_cotizacion");



        return $id;
    }

    function guardarProductoCotizacion($productoCotizacion) {
        $this->db->insert_batch("producto_cotizacion", $productoCotizacion);
    }

    function consultaEncabezadoCotizaciones($post) {
        if (!empty($post['cliente']))
            $this->db->where("id_cliente", $post['cliente']);
        if (!empty($post['formaPago']))
            $this->db->where("id_formaPago", $post['formaPago']);
        if (!empty($post['tiempoEntrega']))
            $this->db->where("id_tiempoEntrega", $post['tiempoEntrega']);
        if (!empty($post['garantia']))
            $this->db->where("id_garantia", $post['garantia']);
        if (!empty($post['validezOferta']))
            $this->db->where("id_validezOferta", $post['validezOferta']);
        if (!empty($post['encCot_id']))
            $this->db->where("encabezado_cotizacion.encCot_id", $post['encCot_id']);

        $this->db->select("encabezado_cotizacion.encCot_id as cotEnc_id");
        $this->db->select("clientes.cliente as cliente");
        $this->db->select("garantia.nombre as garantia");
        $this->db->select("forma_pago.nombre as formaPago");
        $this->db->select("validez_oferta.nombre as validezOferta");
        $this->db->select("tiempo_entrega.nombre as tiempoEntrega");
        $this->db->select("estados.nombre estado");
        $this->db->select("estados.id id_estado");
        $this->db->select("(select sum(proCot_cantidad) from producto_cotizacion where encCot_id=encabezado_cotizacion.encCot_id) cantidad", false);
        $this->db->select("(select sum(proCot_costo * proCot_cantidad) from producto_cotizacion where encCot_id=encabezado_cotizacion.encCot_id) valor_cotizacion", false);
        $this->db->join("clientes", "clientes.id = encabezado_cotizacion.id_cliente");
        $this->db->join("forma_pago", "forma_pago.id = encabezado_cotizacion.id_formaPago");
        $this->db->join("garantia", "garantia.id = encabezado_cotizacion.id_garantia");
        $this->db->join("tiempo_entrega", "tiempo_entrega.id = encabezado_cotizacion.id_tiempoEntrega");
        $this->db->join("validez_oferta", "validez_oferta.id = encabezado_cotizacion.id_validezOferta");
        $this->db->join("estados", "encabezado_cotizacion.est_id=estados.id");
//        $this->db->where("est_id", '1');
        $data = $this->db->get("encabezado_cotizacion");

//        print_y($data);
        return $data->result();
    }

    function consultaEncabezadoCotizaciones2($dato) {
        $this->db->where("encCot_id", $dato);
        $this->db->select("encabezado_cotizacion.encCot_id as cotEnc_id");
        $this->db->select("clientes.*");
        $this->db->select("garantia.nombre as garantia");
        $this->db->select("forma_pago.nombre as formaPago");
        $this->db->select("validez_oferta.nombre as validezOferta");
        $this->db->select("tiempo_entrega.nombre as tiempoEntrega");
        $this->db->select("estados.nombre estado");
        $this->db->select("(select count(*) from producto_cotizacion where encCot_id=encabezado_cotizacion.encCot_id) cantidad", false);
        $this->db->select("(select sum(proCot_costo) from producto_cotizacion where encCot_id=encabezado_cotizacion.encCot_id) valor_cotizacion", false);
        $this->db->join("clientes", "clientes.id = encabezado_cotizacion.id_cliente");
        $this->db->join("forma_pago", "forma_pago.id = encabezado_cotizacion.id_formaPago");
        $this->db->join("garantia", "garantia.id = encabezado_cotizacion.id_garantia");
        $this->db->join("tiempo_entrega", "tiempo_entrega.id = encabezado_cotizacion.id_tiempoEntrega");
        $this->db->join("validez_oferta", "validez_oferta.id = encabezado_cotizacion.id_validezOferta");
        $this->db->join("estados", "encabezado_cotizacion.est_id=estados.id");

        $data = $this->db->get("encabezado_cotizacion");
        return $data->result();
    }

    function consultaEncabezado($encCot_id) {
        $this->db->where("encCot_id", $encCot_id);
//        $this->db->where("est_id", 1);
        $data = $this->db->get("encabezado_cotizacion");
        return $data->result();
    }

    function estados() {
        if ($this->session->userdata('permisos') == 1) {
            $d = array(1, 2);
            $this->db->where_in('id', $d);
        }
        if ($this->session->userdata('permisos') == 2) {
            $d = array(3, 4);
            $this->db->where_in('id', $d);
        }
        $data = $this->db->get("estados");
        return $data->result();
    }

    function consultaProductosCotizacion($encCot_id) {
        $this->db->where("encCot_id", $encCot_id);
        $this->db->join("productos", "productos.id = producto_cotizacion.id_producto");
        $producto = $this->db->get('producto_cotizacion');
        return $producto->result();
    }

}
