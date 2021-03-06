<?php

class Ingreso_model extends CI_Model {
/**
 *
 * @package     NYGSOFT
 * @author      Gerson J Barbosa / Nelson G Barbosa
 * @copyright   www.nygsoft.com
 * @celular     301 385 9952 - 312 421 2513
 * @email       javierbr12@hotmail.com    
 */
    function __construct() {
        parent::__construct();
    }


    
    function permisoroles($padre = null) {

//        echo $padre."****";die;
//        echo $padre."*****"."<br>";
//        $idusuario = $idusuario->id;
        
        $idusuario = 1;

        if ($padre != "prueba") {
            $this->db->where('menu_idpadre', $padre);
        } else {
            $this->db->where('menu_idpadre', 0);
        };

        $dato = $this->db->get('modulo');
        $envio = $dato->result_array();

//        echo $this->db->last_query();die;

        return $envio;
    }

    function consultamenu($idgeneral) {

        $this->db->where('menu_id', $idgeneral);
        $datos = $this->db->get('modulo');

        return $datos->result_array();
    }

    function cargamenu($padre) {
        if (empty($padre)) {
            $this->db->where('menu_idpadre', '0');
        } else {
            $this->db->where('menu_idpadre', $padre);
        }
        $dato = $this->db->get('modulo');
        $envio = $dato->result_array();

        return $envio;
    }

    function consultahijos($idgeneral = 0) {

//        $this->db->select('menu_id,menu_idpadre');
        if (!empty($idgeneral))
            $this->db->where('menu_idpadre', $idgeneral);
        else
            $this->db->where('menu_idpadre', '0');
        $dato = $this->db->get('modulo');

//        echo 1;die;
//        var_dump($dato->result_array());die;

        return $dato->result_array();
    }

    function hijos($hijo) {

        $this->db->where('menu_idpadre', $hijo);
        $dato = $this->db->get('modulo');
        $envio = $dato->result_array();

//        echo $this->db->last_query();
        return $envio;
    }

    function guardarmodulo($modulo, $padre = null, $general) {


        $data = array('menu_nombrepadre' => $modulo,
            'menu_idpadre' => $general
        );

        $this->db->insert('modulo', $data);

        return $this->db->insert_id();
    }

    function actualizahijos($padre) {

        $data = array('menu_idhijo' => $padre);

        $this->db->where('menu_id', $padre);
        $this->db->update('modulo', $data);
    }

    function guardarusuario($usuario, $email, $contrasena, $celular) {

        $data = array('username' => $usuario,
            'password' => sha1($contrasena),
            'email' => $email,
            'phone' => $celular,
            'active' => 1
        );
        $this->db->insert('users', $data);
    }

    function eliminar($eliminar) {

        $this->db->where('menu_id', $eliminar);
        $this->db->delete('modulo');
    }

    function usuarios() {

        $usuarios = $this->db->get('user');
        return $usuarios->result_array();
    }

    function menutotal() {
        $dato = $this->db->get('modulo');
//        echo $this->db->last_query();
        $envio = $dato->result_array();
        return $envio;
    }





    function guardaatributos($idgeneral, $controlador, $accion, $estado, $nombre) {

        if (!empty($controlador))
            $this->db->set('menu_controlador', $controlador);
        if (!empty($accion))
            $this->db->set('menu_accion', $accion);
        if (!empty($estado))
            $this->db->set('menu_estado', $estado);
        if (!empty($nombre))
            $this->db->set('menu_nombrepadre', $nombre);
        $this->db->where('menu_id', $idgeneral);
        $this->db->update('modulo');
    }

    function totalusuarios() {

//        $this->db->where();
        $this->db->where('user.activo', 'S');
        $usuarios = $this->db->get('user');
        return $usuarios->result_array();
    }

    function consultausuario($id) {

        $this->db->where('usu_id', $id);
        $usuarios = $this->db->get('user');
        return $usuarios->result_array();
    }

    function guardaratributosmenu($nombre, $controlador, $accion, $estado, $id) {

        $this->db->set('menu_nombrepadre', $nombre);
        $this->db->set('menu_controlador', $controlador);
        $this->db->set('menu_accion', $accion);
        $this->db->set('menu_estado', $estado);
        $this->db->where('menu_id', $id);
        $this->db->update('modulo');
    }





    function actualizausuariorol($id){
        
        $this->db->where("usu_id",$id);
        $this->db->set("rol_id","");
        $this->db->update("user");
    }



    function guardarcontrasena($contrasena,$id){
        
        $this->db->where('usu_id',$id);
        $this->db->set('usu_password',$contrasena);
        $this->db->update('user');
        
    }

    function admin_inicio_emp($id) {
        $this->db->set('emp_inicio,emp_id');
        $this->db->where('emp_id',$id);
        $dato = $this->db->get('empresa');
        return $dato->result();
    }


}
