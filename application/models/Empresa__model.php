<?php

class Empresa__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function save_empresa($post) {
        if (isset($post['campo'])) {
            $this->db->where($post["campo"], $post[$post["campo"]]);
            $id = $post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('empresa', $post);
        } else {
            $this->db->insert('empresa', $post);
            $id = $this->db->insert_id();
        }
        return $id;
    }
    public function nit($post) {
        if (!empty($post['id']))
            $this->db->where_not_in('id', $post['id']);
        $this->db->where('nit', $post['nit']);
        $this->db->where('ACTIVO', 'S');
        $datos = $this->db->get('empresa');
        $datos = $datos->result();
        return count($datos);
    }
    public function nit_cliente($post) {
        if (!empty($post['id']))
            $this->db->where_not_in('id', $post['id']);
        $this->db->where('nit', $post['nit']);
        $this->db->where('ACTIVO', 'S');
        $datos = $this->db->get('clientes');
        $datos = $datos->result();
        return count($datos);
    }

    function delete_empresa($post) {
        $this->db->set('ACTIVO', 'N');
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $this->db->update('empresa');
    }

    function edit_empresa($post) {
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $datos = $this->db->get('empresa', $post);
        return $datos = $datos->result();
    }

    function consult_empresa($post) {
        if (isset($post['id']))
            if ($post['id'] != "")
                $this->db->like('id', $post['id']);
        if (isset($post['nit']))
            if ($post['nit'] != "")
                $this->db->like('nit', $post['nit']);
        if (isset($post['nombre']))
            if ($post['nombre'] != "")
                $this->db->like('nombre', $post['nombre']);
        if (isset($post['ciudad']))
            if ($post['ciudad'] != "")
                $this->db->like('ciu_nombre', $post['ciudad']);
        if (isset($post['telefono']))
            if ($post['telefono'] != "")
                $this->db->like('telefono', $post['telefono']);
        if (isset($post['direccion']))
            if ($post['direccion'] != "")
                $this->db->like('direccion', $post['direccion']);
        if (isset($post['fax']))
            if ($post['fax'] != "")
                $this->db->like('fax', $post['fax']);
        if (isset($post['pais']))
            if ($post['pais'] != "")
                $this->db->like('pai_nombre', $post['pais']);
        if (isset($post['direccion_web']))
            if ($post['direccion_web'] != "")
                $this->db->like('direccion_web', $post['direccion_web']);
        if (isset($post['email']))
            if ($post['email'] != "")
                $this->db->like('email', $post['email']);
        if (isset($post['activo']))
            if ($post['activo'] != "")
                $this->db->like('activo', $post['activo']);
        $this->db->join('pais','pai_id=pais');
        $this->db->join('ciudad','ciu_id=ciudad');
        $this->db->select('id');
        $this->db->select('nit');
        $this->db->select('nombre');
        $this->db->select('ciu_nombre');
        $this->db->select('telefono');
        $this->db->select('direccion');
//        $this->db->select('fax');
//        $this->db->select('pai_nombre');
//        $this->db->select('direccion_web');
//        $this->db->select('email');
        $this->db->where('empresa.ACTIVO', 'S');
        $datos = $this->db->get('empresa');
        $datos = $datos->result();
        return $datos;
    }

}

?>
