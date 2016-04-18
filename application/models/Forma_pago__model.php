<?php 
class Forma_pago__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function save_forma_pago($post){
        if(isset($post['campo'])){ 
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $id=$post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('forma_pago',$post);
        }else{
            $this->db->insert('forma_pago',$post);
            $id=$this->db->insert_id();
        }
        return $id;
        
    }
    function delete_forma_pago($post){
        $this->db->set('ACTIVO','N');
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $this->db->update('forma_pago');
    }
    function edit_forma_pago($post){
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $datos=$this->db->get('forma_pago',$post);
        return $datos=$datos->result();
    }
    function consult_forma_pago($post){
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
        $datos=$this->db->get('forma_pago');
        $datos=$datos->result();
        return $datos;
    }
}
?>
