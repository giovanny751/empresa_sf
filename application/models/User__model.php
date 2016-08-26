<?php

class User__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function save_user($post) {
        $post['usu_contrasena'] = sha1($post['usu_contrasena']);
        if (isset($post['campo'])) {
            $this->db->where($post["campo"], $post[$post["campo"]]);
            $id = $post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('user', $post);
        } else {
            $this->db->insert('user', $post);
            $id = $this->db->insert_id();
        }
        return $id;
    }
    public function usu_usuario($post) {
        if (!empty($post['usu_id']))
            $this->db->where_not_in('usu_id', $post['usu_id']);
        $this->db->where('usu_usuario', $post['usu_usuario']);
        $this->db->where('ACTIVO', 'S');
        $datos = $this->db->get('user');
        $datos = $datos->result();
        return count($datos);
    }
    public function usu_cedula($post) {
        if (!empty($post['usu_id']))
            $this->db->where_not_in('usu_id', $post['usu_id']);
        $this->db->where('usu_cedula', $post['usu_cedula']);
        $this->db->where('ACTIVO', 'S');
        $datos = $this->db->get('user');
        $datos = $datos->result();
        return count($datos);
    }

    function delete_user($post) {
        $this->db->set('ACTIVO', 'N');
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $this->db->update('user');
    }

    function edit_user($post) {
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $datos = $this->db->get('user', $post);
        return $datos = $datos->result();
    }

    function consult_user($post) {
        if (isset($post['usu_id']))
            if ($post['usu_id'] != "")
                $this->db->like('usu_id', $post['usu_id']);
        if (isset($post['usu_cedula']))
            if ($post['usu_cedula'] != "")
                $this->db->like('usu_cedula', $post['usu_cedula']);
        if (isset($post['usu_nombre']))
            if ($post['usu_nombre'] != "")
                $this->db->like('usu_nombre', $post['usu_nombre']);
        if (isset($post['usu_apellido']))
            if ($post['usu_apellido'] != "")
                $this->db->like('usu_apellido', $post['usu_apellido']);
        if (isset($post['usu_usuario']))
            if ($post['usu_usuario'] != "")
                $this->db->like('usu_usuario', $post['usu_usuario']);
        if (isset($post['usu_contrasena']))
            if ($post['usu_contrasena'] != "")
                $this->db->like('usu_contrasena', $post['usu_contrasena']);
        if (isset($post['usu_email']))
            if ($post['usu_email'] != "")
                $this->db->like('usu_email', $post['usu_email']);
        if (isset($post['emp_id']))
            if ($post['emp_id'] != "")
                $this->db->like('emp_id', $post['emp_id']);
        if (isset($post['creatorUser']))
            if ($post['creatorUser'] != "")
                $this->db->like('creatorUser', $post['creatorUser']);
        if (isset($post['creatorDate']))
            if ($post['creatorDate'] != "")
                $this->db->like('creatorDate', $post['creatorDate']);
        if (isset($post['modificationUser']))
            if ($post['modificationUser'] != "")
                $this->db->like('modificationUser', $post['modificationUser']);
        if (isset($post['modificationDate']))
            if ($post['modificationDate'] != "")
                $this->db->like('modificationDate', $post['modificationDate']);
        if (isset($post['activo']))
            if ($post['activo'] != "")
                $this->db->like('activo', $post['activo']);
        $this->db->join('empresa','empresa.id=user.emp_id','left');
        $this->db->select('usu_id');
        $this->db->select('usu_cedula');
        $this->db->select('usu_nombre');
        $this->db->select('usu_apellido');
        $this->db->select('usu_usuario');
        $this->db->select('usu_email');
        $this->db->select('empresa.nombre');
        $this->db->where('user.ACTIVO', 'S');
        $datos = $this->db->get('user');
        $datos = $datos->result();
        return $datos;
    }

}

?>
