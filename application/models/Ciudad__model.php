<?php

class Ciudad__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function save_ciudad($post) {
        if (isset($post['campo'])) {
            $this->db->where($post["campo"], $post[$post["campo"]]);
            $id = $post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('ciudad', $post);
        } else {
            $this->db->insert('ciudad', $post);
            $id = $this->db->insert_id();
        }
        return $id;
    }

    function delete_ciudad($post) {
        $this->db->set('ACTIVO', 'N');
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $this->db->update('ciudad');
    }

    function edit_ciudad($post) {
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $datos = $this->db->get('ciudad', $post);
        return $datos = $datos->result();
    }

    function consult_ciudad($post) {
        if (isset($post['ciu_id']))
            if ($post['ciu_id'] != "")
                $this->db->like('ciu_id', $post['ciu_id']);
        if (isset($post['pai_id']))
            if ($post['pai_id'] != "")
                $this->db->where('ciudad.pai_id', $post['pai_id']);
        if (isset($post['ciu_nombre']))
            if ($post['ciu_nombre'] != "")
                $this->db->like('ciu_nombre', $post['ciu_nombre']);
        if (isset($post['activo']))
            if ($post['activo'] != "")
                $this->db->like('activo', $post['activo']);
        $this->db->join('pais','pais.pai_id=ciudad.pai_id');
        $this->db->select('ciu_id');
        $this->db->select('pai_nombre');
        $this->db->select('ciu_nombre');
        $this->db->where('ciudad.ACTIVO', 'S');
        $datos = $this->db->get('ciudad');
        $datos = $datos->result();
        return $datos;
    }

}

?>
