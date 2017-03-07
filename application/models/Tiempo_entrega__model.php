<?php

class Tiempo_entrega__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function save_tiempo_entrega($post) {
        if (isset($post['campo'])) {
            $this->db->where($post["campo"], $post[$post["campo"]]);
            $id = $post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('tiempo_entrega', $post);
        } else {
            $this->db->insert('tiempo_entrega', $post);
            $id = $this->db->insert_id();
        }
        return $id;
    }

    function delete_tiempo_entrega($post) {
        $this->db->set('ACTIVO', 'N');
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $this->db->update('tiempo_entrega');
    }

    function edit_tiempo_entrega($post) {
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $datos = $this->db->get('tiempo_entrega', $post);
        return $datos = $datos->result();
    }

    function consult_tiempo_entrega($post) {
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
        $this->db->select('per_nombre');
        $this->db->where('tiempo_entrega.ACTIVO', 'S');
        $this->db->join('periodo', 'periodo.per_id=tiempo_entrega.per_id');
        $datos = $this->db->get('tiempo_entrega');
        $datos = $datos->result();
        return $datos;
    }

}

?>
