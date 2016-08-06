<?php 
class Validez_oferta__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function save_validez_oferta($post){
        if(isset($post['campo'])){ 
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $id=$post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('validez_oferta',$post);
        }else{
            $this->db->insert('validez_oferta',$post);
            $id=$this->db->insert_id();
        }
        return $id;
        
    }
    function delete_validez_oferta($post){
        $this->db->set('ACTIVO','N');
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $this->db->update('validez_oferta');
    }
    function edit_validez_oferta($post){
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $datos=$this->db->get('validez_oferta',$post);
        return $datos=$datos->result();
    }
    function consult_validez_oferta($post){
            if(isset($post['id']))
        if($post['id']!="")
        $this->db->like('id',$post['id']);
                    if(isset($post['nombre']))
        if($post['nombre']!="")
        $this->db->like('nombre',$post['nombre']);
                    if(isset($post['activo']))
        if($post['activo']!="")
        $this->db->like('activo',$post['activo']);
                                    $this->db->select('id');
                                $this->db->select('nombre');
                        $this->db->where('ACTIVO','S');
        $datos=$this->db->get('validez_oferta');
        $datos=$datos->result();
        return $datos;
    }
}
?>
