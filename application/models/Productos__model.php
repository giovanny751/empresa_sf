<?php

class Productos__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function save_productos($post) {
        $datos = $this->db->query('select * from configuracion where id=(select max(id) id  from configuracion)');
        $datos = $datos->result();
        $dolar = $datos[0]->dolar;
        $porcentaje_arancel = $datos[0]->arancel;
        $porcentaje_flete = $datos[0]->flete;
        $porcentaje_g_nacionalizacion = $datos[0]->g_nacionalizacion;
        $porcentaje_margen = $datos[0]->margen;


        // nuevos valores 

        $post['costo_cop'] = $dolar * $post['costo_usd'];
        $post['arancel'] = $porcentaje_arancel * $post['costo_cop'];
        $post['flete'] = $porcentaje_flete * $post['costo_cop'];
        $post['g_nacionalizacion'] = $porcentaje_g_nacionalizacion * $post['costo_cop'];
        $post['costo_total'] = $post['costo_cop'] + $post['arancel'] + $post['flete'] + $post['g_nacionalizacion'];
        $post['Valor_unitario'] = ($post['costo_cop'] / $porcentaje_margen);
        $post['margen'] = $post['Valor_unitario'] - $post['costo_total'];

        if (isset($post['campo'])) {
            $this->db->where($post["campo"], $post[$post["campo"]]);
            $id = $post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('productos', $post);
        } else {
            $this->db->insert('productos', $post);
            $id = $this->db->insert_id();
        }
//        echo $this->db->last_query();
        return $id;
    }

    function delete_productos($post) {
        $this->db->set('ACTIVO', 'N');
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $this->db->update('productos');
    }

    function edit_productos($post) {
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $datos = $this->db->get('productos', $post);
        return $datos = $datos->result();
    }

    function consult_productos($post) {
        if (isset($post['id']))
            if ($post['id'] != "")
                $this->db->like('id', $post['id']);
        if (isset($post['referencia']))
            if ($post['referencia'] != "")
                $this->db->like('referencia', $post['referencia']);
        if (isset($post['Nombre']))
            if ($post['Nombre'] != "")
                $this->db->like('Nombre', $post['Nombre']);
        if (isset($post['Descripcion']))
            if ($post['Descripcion'] != "")
                $this->db->like('Descripcion', $post['Descripcion']);
        if (isset($post['Categoria']))
            if ($post['Categoria'] != "")
                $this->db->like('Categoria', $post['Categoria']);
        if (isset($post['costo_usd']))
            if ($post['costo_usd'] != "")
                $this->db->like('costo_usd', $post['costo_usd']);
        if (isset($post['costo_cop']))
            if ($post['costo_cop'] != "")
                $this->db->like('costo_cop', $post['costo_cop']);
        if (isset($post['arancel']))
            if ($post['arancel'] != "")
                $this->db->like('arancel', $post['arancel']);
        if (isset($post['flete']))
            if ($post['flete'] != "")
                $this->db->like('flete', $post['flete']);
        if (isset($post['g_nacionalizacion']))
            if ($post['g_nacionalizacion'] != "")
                $this->db->like('g_nacionalizacion', $post['g_nacionalizacion']);
        if (isset($post['costo_total']))
            if ($post['costo_total'] != "")
                $this->db->like('costo_total', $post['costo_total']);
        if (isset($post['margen']))
            if ($post['margen'] != "")
                $this->db->like('margen', $post['margen']);
        if (isset($post['Valor_unitario']))
            if ($post['Valor_unitario'] != "")
                $this->db->like('Valor_unitario', $post['Valor_unitario']);
        if (isset($post['activo']))
            if ($post['activo'] != "")
                $this->db->like('activo', $post['activo']);
        $this->db->select('productos.id');
        $this->db->select('referencia');
        $this->db->select('productos.Nombre');
        $this->db->select('Descripcion');
        $this->db->select('categoria.nombre nomb');
        $this->db->select('costo_cop');
        $this->db->where('productos.ACTIVO', 'S');
        $this->db->join('categoria','categoria.id=productos.Categoria');
        $datos = $this->db->get('productos');
        $datos = $datos->result();
        return $datos;
    }

}

?>
