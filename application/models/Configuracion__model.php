<?php

class Configuracion__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function save_configuracion($post) {

        $this->db->set('activo', 'N');
        $this->db->where('activo', 'S');
        $this->db->update('configuracion');

        if (isset($post['campo'])) {
            $this->db->where($post["campo"], $post[$post["campo"]]);
            $id = $post[$post["campo"]];
            unset($post['campo']);
            $this->db->set('activo', 'S');
            $this->db->update('configuracion', $post);
        } else {
            $this->db->set('activo', 'S');
            $this->db->insert('configuracion', $post);
            $id = $this->db->insert_id();
        }



        $datos = $this->db->query('select * from configuracion where id=(select max(id) id  from configuracion)');
        $datos = $datos->result();
        $dolar = $datos[0]->dolar;
        $porcentaje_arancel = $datos[0]->arancel;
        $porcentaje_flete = $datos[0]->flete;
        $porcentaje_g_nacionalizacion = $datos[0]->g_nacionalizacion;
        $porcentaje_margen = $datos[0]->margen;

        $datos2 = $this->db->get('productos');
        $datos2 = $datos2->result();

        foreach ($datos2 as $value) {
            $post2['costo_cop'] = $dolar * $value->costo_usd;
            $post2['arancel'] = $porcentaje_arancel * $post2['costo_cop'];
            $post2['flete'] = $porcentaje_flete * $post2['costo_cop'];
            $post2['g_nacionalizacion'] = $porcentaje_g_nacionalizacion * $post2['costo_cop'];
            $post2['costo_total'] = $post2['costo_cop'] + $post2['arancel'] + $post2['flete'] + $post2['g_nacionalizacion'];
            $post2['Valor_unitario'] = ($post2['costo_cop'] / $porcentaje_margen);
            $post2['margen'] = $post2['Valor_unitario'] - $post2['costo_total'];
            $this->db->where('id', $value->id);
            $this->db->update('productos', $post2);
        }



        return $id;
    }

    function delete_configuracion($post) {
        $this->db->set('ACTIVO', 'N');
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $this->db->update('configuracion');
    }

    function edit_configuracion($post) {
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $datos = $this->db->get('configuracion', $post);
        return $datos = $datos->result();
    }

    function consult_configuracion($post) {
        if (isset($post['id']))
            if ($post['id'] != "")
                $this->db->like('id', $post['id']);
        if (isset($post['dolar']))
            if ($post['dolar'] != "")
                $this->db->like('dolar', $post['dolar']);
        if (isset($post['arancel']))
            if ($post['arancel'] != "")
                $this->db->like('arancel', $post['arancel']);
        if (isset($post['flete']))
            if ($post['flete'] != "")
                $this->db->like('flete', $post['flete']);
        if (isset($post['g_nacionalizacion']))
            if ($post['g_nacionalizacion'] != "")
                $this->db->like('g_nacionalizacion', $post['g_nacionalizacion']);
        if (isset($post['margen']))
            if ($post['margen'] != "")
                $this->db->like('margen', $post['margen']);
        if (isset($post['fecha_modificacion']))
            if ($post['fecha_modificacion'] != "")
                $this->db->like('fecha_modificacion', $post['fecha_modificacion']);
        if (isset($post['activo']))
            if ($post['activo'] != "")
                $this->db->like('activo', $post['activo']);
        $this->db->select('id');
        $this->db->select('dolar');
        $this->db->select('arancel');
        $this->db->select('flete');
        $this->db->select('g_nacionalizacion');
        $this->db->select('margen');
        $this->db->where('ACTIVO', 'S');
        $datos = $this->db->get('configuracion');
        $datos = $datos->result();
        return $datos;
    }

}

?>
