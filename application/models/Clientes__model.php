<?php 
class Clientes__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function save_clientes($post){
        if(isset($post['campo'])){ 
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $id=$post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('clientes',$post);
        }else{
            $this->db->insert('clientes',$post);
            $id=$this->db->insert_id();
        }
        return $id;
        
    }
    function delete_clientes($post){
        $this->db->set('ACTIVO','N');
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $this->db->update('clientes');
    }
    function edit_clientes($post){
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $datos=$this->db->get('clientes',$post);
        return $datos=$datos->result();
    }
    function consult_clientes($post){
            if(isset($post['id']))
        if($post['id']!="")
        $this->db->like('id',$post['id']);
                    if(isset($post['nit']))
        if($post['nit']!="")
        $this->db->like('nit',$post['nit']);
                    if(isset($post['cliente']))
        if($post['cliente']!="")
        $this->db->like('cliente',$post['cliente']);
                    if(isset($post['contacto']))
        if($post['contacto']!="")
        $this->db->like('contacto',$post['contacto']);
                    if(isset($post['cargo']))
        if($post['cargo']!="")
        $this->db->like('cargo',$post['cargo']);
                    if(isset($post['ciudad']))
        if($post['ciudad']!="")
        $this->db->like('ciudad',$post['ciudad']);
                    if(isset($post['email']))
        if($post['email']!="")
        $this->db->like('email',$post['email']);
                    if(isset($post['telefono_cli']))
        if($post['telefono_cli']!="")
        $this->db->like('telefono_cli',$post['telefono_cli']);
                    if(isset($post['activo']))
        if($post['activo']!="")
        $this->db->like('activo',$post['activo']);
                                    $this->db->select('id');
                                $this->db->select('nit');
                                $this->db->select('cliente');
                                $this->db->select('contacto');
                                $this->db->select('cargo');
                                $this->db->select('ciudad');
                                $this->db->select('email');
                                $this->db->select('telefono_cli');
                        $this->db->where('ACTIVO','S');
        $datos=$this->db->get('clientes');
        $datos=$datos->result();
        return $datos;
    }
}
?>
