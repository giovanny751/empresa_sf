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
class User_model extends CI_Model {

    function __construct() {
        $this->db = $this->load->database('default', TRUE);
        parent::__construct();
    }

    public function get_user($username, $pass) {
        $this->db->select('user.*,empresa.nombre empresa', false);
        $this->db->where('usu_usuario', $username);
        $this->db->where('usu_contrasena', sha1($pass));
        $this->db->join('empresa', 'empresa.id=user.emp_id', 'left');
        $this->db->where('user.activo', 'S');
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function validacionusuario($iduser) {
        $this->db->select('user.*,empresa.nombre empresa', false);
        $this->db->where('usu_id', $iduser);
        $this->db->join('empresa', 'empresa.id=user.emp_id', 'left');
        $query = $this->db->get('user');
        return $query->result();
    }

    function admin_inicio() {
        $this->db->where('ini_id', 1);
        $dato = $this->db->get('inicio');
        return $dato->result();
    }

    function reset($mail) {
        $datos = rand(1000000, 8155555);
        $this->db->set('usu_contrasena', sha1($datos));
        $this->db->where('usu_email', $mail);
        $this->db->get('user');
        return $datos;
    }

    function confirmar($mail) {
        $this->db->where('usu_email', $mail);
        $datos = $this->db->get('user');
        $datos = $datos->result();
        return $datos;
    }

    function actualizar($mail) {
//        $this->db->set('usu_cambiocontrasena', 1);
        $this->db->where('usu_email', $mail);
        $this->db->update('user');




        return $datos;
    }

    function actualizar2($mail, $password) {

        $this->db->where('usu_email', $mail);
        $this->db->set('usu_contrasena', sha1($password));
        $this->db->update('user');


//        echo $this->db->last_query();
    }

    function create($data, $post) {
        $this->db->insert('user', $data);
//        echo $this->db->last_query();
        $id = $this->db->insert_id();



        return $id;
    }

    function update_user($data, $cedula) {
        $this->db->where('usu_cedula', $cedula);
        $this->db->update('user', $data);
    }

    function consultageneral() {

        $this->db->select("user.usu_id as id,user.*,ingreso.Ing_fechaIngreso as ingreso");
        $this->db->join("ingreso", "ingreso.usu_id = user.usu_id and ingreso.ing_fechaIngreso = (select max(ing_fechaIngreso) from ingreso ) ", "LEFT");
        $this->db->where('user.activo', 'S');
        $user = $this->db->get('user');
//        echo $this->db->last_query();die;
        return $user->result();
    }

    function consultausuarioxid($id) {

        $this->db->where("usu_id", $id);
        $user = $this->db->get("user");
        return $user->result();
    }

    function update($data, $id, $post) {
        $this->db->where("usu_id", $id);
        $this->db->update("user", $data);
    }

    function consultausuarioxcedula($cedula) {

        $this->db->where("usu_cedula", $cedula);
        $user = $this->db->get("user");
        return $user->result();
    }

    function rolxdefecto($rol, $usu_id) {

        $this->db->where("usu_id", $usu_id);
        $this->db->set("rol_id", $rol);
        $this->db->update("user");
    }

    function validaexistencia($cc) {
        $this->db->where("usu_cedula", $cc);
        $data = $this->db->get('user');
        return $data->result();
    }

    function validaexistencia_brigada($cc) {
        $this->db->where("nombre", $cc);
        $data = $this->db->get('brigadas');
//        $this->db->last_query();
        return $data->result();
    }

    function email($email) {
        $this->db->where("usu_email", $email);
        $data = $this->db->get('user');
        return $data->result();
    }

    function validaexistencia_usuario($user) {
        $this->db->where("usu_usuario", $user);
        $data = $this->db->get('user');
        return $data->result();
    }

}
