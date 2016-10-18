<?php

class Categoria__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function save_categoria($post) {
        if (isset($post['campo'])) {
            $this->db->where($post["campo"], $post[$post["campo"]]);
            $id = $post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('categoria', $post);
        } else {
            $this->db->insert('categoria', $post);
            $id = $this->db->insert_id();
        }
        return $id;
    }

    function delete_categoria($post) {
        $this->db->select('Categoria cantidad', false);
        $datos = $this->db->get('productos');
        $datos->result();
        if (count($datos)) {
            return count($datos);
        } else {
            $this->db->set('ACTIVO', 'N');
            $this->db->where($post["campo"], $post[$post["campo"]]);
            $this->db->update('categoria');
        }
    }

    function edit_categoria($post) {
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $datos = $this->db->get('categoria', $post);
        return $datos = $datos->result();
    }

    function consult_categoria($post) {
        if (isset($post['id']))
            if ($post['id'] != "")
                $this->db->like('id', $post['id']);
        if (isset($post['nombre']))
            if ($post['nombre'] != "")
                $this->db->like('nombre', $post['nombre']);
        if (isset($post['activo']))
            if ($post['activo'] != "")
                $this->db->like('activo', $post['activo']);
        $this->db->select('id');
        $this->db->select('nombre');
        $this->db->where('ACTIVO', 'S');
        $datos = $this->db->get('categoria');
        $datos = $datos->result();
        return $datos;
    }

}

?>
